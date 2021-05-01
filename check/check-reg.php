<?php
// Страница регистрации нового пользователя

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "", "alizza");

if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    if(!preg_match("/^[a-zA-Z0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]]+$/",$_POST['email']))
        $err[] = "Email может состоять только из букв английского алфавита и цифр";
    if(strlen($_POST['login']) < 3 or strlen($_POST['email']) > 30)
        $err[] = "Email должен быть не меньше 3-х символов и не больше 30";

    // проверяем, не сущестует ли пользователя с таким именем
    $login_query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    $email_query = mysqli_query($link, "SELECT user_id FROM users WHERE user_email='".mysqli_real_escape_string($link, $_POST['email'])."'");
    if(mysqli_num_rows($login_query) > 0)
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    else if(mysqli_num_rows($email_query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];
        $email = $_POST['email'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $password = crypt($_POST['password'], '$1$rasmusle$');

        mysqli_query($link,"INSERT INTO users SET user_login='".$login."',user_email='".$email."', user_password='".$password."'");
        header("Location: check-auto.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>