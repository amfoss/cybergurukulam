<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 18/3/15
 * Time: 6:31 PM
 */
error_reporting(-1);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if ( $_POST['g-recaptcha-response'] == null ) {
		header('Location: '.'/../php/failure.html');
	} else {
		continueRegistration();
	}
}

function continueRegistration() {
	if ( checkIfInValidPost() ) {
		header('Location: '.'/../php/failure.html');
		return;
	}
	$connection = establishConnection();
	if( !$connection ) {
		header('Location: '.'/../php/failure.html');
		return;
	}
	createDatabaseTables();
	if ( !(insertIntoDatabase()) ) {
		header('Location: '.'/../php/failure.html');
	}
	mysql_close( $connection );
	header('Location: '.'/../php/success.html');
		
}

function establishConnection() {
	include "access.php";
	$connection = mysql_connect( $host, $user, $pass );
	if ( !mysql_select_db( $database ) ) {
		die( mysql_error() );
	}
	return $connection;
}

function createDatabaseTables() {
$sqlRegistrationTable = <<<EOSQL
CREATE TABLE IF NOT EXISTS registration(
	reg_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	reg_name varchar(255) NOT NULL,
	reg_email varchar(255) NOT NULL,
	reg_phone varchar(255) NOT NULL,
	reg_dob date NOT NULL,
	reg_city varchar(255) NOT NULL,
	reg_school varchar(255) NOT NULL,
	reg_address varchar( 400 ) NOT NULL,
	reg_paddress varchar( 400 ) NOT NULL,
	reg_standard varchar( 50 ) NOT NULL,
	reg_cse varchar( 50 ) NOT NULL,
	reg_phy varchar( 50 ) NOT NULL,
	reg_math varchar( 50 ) NOT NULL,
	reg_olympiad varchar( 400 ) DEFAULT NULL,
	reg_ambition varchar( 400 ) DEFAULT NULL,
	reg_interest varchar( 400 ) DEFAULT NULL,
	reg_blog varchar( 200 ) DEFAULT NULL,
	reg_timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);
EOSQL;
	if ( !mysql_query( $sqlRegistrationTable ) ) {
		die( mysql_error());
	}
}

function insertIntoDatabase() {
	print_r( $_POST );
	$name = mysql_real_escape_string( $_POST['name']);
	$email = mysql_real_escape_string( $_POST['email']);
	$phone = mysql_real_escape_string( $_POST['phone']);
	$dob = mysql_real_escape_string( $_POST['dob'] );
	$school = mysql_real_escape_string( $_POST['school'] );
	$city = mysql_real_escape_string( $_POST['city'] );
	$address= mysql_real_escape_string( $_POST['address'] );
	$paddress = mysql_real_escape_string( $_POST['paddress'] );
	$standard = mysql_real_escape_string( $_POST['standard'] );
	$cse= mysql_real_escape_string( $_POST['computerscience'] );
	$phy = mysql_real_escape_string( $_POST['physics'] );
	$math = mysql_real_escape_string( $_POST['math'] );
	$olympiad= mysql_real_escape_string( $_POST['olympiad'] );
	$ambition= mysql_real_escape_string( $_POST['ambition'] );
	$interest= mysql_real_escape_string( $_POST['interest'] );
	$blog= mysql_real_escape_string( $_POST['blog'] );
//	$timestamp = time();

	$insertStatemenet = "
	INSERT INTO `registration`(`reg_id`, `reg_name`, `reg_email`, `reg_phone`, `reg_dob`, `reg_city`, `reg_school`, `reg_address`,
	`reg_paddress`, `reg_standard`, `reg_cse`, `reg_phy`, `reg_math`, `reg_olympiad`, `reg_ambition`, `reg_interest`, `reg_blog`)
	VALUES ( NULL,'$name','$email','$phone','$dob','$city','$school','$address','$paddress','$standard','$cse',
	'$phy','$math','$olympiad','$ambition','$interest', '$blog');";

	if( !mysql_query( $insertStatemenet ) ) {
		die( mysql_error() );
		return false;
		}
	else { 
	//Sending confirmation e-mail
		if(!sendEmail()){
		  return false;
		  }
		  else { return true;}
		
	}
}

function checkIfInValidPost() {
	foreach( $_POST as $key => $value ) {
		if ( $value === "" ) {
			return true;
		}
	}
	return false;
}

function sendEmail() {
	$email_to = mysql_real_escape_string( $_POST['email']);
	$message = "Hello ". $_POST['name'] . "\n\t\t Welcome to Cybergurukulam.\n You are successfully registered for the Entrance Test for Cybergurukulam Wintercamp 2015.\n Your e-mail ID will be the primary source communication. Make sure that you check the e-mails regularly.";
	
	$subject = 'Welcome to Cybergurukulam ! ';
	$from = 'cybergurukulam@gmail.com';
	
	$name = 'Cybergurukulam';
	$intro = "Message from $name\n";
	$message = $intro . wordwrap( $message, 70, "\r\n" );
	$headers = "From: $from" ."\r\n".
	'Reply-To: '.$email_to."\r\n" .
	'Bcc: cybergurukulam@gmail.com' . "\r\n" . 
	'X-Mailer: PHP/' . phpversion();
	
	if ( mail( $email_to , $subject, $message, $headers ) ) {
		return true;
	} else {
		return false;
	}
	
}
