<?php
  ini_set("display_errors", 0);
  session_start();
  if($_GET['do'] == 'logout'){
    unset($_SESSION['login']);
    session_destroy();
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
          <a class="my-header" href="index.php">Акции</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="#" style="color: #000000">Блюда</a>
        </div>
        <div class="col-1 col text-center">
          <a class="my-header" href="index.php" style="color: #ffffff">БуДь СыТ</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="product.php">Продукты</a>
        </div>
        <div class="col-2 col text-center">
          <a class="my-header" href="kor.php">Корзина</a>
        </div>
        <div class="col-1 col text-right">
        <?php
        if(!$_SESSION['login']){
          echo '<a class="my-header" href="authorization.php"><img src="images/person-a.svg" class="icon" width="40px" height="40px"></a>';
        }
        else{
          echo '<a class="my-header" href="blud.php?do=logout"><img src="images/person-x.svg" class="icon" width="40px" height="40px"></a>';
        }
        ?>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container-xxl">
      <div class="row">
        <div class="col">
          <h1>Блюда</h1>
          <div>
          </div>
        </div>
        <div class="container-xxl">
          <div class="btn-group btn-group-lg " role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Сэндвичи</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Пицца</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Салаты</label>
          </div>
        </div>
  </section>

  <section>
    <div class="container-xxl">
      <h2>Бургеры</h2>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="color: #000000">
          <div class="carousel-item active">
            <div class="row justify-content-between">
              <div class="col">
                <div class="card w-100">
                  <img src="images/chiz.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Чизбургер с курицей</h5>
                    <p class="card-text"> </p>
                    <a href="#" class="btn btn-primary">+69р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/doub.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Двойной бургер</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+100р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/vop.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Воппер</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+100р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/slo.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Бургер с капустой</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+149р.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row justify-content-between">
              <div class="col">
                <div class="card w-100">
                  <img src="images/yai.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Бургер с яйцом</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">169р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/tem.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Бургер от шефа</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+269р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/big.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Большой бургер</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+250р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/gov.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Монстрбургер с говядиной</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+299р.</a>
                  </div>
                </div>
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
          <div class="col text-center"><a href="#"></a></div>
          <div class="col text-center"><a href="Contacts.html">Обратная связь</a></div>
          <div class="col text-center"><a href="#">Вакансии</a></div>
          <div class="col text-center"><a href="#"></a></div>
          <div class="col text-center"><a href="#">Столовые в городе</a></div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>