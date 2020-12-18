<?php
  ini_set("display_errors", 0);
  session_start();
  if($_GET['do'] == 'logout'){
    unset($_SESSION['login']);
  }
?>
<?php
if(isset($_POST['enter']))
{
    $_SESSION['search'] = $_POST['text'];
    header("Location: #");
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
          <a class="my-header" href="blud.php" >Блюда</a>
        </div>
        <div class="col-1 col text-center">
          <a class="my-header" href="index.php" style="color: #ffffff">БуДь СыТ</a>
        </div>
        <div class="col-3 col text-center">
          <a class="my-header" href="#" style="color: #000000">Поиск</a>
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
        <div class="col-6">
          <h1>Поиск</h1>
        </div>
      </div>
      <form method= "POST">
        <div class="row g-2">
          <div class="col-3">
            <input type="text" name="text" class="form-control btn-outline-dark" id="exampleFormControlInput1" placeholder="Поиск продукции по названиям" required />
          </div>
          <div class="col-auto">
            <input type = "submit" class="btn btn-dark mb-3" name = "enter" value="Поиск" />
          </div>
        </div>
      </form>
<?php $mysqli = @new mysqli('localhost', 'root', '', 'mysite');
      $query = $mysqli->query("SELECT id_prod FROM products WHERE Sname LIKE '%$_SESSION[search]%'");
      $row = $query->fetch_assoc();
      if($row == NULL AND $_SESSION['search']) {echo 'Указанного товара нет в наличии';}
?>  </div>
  </section>

  <section>
  <div class="container-xxl">
    <h2>Результаты поиска:</h2>
      <?php     
        $res = $mysqli->query("SELECT * FROM products WHERE Sname LIKE '%$_SESSION[search]%' ORDER BY Sprice");
?>      <div class="row">  
<?php       if($_SESSION[search])  
            {
              while($row = $res->fetch_assoc())
              {
                $show_name_stock = $row['Sname'];
                $show_name_low = mb_strtolower($show_name_stock);
                $search = mb_strtolower($_SESSION['search']);
                $show_name = str_ireplace($search,'<b><span class="found" style="color: rgb(77, 109, 255);">'.$search.'</span></b>', $show_name_low);
                $show_price = $row['Sprice'];
                $show_desc = $row['Sdescription'];
                $show_img = base64_encode($row['Image']);
?>              <div class="col col-3">
                  <div class="card w-100">
                    <img src = "data:image/jpeg;base64, <?php echo $show_img ?>" class="card-img-top" alt = ""  width="300px" height="300px">
                    <div class="card-body">
                    <h5 class="card-title" style = "color: #000000"><?php echo $show_name ?></h5>
                    <p class="card-text" style = "color: #000000"> <?php echo $show_desc ?> </p>
                      <button type="button" class="btn btn-dark"><?php echo'+'; echo $show_price; echo'р.'; ?></button>
                    </div>
                  </div>
                </div>
<?php           }
              }
              unset($_SESSION['search']);
?>         </div>   
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