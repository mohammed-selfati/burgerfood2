<?php



/**
 * Description of Achat
 *
 * @author pc
 */

class Achat {
    private $code_p,$qte;
    
    
    
    
    function getCode_p() {
        return $this->code_p;
    }

    function getQte() {
        return $this->qte;
    }

    function setCode_p($code_p) {
        $this->code_p = $code_p;
    }

    function setQte($qte) {
        $this->qte = $qte;
    }

    function __construct($code_p, $qte) {
        $this->code_p = $code_p;
        $this->qte = $qte;
    }

}
