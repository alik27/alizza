<?php include_once ("header.php");?>
<main class="container">
  	<?php
  	$link = pg_connect("host=localhost dbname=alizza user=postgres password=alik2709");
  	$query1 = pg_query($link, "select * from pizza where name = '".$_GET['name']."'");
    $query21 = pg_query($link, "select name from sizes");
    $query3 = pg_query($link, "select * from depths");
    $row1 = pg_fetch_array($query1);
    $row3 = pg_fetch_array($query3);

        echo '
<form action="one.php?id='.$row1['name'].'" method="post">
  <div class="mb-3">
    <div class="form-text">Название пиццы: '.$row1['name'].'</div>
    <div class="form-text">Ингредиенты пиццы: '.$row1['ingredient'].'</div>
  </div>


  <div class="mb-3">
  <select name="sizes" class="form-select" aria-label="Выберите размеры пиццы">
  <option selected>Выберите размеры пиццы</option>';
      while ($row21 = pg_fetch_array($query21))
      {
        for ($j = 0; $j < 1 ; ++$j)
        {
            echo '<option>'.$row21[$j].'</option>';
          }
        }
  echo '</select>  
  </div>

  <div class="mb-3">
  <select name="depths" class="form-select" aria-label="Выберите толщину пиццы">
  <option selected>Выберите толщину пиццы</option>
  <option>Тонкая</option>
  <option>Традиционная</option>
  </select>  
  </div>

  <button name="submit" class="btn btn-primary">В корзину</button>
</form>';
    ?>

</main>
<?php include_once ("footer.php");?>
