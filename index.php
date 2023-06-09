<?php
$server="localhost";
$username="root";
$password="";
$database="item";

$con=mysqli_connect($server,$username,$password,$database);



//delete data

    if(isset($_POST['delete'])){
        $id=$_POST['id'];

        $sql="DELETE FROM `item` WHERE `item`.`id` = $id;";
        $result=mysqli_query($con,$sql);
        $delete="true";
    }




//insert data
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST["insert"])){
$name=$_POST["item_name"];
$desc=$_POST["item_desc"];


$sql="INSERT INTO `item` (`Item_name`, `item_desc`) VALUES ('$name', '$desc');";
$result=mysqli_query($con,$sql);
$insert="true";
}


//update data

else{
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['item_name'];
        $desc=$_POST['item_desc'];

        $sql="UPDATE `item` SET `Item_name` = '$name', `item_desc` = '$desc' WHERE `item`.`id` = $id;";
        $result=mysqli_query($con,$sql);
        $update="true";
    }
}




//read data
    if(isset($_POST["read"])){
        $sql="SELECT * FROM `item`;";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo $row['id'];
            echo $row['Item_name'];
            echo $row['item_desc'];
            echo "</br>";
        }
        
    }


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic_Crud</title>
</head>
<body>
    <form method="POST">
        <input type="number" name="id">
        <input type="text" name="item_name">
        <input type="text" name="item_desc">
        <button type="submit" name="insert">Insert</button>
        <button type="submit" name="update">Update</button>
        <button type="submit" name="read">Read</button>
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>