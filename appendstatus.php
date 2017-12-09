<?php

class appendstatus
{
    public function appendLoginStatus($count){

       if($count[0] > 0)
        {
            $r[] = array("status" => 1, "output"=> 'LOGIN SUCCESSFULLY');                    
        }
        else
        {
             $r[] = array("status" => 0, "output"=> 'INVALID USERID OR PASSWORD');
        }
        return $r;               
    }
?>