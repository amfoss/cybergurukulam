<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 18/3/15
 * Time: 6:31 PM
 */

$host = "localhost";
$user = "root";
$pass = "<password>";
$database = "cybergurukulam";

$sqlRegistrationTable = <<<EOSQL
CREATE TABLE IF NOT EXISTS registration(
	reg_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	reg_name varchar(255) NOT NULL,
	reg_password varchar(255) NOT NULL,
	reg_email varchar(255) NOT NULL,
	reg_dob date NOT NULL,
	reg_city varchar(255) NOT NULL,
	reg_school varchar(255) NOT NULL,
	reg_address varchar( 400 ) NOT NULL,
	reg_paddress varchar( 400 ) NOT NULL,
	reg_standard varchar( 50 ) NOT NULL,
	reg_cse int ( 50 ) NOT NULL,
	reg_phy int ( 50 ) NOT NULL,
	reg_math int ( 50 ) NOT NULL,
	reg_olympiad varchar( 400 ) DEFAULT NULL,
	reg_ambition varchar( 400 ) DEFAULT NULL,
	reg_interest varchar( 400 ) DEFAULT NULL
);
EOSQL;

$connection = mysql_connect( $host, $user, $pass );
if ( !$connection ) {
	die("Database connection failed");
} else {
	if( !mysql_select_db( $database ) ) {
		die( "Cannot open database");
	}
}
$result = mysql_query( $sqlRegistrationTable ) or die( mysql_error() );
if ( !$result ) {
	die( "cannot create table" );
}
$invalidPOST = false;
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	foreach( $_POST as $key=>$value ) {
		if ( !isset( $value) ) {
			$invalidPOST = true;

		}
	}
	if ( $invalidPOST ) {
		die( "incomplete POST received ");
	}

	$name = mysql_real_escape_string( $_POST['name']);
	$email = mysql_real_escape_string( $_POST['email']);
	$password1 = mysql_real_escape_string( $_POST['password1'] );
	$password2 = mysql_real_escape_string( $_POST['password2'] );
	if ( $password1 != $password2 ) {
		die( "Password mismatch" );
	}
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

	$insertStatemenet = "
	INSERT INTO `registration`(`reg_id`, `reg_name`, `reg_password`, `reg_email`, `reg_dob`, `reg_city`, `reg_school`, `reg_address`,
	`reg_paddress`, `reg_standard`, `reg_cse`, `reg_phy`, `reg_math`, `reg_olympiad`, `reg_ambition`, `reg_interest`)
	VALUES ( NULL,'$name','$password1','$email','$dob','$city','$school','$address','$paddress','$standard','$cse',
	'$phy','$math','$olympiad','$ambition','$interest');";

	mysql_query( $insertStatemenet ) or die( mysql_error() );

	mysql_close( $connection );
	header('Location: '.'http://localhost/cyber/index.html');
}