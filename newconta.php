<?php 
 $user = filter_input(INPUT_GET,'user');
 $conta= filter_input(INPUT_GET,'conta');
 $made = filter_input(INPUT_GET,'made'); 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">
<title>Extrato</title>
<link rel="icon" href="img/icon.png">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<main class="main">
<header class="header">
 <div class="logo"></div>
  <h1>Web bussines banc</h1>
   <div><?php echo $user?></div>
 <div class="sidenav">
   <button onclick="window.location.href='index.php';" class="btn-mov" >Sair</button>  
 </div>
</header>
  <div class="space"></div>
<section class="main-new-cnt">
  <div class="new-cnt-info">
   <h3><?php echo "User ".$user?></h3>			
   <h3><?php echo "Conta  ".$conta?></h3>
   <h3><?php echo $made?></h3>
  </div>
</section>
</main>
     <script src="js/default.js"></script>
</body>
</html>