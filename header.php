<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Alizza</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="shortcut icon" href="img/logo.jpg" type="image/jpg">
</head>
<body>
	<header class="navbar navbar-light bg-light d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
		<a class="navbar-brand col-md-3 col-lg-3 me-0 px-2" href="index.php"><img src="img/logo.jpg" alt="Alizza" width=30 height=30>	Alizza</a>
		<nav class="my-2 my-md-0 me-md-3">
  		</nav>
      <a class="p-2 text-dark" href="index.php#pizza">Пицца</a>
      <a class="p-2 text-dark" href="index.php#drink">Напитки</a>
      <a class="p-2 text-dark" href="index.php#zakuski">Закуски</a>
      <?php if (!isset($_COOKIE['email'])):?>
  		<a class="btn btn-outline-primary" id="buy" href="reg.php?id=auto">Войти</a>
      <a class="btn btn-outline-primary" id="buy" href="reg.php?id=reg">Регистрация</a>
      <?php endif; ?>
      <?php if (isset($_COOKIE['email'])):
$link = pg_connect("host=localhost dbname=alizza user=postgres password=alik2709");
    $query1 = pg_query($link, "select count(*) from basket");
    $row1 = pg_fetch_array($query1);?>
  		<a class="btn btn-outline-primary" id="buy" href="basket.php">Корзина | <?=$row1[0]?></a>
    <?php endif; ?>
	</header>