<?php


             class PersonalDataBeans {
				 
				 
         private $id ;
         private $name ;
		 private $email ;
         private $user  ;
         private $password ;

 
          public function setId($pId){
			$this -> id = $pId;   
		  }		   
		  public function getId(){
            return $this-> id;
		  }	  
	      public  function setName($pName){
			$this-> name = $pName;   
		   }		   
          public function getName (){
			return $this -> name; 
		   }
         public function setEmail ($pEmail){
			$this -> email = $pEmail;			   
		   }
		  public function getEmail(){
			return $this->email;
		 }         
          public function setUser($pUser){
            $this->user = $pUser;
		  }			  
          public function getUser (){
			return $this->user;
		  }
          public function setPassword($pPassword){
			$this->password=$pPassword;  
		  }
          public function getPassword(){
            return $this->password;
		  }			  


	}
?>