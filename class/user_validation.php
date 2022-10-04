<?php

class UserValidation {
    private $data;
    private $users;
    private $val;
    private $errors = [];

    public function __construct($post_data, $db) {
        $this->data = $post_data;
        $this->users = $db;
        $this->val = false;
        $this->dataCheck = false;
    }

    public function validateForm() {
        $this->validateUsername();
        $this->validatePassword();


        if($this->validateUsername() && $this->validatePassword()) {
            foreach($this->users as $user) {
                if(in_array($this->data['username'], $user) && in_array($this->data['pass'], $user)) {
                    $this->setVal();
                    return;
                } else {
                    $this->addError('nouser', 'Nie ma takiego użytkownika!');  
                }
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

    private function validatePassword() {
        if(empty($this->data['pass'])) {
            $this->addError('pass', 'Nie podano hasła!');
        } else {
            return true;
        }
    }

    private function addError($key, $value) {
        $this->errors[$key] = $value;
    }

    private function setVal() {
        $this->val = true;
    }

    public function getVal() {
        return $this->val;
    }

    public function getErrors() {
        return $this->errors;
    }
}