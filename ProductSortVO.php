<?php

class ProductSortVO{
    public $ProductSortID;
    public $ProductSortName;
    public $UnitPrice;
    public $ProductDetail;
    

    public function __construct($json = false){
        // echo "VO construct";
        if ($json) $this->setByAssocArray(json_decode($json, true));  
    }

    public function setByAssocArray($data) {
        foreach ($data AS $key => $value) {
            if (is_array($value)) {
                $sub = new ProductSortVO;
                $sub->setByAssocArray($value);
                $value = $sub;
            }

            $this->{$key} = $value;

            // echo "key  -  " . $key . "  - value - " . $value . "<br>";
        }
    }

    public function setByJSON($data) {
        
    }

}
