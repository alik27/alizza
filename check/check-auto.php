<?php
// Страница авторизации
// Соединямся с БД
$link=mysqli_connect("localhost", "root", "", "alizza");

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой email равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === crypt($_POST['password'], '$1$rasmusle$'))
    {

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>