<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 29/3/15
 * Time: 2:16 PM
 */
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$response = null;
	if ( $_POST['g-recaptcha-response'] == null ) {
		header('Location: '.'/../php/failure.html');
	} else {
		sendEmail();
	}
}

function sendEmail() {
	$toAddress = array(
		'cybergurukulam@gmail.com',
		'vipin.p@gmail.com',
		'01tonythomas@gmail.com',
		'bithin2007@gmail.com',
		'rishish@gmail.com '
	);
	$email_to = implode( ',', $toAddress );
	$subject = 'Cybergurukulam user email';
	$from = ( isset( $_POST['email'] ) ) ? $_POST['email'] : 'cybergurukulam@gmail.com';
	$message = ( isset( $_POST['message']) ) ? $_POST['message'] : 'Empty Body';
	$name = ( isset( $_POST['name']) ) ? $_POST['name']: 'No Name';
	$intro = "Message from $name\n";
	$message = $intro.wordwrap( $message, 70, "\r\n" );
	$headers = "From: $from" ."\r\n";
	if ( mail( $email_to , $subject, $message, $headers ) ) {
		header('Location: '.'/../php/success.html');
	} else {
		header('Location: '.'/../php/failure.html');
	}
	
}
