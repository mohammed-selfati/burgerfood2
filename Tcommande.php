<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tcommande
 *
 * @author pc
 */
include_once 'Dataaccess.php';
class Tcommande {
     //Méthode pour verifier la carte bancaire
    
   public static function checkcreditcard($nom,$num,$anne,$mois,$crypto)
    {
       $req="select * from Cartebancaire where num_carte='$num' and "
              . "detenteur ='$nom' and anneexp='$anne' and moisexp='$mois' and "
              . "crypto ='$crypto'";
     $cur=  Dataaccess::sel("select * from Cartebancaire where num_carte='$num' and "
              . "detenteur ='$nom' and anneexp='$anne' and moisexp='$mois' and "
              . "crypto ='$crypto' ");
      
      
        $nbr= $cur->rowCount();
        return $nbr;
   
    }
    //Méthode pour recuperer le num de la commande
    public static function GetCommandeNumer()
    {
        $numc=0;
       $cur= Dataaccess::sel("select max(num) from commande ");
             
        while ($row = $cur->fetch())          {
           $numc=$row[0]+1; 
  }
        $cur->closeCursor();   
      return $numc;  
}
  
}
