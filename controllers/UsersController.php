<?php

/*
 * M: Controller that will handle the register process and the login one;
 */

class Users extends Controller {

    // M: Called on login;
    public function Login() {
        $this->returnView("", false, false);
    }

    public function AjaxLogin() {
        // M: We do a search in the db after the email;
        $usersModel = new UsersModel();
        $email = $_POST['email'];
        $user = $usersModel->GetUserAfterEmail($email);
        $stage = $_POST['stage'];
        $response;
        $msg;
        switch ($stage) {
            case 0:
                // M: Check if the email provided is in the db;
                if ($user) {
                    $response = '0';
                    $msg = 'Emailul exista!';
                } else {
                    $response = 1;
                    $msg = 'Se pare ca adresa de email introdusa nu exista! Doriti sa va inregistrati?';
                }
                break;
            case 1:
                // M: Check if the password and email provided match;
                $pwd = $_POST['password'];
                // M: Recheck the email;
                if (!$user) {
                    $response = 1;
                    $msg = 'Se pare ca adresa de email introdusa nu exista! Doriti sa va inregistrati?';
                    break;
                }
                if ($user->password != $pwd) {
                    $response = 2;
                    $msg = 'Emailul si parola nu se potrivesc';
                }
                break;
            default:
                // M: Error due to the stage value;
                break;
        }
        $data = [
            'response' => $response,
            'msg' => $msg
        ];
        echo json_encode($data);
    }

    // M: Called on register;
    public function Register() {
        $this->returnView("", false, false);
    }
}
