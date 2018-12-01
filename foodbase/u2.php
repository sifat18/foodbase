
<?php
date_default_timezone_set('Asia/Dhaka');
?>


<?php
include 'conn.php';
error_reporting(E_PARSE | E_ERROR);

$sql="select DISTINCT type from food";
$fit=mysqli_query($con,$sql);
$sql2=mysqli_query($con,'select DISTINCT location from restraunt;');

?>
<?php include 'edittt.php';?>

<!--getting data from u2,join table and getting data according to the condition-->
<?php
if(isset($_GET["Sub"])) {
    $r = $_GET['rr'];

    $join="select menu.Riid,fid,Item,des,price,name,location,contact from food INNER JOIN menu on food.fid=menu.fiid INNER JOIN restraunt on menu.Riid=restraunt.Rid where type='$r'";

    $cj=mysqli_query($con,$join);
}
?>

<?php
if(isset($_GET["Subi"])) {
    $r = $_GET['r2'];

    $join2="select menu.Riid,fid,Item,des,price,name,location,contact from food INNER JOIN menu on food.fid=menu.fiid INNER JOIN restraunt on menu.Riid=restraunt.Rid where location='$r'";

    $cj2=mysqli_query($con,$join2);
}
?>
<?php
if(isset($_GET["Subr"])) {
    $r = $_GET['r3'];
if($r=='400'){
    $join3="select menu.Riid,fid,Item,des,price,name,location,contact from food INNER JOIN menu on food.fid=menu.fiid INNER JOIN restraunt on menu.Riid=restraunt.Rid where price <'$r' ORDER BY price ASC ";

    $cj3=mysqli_query($con,$join3);
}elseif ($r=='800'){
    $join3="select menu.Riid,fid,Item,des,price,name,location,contact from food INNER JOIN menu on food.fid=menu.fiid INNER JOIN restraunt on menu.Riid=restraunt.Rid where price>='400' and price<='$r' ORDER BY price ASC";
    $cj3=mysqli_query($con,$join3);
}

}
?>

<html>
<head><title> Customer panel  </title>
    <?php include ("head.php");?>
    <style type="text/css">
        body{
            background-image: url("image/p2.png");
            background-repeat: no-repeat;
            background-size: 100% 250%;
        }
        input[type=text],[type=number], select, textarea {
            width: 100%;
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 2px;

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
        textarea{
            width: 480px;
            height: 50px;
            background-color: whitesmoke;
            resize: none;

        }
    </style>
</head>
<nav class="navbar navbar-expand-md navbar-dark">

    <!-- Navbar brand -->
    <a class="navbar-brand " href="index.php">PETUK</a>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline">
            <ul class="navbar-nav mr-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><strong>SIGN UP TO ORDER</strong></a>
                </li></ul></div></form>
</nav>
<body><h1 align="center" style= "color: yellowgreen">welcome <?php echo $uuu ;?></h1>
<div class="row">
    <div class="col-md-3">
        <!--Accordion wrapper-->
        <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="false">
            <!-- Accordion card -->
            <div class="card" style="background:lightsalmon">
                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-0">
                            Item Type <i class="fa fa-angle-down rotate-icon"></i>
                        </h5></a></div>
                <!-- Card body -->
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
                    <div class="card-body" >
                        <form style="height: 50%;alignment: left" action="u2.php" method="get">
                            <label for="Item" class="grey-text" >Item</label>
                            <select style="width: 50%" name="rr">
                                <option value="1">Select Food Type</option>
                                <?php while ($row=mysqli_fetch_array($fit)):; ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>

                                <?php endwhile ;
                                ?>
                            </select>
                            <input style="width:35%;height:35%;padding:1%" type="submit" name="Sub" value="View Details" >
                            <label for="Area" class="grey-text" >Area</label>
                            <select style="width: 50%" name="r2">
                                <option value="5">Select Area</option>
                                <?php while ($rowi=mysqli_fetch_array($sql2)):; ?>
                                    <option value="<?php echo $rowi[0]; ?>"><?php echo $rowi[0]; ?></option>

                                <?php endwhile ;
                                ?>
                            </select>
                            <input style="width:35%;height:35%;padding:1%" type="submit" name="Subi" value="View Details" >
                            <label for="Range" class="grey-text">Range</label>
                            <select style="width: 45%" name="r3">
                                <option value="6">Price Around</option>
                                <option value="400">400</option>
                                <option value="800">between 400-800</option>
                            </select>
                            <input style="width:35%;height:35%;padding:1%" type="submit" name="Subr" value="View Details" >

                        </form></div></div></div></div></div>

    <div class="col-md-5">
        <table style="float:right">

            <tr><?php
                while($rowj=mysqli_fetch_array($cj)):;
                echo "<td><img src='images/".$rowj['Item']."' style='width: 250px;height:300px;'></td>";
                echo "<td  style=\"background-color:seagreen\"><strong><b><p style='color:white;padding:5px;'> ID-".$rowj['fid']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'>".$rowj['des']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Price ".$rowj['price']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Restaurant ".$rowj['name']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Location ".$rowj['location']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Contact ".$rowj['contact']."</p></b></strong></td>";
                ?>
            </tr>
            <?php  endwhile; ?>
        </table>
        <table style="float:right">

            <tr><?php
                while($rowj2=mysqli_fetch_array($cj2)):;
                echo "<td><img src='images/".$rowj2['Item']."' style='width: 250px;height:300px;'></td>";
                echo "<td  style=\"background-color:seagreen\"><strong><b><p style='color:white;padding:5px;'> ID-".$rowj2['fid']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'>".$rowj2['des']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Price ".$rowj2['price']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Restaurant ".$rowj2['name']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Location ".$rowj2['location']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Contact ".$rowj2['contact']."</p></b></strong></td>";
                ?>
            </tr>
            <?php  endwhile; ?>
        </table>
        <table style="float:right">

            <tr><?php
                while($rowj3=mysqli_fetch_array($cj3)):;
                echo "<td><img src='images/".$rowj3['Item']."' style='width: 250px;height:300px;'></td>";
                echo "<td  style=\"background-color:seagreen\"><strong><b><p style='color:white;padding:5px;'> ID-".$rowj3['fid']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'>".$rowj3['des']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Price ".$rowj3['price']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Restaurant ".$rowj3['name']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Location ".$rowj3['location']."</p></b></strong>";
                echo "<strong><b><p style='color:whitesmoke;padding:5px;'> Contact ".$rowj3['contact']."</p></b></strong></td>";
                ?>
            </tr>
            <?php  endwhile; ?>
        </table>

    </div>
    <div class="col-md-4">
        <?php


        getcoment($con,$r);
        echo"<br>";
        ?>
    </div></div>




<?php include ("bootstrapScript.php");?>
</body>
</html>



