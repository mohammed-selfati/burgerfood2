<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

<link rel="stylesheet" href="./css/styles.css" />

<script>

            function verifier(){
                var ok=true;
                let pass1=document.getElementById('ipass1').value;
                let pass2=document.getElementById('ipass2').value;
                if(pass1!=pass2)
                {
                    alert("les deux pass doivent etre identiques !");
                    ok=false;
                }
                return ok;
            }
 </script>
<style>
</style>
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href="users.css">

    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
   
 </HEAD>

 <BODY>
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
		

     <form method="post" action="inscription.php" onsubmit="return verifier()">
		<input type="text" name="nom" placeholder="Votre Nom" required />
				<input type="text" name="prenom" placeholder="Votre Prenom" required />
				<input type="email"  name="email" placeholder="Votre adresse email" required />
				<input type="text" required pattern="^0[5-6][0-9]{8}$"
                                       name="tel" placeholder="Votre Numéro de téléphone" required />
						
                    <input type="date" name="dn"  required />
				<input type="password" id="ipass1" name="pass" placeholder="Mot de passe" required />
				<input type="password" id="ipass2" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button type="submit" name="actionadd">S'inscrire</button>
			</form>

			<p class="grey">Déjà sur Burger_Code ? <a href="login.php">Connectez-vous</a>.</p>
	</div>
 
 

 </div>


 </section>















  <?php       
  include_once 'Tclient.php';
  
  // action inscription :
  
  if(isset($_POST['actionadd']))
  {
      $email=$_POST['email'];
      $nom=$_POST['nom'];
      $prenom=$_POST['prenom'];
      $tel=$_POST['tel'];
      $dnaissance=$_POST['dn'];
      $pass=$_POST['pass'];
      
      $r= Tclient::inscription($email, $nom, $prenom, $tel, $dnaissance, $pass);
      if($r!=0)
      {
          ?>
 <div class="container">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Merci de Votre Inscription </strong> 
  <button style="padding-left: 95%" type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
 </div>
 <?php 
      }
      
  }
  
  
  ?>


     




     



  



   <!--    Footer      !-->



   <footer>

<div class="copy-right-grids"  >
				<div class="copy-left ">
						<p class="footer-gd">© 2020 Burger Food . All Rights Reserved |  by Mohammed Selfati</p>
				</div>


</footer>
 </BODY>
</HTML>
