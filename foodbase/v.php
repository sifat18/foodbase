<!--connection to db and getting user email-->
<?php
session_start();
$Email=$_SESSION['email'];
include 'conn.php';
?>
<?php
$u=mysqli_query($con,"select * from login where email='$Email'");
$uu=mysqli_fetch_array($u);
$uuu=$uu['Username'];
$show=false;
error_reporting(E_PARSE | E_ERROR);
?>
<!--inserting data from u2 into book table and other queries-->
<?php
if(isset($_POST["Book"])) {
    $ID = $_POST['id'];
    $A = $_POST['am'];

    $get2=mysqli_query($con,"select type,price from food where fid=$ID");

    $pr=mysqli_fetch_array($get2);
    $price=$pr['price'];
    $price=$price*$A;
    $K=$pr['type'];
    $query = mysqli_query($con, "insert into book(name,email,type,price) VALUES('$uuu','$Email','$K','$price')");
}
?>

<!--fetching data from book table-->
<?php

$sql="select * from book where email='$Email'";
$q=mysqli_query($con,$sql);
?>

<html>
<head><title> Success </title>
    <?php include ("head.php");?>
   <style>
    body{
    background-image: url("image/p10.jpg");
    background-repeat: no-repeat;
    background-size: 110% 300% ;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: 1px solid;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        float: bottom;
    }
</style>
</head>
<nav class="navbar navbar-expand-md navbar-dark primary-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">PETUKS</a>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">HomePage
                    <span class="sr-only">(current)</span>
                </a>
            </li></ul>
        <form class="form-inline">
            <ul class="navbar-nav mr-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">OPTIONS</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="sesion.php">LOG OUT</a>
                        <a class="dropdown-item" href="up.php">ORDER</a>
                    </div>
                </li></ul></form></div></nav>
<body><h1 align="center" style="color: #4db6ac"><strong>Successful Booking</strong></h1>
<div class="row">
    <div class="col-md-12">
        <table border="10" cellpadding="8" align="center" style="background-color: moccasin">
            <td><h4 align="center">Details Table</h4></td>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
            </tr>
            <!--printing data from book table-->
            <tr><?php
                while($rowj=mysqli_fetch_array($q)):;
                ?>
                <td>  <?php echo $rowj["name"]; ?></td>
                <td>  <?php echo $rowj["type"]; ?></td>
                <td>  <?php echo $rowj["price"]; ?></td>
            </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>
</div>
<!--<table align="bottom" >-->
<!--    <form action="sesion.php" method="post">-->
<!--        <tr>-->
<!--            <td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td>-->
<!--        </tr>-->
<!--    </form>-->
<!--</table>-->
<table>
    <form action="up.php" method="post">
        <tr>
            <td><input type="submit" name="C" value="Cancel Booking" ></td>
        </tr>
    </form>
</table>
<?php include ("bootstrapScript.php");?>
</body>
</html>
