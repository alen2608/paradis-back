<?php

class orderVO{
    public $orderID;
    public $memberID;
    public $orderDate;
    // public $requierdDate; //###　打錯下面會幫你多家屬性!?
    public $requiredDate;
    public $shippedDate;

    public function __construct($json = false){
        // echo "VO construct";
        if ($json) $this->setByAssocArray(json_decode($json, true));  
    }

    public function setByAssocArray($data) {
        foreach ($data AS $key => $value) {
            if (is_array($value)) {
                $sub = new orderVO;
                $sub->setByAssocArray($value);
                $value = $sub;
            }

            //### { } 什麼語法?
            $this->{$key} = $value;

            // echo "key  -  " . $key . "  - value - " . $value . "<br>";
        }
    }

    public function setByJSON($data) {
        
    }

}

?>