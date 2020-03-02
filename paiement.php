<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Burger Food | paiment  </TITLE>
  <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />


<script src="./js/jquery-3.3.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href="style.css">
    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="paiment.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

 </HEAD>

 <BODY>
     <?php
     include_once   'Panier.php';
     include_once  'Tcommande.php';
     session_start();
     if(empty($_SESSION['sessionemail']))
     {
         header("Location:login.php");
     }
     $p=$_SESSION['sessionpanier'];
     
     $contenupanier=$p->getTableau_achats();
     $total=$p->totalpanier();
     ?>
  <!--    Entete      !-->
    <div class="container sticky-top">
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
	
      
     
	 
    </ul>
      </div>
  </nav>
 
  
  </header>
 </div> 













  <!--    Section 1 Image(background)    !-->
 <section>
 <div class="container" id="acc"> 
 
 <!-- AFFICHAGE DU JUMBOTRON -->

                
 
 <div  class="container">
     <h1 style="text-align: center">Page De paiement</h1> 
     <h2 style="text-align: center">Total <?=$total?> :(DH)</h2>
     <img src="images/pay.png">
     <form method="POST" action="paiement.php" >
		<input type="text" name="nom" placeholder="Détenteur de la carte" required />
				<input type="text" name="numero" placeholder="Numéro de la carte" required />
						
                    	
                                <span> Année d'expiration :  </span>
                                <select name="annee">
                                       <?php 
                                            for ($i = 2020; $i <=2030; $i++)
                                            {
                                                echo "<option value='$i'>$i</option>";   
                                            }
                                       ?>
                                    
                                        
                                     </select> 
                                <span style="margin-left: 100"> Mois: </span> 
                                <select name="mois">
                                <?php 
                                            for ($i = 1; $i <=12; $i++)
                                            {
                                                echo "<option value='$i'>$i</option>";   
                                            }
                                       ?>
                                </select>               
                         
      <input type="text" name="crypto" placeholder="Cryptogramme" required />
	<textarea rows="" name='adresse' cols=''>Enter l'adresse de livraison</textarea>  	 
      <button type="submit" name="validate">Valider</button>
			
     
     </form>

			
	</div>
 
 

 </div>


 </section>















  <?php       
  
  
// action valider
  
  if(isset($_POST['validate']))
  {
     $nom=$_POST['nom'];
     $numc=$_POST['numero'];
     $anneexp=$_POST['annee'];
     $moisexp=$_POST['mois'];
     $crypto=$_POST['crypto'];
    $c1= Tcommande::checkcreditcard($nom, $numc, $anneexp, $moisexp, $crypto);
    // carte valide $c1 !=0-
    
    
    
    $email=$_SESSION['sessionemail'];
    $jour=date('d');
    $mois=date('m');
    $annee=date('Y');
    $datecommande= "$annee-$mois-$jour";
    $adresse=$_POST['adresse'];
    
    try {
 $dbt = new PDO('mysql:host=localhost;dbname=burgercode', 'root', '');
				   
	   $dbt->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
             
           $dbt->beginTransaction();
          $numcommande=  Tcommande::GetCommandeNumer();
          
          // insertion d'une ligne dans la table commande
           $c2=$dbt->exec("insert into commande values('$numcommande','$email','$datecommande')");
          
           
           
         
        
           $c3=0;
           for ($i = 0; $i < count($contenupanier); $i++)
           {
               $achat=$contenupanier[$i];
               $iditem=$achat->getCode_p();
               $qte=$achat->getQte();
             // insertion de toutes les achats de la session dans la table achat
               $c3+=$dbt->exec("insert into achat values('$numcommande','$iditem','$qte')"); 
              
               }
          if($c1!=0 && $c2==1 && $c3== count($contenupanier) )
           
           {
       $dbt->commit();
       ?>
 <script>
     window.location="facture.php?codf=<?=$numcommande?>&adr=<?=$adresse?>";
 </script>
 
      <?php
      
           }
           else{
       $dbt->rollBack();
       
       echo "<h1 style='color:red'>Erreur !!!</h1>";
           }
  
  } catch (Exception $e) {  $dbt->rollBack();  echo "Failed: " . $e->getMessage();}

    
    
    
    
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
