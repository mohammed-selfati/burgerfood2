<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Burger Food | Menu </TITLE>
    <meta charset="utf-8">
<link rel="stylesheet" href="./css/bootstrap.min.css" />
<link rel="stylesheet" href="./css/styles.css" />
<script src="./js/jquery-3.3.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="js/script.js"></script>

    <script src="./js/jquery-1.11.1.min.js"></script>

   <link rel="stylesheet" href="css/glyphicones.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="zoombox.css" />
    <link rel="stylesheet" href="style.css">

 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="zoombox.js"></script> 
    <script type="text/javascript"> 
//<![CDATA[
    $(function(){
        $('a.zoombox').zoombox();
    });
//]]>
</script>
 </HEAD>

 <BODY>
     <?php 
    
   include_once 'Tmenu.php';  
   include_once 'Panier.php';
     session_start();
     if(empty($_SESSION['sessionemail']))
     {
         header("Location:login.php");
     }
     $p=$_SESSION['sessionpanier'];
     
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
                          <h2 class="titles animated bouncein"><strong>Liste des Categories</strong></h2>
                    <form action="menu.php"   method="POST"> Choisir une Categorie: 
                          <select class="form-control"  id="iccat"  name="ccat">
                      

                        <?php   
                    $curc= Tmenu::Chargercombocat();   
                 while ($row = $curc->fetch()) {
                     echo "<option value='$row[0]'>$row[1]</option>";            
                       }
                       
                   $curc->closeCursor();       
                       
                       ?>    
                              
                              
                              
                              
                          </select>
            <input type="submit" class="btn reservation mt-3"  name="action"   value="Afficher"/>
                     </form>
                      </div>
                 </section>
            </div>
  </div>
  
  <?php 
  if(isset($_POST['action']))
  {
  $cat=$_POST['ccat'];
  

     
  ?>
  
  
        <div class="container">
            <div class="row">
                <h1><strong>Liste des items   </strong></h1>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix</th>
                      <th>Image</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      
                 $curi=  Tmenu::GetItemsByCat($cat);
                      while ($row = $curi->fetch()) {
                         echo "<tr>";
                         echo "<form action='menu.php' method='POST'>";
                         echo "<input type='hidden' value='$row[4]'  name='iditem'/>";
                            echo "<td>$row[0]</td>"; 
                            echo "<td>$row[2]</td>"; 
                            echo "<td>$row[1]</td>";
                            echo "<td><a class='zoombox zgallery1' href='images/$row[3]'><img src='images/$row[3]' width='100' height='100'  /></a></td>"; 
                         
                            echo "<td>"; 
                                  
                            echo "<input type='number' required name='qte'/>";
                            echo "<input class='btn btns mt-2 ml-2' type='submit' name='addp' value='ajouter au panier'/>";
                             
                               echo "</td>"; 
                            echo "</form>";
                            echo "</tr>";
                       }    
             
            $curi->closeCursor();            
                   
                       ?>
                     
                           
              <script> 
              
         document.getElementById('iccat').value="<?=$cat?>";     
              
              
              </script>
              
              
                      
                  </tbody>
                </table>
                          </div>
        </div>

<?php 
  }
  
  
  
  
  // action deconnexion :
  
  if(isset($_GET['dec']))
  {
      session_destroy();
      header("Location:login.php");
  }
  if(isset($_POST['addp']))
  {
    $iditem=$_POST['iditem'];
    $qte=$_POST['qte'];
    $achat=new Achat($iditem, $qte);
    $p->ajouterpanier($achat);
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
