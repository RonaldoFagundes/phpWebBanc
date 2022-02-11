<?php



                 class BancData {

         private $saldo, $docValor;         
		 private $idConta;
	     private $openCnt, $docData, $docTipo, $docCod, $docTrans;		 
		 private $msg ;
		 public $conta;

        public function getContaNumero(BancDataBeans $bancdata){            
            global $pdo;						 
			$sql = "select conta_numero from view_contas where id_usuario =:id_user";			        
			$pst = $pdo ->prepare($sql);
			$pst-> bindValue (":id_user",$bancdata->getIdUser());
			$pst ->execute();			
			      if ($pst->rowCount() >0 ){			
            while ($conta= $pst-> fetch (PDO::FETCH_ASSOC) ){
                 echo '<option value="'
                       .$conta['conta_numero'].					   
                            '">'							
	                   .$conta['conta_numero'].	                  	   
	                    '</option>';				 	
			       }			
		          }
                 else{
                   return false;
				 }		   
		     }
		 
		public function getSaldo(BancDataBeans $bancdata) {
			global $pdo;			
		   $sql = $pdo->prepare("select valor from view_saldo where numero_cnt = :conta");
           $sql-> bindValue (":conta",$bancdata->getConta());
           $sql ->execute();		   
		         if ($sql->rowCount() >0 ){					
                 $dado = $sql->fetch();				 
				 $msg =  $dado['valor'];
				 }
				 return $msg;
			}
			 
		 
	    public function getIdConta(BancDataBeans $bancdata) {
			   global $pdo;	
         $sql = $pdo->prepare("select id from view_id_conta where numero_cnt= :conta");
		 $sql-> bindValue (":conta",$bancdata->getConta());
         $sql ->execute();		   
		         if ($sql->rowCount() >0 ){					
                   $dado = $sql->fetch();				 
				   $msg =  $dado['id'];								  
				 }
				 return $msg;		   
               }

		 
        public function lancarMovimentacao(BancDataBeans $bancdata) {
           global $pdo;		  
            $sql = $pdo->prepare("call pro_lancar_movi(:data,:tipo,:cod,:valor,:conta)");
		    $sql->bindValue(":data",$bancdata->getData());
			$sql->bindValue(":tipo",$bancdata->getTipo());
			$sql->bindValue(":cod",$bancdata->getCod());
			$sql->bindValue(":valor",$bancdata->getValor());
			$sql->bindValue(":conta",$bancdata->getIdConta());  
			$sql->execute();
			   return true;			   
           }
		 
		 
		 
		
	    public function getComprovante(BancDataBeans $bancdata) {			
		global $pdo;		
		$sql = $pdo->prepare("select datta,tipo,cod,valor from view_movimentacao order by id_mov desc limit 1 ;" ); 
        $sql ->execute();		   
		         if ($sql->rowCount() >0 ){					
                 $dado = $sql->fetch();	
                   $bancdata->setData($dado['datta']);					
				   $bancdata->setTipo($dado['tipo']);	
				   $bancdata->setCod($dado['cod']);
				   $bancdata->setValor($dado['valor']);			  
				 }
		       }
		 
		 
	
			 
		public function  getExtratoDB(BancDataBeans $bancdata){			  
	  global $pdo;
	  $dados  = array();
      $sql = $pdo->prepare("select datta,tipo,cod,valor from view_movimentacao where conta = :conta");
      $sql-> bindValue (":conta",$bancdata->getConta());  
      $sql->execute();
		   if ($sql->rowCount() >0 ){	
             $dados=$sql->fetchAll(PDO::FETCH_ASSOC);
		   }
            return $dados;	  
		 }
		 
				
		public function abrirConta(BancDataBeans $bancdata) {      	
		global $pdo;
		$sql = $pdo->prepare ("select id_usuario from view_contas where conta_numero = :conta");
		$sql -> bindValue (":conta",$bancdata->getConta());
        $sql -> execute();		   
		    if ($sql->rowCount() >0 ){
				return false;			
			 } 
             else {           
			$sql = $pdo->prepare ("call pro_cad_conta (:conta,:tipo,:idUser)");
            $sql->bindValue(":conta",$bancdata->getConta()); 
	        $sql->bindValue(":tipo",$bancdata->getTipo()); 
	        $sql->bindValue(":idUser",$bancdata->getIdUser()); 	     		  
		    $sql->execute();
		     return true;
		  }				 
		}
		   
		   
		
		 
		 
		  
		  
		 
}
?>