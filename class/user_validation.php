<?php

class UserValidation {
    private $data;
    private $users;
    private $val = false;
    private $errors = [];

    public function __construct($post_data, $db) {
        $this->data = $post_data;
        $this->users = $db;
    }

    public function validateForm() {
        $this->validateUsername();
        $this->validateEmail();

        foreach($this->users as $user) {
            if($user['username'] == $this->data['username'] && $user['pass'] == $this->data['pass']) {
                $this->val = true;
            }    
        }
        if(!empty($this->data['username']) && !empty($this->data['pass'])) {
             if($this->val == false) {
                 $this->addError('nouser', 'Nie ma takiego użytkownika!');  
             }
        }
        return $this->errors;
    }

    private function validateUsername() {
        if(empty($this->data['username'])) {
            $this->addError('username', 'Nie podano nazwy użytkownika!');
        } else {
            return true;
        }
    }

    private function validateEmail() {
        if(empty($this->data['pass'])) {
            $this->addError('pass', 'Nie podano hasła!');
        } else {
            return true;
        }
    }

    private function addError($key, $value) {
        $this->errors[$key] = $value;
    }

    public function getVal() {
        return $this->val;
    }

    public function getErrors() {
        return $this->errors;
    }
}