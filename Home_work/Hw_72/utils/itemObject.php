<?php
class House{
    private $id;
    private $picture;
    private $address;
    private $city;
    private $state;
    private $zip;
    private $price;
    private $notes;
// first way of doing it hardcoding all of the properties.
    /*public function __construct($array){
              foreach($array as $key=>$value){
        switch ($key) {
                case 'id':
                     $this->id=$value;
                     break;
                case 'picture':
                     $this->picture=$value;
                     break;
                 case 'address':
                     $this->address=$value;
                     break;
                     case 'city':
                     $this->city=$value;
                     break;
                case 'state':
                     $this->state=$value;
                     break;
                 case 'zip':
                     $this->zip=$value;
                     break;
                     case 'price':
                     $this->price=$value;
                     break;
                case 'notes':
                     $this->notes=$value;
                     break;
         }
        }
        $this->checkForBlanks();
    }*/
    
    // 2nd way using for loop to go through object until all possible values are added
      /* public function __construct($array){
                foreach($array as $key=>$value){
        foreach($this as $tkey=>$tvalue)
            if($key===$tkey){
                $this->$tkey=$value;
                break;
            }
        }
        $this->checkForBlanks();
        }*/
    // 3rd way loops only through the value array using a function to find the appropiate key
       public function __construct($array){
                foreach($array as $key=>$value){
        if(property_exists($this,$key)){
            $this->$key=$value;
        }
        }
        $this->checkForBlanks();
        }
        
    public function checkForBlanks(){
        $string="the following properties are missing values";
        $blankArray=[];
        foreach($this as $key=>$value){
                    if(empty($value)){
                        $blankArray[]=$key;
                    }
        }
        if(!empty($blankArray)){
            foreach($blankArray as $keys){
                $string.=" $key";
            }
            return $string;
        }
    }
    public function get($s){
          if(property_exists($this,$s)){
            return $this->$s;
        }
        }
        
    }


?>