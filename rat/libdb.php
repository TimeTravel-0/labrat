<?php

function db_query($query)
{
    $mysqli = mysqli_connect(constant("CONN_HOST"),constant("CONN_USER"),constant("CONN_PASS"),constant("CONN_DB"));

    
    $res = $mysqli->query($query);
    if($mysqli->errno){
         print($mysqli->error);
        }
        
    $res->data_seek(0);
    $data = array();
    while ($row = $res->fetch_assoc()) {
        $data+=$row;
        //print_r($row);
    }        
    
    return $data;
    }
    

function db_user_check($username,$password)
{
    $password_hash = sha1($password.$username);
    #$password_hash = ($password);
    
    $query = "SELECT * FROM `useraccounts` WHERE username = '$username' AND password = '$password_hash'";
    $res = db_query($query);
    //print_r($res);
    
    if(count($res)==0)
    {
        return false;
    }
    else
    {
        return true;
    }
}


?>
