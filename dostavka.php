<?php include_once ("header.php");?>
<main class="container">
<form method="post">
<div class="container">
  <div class="mb-3">
    <label for="text" class="form-label">Номер телефона</label>
    <input name="number" class="form-control" required>
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Адрес доставки</label>
    <input name="address" class="form-control" required>
  </div>
  <button name="submit2" class="btn btn-primary">Доставка</button>
</div>
</form>

<?php
if(isset($_POST['submit2']))
{
  header("Location: one.php?dost='".$_COOKIE['email']."'"); exit();
}
?>

</main>

<?php include_once ("footer.php");?>