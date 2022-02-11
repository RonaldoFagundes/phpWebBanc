<?php


                class BancDataBeans {

                private $idUser;
				private $idConta;
                private $conta;
                private $valor;
                private $tipo;
                private $cod; 	                
				private $data;
				
	

              public function setIdUser ($pIdUser){
				$this-> IdUser = $pIdUser;
			  }
              public function getIdUser (){
				 return $this -> IdUser;
			  }
			  public function setIdConta ($pIdConta){
				$this-> idConta = $pIdConta;
			  }
              public function getIdConta (){
				return $this -> idConta;
			  }				
			  public function setConta ($pConta){
				$this-> conta = $pConta;
			  }
              public function getConta (){
				return $this -> conta;
			  }			  
			  public function setValor ($pValor){
				$this-> valor = $pValor;
			  }
              public function getValor (){
				return $this -> valor;
			  }			  
			  public function setTipo ($pTipo){
				$this-> tipo = $pTipo;
			  }
              public function getTipo (){
				return $this -> tipo;
			  }			  
			  public function setCod ($pCod){
				$this-> cod = $pCod;
			  }
              public function getCod (){
				return $this -> cod;
			  }				  
			  public function setData($pData){
				$this-> data = $pData;
			  }
              public function getData (){
				return $this -> data;
			  }
			  
}
?>