<?php

class Email {

    protected $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function isValid() {
        $patter = '/[a-z0-9]+@+[a-z0-9]+\.[a-z]{2,3}/';

        preg_match(pattern, $this->email) == 1){
	return true;
} 
	return false;
    }

    public __toString(){
    	return $this->$email;
    }
}
