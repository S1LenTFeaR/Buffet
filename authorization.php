<?php
  ini_set("display_errors", 0);
  session_start();

  require 'db.php';

  $data = $_POST;
  if(isset($_POST['do_login']))
  {
  $errors = array();
  $query = $mysqli->query("SELECT * FROM users WHERE login = '$data[login]'") or die($mysqli_error($mysqli));
  $row = $query->fetch_assoc();
  if(trim($data['login']) == '')
  {
    $errors[] = 'Введите логин!';
  }
  if(trim($data['password']) == '')
  {
    $errors[] = 'Введите пароль!';
  }
  if($data['login'] = $row['login'])
  {
    if(password_verify($data['password'], $row['password']))
    {
      $sessionvars['login'] = $row['login']; 
      $sessionvars['privileges'] = $row['privileges']; 
      $_SESSION['login'] = $sessionvars;
      //echo $_SESSION['login']['login'];
      //echo $_SESSION['login']['privileges'];
    }
    else
    {
      $errors[] = 'Пользователь с такими данными не найден!';
    }
    
  }
  else
  {
    $errors[] = 'Пользователь с такими данными не найден!';
  }
}
?>

<?php
  if($_SESSION['login']){
  header("Location: index.php");
  exit;
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
          <a class="my-header" href=""><img src="images/person-a.svg" class="icon" width="40px" height="40px"></a>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container-xxl">
      <h1>Авторизация</h1>
    </div>
  </section>

  <section>
    <div class="container-xxl">
      <form method="POST">
        <div class="row" style="padding-top:10px">
          <div class="col-4 col text-right">
            Логин:
          </div>
          <div class="col-3">
            <input type="text" name="login" class="form-control btn-outline-dark" id="exampleFormControlInput1" />
          </div>
          <div class="col-5"></div>
          </div>
          <div class="row" style="padding-top:10px">
          <div class="col-4 col text-right">
            Пароль:
          </div>
          <div class="col-3">
            <input type="password" name="password" class="form-control btn-outline-dark"
              id="exampleFormControlInput1" />
          </div>
          <div class="col-5"></div>
          </div>
          <div class="row" style="padding-top:10px">
          <div class="col-4"></div>
          <div class="col-1">
            <input type="submit" class="btn btn-dark mb-3 " name="do_login" value="   Войти   " />
          </div>
          <div class="col-2 col text-left">
            <div style="padding-top:7px"><a href="registration.php">Регистрация</a></div>
          </div>
          </div>
          <div class="row">
                    <?php
                if(!empty($errors))
                {
                    echo '<div class="col-11 col text-center"><hr>'.array_shift($errors).'</div>';
                }
                ?>
                </div>
      </form>
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