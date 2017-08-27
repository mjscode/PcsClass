<?php
        
    class Database{
        private  $cs = "mysql:host=localhost;dbname=seforim";
        private $user = "myuser";
        private $password = "power";
        private $db ='';
        private $error='';
        private function __construct(){
            $lcs=$this->cs;
            $luser=$this->user;
            $lpassword=$this->password;
            try {
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
                $this->db = new PDO($lcs, $luser, $lpassword, $options);
                } catch (PDOException $e) {
                $this->error = "Something went wrong " . $e->getMessage();
                }
        }
        public static function getInst(){
            static $inst = null;
        if ($inst === null) {
            $inst = new Database();
        }
                return $inst;
        }
        public function getDb(){
            if(empty($this->error))
                return $this->db;
            else
                return $this->error;  
        }
    }
?>
 