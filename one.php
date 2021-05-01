<?php 
  	$link = pg_connect("host=localhost dbname=alizza user=postgres password=alik2709");

if(isset($_POST['submit']))
{
  	$query1 = pg_query($link, "select * from pizza where name = '".$_GET['id']."'");
  	$row1 = pg_fetch_array($query1);

if($_POST['sizes'] == 'Маленькая') $summ=1950;
if($_POST['sizes'] == 'Средняя') $summ=2950;
if($_POST['sizes'] == 'Большая') $summ=3550;

pg_query($link, "insert into basket (name,ingredient,image,size,depth,summ,email)
values ('".$row1['name']."','".$row1['ingredient']."','".$row1['image']."','".$_POST['sizes']."','".$_POST['depths']."','".$summ."','".$_COOKIE['email']."');");
header("Location: index.php"); exit();
}
if(isset($_GET['submit1']))
{
    $query1 = pg_query($link, "select * from drink where name = '".$_GET['submit1']."'");
    $row1 = pg_fetch_array($query1);

pg_query($link, "insert into basket (name,ingredient,summ,email)
values ('".$row1['name']."','".$row1['ingredient']."','".$row1['summ']."','".$_COOKIE['email']."');");
header("Location: index.php"); exit();
}
if(isset($_GET['submit2']))
{
    $query1 = pg_query($link, "select * from zakuski where name = '".$_GET['submit2']."'");
    $row1 = pg_fetch_array($query1);

pg_query($link, "insert into basket (name,ingredient,summ,email)
values ('".$row1['name']."','".$row1['ingredient']."','".$row1['summ']."','".$_COOKIE['email']."');");
header("Location: index.php"); exit();
}

if(isset($_POST['reg']))
{

$err = [];

    $sql = "SELECT email FROM users WHERE email='".$_POST['email']."'";
    $query = pg_query( $link, $sql);

    if(pg_fetch_array($query) > 0)
        $err[] = "Email с таким логином уже существует в базе данных";

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
        // Убераем лишние пробелы и делаем двойное хеширование
        $password = crypt($_POST['password'], '$1$rasmusle$');

        pg_query($link,"INSERT INTO users (email, password) VALUES ('".$_POST['email']."','".$password."')");
        header("Location: index.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    pg_free_stmt( $query);
    pg_close($link);
}
if(isset($_POST['auto']))
{

$sql = "SELECT email, password FROM users WHERE email='".$_POST['email']."'";
    $query = pg_query( $link, $sql);
    $data = pg_fetch_assoc($query);

// Сравниваем пароли
    if($data['password'] === crypt($_POST['password'], '$1$rasmusle$'))
    {
        // Ставим куки
        setcookie("email", $data['email'], time()+60*60*24*30, "/");
        header("Location: check.php"); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
    pg_close($link);
}

if(isset($_GET['delete']))
{
    $query = pg_query( $link, "SELECT name FROM basket WHERE name='".$_GET['delete']."'");

if(pg_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) == 0)
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    else
    {
        pg_query($link, "DELETE FROM basket WHERE name='".$_GET['delete']."'");
        header("Location: basket.php"); exit();
    }
}
if(isset($_GET['dost']))
{
    $query = pg_query( $link, "SELECT name FROM basket WHERE email='".$_COOKIE['email']."'");

if(pg_fetch_array($query) > 0)
        $err[] = "Не существует в базе данных";

    if(count($err) == 0)
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
    else
    {
        pg_query($link, "DELETE FROM basket WHERE email='".$_COOKIE['email']."'");
        header("Location: basket.php?sub=1"); exit();
    }
}

?>