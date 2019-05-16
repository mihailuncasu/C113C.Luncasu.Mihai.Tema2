<?php
namespace App;

//require '../vendor/autoload.php';

class Mailer {
    public function __construct() {;
        
    }
    static function sendMail($email, $case, $token) {
        switch ($case) {
            // M: $case = 1 means that we sent a register confirmation mail;
            case '1':
                $link = $token;
                $msg = 'Iti multumim ca te-ai inregistrat.\n Acceseaza urmatorul link pentru a activa contul!';
                $msg .= '\nIn cazul in care nu este posibila accesarea linkului, aceasta este intregul link: ' . $link .'.';
                $msg = wordwrap($msg, 70);
                mail($email, 'Inrolare la pescari', $msg);
                die('daa');
                break;
            // M: $case = 2 means that we sent a reset password mail;
            case '2':
                
                break;
            default:
                break;
        }
    }
}