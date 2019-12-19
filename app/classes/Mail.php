<?php

    namespace App\classes;
   // use PHPMailer;
    use PHPMailer\PHPMailer\PHPMailer;


    class Mail {



        protected $mail;
        public function __construct() {
            $this->mail = new PHPMailer(true);
            $this->setUp();
        }


        public function setUp() {
            $this->mail->isSMTP();
           // $this->mail->Mailer = 'smtp';
            $this->mail->SMTPAuth = 'true';
            $this->mail->SMTPSecure ='ssl';
            $this->mail->Host = getenv('SMTP_HOST');
            $this->mail->Port = getenv('SMTP_PORT');
            $environment = getenv('APP_ENV');

            if($environment === 'local') {
                $this->mail->SMTPDebug = 2;
            }

            //auth info
            $this->mail->Username = getenv('MAIL_USER');
            $this->mail->Password = getenv('MAIL_PASS');
            $this->mail->isHTML(true);
            $this->mail->SingleTo= true;

            //sender info
            // $this->mail->From = getenv('ADMIN_EMAIL');
            $this->mail->setFrom(getenv('MAIL_USER'), getenv('MAIL_SENDER'));
           // $this->mail->Sender = getenv('MAIL_SENDER');
        }

        public function send($data) {
            $this->mail->addAddress($data['to'], $data['name']);
            $this->mail->Subject = $data['subject'];
            $this->mail->Body = make($data['view'], array('data' => $data['body']));
            return $this->mail->send();
        }

    }




?>