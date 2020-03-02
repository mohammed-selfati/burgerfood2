<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tclient
 *
 * @author pc
 */
include_once  'Dataaccess.php';
class Tclient {
    //put your code here
    
    
    // methode inscription :
    
    public static function inscription($email,$nom,$prenom,$tel,$dnaissance,$pass)
    {
     
        $r= Dataaccess::maj("insert into client values('$email','$nom','$prenom','$tel','$dnaissance','$pass')");
        return $r;
       
    }
    // methode authentification :
    
    public static function authentification($email,$pass)
    {
        $cur= Dataaccess::sel("select * from client where email='$email' and password='$pass'");
        $nbr=    $cur->rowCount();
        return $nbr;
        
    }
    
    
    
}
