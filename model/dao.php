<?php

                            class Connection {
			  
			
             public $pdo;			
		 function __construct ($driver,$host_name,$db_name,$user_name,$password ){
            global $pdo;			 
			  $dns = $driver.":host=".$host_name.";dbname=".$db_name.";charset=utf8"; 
                 try{
					$pdo = new PDO ($dns,$user_name,$password); 
                    echo " conectado com sucesso com o usuário ".$user_name;					 
				   }
				  catch (PDOException $e){
					echo " Erro de conexão ".$e -> getMessage();
				 }
		      }
	        }


?>