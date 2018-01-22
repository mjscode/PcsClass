<?php
    class queryBuilder{
        public function __construct($assosArray) {
                foreach($assosArray as $key=>$value){
                    $this->$key=$value;
                }
        }
        private function insert_query_keys(){
            $string='';
            foreach($this as $key=>$value){                                        
                $string.=$key.",";
            }
            $qString=substr_replace($string, "", -1);
            return $qString;
        }
        private function insert_query_values(){
            $string='';
            foreach($this as $key=>$value){                                        
                $string.=':'.$key.",";
            }
            $qString=substr_replace($string, "", -1);
            return $qString;
        }
        public function insert_query_string($table){
            return 'insert into '.$table.' ('.
            $this->insert_query_keys().') values ('.
            $this->insert_query_values().')';
        }
        private function hashPass(){
            if(property_exists($this,'password')){
                $this->password=password_hash($this->password, PASSWORD_DEFAULT);  
            }
        }
        public function bindValues($statement){
            $this->hashPass();
            foreach($this as $key=>$value){
                $statement->bindValue($key,$value);
            }
        } 
    }
   /* $shot=new queryBuilder(['name'=>'bob','last'=>'gold']);
    echo $shot->name;*/
?>
