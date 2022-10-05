<?php


class UserCreate {
    private $username;
    private $pass;
    private $pass2;
    private $email;
    private $tel;
    private $street;
    private $zip;
    private $local;
    public $users = [];
    private $val;
    private $errors = [];

    public function __construct($username, $pass, $pass2, $email, $tel, $street, $zip, $local, $db) {
        $this->username = $username;
        $this->pass = $pass;
        $this->pass2 = $pass2;
        $this->email =  $email;
        $this->tel =  $tel;
        $this->street =  $street;
        $this->zip =  $zip;
        $this->local =  $local;
        $this->users =  $db;
        $this->val =  false;
    }

    public function createUser() {
        $this->validateUsername();
        $this->validatePassword();
        $this->validatePassword2();
        $this->validateEmail();
        $this->validateTel();
        $this->validateStreet();
        $this->validateZip();
        $this->validateLocal();

        if($this->validateUsername() && $this->validatePassword() && $this->validatePassword2() && $this->validateEmail() && $this->validateTel() && $this->validateStreet() && $this->validateZip() && $this->validateLocal() ) {
            $this->setVal();

            $user = [
                'username' => $this->username,
                'pass' => $this->pass,
                'email' => $this->email,
                'tel' => $this->tel,
                'street' => $this->street,
                'zip' => $this->zip,
                'locality' => $this->local,
            ];

            print_r($user);

           }


        return $this->errors;
    }

    private function validateUsername() {
        $this->username = trim($this->username);

        if(empty($this->username)) {
            $this->addError('username', 'Nie podano nazwy użytkownika!');
        } else {
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $this->username)) {
                $this->addError('username', 'Nazwa użytkownika powinna zawierać od 6 do 12 znaków i składać się wyłącznie z liter oraz cyfr!');
            } else {
                return true;
            }
        }
    }

    private function validatePassword() {
        $this->pass = trim($this->pass);

        if(empty($this->pass)) {
            $this->addError('pass', 'Nie podano hasła!');
        } else {
            if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $this->pass)) {
                $this->addError('pass', 'Hasło składać musi się co najmniej z 8 znaków, jednej wielkiej litery oraz jednej cyfry!');
            } else {
                return true;
            }
        }
    }
    
    private function validatePassword2() {
        $this->pass2 = trim($this->pass2);

        if(empty($this->pass2)) {
            $this->addError('pass2', 'Nie podano hasła!');
        } else {
            if($this->pass != $this->pass2) {
                $this->addError('pass2', 'Podano inne hasło!');
            } else {
                return true;
            }
        }
    }

    private function validateEmail() {
        $this->email = trim($this->email);

        if(empty($this->email)) {
            $this->addError('email', 'Nie podano adresu e-mail!');
        } else {
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Niepoprawny adres e-mail!');
            } else {
                return true;
            }
        }
    }

    private function validateTel() {
        $this->tel = trim($this->tel);

        if(empty($this->tel)) {
            $this->addError('tel', 'Nie podano numeru telefonu!');
        } else {
            if(!preg_match('/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{3})/', $this->tel)) {
                $this->addError('tel', 'Niepoprawny numer telefonu!');
            } else {
                return true;
            }
        }
    }

    private function validateStreet() {
        $this->street = trim($this->street);

        if(empty($this->street)) {
            $this->addError('street', 'Nie podano ulicy!');
        } else {
            return true;
        }
    }

    private function validateZip() {
        $this->zip = trim($this->zip);

        if(empty($this->zip)) {
            $this->addError('zip', 'Nie podano numeru kodu pocztowego!');
        } else {
            if(!preg_match('/\(?([0-9]{2})\)?([ .-]?)([0-9]{3})/', $this->zip)) {
                $this->addError('zip', 'Niepoprawna wartość!');
            } else {
                return true;
            }
        }
    }

    private function validateLocal() {
        $this->local = trim($this->local);

        if(empty($this->local)) {
            $this->addError('local', 'Nie podano miejscowości!');
        } else {
            return true;
        } 
    }

    private function addError($key, $value) {
        $this->errors[$key] = $value;
    }

    public function getErrors() {
        return $this->errors;
    }

    private function setVal() {
        $this->val = true;
    }

    public function getVal() {
        return $this->val;
    }
}