<?php
class Computer {
    private $codiceUnivoco;
    private $modello;
    private $prezzo;
    private $marca;

    public function __construct($codiceUnivoco, $prezzo) {
        $this->setCodiceUnivoco($codiceUnivoco);
        $this->setPrezzo($prezzo);
    }

    public function getCodiceUnivoco() {
        return $this->codiceUnivoco;
        
    }

    public function setCodiceUnivoco($codiceUnivoco) {
        if (!is_numeric($codiceUnivoco) || strlen($codiceUnivoco) != 6) {
            throw new Exception("Il codice univoco deve contenere solo numeri e deve essere di 6 caratteri");
        } else {
            $this->codiceUnivoco = $codiceUnivoco;
        }
    }

    public function getModello() {
        return $this->modello;
    }

    public function setModello($modello) {
        if (strlen($modello) < 3 || strlen($modello) > 20) {
            throw new Exception("Il modello deve avere un minimo di 3 caratteri e un massimo di 20");
        } else {
            $this->modello = $modello;
        }
    }

    public function getPrezzo() {
        return $this->prezzo;
    }

    public function setPrezzo($prezzo) {
        if (!is_int($prezzo)) {
            throw new Exception("Il prezzo deve essere un valore intero");
        } if (strlen($prezzo) < 0 || strlen($prezzo) > 2000) {
            throw new Exception("Il prezzo deve avere almeno un carattere e un massimo di 2000");
        } else {
            $this->prezzo = $prezzo;
        }
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        if (strlen($marca) < 3 || strlen($marca) > 20) {
            throw new Exception("Il marca deve avere un minimo di 3 caratteri e un massimo di 20");
        } else {
            $this->marca = $marca;
        }
    }

    public function printMe() {
        echo $this . "<br>";
    }

    public function __toString() {
        return $this->getMarca() . " " . $this->getModello() . ": " . $this->getPrezzo() . "$ [" . $this->getCodiceUnivoco() . "] ";
    }
}

try {
    $C1 = new Computer("123456", 3000);

    $C1->setMarca("Apple");

    $C1->setModello("MacBook Pro");

    $C1->printMe();
} catch (Exception $e) {
    echo $e . "<br><h3>" . $e->getMessage() . "</h3>";
}
?>