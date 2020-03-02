<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tmenu
 *
 * @author pc
 */
include_once  'Dataaccess.php';
class Tmenu {
    //1 - Methode pour charger les categories:
    
    
    static function Chargercombocat()
    {
        $cur= Dataaccess::sel("select * from categories");
        return $cur;
    }
    
     //2 - Methode pour afficher les Items: 
    static function GetItemsByCat($cat)
    {
        $cur= Dataaccess::sel("select name,price,description,image,id from items where category='$cat'");
        return $cur;
    }
    
     //3- Methode pour recuperer le name d'un Item
    
    static function GetNameOfItem($id)
    {
        $cur= Dataaccess::sel("select name from items where id='$id'");
        $name='';
        
        while ($row = $cur->fetch()) {
           $name=$row[0]; 
        }
        $cur->closeCursor();   
        
        return $name;
    }
    //4- Methode pour recuperer le prix d'un Item
    
    static function GetPriceOfItem($id)
    {
        $cur= Dataaccess::sel("select price from items where id='$id'");
        $price='';
        
        while ($row = $cur->fetch()) {
           $price=$row[0]; 
        }
        $cur->closeCursor();   
        
        return $price;
    }
     //5- Methode pour recuperer l'image d'un Item
    
    static function GetPictureOfItem($id)
    {
        $cur= Dataaccess::sel("select image from items where id='$id'");
         $image='';
        
        while ($row = $cur->fetch()) {
           $image=$row[0]; 
        }
        $cur->closeCursor();   
        
        return $image;
    }
     
    
}
