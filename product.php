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
  <!-- Шапка сайта -->
  <header class="my-header-c py-1">
    <div class="container-xxl">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-2 col text-center">
          <a class="my-header" href="index.php">Акции</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="blud.php">Блюда</a>
        </div>
        <div class="col-1 col text-center">
          <a class="my-header" href="index.php" style="color: #ffffff">БуДь СыТ</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="#" style="color: #000000">Продукты</a>
        </div>
        <div class="col-2 col text-center">
          <a class="my-header" href="kor.php">Корзина</a>
        </div>
        <div class="col-1 col text-right">
        <?php
        if(!$_SESSION['login']){
          echo '<a class="my-header" href="authorization.php"><img src="images/person-a.svg" class="icon" width="40px" height="40px"></a>';
        }else{
          echo '<a class="my-header" href="product.php?do=logout"><img src="images/person-x.svg" class="icon" width="40px" height="40px"></a>';
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
          <h1>Продукты</h1>
        </div>
        <div class="container-xxl">
          <div class="btn-group btn-group-lg" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Овощи и фрукты</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Напитки</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Скоро</label>
          </div>
        </div>
  </section>

  <section>
    <div class="container-xxl">
      <h2>Овощи и фрукты</h2>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="color: #000000">
          <div class="carousel-item active">
            <div class="row justify-content-between">
              <div class="col">
                <div class="card w-100">
                  <img src="images/pom.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Помидор</h5>
                    <p class="card-text"> </p>
                    <a href="#" class="btn btn-primary">+36р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/ba.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Баклажан</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+60р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/og.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Огурец</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+40р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/mork.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Морковь</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+40р.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row justify-content-between">
              <div class="col">
                <div class="card w-100">
                  <img src="images/ya.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Яблоко</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">20р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/Duras_grape.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Виноград</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+45р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/gr.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Груша</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+30р.</a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card w-100">
                  <img src="images/pe.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Персик</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary">+60р.</a>
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