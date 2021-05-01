<?php include_once ("header.php");?>
<main class="container">
<?php
$link = pg_connect("host=localhost dbname=alizza user=postgres password=alik2709");
$query1 = pg_query($link, "select * from basket where email = '".$_COOKIE['email']."'");
$result = pg_query($link, 'SELECT SUM(summ) AS value_sum FROM basket'); 
$rows = pg_fetch_assoc($result);
$row = pg_fetch_array($query1) 

?>
<?php if($row > 0): $sum = $rows['value_sum'];?>

  <div class="container">
  <header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
      <li class="nav-item"><a name="submit" class="nav-link" href="dostavka.php?delete='".$row['name']."'">Доставка <?=$sum?> тг</a></li>
    </ul>
  </header>
</div>
<?php
endif;
if(isset($_GET['sub']))
{
  echo '<p class="card-text">Адрес пиццерий: просп. Нуркена Абдирова 19</p>
  <p class="card-text">Номер пиццерий: 8 (707) 837 2525</p>
  <p class="card-text">Заказ будет готов в течение 1 часа</p>';
}
?>

      <div class="album py-5 bg-light">

    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
      while ($row) 
      {

        echo '
        <div class="col">
          <div class="card shadow-sm">
          <img src="img/'.$row['name'].'.jpeg" width="100%" height="100%" alt="lorem">

            <div class="card-body">
              <p class="card-text"><b><i>'.$row['name'].'</b></i></p>
              <p class="card-text">'.$row['ingredient'].'</p>
                              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">

                  <a class="btn btn-outline-primary" href="one.php?delete='.$row['name'].'">Удалить заказ</a>
                 
                </div>
              </div>

            </div>
          </div>
        </div>';
    }
    ?>
      </div>
    </div>
  </div>

</main>


<?php include_once ("footer.php");?>