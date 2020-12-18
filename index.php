<?php
  ini_set("display_errors", 0);
  session_start();
  if($_GET['do'] == 'logout')
  {
    unset($_SESSION['login']);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/logo.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>БуДь СыТ</title>
  <!-- CSS only -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- JavaScript and dependencies -->
  <script src="js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
    crossorigin="anonymous"></script>

  <header class="my-header-c py-1">
    <div class="container-xxl">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-2 col text-center">
        <a class="my-header" href="product.php">Продукты</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="blud.php">Блюда</a>
        </div>
        <div class="col-1 col text-center">
          <a class="my-header" href="index.php" style="color: #ffffff">БуДь СыТ</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="search.php">Поиск</a>
        </div>
        <div class="col-2 col text-center">
          <a class="my-header" href="kor.php">Корзина</a>
        </div>
        <div class="col-1 col text-right">
        <?php
        if(!$_SESSION['login']){
          echo '<a class="my-header" href="authorization.php"><img src="images/person-a.svg" class="icon" width="40px" height="40px"></a>';
        }else{
          echo '<a class="my-header" href="index.php?do=logout"><img src="images/person-x.svg" class="icon" width="40px" height="40px"></a>';
        }
        ?>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container-xxl">
      <div class="row">
        <div class="col-6">
          <h1>Главная</h1>
        </div>
        <div class="col-6 col text-right">
          <h4>
          <?php
          if(!$_SESSION['login']){
          }else{
            $mysqli = @new mysqli('localhost', 'root', '', 'mysite');
            if (mysqli_connect_errno()) {
              echo "Подключение невозможно: ".mysqli_connect_error();
            }
            $login = $_SESSION['login']['login'];
            $res = $mysqli->query("SELECT * FROM `welcome` WHERE `Slogin` = '$login'");
            $row = mysqli_fetch_assoc($res);
            echo $row['Swelcom']; echo', '; echo $row['Sname']; echo '!';
            $mysqli->close();
          }
          ?>
          </h4>
        </div>
      </div>
  </section>
  
  <section>
    <div class="container-xxl">
      <div class="row row-cols-3">
        <div class="col text-center">
          <h2>Акции</h2>
        </div>
        <div class="col text-center"></div>
        <div class="col text-center">
          <h2>Купоны</h2>
        </div>
        <div class="col">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card w-100">
                  <img src="images/sale.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title " style="color: #000000">Скидка 50% на овощи</h5>
                    <p class="card-text" style="color: #000000"></p>
                    <a href="#" class="btn btn-dark">Подробнее</a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card w-100">
                  <img src="images/saleb.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" style="color: #000000">Скидка 20% на все бургеры в честь праздника</h5>
                    <p class="card-text" style="color: #000000"> </p>
                    <a href="#" class="btn btn-dark">Подробнее</a>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
        <div class="col text-center"></div>
        <div class="col">
          <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card w-100">
                  <img src="images/kup1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" style="color: #000000">2 чизбургера с курицей по цене 1 в прилложении</h5>
                    <p class="card-text" style="color: #000000"> </p>
                    <a href="#" class="btn btn-dark">Подробнее</a>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card w-100">
                  <img src="images/kup2.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" style="color: #000000">2 бургера от шефа за 259 по купону 5050</h5>
                    <p class="card-text" style="color: #000000"> </p>
                    <a href="#" class="btn btn-dark">Подробнее</a>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-xxl">
      <div class="block">
        <div class="row row-cols-3">
          <div class="col text-center">
            <h2>Компания</h2>
          </div>
          <div class="col text-center"> </div>
          <div class="col text-center">
            <h2>Контакты</h2>
          </div>
          <div class="col text-center"><a href="#">Новости</a></div>
          <div class="col text-center"><a href="admin.php">
<?php
          if($_SESSION['login']['privileges'] < 8){ }
          else
          {
            echo 'Администрирование';
          }
?></a></div>
          <div class="col text-center"><a href="contacts.php">Обратная связь</a></div>
          <div class="col text-center"><a href="#">Вакансии</a></div>
          <div class="col text-center"><a href="#"></a></div>
          <div class="col text-center"><a href="#">Столовые в городе</a></div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>