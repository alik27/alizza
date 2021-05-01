<?php
// Скрипт проверки

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "", "alizza");

if (isset($_COOKIE['id']))
{
    $query = mysqli_query($link, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if($userdata['user_id'] !== $_COOKIE['id'])
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }
    else
    {
        header("Location: ../index.php"); exit();
    }
}
else
{
    print "Включите куки";
}
?>