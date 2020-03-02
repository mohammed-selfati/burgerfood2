<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
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
   
 </HEAD>

 <BODY>
     <?php    
   include_once  'Tmenu.php';  
   include_once 'Panier.php';
     session_start();
     if(empty($_SESSION['sessionemail']))
     {
         header("Location:login.php");
     }
     $p=$_SESSION['sessionpanier'];
     $totalpanier=$p->totalpanier();
     
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
      <li class="nav-item ">
        <a class="nav-link" href="acc.php">Accueil</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="menu.php">Notre Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="menu.php?dec=ok">Deconnexion</a>
      </li>
	 
    </ul>
      </div>
  </nav>
 
  
  </header>
 </div> 

 <div class="container">
            <div class="row"> 
               <h4 class="ml-5 mt-2"> <span style="font-family:Georgia" class="text-black" >  Votre Panier :</span></h4><a href="contenup.php"> <img src="images/panier2.png"  class="ml-2" width="60" height="60"/></a>
                 <section  class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                     <div  style="padding-top:2%;font-size: 60px;text-align: center">
                          <h2><strong>Contenu du panier</strong> / Total :<?=$totalpanier?> (DH)</h2>
                          </div>
<table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prix_unitaire</th>
                      <th>Image</th>
                      <th>qte</th>
                      <th>Total</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      
                      <?php 
             $contenup=$p->getTableau_achats();
           foreach ($contenup as $achat) 
               {
               $iditem=$achat->getCode_p();
               $qte=$achat->getQte();
               $name= Tmenu::GetNameOfItem($iditem);
               $price= Tmenu::GetPriceOfItem($iditem);
               $image= Tmenu::GetPictureOfItem($iditem);
               $totalachat=$price*$qte;
               echo " <tr>";
               echo " <form action='contenup.php'    method='POST'>";
               echo " <input type='hidden'   name='iditem'  value='$iditem'>";
                 echo " <td>$name</td>";
                 echo " <td>$price</td>";
                 echo " <td><img src='images/$image'  width='100' height='100'/></td>";
                  echo " <td>$qte</td>";
                 echo " <td>$totalachat (DH)</td>";
                
                 echo " <td><input type='number' name='newqte'><input type='submit' class='btn btn-info ml-2' value='Modifier'   name='updatepanier'/></td>";
                  echo " <td><input type='submit' value='Supprimer' class='btn btn-danger'  name='deletepanier'/></td>";
                  echo " </form>";
               echo " </tr>";                
               }        
                      
                      
                      
                      
                      ?>
                      
                      
                      
                       </tbody>
                </table>
                     <?php 
                     
                     if($totalpanier!=0)
                     {
                     ?>
                     
                     <a  href='paiement.php' class="btn btns">Continuer</a>
                     <?php 
                     }
                     ?>     
                 </section>
            </div>
  </div>
  

  
  
  
  <?php  
   // action deconnexion :
  
  if(isset($_GET['dec']))
  {
      session_destroy();
      header("Location:login.php");
  }
  
  
  // action modifier :
  
  if(isset($_POST['updatepanier']))
  {
      $codeitem=$_POST['iditem'];
      $nqte=$_POST['newqte'];
      $p->Modifierachat($codeitem,$nqte);
      header("Location:contenup.php");
      
  }
  
  // action supprimer :
  
  if(isset($_POST['deletepanier']))
  {
      $codeitem=$_POST['iditem'];
      
      $p->supprimerachat($codeitem);
      header("Location:contenup.php");
      
  }
  
 
  ?>
























  




<footer>
 
<div class="copy-right-grids"  >
				<div class="copy-left ">
						<p class="footer-gd">© 2020 Burger Food . All Rights Reserved |  by Mohammed Selfati</p>
				</div>



</footer>
 </BODY>
</HTML>
