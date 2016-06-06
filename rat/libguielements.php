<?php

function gui_loginlogout()
{
    $text='<div class="loginlogout">';
    if(session('user_logged_in'))
    {
        $text.='<form method="POST" action=""><p><input type="hidden" name="action" value="logout"><input type="submit" value="'.lang("%logout%").'"></p></form>';
    }
    else
    {
        $text.='<form method="POST" action=""><p><input type="hidden" name="action" value="login"><input name="username" value="a"><input name="password" value="b"><input type="submit" name="action" value="'.lang("%login%").'"></p></form>';   
    }
    $text.='</div>';
    return $text;
}

function gui_langselector()
{
    $text='<div class="langselector">';
    $text.= '<form method="POST" action=""><p><select name="lang" onchange="this.form.submit()">';
    foreach(lang_list() as $lang)
    {
        $line = '<option value="'.$lang.'" ';
        if(lang_check($lang))
        {
            $line.='selected';
        }
        $line.='>'.$lang.'</option>';
        $text.=$line;
    }
    $text .= '</select></p><noscript><p><input type="submit" value="go"></p></noscript></form>';
    $text.='</div>';
    return $text;
}

?>
