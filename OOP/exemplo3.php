<?php 

/* --OOP PHP --Evandro --Herança */

abstract class Conta{
	protected $agencia;
	protected $conta;
	protected $saldo;

	public function __construct($agencia, $conta, $saldo){
		$this->agencia = $agencia;
		$this->conta = $conta;
		$this->saldo = $saldo;
	}

	public function getDetalhes(){
		return "Agencia {$this->agencia} | Conta {$this->conta} | Saldo: {$this->saldo}<br>";
	} 

	public function depositar($valor){
		$this->saldo += $valor;
			echo "Deposito de {$valor} | Saldo Atual: {$this->saldo}<br>";
	}
}//fim conta

class Poupanca extends Conta{
	public function saque($valor){
		if($this->saldo >= $valor){
			$this->saldo -=$valor;
			echo "Saque de {$valor} | Saldo Atual: {$this->saldo}<br>";
		}else{
			echo "Saque nao Autorizado de {$valor} | Saldo Atual: {$this->saldo}<br>";
		}
	}
}//fim poupanca

class Corrente extends Conta{
	protected $limite;

	public function __construct($agencia, $conta, $saldo, $limite){
		parent::__construct($agencia, $conta, $saldo);
		$this->limite = $limite;
	}

	public function saque($valor){
		if(($this->saldo + $this->limite) >= $valor){
			$this->saldo -=$valor;
			echo "Saque de {$valor} | Saldo Atual: {$this->saldo}<br>";
		}else{
			echo "Saque nao Autorizado | Saldo Atual: {$this->saldo}<br>";
		}
	}
}//fim correte

// $c1 = new Poupanca(100, 2586, 5000);
// $c1->depositar(1500);
// $c1->saque(2500);
// $c1->saque(4500);

$c1 = new Corrente(100, 2586, 5000, 500);
$c1->depositar(1500);
$c1->saque(2500);
$c1->saque(4500);


echo $c1->getDetalhes();
 
 