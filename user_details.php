<?php

class user_details{
    var $fname;
    public $username;
    var $yob;
    protected $email_address;
    private $password;

    public function computer_user($fname){
        return $fname;
    
    }

    public function user_age($name, $yob){
        $age = date('Y') - $yob;
        return "<h1>".  $name .   "  is  "   . $age . "</h1>";
    }
}




?>
https://github.com/mundabenj/api_d.git