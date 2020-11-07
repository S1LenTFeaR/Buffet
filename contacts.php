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
    <script src="js/bootstrap.min.js"
        integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
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
                <?php
                if(!$_SESSION['login']){
                echo '<a class="my-header" href="authorization.php"><img src="images/person-a.svg" class="icon" width="40px" height="40px"></a>';
                }else{
                echo '<a class="my-header" href="contacts.php?do=logout"><img src="images/person-x.svg" class="icon" width="40px" height="40px"></a>';
                }
                ?>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-xxl">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Номера телефона:<h2>
                </div>
                <div class="col-sm-8">
                    <h5></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h5>Горбач Андрей <h5>
                </div>
                <div class="col-sm-8">
                    <h5>+7(917)838-04-71</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h5> <h5>
                </div>
                <div class="col-sm-8">
                    <h5></h5>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-xxl">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Электронные почты:<h2>
                </div>
                <div class="col-sm-8">
                    <h5></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h5>Горбач Андрей <h5>
                </div>
                <div class="col-sm-8">
                    <h5>qwer2888@mail.ru</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <h5> <h5>
                </div>
                <div class="col-sm-8">
                    <h5></h5>
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
                    <div class="col text-center"><a href="#" style="color: #000000">Обратная связь</a></div>
                    <div class="col text-center"><a href="#">Вакансии</a></div>
                    <div class="col text-center"><a href="#"></a></div>
                    <div class="col text-center"><a href="#">Столовые в городе</a></div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>