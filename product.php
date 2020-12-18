<?php
  ini_set("display_errors", 0);
  include 'func.php';
  session_start();
  if($_GET['do'] == 'logout'){
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
  <!-- Шапка сайта -->
  <header class="my-header-c py-1">
    <div class="container-xxl">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-2 col text-center">
          <a class="my-header" href="#" style="color: #000000">Продукты</a>
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
          echo '<a class="my-header" href="product.php?do=logout"><img src="images/person-x.svg" class="icon" width="40px" height="40px"></a>';
        }
        ?>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container-xxl">
      <?php $show_type = create_head('Продукты') ?>
    </div>
  </section>

  <section>
    <div class="container-xxl">
    <h2><?php echo $_SESSION['menu']; ?></h2>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="color: #000000">
        <?php     
          $mysqli = @new mysqli('localhost', 'root', '', 'mysite');
          $query = $mysqli->query("SELECT id_prod FROM products WHERE prod_type = '$_SESSION[menu]'");
          $num_id = 0;
          while($row = $query->fetch_assoc())
          {
            $num_id++;
          } 
          $res = $mysqli->query("SELECT * FROM products WHERE prod_type = '$_SESSION[menu]' ORDER BY Sprice");
          $num1 = 1;
          $num2 = 1;
          while($num2 <= $num_id)
          {
            if($num2 == 1)
            {
?>            <div class="carousel-item active">
              <div class="row justify-content-between"> 
<?php       }
            else
            {
?>            <div class="carousel-item">
              <div class="row justify-content-between"> 
<?php       }
                while($num2 - $num1 < 4 AND $num2 <= $num_id)
                {
                  $row = mysqli_fetch_assoc($res);
                  $show_name = $row['Sname'];
                  $show_price = $row['Sprice'];
                  $show_desc = $row['Sdescription'];
                  $show_img = base64_encode($row['Image']);
?>
                  <div class="col">
                    <div class="card w-100">
                      <img src = "data:image/jpeg;base64, <?php echo $show_img ?>" class="card-img-top" alt = "" width="300px" height="300px">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $show_name ?></h5>
                        <p class="card-text"> <?php echo $show_desc ?> </p>
                        <button type="button" class="btn btn-dark"><?php echo'+'; echo $show_price; echo'р.'; ?></button>
                      </div>
                    </div>
                  </div>
<?php             $num2++;
                  }
                $num1 = $num2;
?>            </div>
            </div>
<?php     }$mysqli->close();
?>      </div>
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