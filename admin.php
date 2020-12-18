<?php
  ini_set("display_errors", 0);
  include 'func.php';
  include 'validation.html';
  require_once 'CRUD.php';
  session_start();
  if($_GET['do'] == 'logout')
  {
    unset($_SESSION['login']);
  }
?>
<?php
    if($_SESSION['login']['privileges'] < 8)
        header("Location: index.php");
?>
<?php
  if(isset($_POST['katsess']))  
  {
    $_SESSION['edit'] = "Добавление категории";
  }
  else if(isset($_POST['prodsess']))
  {
    $_SESSION['edit'] = "Добавление продукта";
  }
  else if(isset($_POST['redcat']))
  {
    $_SESSION['edit'] = "Просмотр/редактирование категорий";
  }
  else if(isset($_POST['close1']))
  {
    unset($_SESSION['edit']);
    header("Location: admin.php");
  }
?>

<?php
if(isset($_POST['enter_s']))
{
    $_SESSION['search'] = $_POST['str'];
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
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <!-- JavaScript and dependencies 
  <script src="js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d"
    crossorigin="anonymous"></script>-->
    <script src = "js/bootstrap.js"></script>
    <script src = "js/popper.js"></script>
    <script src = "js/ajaxscript.js"></script>

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
  <!-- Кнопки выбора действий над продуктами -->
  <section>
<?php 
    $mysqli = @new mysqli('localhost', 'root', '', 'mysite');
?>
    <div class="container-xxl">
      <h1> Редактирование </h1>
      <form method = "POST" action="#">
        <div class="btn-group mr-2 btn-group-lg" role="group" aria-label="First group">
          <button type="submit" name="prodsess" class="btn btn-dark">Добавление продукта</button>
          <button type="submit" name="katsess" class="btn btn-dark">Добавление категории</button>
          <button type="submit" name="redcat" class="btn btn-dark">Просмотр/редактирование категорий</button>
        </div>
        <button type="submit" name="close1" class="btn btn-dark">Закрыть</button>
      </form>
    </div>
  </section>
  <section>
    <div class="container-xxl">
    <!-- форма редактирования продукта -->
    <?php if($update1 == "true"){ ?> 
      <?php echo '<h2> Редактирование продукта </h2>' ?> 
      <form method= "POST" enctype="multipart/form-data" action="admin.php" onsubmit="return validate_edit_prod();">
      <input type="hidden" name = "id" value = "<?php echo $id; ?>">
          <div class="row">
              <div class="col-2">
                  <div class="form-file">
                    <input type="file" name="img_upload" class="form-file-input button" id="img_upload">
                        <label class="form-file-label" for="customFileLong">
                            <span class="form-file-text">Изображение</span>
                            <span class="form-file-button">Файл</span>
                        </label>      
                  </div>
              </div>
              <div class="col-2">
                <select name="p_type" class="form-select" id="p_type">
                    <option selected disabled value="">Тип продукта</option>
                    <?php $query = $mysqli->query("SELECT type_id, prod_type FROM categories");
                      for($i = 0;$row = $query->fetch_assoc(); $i++)
                      {
                        echo '<option value="'.$row['prod_type'].'">'.$row['prod_type'].'</option>';
                      }
                    ?> 
                  </select>
              </div> 
              <div class="col-2">
                <input type="text" name="name" class="form-control btn-outline-dark" id="name" value="<?php echo $name; ?>" placeholder="Название" required /> 
              </div> 
              <div class="col-1">
                <input type="number" name="price" class="form-control btn-outline-dark" id="price" value="<?php echo $price; ?>" placeholder="Цена" required />
              </div> 
              <div class="col-2">
                <input type="text" name="desc" class="form-control btn-outline-dark" id="desc" value="<?php echo $desc; ?>" placeholder="Описание (н)" />
              </div> 
              <div class="col-1">
                <input type = "submit" name = "update1" value = "Изменить" class = "btn btn-dark mb-3" required />
              </div>
          </div>
      </form>
      <!-- форма редактирования категории -->
      <?php }else if($update2 == "true"){ ?> 
        <?php echo '<h2> Редактирование категории </h2>' ?> 
      <form method= "POST" action="admin.php" onsubmit="return validate_edit_cat();">
      <input type="hidden" name = "id" value = "<?php echo $id; ?>">
      <div class="row">
          <div class="col-2">
            <select name="category" class="form-select" id="category" >
              <option selected disabled value="">Категория</option>
              <option value = "Продукты">Продукты</option>;
              <option value = "Блюда">Блюда</option>;
            </select>
          </div> 
          <div class="col-2">
            <input type="text" name="p_type_cat" class="form-control btn-outline-dark" id="name_cat" value="<?php echo $p_type; ?>" placeholder="Тип продукта" required /> 
          </div> 
          <div class="col-1">
            <input type = "submit" name = "update2" value = "Изменить" class = "btn btn-dark mb-3" required />
          </div>
        </div>
      </form>
      <!-- форма добавления категории -->
      <?php }else if($_SESSION['edit'] == "Добавление категории"){ ?> 
      <?php echo '<h2> '.$_SESSION['edit'].' </h2>' ?>
      <form method= "POST" action="CRUD.php" onsubmit="return validate_upload_cat();">
      <input type="hidden" name = "edit_sess" value = "<?php echo $_SESSION['edit']; ?>">
      <div class="row">
          <div class="col-2">
            <select name="category" class="form-select" id="category" required >
              <option selected disabled value="">Категория</option>
              <option value = "Продукты">Продукты</option>;
              <option value = "Блюда">Блюда</option>;
            </select>
          </div> 
          <div class="col-2">
            <input type="text" name="p_type_cat" class="form-control btn-outline-dark" id="name_cat" placeholder="Тип продукта" required /> 
          </div> 
          <div class="col-1">
            <input type = "submit" name = "save" value = "Добавить" class = "btn btn-dark mb-3" required />
          </div>
        </div>
      </form>
      <!-- форма редактирования продукта -->
      <?php }else if($_SESSION['edit'] == "Добавление продукта"){ ?>
      <?php echo '<h2> '.$_SESSION['edit'].' </h2>' ?> 
      <form method= "POST" enctype="multipart/form-data" action="CRUD.php" onsubmit="return validate_upload_prod();">
      <input type="hidden" name = "edit_sess" value = "<?php echo $_SESSION['edit']; ?>">
          <div class="row">
              <div class="col-2">
                  <div class="form-file">
                      <input type="file" name="img_upload" class="form-file-input button" id="img_upload" required />
                          <label class="form-file-label" for="customFileLong">
                              <span class="form-file-text">Изображение</span>
                              <span class="form-file-button">Файл</span>
                          </label>      
                  </div>
              </div>
              <div class="col-2">
                  <select name="p_type" class="form-select" id="p_type" required>
                    <option selected disabled value="">Тип продукта</option>
                    <?php $query = $mysqli->query("SELECT type_id, prod_type FROM categories");
                      for($i = 0;$row = $query->fetch_assoc(); $i++)
                      {
                        echo '<option value="'.$row['prod_type'].'">'.$row['prod_type'].'</option>';
                      }
                    ?> 
                  </select>
              </div> 
              <div class="col-2">
                  <input type="text" name="name" class="form-control btn-outline-dark" id="name" placeholder="Название" required /> 
              </div> 
              <div class="col-1">
                  <input type="number" name="price" class="form-control btn-outline-dark" id="price" placeholder="Цена" required />
              </div> 
              <div class="col-2">
                  <input type="text" name="desc" class="form-control btn-outline-dark" id="desc" placeholder="Описание (н)" />
              </div> 
              <div class="col-1">
                  <input type = "submit" name = "save" value = "Добавить" class = "btn btn-dark mb-3" required />
              </div>
          </div>
      </form>
      <!-- форма просмотра/редактирования категории -->
      <?php }else if($_SESSION['edit'] == "Просмотр/редактирование категорий"){?>
      <?php echo '<h2> '.$_SESSION['edit'].' </h2>' ?>
      <table class="table table-borderless table-hover" style="color: #ffffff;">
        <tbody>
          <?php 
            create_table("Категории");
          ?>
        </tbody>
      </table>   
    <?php } ?>
    </div>
  </section>
  <section>
    <div class="container-xxl">
      <?php 
        create_head('Просмотр/редактирование таблиц'); 
      ?>
      </div>
  </section>
  <section>
    <div class="container-xxl">
      <?php 
        echo '<h2>'.$_SESSION['menu'].'</h2>'; 
      ?>
      <table class="table table-borderless table-hover" style="color: #ffffff;">
        <tbody>
          <?php 
            create_table("Продукция");
          ?>
        </tbody>
      </table>      

<?php
?>            
 <?php             
    
    $mysqli->close();
?>
    </div>
  </section>

  <section>
    <div class="container-xxl">
      
    </div>
  </section>

</body>

</html>