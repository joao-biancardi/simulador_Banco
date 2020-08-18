<?php

class ContaBanco {
    public $numeroConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    //Metodos
    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);

        if ($t == "CC") {
            $this->setSaldo(50);
        } elseif ($t == "CP") {
            $this->saldo = 150;
        }

    }

    public function fecharConta () {
        if ($this->getSaldo() > 0 ) {
            echo "<p>Conta ainda tem dinheiro, não posso fecha-la!</p>";
        } elseif ($this->getSaldo() < 0 ) {
            echo "<p>Conta está em débito. Impossível encerrrar!</p>";
        } else {
            $this->setStatus(false);
            echo "<p>Conta de {$this->getDono()} fechada com sucesso";
        }
    }

    public function depositar ($valor) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $valor);
            echo "<p>Deposito de R$$valor na conta de {$this->getDono()}</p>";
        } else {
            echo "<p>Conta fechada. Não consigo depositar...</p>";
        }
    }

    public function sacar ($valor) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $valor) {
                $this->setSaldo($this->getSaldo() - $valor);
                echo "<p>Saque de R$$valor autorizado na conta de {$this->getDono()} </p>";
            } else {
                echo "<p>Saldo insuficiente para saque </p>";
            }
        } else {
            echo "<p>Não posso sacar de uma conta fechada </p>";
        }
    }

    public function pagarMensalidade () {
        if ($this->getTipo() == "CC") {
            $valor = 12;
        } else if ($this->getTipo() == "CP") {
            $valor = 20;
        } 
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $valor);
            echo "<p>Mensalidade de R$$valor debitada na conta de {$this->getDono()} </p>";
        } else {
            echo "<p>Problemas com a conta. Não posso cobrar </p>";
        }
    }
    
    //Metodos espciais
    public function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta criada com sucesso!</p>";
    }

    public function getNumeroConta () {
        return $this->numeroConta;
    }

    public function setNumeroConta ($numero) {
        $this->numeroConta = $numero;
    }

    public function getTipo () {
        return $this->tipo;
    }

    public function setTipo ($tipo) {
        $this-> tipo = $tipo;
    }
    
    public function getDono () {
        return $this->dono;
    }

    public function setDono ($dono) {
        $this->dono = $dono;
    }

    public function getSaldo () {
        return $this->saldo;
    }

    public function setSaldo ($saldo) {
        $this->saldo = $saldo;
    }

    public function getStatus () {
        return $this->status;
    }   

    public function setStatus ($status) {
        $this->status = $status;
    }
}
