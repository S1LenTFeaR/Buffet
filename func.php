<?php   
require_once 'CRUD.php';
    //Обработчик кнопок
    function form_handler($show_id, $show_type, $i, $Category, $category)
    {
        $count = 0;
        while($count < $i)
        {
            if(isset($_POST['enter'.$show_id[$count].'']))
            {
                $_SESSION['menu'] = $show_type[$count];
                return $_SESSION['menu'];
            }
            else if(isset($_POST['enter'.$category[$count].'']))
            {
                $_SESSION['menu'] = $category[$count];
                $_SESSION['cat'] = 1;
                return $_SESSION['menu'];
            }
            else if(isset($_POST['enter_all']))
            {
                $_SESSION['menu'] = "Поиск по всем атрибутам";
                return $_SESSION['menu'];
            }
            else if($Category == 'Просмотр/редактирование таблиц')
            { }
            else
            {
                $_SESSION['menu'] = $show_type[0];
            }
            $count++;
        }
    }

    //Создание группы кнопок
    function create_radio($Category)
    {
        $mysqli = @new mysqli('localhost', 'root', '', 'mysite');
        if($Category != "Просмотр/редактирование таблиц")
        {
            $query = $mysqli->query("SELECT type_id, prod_type FROM categories WHERE category = '$Category' ORDER BY category");
        }
        else
        {
            $query = $mysqli->query("SELECT type_id, prod_type, category FROM categories ORDER BY category desc");
        }
        echo 
        '<form method= "POST">
            <div class="btn-group mr-2 btn-group-lg" role="group" aria-label="First group">';
                $i = 0;
                while($row = $query->fetch_assoc())
                {
                    $show_id[$i] = $row['type_id'];
                    $show_type[$i] = $row['prod_type'];
                    $category[$i] = $row['category'];
                    echo '<button type="submit" name="enter'.$show_id[$i].'" class="btn btn-dark">'.$show_type[$i].'</button>';
                    $i++;
                } 
                if($Category == "Просмотр/редактирование таблиц")
                {
                    echo '<button type="submit" name="enter_all" class="btn btn-dark">Поиск по всем атрибутам</button>';
                }
                echo
            '</div>
        </form>';
        $mysqli->close();
        form_handler($show_id, $show_type, $i, $Category, $category);
        return $show_type[0];
    }
    //Создание шапки (Название, а под ним кнопки)
    function create_head($Category)
{ ?>
        <div class="row">
            <h1> <?php echo $Category; ?> </h1>
        </div>
        <div class="row">
           <?php $show_type = create_radio($Category); ?>
        </div>
    <?php return $show_type;
    } 
    //Созадние таблицы SELECT
    function create_table($table_type)
    {
        $mysqli = @new mysqli('localhost', 'root', '', 'mysite');
        
        if($table_type == "Продукция")
        {   
            if ($_SESSION['menu']=="Поиск по всем атрибутам")
            {
                ?>
                <form method= "POST" action="#">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="str" class="form-control btn-outline-dark" id="str" placeholder="Введите слово или число, по которому будет осуществляться поиск" required />
                        </div>
                        <div class="col-1">
                            <input type = "submit" name = "enter_s" value = "Добавить" class = "btn btn-dark mb-3" />
                        </div>
                    </div>
                </form>
                <?php
                if($_SESSION[search])  
                {
                    $query = $mysqli->query(
                        "SELECT * 
                        FROM categories 
                        INNER JOIN products ON categories.prod_type = products.prod_type
                        WHERE categories.prod_type LIKE'%$_SESSION[search]%' OR categories.category LIKE'%$_SESSION[search]%' OR products.Sname LIKE'%$_SESSION[search]%' OR products.Sdescription LIKE'%$_SESSION[search]%' OR products.Sprice LIKE'%$_SESSION[search]%'
                        ORDER BY categories.category DESC"
                    );
                    if ($query->num_rows){ }
                    else 
                        echo 'Ничего не найдено';
                    $i = 0;

                    while($row = $query->fetch_assoc())
                    {  
                        $show_img = $row['Image'];
                        $type_id = $row['type_id'];
                        $prod_type = $row['prod_type'];
                        $category = $row['category'];
                        $id_prod = $row['id_prod'];
                        $Sname = $row['Sname'];
                        $Sdescription = $row['Sdescription'];
                        $Sprice = $row['Sprice'];
                        echo'
                        <tr>
                            <td>
                                <form method= "POST" action="#">
                                    <button type="submit" name="enter'.$category.'" class="btn btn-outline-light"><h4>'.$category.'</h4></button>
                                </form>
                            </td>
                            <td>
                                <form method= "POST" action="#">
                                    <button type="submit" name="enter'.$type_id.'" class="btn btn-outline-light"><h4>'.$prod_type.'</h4></button>
                                </form>
                            </td>
                            <td>
                                <img src="data:image/jpeg;base64,'.base64_encode($show_img).' "class="" alt="..." width="100px" height="100px"> 
                            </td>
                            <td>
                                <h3>'.$Sname.'</h3>
                            </td>
                            <td>
                                <h3>'.$Sprice.'</h3>
                            </td>
                            <td>
                                <h3>'.$Sdescription.'</h3>
                            </td>
                        </tr>';
                        $i++;
                    }
                    unset($_SESSION['search']);
                }
            }
            else if($_SESSION['cat'] == 1)
            {
                $query = $mysqli->query("SELECT * FROM categories, products WHERE categories.prod_type = products.prod_type AND categories.category = '$_SESSION[menu]' ORDER BY id_prod");
                while($row = $query->fetch_assoc())
                {
                    echo'
                <tr>
                    <td>
                        <img src="data:image/jpeg;base64,'.base64_encode($row['Image']).' "class="" alt="..." width="100px" height="100px"> 
                    </td>
                    <td>
                        <h3>'.$row['category'].'</h3>
                    </td>
                    <td>
                        <h3>'.$row['Sname'].'</h3>
                    </td>
                    <td>
                        <h3>'.$row['Sprice'].'</h3>
                    </td>
                    <td>
                        <h3>'.$row['Sdescription'].'</h3>
                    </td>
                    <td>
                        <div class=block1>
                            <a href="admin.php?edit1='.$row['id_prod'].'" class="btn btn-outline-light">Изменить</a>
                            <a href="CRUD.php?delete1='.$row['id_prod'].'" class="btn btn-outline-light"">Удалить</a>
                        <div>
                    </td>
                </tr>';
                }
                unset($_SESSION['cat']);
            }
            else if($table_type == "Продукция")
            {
                $query = $mysqli->query("SELECT * FROM categories, products WHERE categories.prod_type = products.prod_type AND products.prod_type = '$_SESSION[menu]' ORDER BY id_prod");
                while($row = $query->fetch_assoc())
                {
                    echo'
                <tr>
                    <td>
                        <img src="data:image/jpeg;base64,'.base64_encode($row['Image']).' "class="" alt="..." width="100px" height="100px"> 
                    </td>
                    <td>
                        <h3>'.$row['category'].'</h3>
                    </td>
                    <td>
                        <h3>'.$row['Sname'].'</h3>
                    </td>
                    <td>
                        <h3>'.$row['Sprice'].'</h3>
                    </td>
                    <td>
                        <h3>'.$row['Sdescription'].'</h3>
                    </td>
                    <td>
                        <div class=block1>
                            <a href="admin.php?edit1='.$row['id_prod'].'" class="btn btn-outline-light">Изменить</a>
                            <a href="CRUD.php?delete1='.$row['id_prod'].'" class="btn btn-outline-light"">Удалить</a>
                        <div>
                    </td>
                </tr>';
                }
            }
        }
        else if($table_type == "Категории")
        {
            $query = $mysqli->query("SELECT * FROM categories ORDER BY category DESC");
            while($row = $query->fetch_assoc())
            {
            echo'
            <tr>
                <td>
                    <h3>'.$row['category'].'</h3>
                </td>
                <td>
                    <h3>'.$row['prod_type'].'</h3>
                </td>
                <td>
                    <div class=block1>
                        <a href="admin.php?edit2='.$row['type_id'].'" class="btn btn-outline-light">Изменить</a>
                        <a href="CRUD.php?delete2='.$row['type_id'].'" class="btn btn-outline-light"">Удалить</a>
                    <div>
                </td>
            </tr>';
            }
    }
        $mysqli->close();
    }


?>         