<?php


namespace App\classes;

class ErrorHandler {

	public function handleErrors ($error_number, $error_message, $error_file, $error_line)
	{
		$error = "[{$error_number}] An error occurred in file {$error_file} on line {$error_line}: $error_message";
		$environment = getenv('APP_ENV');
		if ($environment == 'local') {
			$whoops = new \Whoops\Run;
			$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
			$whoops->register();
		} else {
			  $data = [
				  	'to' => getenv('EMAIL_ADMIN'),
					'view'=>'errors',
					'subject'=>'There is an error on $error_file',
					'body'=>$error,
					'name'=>'Admin'
				];
				// send email to admin and display friendly output error using method chaining

				ErrorHandler::emailAdmin($data)->outputFriendlyError();
			}
	}

	public function outputFriendlyError() {
		//output error to the user
		ob_end_clean();
		view('errors/generic');
		exit;
	}


	public static function emailAdmin($data) {
		// SEND ERROR TO AN ADMIN
		$mail = new Mail;
		$mail->send($data);
		return new static;
	}

}




?>
