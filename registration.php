<?php 
    require 'db.php';

    $data = $_POST;
    if(isset($data['do_signup']))
    {
        $errors = array();
        if(trim($data['name']) == '')
        {
            $errors[] = 'Введите имя!';
        }
        if(trim($data['login']) == '')
        {
            $errors[] = 'Введите логин!';
        }
        if(trim($data['password']) == '')
        {
            $errors[] = 'Введите пароль!';
        }
        if($data['password_2'] != $data['password'])
        {
            $errors[] = 'Пароли не совпадают!';
        }
        if(strlen($data['password']) < 6)
        {
            $errors[] = 'Пароль должен быть не менее 6 символов!';
        }
        $query = $mysqli->query("SELECT login FROM users WHERE login = '$data[login]'");
        $count = $query->num_rows;
        if($count > 0)
        {
            $errors[] = 'Пользователь с таким логином существует!';
        }
        if(empty($errors))
        {
            $login = $data['login'];
            $name = $data['name'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $mysqli->query("INSERT INTO users (name, login, password) VALUES ('$name', '$login', '$password')") or die($mysqli_error($mysqli));
            header("Location: authorization.php");
        }
    }
?>

<?php
    ini_set("display_errors", 0);
    session_start();

    if($_SESSION['login']){
        header("Location: index.php");
        exit;
}

$name = array('admin' => '8197b11c673caba669f45a71a803470d', 'user' => '17adbea7acfe192d4e9f9e62bbb66dbf');

if(isset($_POST['submit']))
{
  foreach ($name as $login => $password)
  {
    if ($login == $_POST['login'] && $password == md5($_POST['password']))
    {
      $_SESSION['login'] = $login;
      header("Location: index.php");
      exit;
    }
  }
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
    <script src="js/bootstrap.min.js"
        integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
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
                    <a class="my-header" href="authorization.php"><img src="images/person-a.svg" class="icon"
                            width="40px" height="40px"></a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-xxl">
            <h1>Регистрация</h1>
        </div>
    </section>

    <section>
        <div class="container-xxl">
            <form method="POST">
                <div class="row">
                    <div class="col-4 col text-right">
                        <!--Имя:-->
                    </div>
                    <div class="col-3">
                        <input type="text" name="name" class="form-control btn-outline-dark"
                            id="exampleFormControlInput1" placeholder="Введите имя" />
                    </div>
                    <div class="col-5"></div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-4 col text-right">
                        <!--Логин:-->
                    </div>
                    <div class="col-3">
                        <input type="text" name="login" class="form-control btn-outline-dark"
                            id="exampleFormControlInput1" placeholder="Введите логин"/>
                    </div>
                    <div class="col-5"></div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-4 col text-right">
                        <!--Пароль:-->
                    </div>
                    <div class="col-3">
                        <input type="password" name="password" class="form-control btn-outline-dark"
                            id="exampleFormControlInput1" placeholder="Введите пароль"/>
                    </div>
                    <div class="col-5"></div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-4 col text-right">
                        <!--Повторите пароль:-->
                    </div>
                    <div class="col-3">
                        <input type="password" name="password_2" class="form-control btn-outline-dark"
                            id="exampleFormControlInput1" placeholder="Повторите пароль"/>
                    </div>
                    <div class="col-5"></div>
                </div>
                <div class="row" style="padding-top:10px">
                    <div class="col-4"></div>
                    <div class="col-1">
                        <input type="submit" class="btn btn-dark mb-3 " name="do_signup" value="Зарегистрироваться" />
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
?>
                        </a></div>
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