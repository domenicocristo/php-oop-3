<?php
class User {
    private $username;
    private $password;
    private $age;

    public function __construct($username, $password) {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        if (strlen($username)<5 || strlen($username)>15) {
            throw new Exception("L'username deve avere minimo 5 caretteri e non può superare i 15");
        } else {
            $this->username = $username;
        }
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $password)) {
            throw new Exception("La password deve contenere almeno un carattere speciale");
        }
        $this->password = $password;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        if (!is_numeric($age)) {
            throw new Exception("L'età deve essere un numero");
        } else {
            $this->age = $age;
        }
    }

    public function printMe() {
        echo $this . "<br>";
    }

    public function __toString() {
        return $this->getUsername() . ": " . $this->getAge() . " [" . $this->getPassword() . "] ";
    }
}

try {
    $U1 = new User("Mario", "password&");

    $U1->setAge("20");

    $U1->printMe();
} catch (Exception $e) {
    echo $e . "<br><h3>" . $e->getMessage() . "</h3>";
}
?>