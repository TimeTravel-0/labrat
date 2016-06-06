<?php
function lang_handling()
{
    $lang = post("lang");
    if($lang)
    {
        lang_set($lang);
    }
}

function lang_set($filename)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['lang']=$filename;
}

function lang_get()
{
    return session('lang');
}

function lang_check($lang)
{
    return $lang==lang_get();
}

function lang_list()
{
    $langlist=[];
    $lang = scandir("lang");
    foreach($lang as $item)
    {
        if(strpos($item,".ini")>0)
        {
            array_push($langlist,str_replace(".ini","",$item));
        }
    }
    return $langlist;
}

function lang($text)
{
    
    $delim="%";
    $resultstring="";
    $arr = explode($delim,$text);
    $evenodd = 0;
    foreach($arr as $val)
    {
        $evenodd=1-$evenodd;
        
        if($evenodd==1)
        {
            $resultstring=$resultstring.$val;
        }
        else
        {
            $resultstring=$resultstring.lang_single($delim.$val.$delim);
        }
    }
    
    return $resultstring;//return lang_get_single($text);
}

function lang_single($text)
{
    $filename=constant("LANG");
    if(session('lang'))
    {
        $filename=session('lang');
    }
    $fn = "lang/$filename.ini";
    if(!file_exists($fn))
    {
        return $text;
    }
    
    $f = fopen($fn,"r");
    if(!$f)
    {
        return $text;
    }
    
    while (($line = fgets($f)) !== false) {
        $equalsign=strpos($line,"=");
        $key=substr($line,0,$equalsign);
        $value=substr($line,$equalsign+2,-2); // crop away =" and "\n
        $limiter="%";
        
        if($limiter.$key.$limiter == $text)
        {
            return $value;
        }
        
        #print($equalsign." ".$key." ".$value);
    }
    
    return $text;

    fclose($f);
}


?>
