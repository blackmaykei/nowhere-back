<?php

class DBconfig 
    {  
       

        private $_host = 'localhost';
        private $_username = 'propscb1_nw-demo';
        private $_password = 'admin1234';
        private $_database = 'propscb1_nw-demo';
        
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

