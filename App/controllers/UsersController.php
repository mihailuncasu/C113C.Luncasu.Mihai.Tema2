<?php

//namespace controllers;

/*
 * M: Controller that will handle the register process and the login one;
 */

class Users extends Controller {

    // M: Called on login;
    public function Login() {
        if (!$_POST) {
            $this->returnView("", false, false);
        } else {
            $password = $_POST['password'];
            $email = $_POST['email'];
        }
    }

    public function AjaxLogin() {
        // M: We do a search in the db after the email;
        $usersModel = new UsersModel();
        $email = $_POST['email'];
        $user = $usersModel->GetUserAfterEmail($email);
        $stage = $_POST['stage'];
        $rememberMe = $_POST['remember_me'];
        $response;
        $msg;
        switch ($stage) {
            case 0:
                // M: Check if the email provided is in the db;
                if ($user) {
                    $response = '0';
                    $msg = 'Emailul exista! Trecem la urmatorul pas.';
                } else {
                    $response = 1;
                    $msg = 'Se pare ca adresa de email introdusa nu exista! Doriti sa va inregistrati?';
                }
                break;
            case 1:
                // M: Check if the password and email provided match;
                $pwd = $_POST['password'];
                // M: Recheck the email in case that the user changed it;
                $user = $usersModel->GetUserAfterEmail($email);
                if (!$user) {
                    $response = 1;
                    $msg = 'Se pare ca adresa de email introdusa nu exista! Doriti sa va inregistrati?';
                    break;
                }
                $identity = new UserIdentity();
                $logged = $identity->login($email, $pwd, $rememberMe);
                // M: Recheck the email;
                if (!$logged) {
                    $response = 2;
                    $msg = 'Emailul si parola nu se potrivesc';
                } else {
                    $response = 3;
                    $msg = ROOT_URL;
                    // M: Create the session for the freshly logged in user;
                    $_SESSION['user'] = $identity;
                }
                break;
            default:
                // M: Error due to the stage value;
                $response = 4;
                $msg = 'Eorare interna de la server. Va rugam sa incercati din nou.';
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
        if (empty($_POST)) {
            // M: For the first access;
            $this->returnView("", false, false);
        } else {
            // M: In this case the user has completed the form and submitted it;
            // M: This means that in the $_POST we have all the data in order to register an user;
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordRe = $_POST['password_repeat'];
            $data = [
                'error' => false,
                'msg' => []
            ];
            // M: Check:
            // Passwords match;
            if ($password != $passwordRe) {
                $data['error'] = true;
                array_push($data['msg'], 'Parolele nu se potrivesc!');
            }
            // Email is taken;
            $usersModel = new UsersModel();
            $user = $usersModel->GetUserAfterEmail($email);
            if ($user) {
                $data['error'] = true;
                array_push($data['msg'], 'Email-ul a fost deja folosit!');
            }
            if (!$data['error']) {
                // M: In case that there are errors we return a different view;\
                $data['msg_success'] = 'Inregistrarea a avut loc cu succes, verificati adresa ' . $email . ' pentru a activa contul!';
                // M: Now we have to insert the user in the database;
                // M: We will do a md5 on the password. Also, we will generate a random token for the user in order to be able to generate user specific links;
                // M: Also, the insert statemnet is used with prepare so the string will be safe from MySql injection. I suppose (:
                $token = rand();
                $encrPass = password_hash($password, PASSWORD_DEFAULT);
                $id = $usersModel->InsertUser($firstName, $lastName, $email, $encrPass, $token);
                if ($id) {
                    // M: If the user has been successfully added;
                    Mailer::sendMail($email, 1, $id, md5($token));
                } else {
                    $data['error'] = true;
                    array_push($data['msg'], 'Nu s-a putut realiza inregistrarea in baza de date. Va rugam sa incercati iar!');
                }
            }
            $this->returnView($data, false, false);
        }
    }

    public function Activate() {
        $id = $_GET['user'];
        $token = $_GET['token'];
        $data;
        // M: Query after the id;
        $userModel = new UsersModel();
        $user = $userModel->GetUserAfterId($id);
        // M: Check if the retrieved token matches the one from the link;
        if ($user) {
            if (md5($user['token']) == $token) {
                // M: Change the status and the token;
                $userModel->Activate($id);
                // M: Redirect to homepage and log in the user;
                $data['msg'] = 'Inregistrare cu succes!';
            } else {
                // M: Redirect to a invalid view page;
                $data['msg'] = 'Eroare la inregistrare. Link-ul folosit a fost deja folosit!';
            }
        } else {
            // M: Redirect to a invalid view page;
            $data['msg'] = 'Eroare la inregistrare. Link-ul a expirat!';
        }
        $this->returnView($data, true, false);
    }

    public function Profile() {
        if (!isset($_SESSION['user'])) {
            // M: We redirect any unwanted traffic to this page form users that aren't logged in;
            header('Location:' . ROOT_URL);
        }
        if (empty($_POST)) {
            // M: First time access;
            $this->returnView(['user' => $_SESSION['user']], true, false);
        } else {
            $data = [
                'error' => false,
                'msg' => [],
                'user' => $_SESSION['user']
            ];
            // M: Take the data in order to update the info;
            $firstName = empty($_POST['first_name']) ? $_SESSION['user']->firstName : $_POST['first_name'];
            $lastName = empty($_POST['last_name']) ? $_SESSION['user']->lastName : $_POST['last_name'];
            $pwd = $_SESSION['user']->pwd;
            $id = $_SESSION['user']->id;
            // M: Check if the password is correct;
            if (!password_verify($_POST['password'], $_SESSION['user']->pwd)) {
                $data['error'] = true;
                array_push($data['msg'], 'Parola nu este buna');
                $this->returnView($data, true, false);
            } else {
                if (!empty($_POST['new_password'])) {
                    if ($_POST['new_password'] == $_POST['new_password_repeat']) {
                        // M: Set new password;
                        $pwd = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                    } else {
                        $data['error'] = true;
                        array_push($data['msg'], 'Parolele nu se potrivesc');
                    }    
                }
                // M: Update user data;
                $userModel = new UsersModel();
                if(!empty($userModel->UpdateUser($firstName, $lastName, $pwd, $id))) {
                    $identity = new UserIdentity();
                    $identity->changeIdentity($_SESSION['user']->email);
                    $_SESSION['user'] = $identity;
                    $data['error'] = true;
                    array_push($data['msg'], 'Modificarea a avut loc cu succes!');
                } else {
                    $data['error'] = true;
                    array_push($data['msg'], 'Nu s-a putut realiza modificarea datelor din cauza unei probleme interne! Va rugam incercati iar!');
                }
                $data['user'] = $_SESSION['user'];
                $this->returnView($data, true, false);
            }
        }
    }

    public function Admin() {
        if (!isset($_SESSION['user'])) {
            // M: We redirect any unwanted traffic to this page from users that aren't logged in;
            header('Location:' . ROOT_URL);
        }
        $this->returnView("", true, true);
    }

    public function Logout() {
        if (!isset($_SESSION['user'])) {
            // M: We redirect any unwanted traffic to this page from users that aren't logged in;
            header('Location:' . ROOT_URL);
        }
        unset($_SESSION['user']);
        if (isset($_SESSION['shopping_cart'])) {
            unset($_SESSION['shopping_cart']);
        }
        header('Location:' . ROOT_URL);
    }
}
