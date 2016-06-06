<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include("config.php");
include("libdb.php");
include("libuser.php");
include("liblang.php");
include("libguielements.php");

user_session_handling();
lang_handling();


?>
<html>
<head>
    <title><?php print(lang("%productname%")); ?></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/print.css">
</head>
<body>

<?php
// depending on the http get request parameter, we will do different stuff...

print("<pre>");
print(lang("<h1>%productname%</h1>"));
print(lang("%welcome%!"));
print(gui_loginlogout());
print(gui_langselector());


#lang_set("de");
print(lang("language selected: %this_lang%, and dont forget to %logout% or %sowas%"));

?>


</body>
</html>

