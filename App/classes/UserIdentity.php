<?php //namespace classes;

// M: This class will help us to store the idnetity of the user currently logged in;

class UserIdentity {
    public $email;
    public $firstName;
    public $lastName;
    public $pwd;
    public $id;
    public $role;
    public $rememberMe;
    
    public function login($email, $pwd, $rememberMe){
        $userModel = new UsersModel();
        $user = $userModel->GetUserAfterEmail($email);

        // M: We check if the $user is null or not;
        if (is_null($user)) {
            return false;
        } else {
            // M: Check if the passwords match;
            if (password_verify($pwd, $user['password'])) {
                // M: If they do we populate our identity;
                $this->email = $user['email'];
                $this->id = $user['id'];
                $this->pwd = $user['password'];
                $this->role = $user['role'];
                $this->firstName = $user['firstname'];
                $this->lastName = $user['lastname'];
                $this->rememberMe = $rememberMe;
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function changeIdentity($email){
        $userModel = new UsersModel();
        $user = $userModel->GetUserAfterEmail($email);
        $this->email = $user['email'];
        $this->id = $user['id'];
        $this->pwd = $user['password'];
        $this->role = $user['role'];
        $this->firstName = $user['firstname'];
        $this->lastName = $user['lastname'];
    }
}