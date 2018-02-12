<?php
class Item{
    private $id;
    private $categoryId;
    private $name;
    private $amount=0;
    private $unit;
    private $price;
    private $categoryName;

    public function __construct($array){
        foreach($array as $key=>$value){
            if(property_exists($this,$key)){
                $this->$key=$value;
            }else{
                $this->$key="sorry not valid property";
            }
        }
    }

    public function get($s){
        if(property_exists($this,$s)){
          return $this->$s;
      }else{
          return 'no such value';
      }
      }
}
?>