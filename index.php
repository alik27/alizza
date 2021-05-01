<?php include_once ("header.php");?>
<main class="container">
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4" id="pizza">Пи́цца</h1>
    <p class="lead">Это традиционное итальянское блюдо в виде тонкой круглой лепёшки из дрожжевого теста, выпекаемой с уложенной сверху начинкой из томатного соуса, кусочков сыра, мяса, овощей, грибов и других продуктов.</p>
  </div>
  	<?php
  	$link = pg_connect("host=localhost dbname=alizza user=postgres password=alik2709");
  	$query = pg_query($link, "select * from pizza");
    $query1 = pg_query($link, "select * from drink");
    $query2 = pg_query($link, "select * from zakuski");

    ?>

    	<div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      while ($row = pg_fetch_array($query)) 
      {
        echo '
        <div class="col">
          <div class="card shadow-sm">
          <img src="img/'.$row['name'].'.jpeg" width="100%" height="100%" alt="lorem">

            <div class="card-body">
              <p class="card-text"><b><i>'.$row['name'].'</b></i></p>
              <p class="card-text">'.$row['ingredient'].'</p>
                              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
                  if (isset($_COOKIE['email'])){
                  echo '<a class="btn btn-outline-primary" href="menu.php?name='.$row['name'].'">Выбрать</a>';
                        }
                        echo '              
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
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4" id="drink">Напитки</h1>
    <p class="lead">Жидкость, предназначенная для питья.</p>
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      while ($row = pg_fetch_array($query1)) 
      {
        echo '
        <div class="col">
          <div class="card shadow-sm">
          <img src="img/'.$row['name'].'.jpeg" width="100%" height="100%" alt="lorem">

            <div class="card-body">
              <p class="card-text"><b><i>'.$row['name'].'</b></i></p>
              <p class="card-text">'.$row['ingredient'].'</p>
                              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
                  if (isset($_COOKIE['email'])){
                  echo '<a class="btn btn-outline-primary" href="one.php?submit1='.$row['name'].'">Выбрать</a>';
                        }
                        echo '              
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

  </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4" id="zakuski">Закуски</h1>
    <p class="lead">Антре́ — первое блюдо, лёгкая закуска, подаваемая за час-полтора перед парадным обедом в другом помещении. В XIX веке в России под словом антре понималась закуска, подаваемая на подносах во время праздников. К концу XIX века поднос с антре уже подавался на стол.</p>
  </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      while ($row = pg_fetch_array($query2)) 
      {
        echo '
        <div class="col">
          <div class="card shadow-sm">
          <img src="img/'.$row['name'].'.jpeg" width="100%" height="100%" alt="lorem">

            <div class="card-body">
              <p class="card-text"><b><i>'.$row['name'].'</b></i></p>
              <p class="card-text">'.$row['ingredient'].'</p>
                              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">';
                  if (isset($_COOKIE['email'])){
                  echo '<a class="btn btn-outline-primary" href="one.php?submit2='.$row['name'].'">Выбрать</a>';
                        }
                        echo '              
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
