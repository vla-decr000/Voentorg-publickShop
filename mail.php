<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	$project_name = "shurf";
	$admin_email  = "aliukraine50@gmail.com";
	$form_subject = "Данные пользователя";
	// $name_item = trim($_POST["productName"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "shurf" && $key != "aliukraine50@gmail.com" && $key != "Данные пользователя" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
} else if ( $method === 'GET' ) {

	$project_name = "shurf";
	$admin_email  = "aliukraine50@gmail.com";
	$form_subject = "Данные пользователя";

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "shurf" && $key != "aliukraine50@gmail.com" && $key != "Данные пользователя" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );
