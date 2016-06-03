<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include("config.php");
include("libdb.php");
include("libuser.php");

user_session_handling();

// depending on the http get request parameter, we will do different stuff...

print("<pre>hi there\n");


if($_SESSION['user_logged_in'])
{
    print("logged in");
}
else
{
    print("not logged in");
}


?>

<form method="POST"><input type="hidden" name="action" value="login"><input name="username" value="a"><input name="password" value="b"><input type="submit" name="action" value="login"></form>
<form method="POST"><input type="hidden" name="action" value="logout"><input type="submit" value="logout"></form>
