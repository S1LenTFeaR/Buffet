<?php 
$mysqli = @new mysqli('localhost', 'root', '', 'mysite') or die($mysqli_error($mysqli));

$id = 0;
$update1 = false;
$update2 = false;
$p_type = '';
$name = '';
$price = '';
$desc = '';
$category = '';

$img = NULL;

if($_POST['edit_sess'] == "Добавление продукта")
{
    if(isset($_POST['save']))
    {
        $p_type = $_POST['p_type'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
        $mysqli->query("INSERT INTO products (Image, prod_type, Sname, Sprice, Sdescription) VALUES ('$img', '$p_type', '$name', '$price', '$desc')") or die($mysqli_error($mysqli));
        header("Location: admin.php");
    }
}
else if($_POST['edit_sess'] == "Добавление категории")
{ 
    if(isset($_POST['save']))
    {
        $p_type = $_POST['p_type_cat'];
        $cat = $_POST['category'];
        $mysqli->query("INSERT INTO categories (category, prod_type) VALUES ('$cat', '$p_type')") or die($mysqli_error($mysqli));
        header("Location: admin.php");
    }
}

if(isset($_GET['delete1']))
{
    $id = $_GET['delete1'];
    $mysqli->query("DELETE FROM products WHERE id_prod = $id") or die($mysqli->error());
    header("Location: admin.php");
}

if(isset($_GET['delete2']))
{
    $id = $_GET['delete2'];
    $mysqli->query("DELETE FROM categories, products USING categories INNER JOIN products WHERE categories.type_id = $id AND categories.prod_type = products.prod_type") or die($mysqli->error());
    header("Location: admin.php");
}

if(isset($_GET['edit1']))
{
    $id = $_GET['edit1'];
    $update1 = true;
    $result = $mysqli->query("SELECT * FROM products WHERE id_prod = $id") or die($mysqli->error());
    if(count($result) == 1)
    {
        $row = $result->fetch_array();
        $img = $row['Image'];
        $name = $row['Sname'];
        $price = $row['Sprice'];
        $desc = $row['Sdescription'];
    }
}

if(isset($_GET['edit2']))
{
    $id = $_GET['edit2'];
    $update2 = true;
    $result = $mysqli->query("SELECT * FROM categories WHERE type_id = $id") or die($mysqli->error());
    if(count($result) == 1)
    {
        $row = $result->fetch_array();
        $p_type = $row['prod_type'];
    }
}

if(isset($_POST['update1']))
{
    $id = $_POST['id'];
    $p_type = $_POST['p_type'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
    if(empty($_FILES['img_upload']['tmp_name']) && empty($p_type))
    {
        $mysqli->query("UPDATE products SET Sname = '$name', Sprice = '$price', Sdescription = '$desc' WHERE id_prod = $id") or die($mysqli->error());
    }
    else if(empty($_FILES['img_upload']['tmp_name']))
    {
        $img = addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
        $mysqli->query("UPDATE products SET prod_type = '$p_type', Sname = '$name', Sprice = '$price', Sdescription = '$desc' WHERE id_prod = $id") or die($mysqli->error());
    }
    else if(empty($p_type))
    {
        $mysqli->query("UPDATE products SET Image = '$img', Sname = '$name', Sprice = '$price', Sdescription = '$desc' WHERE id_prod = $id") or die($mysqli->error());
    }
    else
    {
        $mysqli->query("UPDATE products SET Image = '$img', prod_type = '$p_type', Sname = '$name', Sprice = '$price', Sdescription = '$desc' WHERE id_prod = $id") or die($mysqli->error());
    }
}

if(isset($_POST['update2']))
{
    $id = $_POST['id'];
    $p_type = $_POST['p_type_cat'];
    $cat = $_POST['category'];
    $result = $mysqli->query("SELECT * FROM categories, products WHERE categories.prod_type = products.prod_type AND categories.type_id = $id");
    $count = $result->num_rows;
    if(empty($cat))
    {
        $mysqli->query("UPDATE categories SET prod_type = '$p_type' WHERE type_id = $id");
    }
    else
    {
        $mysqli->query("UPDATE categories SET category = '$cat', prod_type = '$p_type' WHERE type_id = $id");
    }
    for($i = 0; $i < $count; $i++)
    {
        $row = $result->fetch_assoc();
        $id_prod = $row['id_prod'];
        $mysqli->query("UPDATE products SET prod_type = '$p_type' WHERE id_prod = $id_prod") or die($mysqli->error());
    }
}
?>