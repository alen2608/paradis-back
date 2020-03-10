<?php

class OrderDetailVO{
    public $orderID;
    public $productID;
    public $unitPrice;
    public $quantity;
    public $discountID;

    public function __construct($json = false){
        // echo "VO construct";
        if ($json) $this->setByAssocArray(json_decode($json, true));  
    }

    public function setByAssocArray($data) {
        foreach ($data AS $key => $value) {
            if (is_array($value)) {
                $sub = new OrderDetailVO;
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