<?php
  ini_set("display_errors", 0);
  session_start();

if($_SESSION['login']){
	header("Location: index.php");
	exit;
}
/*$lines = file('log-pass.txt');
foreach ($lines as $line) {
    $arrtemp = explode(":", rtrim($line, ";"));
    $name[$arrtemp[0]] = $arrtemp[1];
}*/
$name = array('admin' => '8197b11c673caba669f45a71a803470d', 'user' => '17adbea7acfe192d4e9f9e62bbb66dbf');
//$str = "2222Bb";
//echo md5($str); 
//print_r($name);
if(isset($_GET['submit']))
{
  foreach ($name as $login => $password)
  {
    if ($login == $_GET['login'] && $password == md5($_GET['password']))
    {
      $_SESSION['login'] = $login;
      header("Location: index.php");
      exit;
    }
  }
}


//$login = 'admin';
//$password = '12345678';
//if(isset($_GET['submit'])){
	//if($login == $_GET['login'] && $password == $_GET['password']){
		//$_SESSION['login'] = $login;
		//header("Location: index.php");
		//exit;
	//}
//}
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
      <form method= "GET">
        <div class="row">
          <div class="col-5 col text-right">
            Логин:
          </div>
          <div class="col-7">
            <input type="text" name="login"/>
          </div>
          <div class="col-5 col text-right">
            Пароль:
          </div>
          <div class="col-7">
            <input type="password" name="password"/>
          </div>
          <div class="col-5"></div>
          <div class="col-7">
            <input type="submit" name="submit" value="Войти" />
          </div>
          <div class="col-5"></div>
          <div class="col-7">
          <?php
          if(isset($_GET['submit']) && !$_SESSION['login']){
	            echo '<p>Ошибка авторизации</p>';
          }
          ?>
          </div>

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