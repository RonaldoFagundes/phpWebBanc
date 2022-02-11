<?php
//session_start();
    include 'model/param_conn.php';
 	include 'model/personal_data_beans.php'; 
	include 'model/personal_data.php';	
    include 'model/banc_data_beans.php'; 
    include 'model/banc_data.php';
                   
                  
   
                        $c= new Controller();
              		
					
					if (isset($_POST['btn_cad'])){
						   
						   $pdb = new PersonalDataBeans;   
                           $pd  = new PersonalData ; 
						   
						   $informName = addslashes($_POST['name']);
	                       $informEmail= addslashes($_POST['email']);
	                       $informUser = addslashes($_POST['user']); 
	                       $informPass = addslashes($_POST['password']);
						   
						   $pdb -> setName($informName); 
	                       $pdb -> setEmail($informEmail); 
	                       $pdb -> setUser($informUser); 
	                       $pdb -> setPassword($informPass);
						   
						   $cad =  $pd->cadastrar($pdb) ;
					  header("Location: index.php?cad=$cad"); exit;
					   }
										 
					 
 	                   if (isset($_POST['btn_logar'])){					     	

                    $loginUser  = addslashes($_POST['user_login']);
	                $loginSenha = addslashes($_POST['password_login']);
					
					    $c->logarUser($loginUser,$loginSenha);
	                  }
            
					  
			 
			         if (isset($_POST['btn_simulador'])){
					 $userName = addslashes($_POST['userName']);
	            	header("Location: simulador.php?user=$userName"); exit;	 
					 }
					 
					 
			  
			         if (isset($_POST['btn_sobre_nos'])){
					 $id       = addslashes($_POST['userId']);
					 $userName = addslashes($_POST['userName']);
	    	header("Location: sobrenos.php?id=$id&user=$userName"); exit;	 
					 }
			  
			  
			  
			          if (isset($_POST['btn_sair'])){
	            	header("Location: index.php?"); exit ;	 
					 }
			  
			 				         
			          global $selected;
					  global $res;
			          global $saldo;
			            
			               if(isset($_POST['selectCnt'])){
								
                            if(!empty($_POST['contas'])){
                              $selected = $_POST['contas'];			 
								 
							  $bdb = new BancDataBeans();
                              $bd  = new BancData();							 
						      $bdb->setConta($selected);							 
					$saldo = " saldo R$ ".number_format( $bd ->getSaldo($bdb) , 2, ',', '.');		 
                           } else {                          
							$selected =  '  selecione uma conta  ';
                          }
				        }
			  

                           
			             if (isset($_POST['btn_mov'])){
					   $id   = addslashes($_POST['userId']);
	                   $userName = addslashes($_POST['userName']);
					    $c->movimentacao($id,$userName); 
					   }
					 
	
						
						
				   if(isset($_POST['Transacao'])){
					
					$tran = addslashes($_POST['Transacao']);
       				
					$bdb = new BancDataBeans();
                    $bd  = new BancData();
					  
					$id    = addslashes($_POST['tr_id']);
					$user  = addslashes($_POST['tr_user']);
					$conta = addslashes($_POST['tr_conta']);	
						
				    $tipo  = addslashes($_POST['tran_tipo']);
					$cod   = addslashes($_POST['tr_cod']);
					$valor = addslashes($_POST['tr_valor']);
					
					$data =  date("Y-m-d");

                       if ($tipo==='Transferência'){
						    $tipo = 'Entrada'; 
					   }else{
						    $tipo = 'Saida';
					   }

					$bdb->setData($data);					
					$bdb->setTipo($tipo);	
					$bdb->setCod($cod);
					$bdb->setValor($valor);
					$bdb->setConta($conta);
                      
                    $idConta = $bd->getIdConta($bdb);
				              $bdb->setIdConta($idConta);					
                    $lancado = $bd->lancarMovimentacao($bdb);
				   
                      if ( $lancado == true ){						 
                      $comp = $tran." lancado com sucesso ";
                      $bd->getComprovante($bdb);
                      $saldo = $bd->getSaldo($bdb);	
                      $dataC = $bdb->getData(); 
                      $tipoC = $bdb->getTipo(); 
					  $codC = $bdb->getCod();
					  $valorC = $bdb->getValor();					  
					 }					
	header("Location: comprovante.php?id=$id&user=$user&conta=$conta&comp=$comp&data=$dataC&tipo=$tipoC&cod=$codC&saldo=$saldo&valor=$valorC"); exit;					
	          	 }
			        
			       
			      
			 
			 
			 
			      if (isset($_POST['btn_voltar'])){						
					$id   = addslashes($_POST['userId']);
	                $user = addslashes($_POST['userName']);
	        header("Location: movimentacao.php?id=$id&user=$user"); exit ;	 
					 }
			          
			 
			 
					  
					  
					  
					if (isset($_POST['btn_extrato'])){
					
                    $id    = addslashes($_POST['tr_id']);
					$user  = addslashes($_POST['tr_user']);
					$conta = addslashes($_POST['tr_conta']);                    					 
	        header("Location: extrato.php?id=$id&user=$user&conta=$conta"); exit;
                    
					 }
					  
					  
					  
					 
					if (isset($_POST['btn_open_conta'])){
					
					 $bdb = new BancDataBeans();
                     $bd  = new BancData();					
					$id    = addslashes($_POST['userId']);				
					$tipo  = addslashes($_POST['tipo']);					
					$user  = addslashes($_POST['userName']);					
					$conta = mt_rand(1234, 9876);					
					
					  $bdb->setIdUser($id);
					  $bdb->setTipo ($tipo);
					  $bdb->setConta ($conta);					
					 $newConta = $bd->abrirConta($bdb);					
					     if ($newConta== false){
						$conta = mt_rand(1234, 9876);                           
                           $bdb->setIdUser($id);
					       $bdb->setTipo($tipo);
					       $bdb->setConta($conta);						   
						   $bd->abrirConta($bdb);
						  }
						  else {							 
						 $made  = " Verifque seu email e faça login novamente! ";
					      }
						 $conta = "conta nº ".$bdb->getConta()." aberta com sucesso! ";
						  header("Location: newconta.php?user=$user&made=$made&conta=$conta");exit;
				        }
					  
					   
					  
					  
					  
					  
			           class Controller {   
	   
	   
	                 public function getExtrato($conta){						  
						  $bdb = new BancDataBeans();
                          $bd  = new BancData();						  
						  $bdb->setConta($conta);						  
					 $extrato = $bd->getExtratoDB($bdb);					 
					       return $extrato;						  
					  }
	   
	   
	   
	           
			      public function lancarTransacao (){					
				    $comp = " Lancado com sucesso! ";					
                header("Location: movimentacao.php?comp=$comp"); exit;
                   }
			       	
	           
					
		
              public function logarUser($loginUser,$loginSenha){
						 
                    $pdb = new PersonalDataBeans();
					$pd  = new PersonalData();
					$bdb = new BancDataBeans();
				    $bd  = new BancData();
                  $conta = md5($loginSenha);
				
                    $pdb -> setUser($loginUser); 
                    $pdb -> setPassword($loginSenha);
                    $logado = $pd  -> logar($pdb);
					
					   if ($logado===true){					
                
                    $usuario = $pdb -> getName(); 					 
                    $id      = $pdb -> getId(); 					
					$bdb -> setIdUser($id);					
					
					$conta =  $bd ->getContaNumero($bdb) ;
					 if (  $bd ->getContaNumero($bdb)===false  ){
                        $conta = " click aqui para nos conhecer! ";   
					  }
				       else {
						$conta = "  click aqui para navegar! ";
					   }
					}					   
					 else {						
                        $conta = "senha ou login incorretos";		
					  }				
			  header("Location: index.php?id=$id&user=$usuario&conta=$conta"); exit;					
				   }
 	             
				  
				 
				 
				  public function movimentacao($id, $userName){
						
                         $pdb = new PersonalDataBeans();                       				 
						 $pdb->setUser($userName);					  
						 $pdb->setId($id);							 					 
						 $idMov   = $pdb->getId();
						 $userMov = $pdb->getUser();						 
	         header("Location: movimentacao.php?id=$idMov&user=$userMov"); exit; 
						 
					 }
				  
				 	
					
					    public function showContas ($id){						  
						 $bdb = new BancDataBeans();
						 $bd  = new BancData();
                         $bdb->setIdUser($id);						 
						 $bd ->getContaNumero($bdb);					
					  }
					
					
					
					
					
					   
					 
					
   
             
   
	}
?>