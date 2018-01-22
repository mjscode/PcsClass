<?php
    class generalCategory{
        private $name='All Items';
        private $id='';
        private $picture='storeFront.jpg';

        private $selection;
        private $expansive;
        private $expansiveArray;
        private $cheapest;
        private $cheapArray;
        private $example;
        private $examplesArray;

        public function addToSelection($value){
            $this->selection+=$value;
        }

        public function addToExpansive($value){
            $this->expansiveArray[]=$value;
        }

        public function addToCheapest($value){
            $this->cheapArray[]=$value;
        }

        public function addToExample($value){
            $this->examplesArray[]=$value;
        }

        public function get($key){
            if(property_exists($this,$key)){
                return $this->$key;
            }else{
                return 'no such property';
            }
        }

        public function findCheapest(){
            $tracker=0;
            $price=$this->cheapArray[$tracker];
            for ($i=1; $i < count($this->cheapArray); $i++) { 
                if ($this->cheapArray[$i]<$price){
                    $tracker=$i;
                    $price=$this->cheapArray[$i];
                }
            }
            $this->cheapest=$price;
        }

        public function findExpansive(){
            $tracker=0;
            $price=$this->expansiveArray[$tracker];
            for ($i=1; $i < count($this->expansiveArray); $i++) { 
                if ($this->expansiveArray[$i]>$price){
                    $tracker=$i;
                    $price=$this->expansiveArray[$i];
                }
            }
            $this->expansive=$price;
        }

        public function chooseExamples(){
            $string='';

            if(count($this->examplesArray)>6){
                $numb=3;
            }else{
                $numb=floor(count($this->examplesArray)/2);
            }
            $chosen=array_rand($this->examplesArray,$numb);
            for ($i=0; $i < $numb; $i++) { 
                $string.=" ".$this->examplesArray[$chosen[$i]].',';
            }
            $nstring=substr($string, 0, -1).".";
            
            $this->example=$nstring;
        }

        public function addCategory($category){
            if($category instanceof Category){
                $this->addToSelection($category->get('selection'));
                $this->addToCheapest($category->get('cheapest'));
                $this->addToExpansive($category->get('expansive'));
                $this->addToExample($category->get('example'));
            }
        }

        public function finishObject(){
            $this->findCheapest();
            $this->findExpansive();
            $this->chooseExamples();
        }
    }
?>