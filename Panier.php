<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Achat.php';
include_once 'Tmenu.php';
class Panier {
    private $tableau_achats;
    
    
    
    function __construct() {
        $this->tableau_achats=[];
    }
    
    //méthode ajouter au panier :
    
    
    function ajouterpanier(Achat $achat)
    {
        $this->tableau_achats[]=$achat;
    }

    
    //méthode contenu_panier
    
    function getTableau_achats() {
        return $this->tableau_achats;
    }
   //méthode supprimer 
    
    function supprimerachat($codeitem)
    {
        for ($i=0;$i<count($this->tableau_achats) ;$i++)
            {
            $achat=$this->tableau_achats[$i];
            $iditem=$achat->getCode_p();
              if($iditem==$codeitem){
                  unset($this->tableau_achats[$i]);
                  $this->tableau_achats=array_values($this->tableau_achats);
              }
            }
    }
//méthode supprimer 
    
    function Modifierachat($codeitem,$nvqte)
    {
        foreach ($this->tableau_achats as $achat)
            {
            $iditem=$achat->getCode_p();
              if($iditem==$codeitem){
                 $achat->setQte($nvqte); 
              }
            }
    }
    
    
  
    
    //méthode total Panier :
    function totalpanier()
    {
        $total=0;
        foreach ($this->tableau_achats as $achat)
            {
            $iditem=$achat->getCode_p();
            $rix= Tmenu::GetPriceOfItem($iditem);
            $qte=$achat->getQte(); 
            $total+=($rix*$qte);
            }
            
            return $total;
        
    }
    
    
}

   

