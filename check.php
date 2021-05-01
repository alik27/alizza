<?php

if (isset($_COOKIE['email']))
{
		$link = pg_connect("host=localhost dbname=alizza user=postgres password=alik2709");
    $query = pg_query($link, "SELECT email FROM users WHERE email = '".$_COOKIE['email']."'");
    $userdata = pg_fetch_assoc($query);

    if($userdata['email'] == $_COOKIE['email'])
    {
        header("Location: index.php"); exit();
    }
    else
    {
        setcookie("email", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось".$_COOKIE['id'];
        
    }
}
else
{
    print "Включите куки";
}

?>