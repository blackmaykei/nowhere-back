<?php

class DBconfig 
    {  
       

        private $_host = '49.50.106.71';
        private $_username = 'nandhini';
        private $_password = 'nandhini_6292017';
        private $_database = 'rhbusindialite';
        
        public function __constructor($_username,$_password)
        {
            $this->username=$_username;
            $this->password=$_password;
        } 

        public function connectDB()
            {
                $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
                 $memcache = new Memcache();
                 $memcache->addServer('localhost', 11211) or die ("Could not connect");
                if (!$this->connection) 
                {
                    echo 'Cannot connect to database server';
                    exit;
                }          
                else{
                    return $this->connection;
                }  
            }     

            public function appendStatus($rows){
                if($rows === null)
                {
                    $rows['response'][] = array("status" => 0);
                }
                else
                {
                     $rows['response'][] = array("status" => 1);
                }
            }
    }

?>

