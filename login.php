<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Burger Food | Log in </TITLE>
  <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />
<link rel="stylesheet" href="users.css">
<style>
</style>
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
   
 </HEAD>

 <BODY>
     
<?php     
include_once 'Tclient.php';
include_once 'Panier.php';
$email='';
$pass='';
   if(isset($_POST['actionlog'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
           $n= Tclient::authentification($email, $pass);
           if($n!=0 ){
               session_start();
               $_SESSION['sessionemail']=$email;
               $_SESSION['sessionpass']=$pass;
               
               $p=new Panier();
               
               $_SESSION['sessionpanier']=$p;
               if (isset($_POST['auto'])) {
                       setcookie("cookemail", $email, time()+30);
                       setcookie("cookpass", $pass, time()+30);  /* expire in 2 min */

                   
                     }
                    
              header("Location:menu.php"); 
           }
           else {
                ?>
            <div class="container">
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Login ou pass incortrect!!! </strong> 
                          <button style="padding-left: 95%" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
            </div>
 <?php 
           
           }
   }else{
       if(isset($_COOKIE['cookemail']))
       {
       $email=$_COOKIE['cookemail'];    
       }
        if(isset($_COOKIE['cookpass']))
       {
       $pass=$_COOKIE['cookpass'];    
       }
       
   }


?>

  <!--    Entete      !-->
    <div class="container-fluid sticky-top">
  <header>

    <nav  class="navbar navbar-dark navbar-expand-sm bg-dark pl-5">
     <a class="text-white" style="text-decoration:none" href="#">
	 <h1 style="font-family:Georgia">Burger-Food <span style="color:orange">.</span></h1></a>
    
    <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
	
    </button>
    
    <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ml-5">
      <li class="nav-item active">
        <a class="nav-link" href="acc.php">Accueil</a>
      </li>
	  <li class="nav-item ">
              <a class="nav-link" href="menuvisisteur.php">Notre Menu</a>
      </li>
      
     
	 
    </ul>
      </div>
  </nav>
 
  
  </header>
 </div> 













  <!--    Section 1 Image(background)    !-->
 <section>
 <div class="container" id="acc"> 
 
 <!-- AFFICHAGE DU JUMBOTRON -->

                 
 
 <div class="container  animated bounceInUp frm">
		

	 	<div id="form">
			<form method="POST" action="login.php">
			
                            <input type="email" value="<?=$email?>" name="email" placeholder="Votre adresse email" required />
                            <input type="password" value="<?=$pass?>" name="pass" placeholder="Mot de passe" required />
                                                <button type="submit"  name="actionlog">S'identifier</button>
						<label id="option"><input type="checkbox" name="auto"  />Se souvenir de moi</label>
					</form>
				

					<p class="grey">Première visite sur Notre Site ? <a href="inscription.php">Inscrivez-vous</a>.</p>	
			
		</div>
	</div>
 
 

 </div>


 </section>













  <!--    Section 2 Slider    !-->


     




     



  



   <!--    Footer      !-->



<footer>

<div class="copy-right-grids"  >
				<div class="copy-left ">
						<p class="footer-gd">© 2020 Burger Food . All Rights Reserved |  by Mohammed Selfati</p>
				</div>


</footer>
 </BODY>
</HTML>
