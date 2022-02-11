<?php

   
                    class PersonalData{


         private $msg ;
		 private $idUser ;          
	   
		 public function cadastrar(PersonalDataBeans $pdb ){		    
		  global $pdo;                            
		  $sql = $pdo->prepare ("select id from view_logar where email=:email"); 
		  $sql -> bindValue (":email",$pdb ->getEmail());
          $sql -> execute();		   
		      if ($sql->rowCount() >0 ){
				$msg = "usuario já cadastrado!";				
			   }
             else {			               
		  $sql = $pdo->prepare( "call pro_cad_user (:name,:email,:user,:pass)" ); 			  
	      $sql->bindValue(":name",$pdb ->getName()); 
	      $sql->bindValue(":email",$pdb->getEmail()); 
	      $sql->bindValue(":user",$pdb ->getUser()); 	     		  
		 // $sql->bindValue(":pass",md5($pdb ->getPassword()));		  
		  $sql->bindValue(":pass",$pdb ->getPassword());
	      $sql->execute();		 
		  $msg = "usuario ".$pdb ->getName()." cadastrado com sucesso! ";			  
			}
		       return $msg;
		  }
         
		     
		 
		    function logar(PersonalDataBeans $pdb ){			
             global $pdo; 			                        
			$sql = $pdo->prepare("select id, nome from view_logar where usuario = :u and senha = :p");
            $sql-> bindValue(":u",$pdb ->getUser()); 			
			//$sql-> bindValue(":p",md5($pdb->getPassword()));			
			$sql-> bindValue(":p",$pdb->getPassword());				 
			$sql-> execute();				
			  if ($sql->rowCount()>0) {				 
			    $dado = $sql->fetch();	              
			    $pdb->setId($dado['id']);
			    $pdb->setName($dado['nome']);
			   	return true; 
			   }
              else {				
				return false;
			  }			 
			}

           
          




		  

	   }
?>