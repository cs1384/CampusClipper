<?
    $hostname = "tintest.db.5225581.hostedresource.com";
    $username = "tintest";
    $dbname = "tintest";
    $link = mysql_connect($hostname,$username,"Pacers24!");
    $test = mysql_select_db($dbname,$link);
?>