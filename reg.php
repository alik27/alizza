<?php include_once ("header.php");?>
<main class="container">

<form action="one.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <?php if($_GET['id']=='reg'):?>
  <button name="reg" class="btn btn-primary">Регистрация</button>
  <?php endif;?>
  <?php if($_GET['id']=='auto'):?>
  <button name="auto" class="btn btn-primary">Авторизация</button>
  <?php endif;?>
</form>

</main>

<?php include_once ("footer.php");?>