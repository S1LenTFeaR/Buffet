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
          <a class="my-header" href="blud.php">Блюда</a>
        </div>
        <div class="col-1 col text-center">
          <a class="my-header" href="index.php" style="color: #ffffff">БуДь СыТ</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="product.php">Продукты</a>
        </div>
        <div class="col-2 col text-center">
          <a class="my-header" href="#" style="color: #000000">Корзина</a>
        </div>
        <div class="col-1 col text-right">
        <?php
        if(!$_SESSION['login']){
          echo '<a class="my-header" href="authorization.php"><img src="images/person-a.svg" class="icon" width="40px" height="40px"></a>';
        }else{
          echo '<a class="my-header" href="kor.php?do=logout"><img src="images/person-x.svg" class="icon" width="40px" height="40px"></a>';
        }
        ?>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container-xxl">
          <h1>Корзина</h1>
    </div>
  </section>

  <section>
    <div class="container-xxl">
      <table class="table table-borderless table-hover" style="color: #ffffff;">
        <tbody>
          <tr>
            <th scope="row"><img src="images/chiz.jpg" class="" alt="..." width="100px" height="100px"> </th>
            <td>
              <h3>Чизбургер с курицей</h3>
            </td>
            <td>
              <h3>138р.</h3>
            </td>
            <td>
              <div class="row">
                <div class="col text-right">
                  <button type="button" class="btn btn-outline-light">
                    <h4>+</h4>
                  </button>
                </div>
                <div class="col text-center">
                  <h3>2</h3>
                </div>
                <div class="col text-left">
                  <button type="button" class="btn btn-outline-light">
                    <h4>-</h4>
                  </button>
                </div>
              </div>
            </td>

          </tr>
          <tr>
            <th scope="row"><img src="images/pom.jpg" class="" alt="..." width="100px" height="100px"></th>
            <td>
              <h3>Помидор</h3>
            </td>
            <td>
              <h3>144р.</h3>
            </td>
            <td>
              <div class="row">
                <div class="col text-right">
                  <button type="button" class="btn btn-outline-light">
                    <h4>+</h4>
                  </button>
                </div>
                <div class="col text-center">
                  <h3>4</h3>
                </div>
                <div class="col text-left">
                  <button type="button" class="btn btn-outline-light">
                    <h4>-</h4>
                  </button>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th scope="row"><img src="images/kup2.png" class="" alt="..." width="100px" height="100px"></th>
            <td>
              <h3>Купон 5050</h3>
            </td>
            <td>
              <h3>259р.</h3>
            </td>
            <td>
              <div class="row">
                <div class="col text-right">
                  <button type="button" class="btn btn-outline-light">
                    <h4>+</h4>
                  </button>
                </div>
                <div class="col text-center">
                  <h3>1</h3>
                </div>
                <div class="col text-left">
                  <button type="button" class="btn btn-outline-light">
                    <h4>-</h4>
                  </button>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        <div class="col-7">
        </div>
        <div class="col-2 col text-center">
            <h2>541р.</h2>
        </div>
        <div class="col-3 col text-center">
          <button type="button" class="btn btn-outline-light">
            <h4>Оформить</h4>
          </button>
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