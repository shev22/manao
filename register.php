
<?php


      echo json_encode(12345);
     $user = new RegisterUser($_POST['name'], $_POST['password']);
  


 

class RegisterUser {
   // class properties.
   private $username;
   private $raw_password;
   private $encrypted_password;
   public $error;
   public $success;
   private $storage = "data.json";
   private $stored_users; // array
   private $new_user; // array
 
   public function __construct($username, $password){
    $this->username = filter_var(trim($username), FILTER_SANITIZE_STRING);
    $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
    $this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $this->stored_users = json_decode(file_get_contents($this->storage), true);
    $this->new_user = [
       "username" => $this->username,
       "password" => $this->encrypted_password,
    ];

    if($this->checkFieldValues()){
        $this->insertUser();
     }
    
 }

 private function checkFieldValues(){
    if(empty($this->username) || empty($this->raw_password)){
       $this->error = "Both fields are required.";
       return false;
    }else{
       return true;
    }
 }

 private function usernameExists(){
    foreach ($this->stored_users as $user) {
       if($this->username == $user['username']){
          $this->error = "Username already taken, please choose a different one.";
          return true;
       }
    }
 }

 private function insertUser(){
    if($this->usernameExists() == FALSE){
       array_push($this->stored_users, $this->new_user);
       if(file_put_contents($this->storage, json_encode($this->stored_users))){
          return $this->success = "Your registration was successful";
       }else{
          return $this->error = "Something went wrong, please try again";
       }
    }
 }
}