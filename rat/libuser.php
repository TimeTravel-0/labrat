<?php

function uesc($str)
{
    return htmlspecialchars($str);
}

function post($varname)
{
    if(array_key_exists($varname,$_POST))
    {
        return uesc($_POST[$varname]);
    }
    else
    {
        return "";
    }
}

function user_session_handling()
{
    session_start();
    $action = post("action");
    $username = post("username");
    $password = post("password");
    
    if($action=="login")
    {
        user_login($username,$password);
    }
    if($action=="logout")
    {
        user_logout();
    }
    
    
}
    
    
function user_login($username,$password)
{
    $_SESSION['user_logged_in']=db_user_check($username,$password);    
}
    
function user_logout()
{
    $_SESSION['user_logged_in']=false;
}





?>
