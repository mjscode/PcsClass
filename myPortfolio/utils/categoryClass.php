<?php
class Category{
    
    private $id='';
    private $name='';
    private $picture='';
    private $selection=0;
    private $expansive=0;
    private $cheapest=0;
    private $example='';
    
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