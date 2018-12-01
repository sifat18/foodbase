<?php
session_start();
$Email=$_SESSION['email'];
include 'conn.php';

error_reporting(E_PARSE | E_ERROR);
?>

<?php
$f=mysqli_query($con,"select * from login where email='$Email'");
$ff=mysqli_fetch_array($f);
$CoID=$ff['Username'];

?>
<?php
if(isset($_POST["submit"])){
    $Rne=$_POST['rn'];
    $Li=$_POST['li'];
    $C=$_POST['phone'];
    $pri=$_POST['p'];
    $Lo=$_POST['lo'];
    $query=mysqli_query($con,"insert into manager(name,contact) VALUES('$Rne','$C')");
    $qu2=mysqli_insert_id($con);

    $q5 = mysqli_query($con,"insert into restraunt(Rid,name,busid,location,contact) VALUES('$qu2','$Rne','$Li','$Lo','$C')");
   if($query & $q5){
        echo "successfully added";
    }
    else {
        echo "failed to add";
    }}

?>
<?php
$qs1 = mysqli_query($con,"select MAX(mid)as rid from manager");
$qs2=mysqli_fetch_array($qs1);
$qs4=$qs2['rid'];
$count = mysqli_query($con, "select fiid,type,price from menu inner join food on food.fid=menu.fiid where Riid='$qs4' order  by fid;");

?>

<?php
if(isset($_POST["up"])){
    $ty=$_POST['type'];
    $pric=$_POST['p'];
    $image=$_FILES['image']['name'];
    $tar="images/".basename($image);
    $text=$_POST['itext'];
    $qs = mysqli_query($con,"insert into food(item,price,des,type) VALUES('$image','$pric','$text','$ty')");
    $qs1 = mysqli_query($con,"select MAX(mid)as rid from manager");
    $qs2=mysqli_fetch_array($qs1);
    $qs4=$qs2['rid'];
    $qs3= mysqli_query($con,"insert into menu(Riid,fiid) VALUES('$qs4',LAST_Insert_ID())");
    $count = mysqli_query($con, "select fiid,type,price from menu inner join food on food.fid=menu.fiid where Riid='$qs4' order  by fid;");
   if(move_uploaded_file($_FILES['image']['tmp_name'],$tar)){
       if($qs & $qs3){

        echo "Upload successful";
    }
   else{
       echo "failed Upload";
   }
   }
    else {
        echo "fail query";
    }}
?>
<?php
if(isset($_POST["sub"])){
    $id=$_POST['FID'];
    $pric=$_POST['p2'];
    $qu=mysqli_query($con,"update food set price='$pric' where fid='$id';");
    if($qu){
        echo "upsss";
    }
    else {
        echo "fail query";
    }
}
?>

<html>
<head><title> Restraunt panel </title>
    <?php include ("head.php");?>
    <style type="text/css">
body{
    background-image: url("image/p1.jpg");
    background-repeat: no-repeat;
     background-size: 100% 160%;
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
 </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark primary-color">

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
                    <a class="nav-link" href="sesion.php"><strong>LOG OUT</strong></a>
                </li></ul></div></form>
</nav>

<h1 align="center" style= "color:#311b92">Welcome Manager <?php echo $CoID ;?></h1>
<div class="row">
    <div class="col-md-3">

        <!--Accordion wrapper-->
        <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="false">
            <!-- Accordion card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-0">
                            ADD RESTRAUNT DETAILS<i class="fa fa-angle-down rotate-icon"></i>
                        </h5></a></div>
                <!-- Card body -->
      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
      <div class="card-body" style="background:skyblue">
      <form  action="man.php" method="post">
          <label for="Restaurant Name" class="grey-text" >Restaurant Name</label>
      <input type="text" name="rn" placeholder="Restaurant Name" required >
          <label for="License" class="grey-text" >License</label>
      <input type="number" min="1" max="99999" maxlength="5" name="li" placeholder="License" required >
      <label for="Contact" class="grey-text" >Contact</label>
      <input type="number" min="0111111" max="999999999999" maxlength="13" name="phone" placeholder="Contact" required >
          <label for="Location" class="grey-text" >Location</label>
      <input type="text" name="lo" placeholder="Location" required >
      &nbsp;
      <input type="submit" name="submit" value="Add" >

      </form></div></div></div>

<div class="card" style="background:lightgreen">
<!-- Card header -->
     <div class="card-header" role="tab" id="headingTwo">
    <a class="collapsed" data-toggle="collapse" href="#4" aria-expanded="false" aria-controls="4">
     <h5 class="mb-0">
      Insert Menu<i class="fa fa-angle-down rotate-icon"></i></h5></a></div>
            <!-- Card body -->
            <div id="4" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                <div class="card-body">
        <form style="alignment: right" action="man.php" method="post" enctype="multipart/form-data">
            <label for="Type" class="grey-text" >Type</label>
       <select name="type">
        <option value="dq">Select</option>
        <option value="Kacchi">Kacchi</option>
         <option value="Khichuri">Khichuri</option>
         <option value="Fastfood">Fastfood</option>
           </select>
            &nbsp;
        <input type="hidden" name="size" value="1000000" required >
         <div><input type="file" name="image"></div>
            <div>
    <input type="text "name="itext" " placeholder="about food"></input></div>
            <label for="Price" class="grey-text" >Price</label>
      <input type="number" min="50" max="3000" maxlength="7" name="p" placeholder="price" required>
       &nbsp;
       <input type="submit" name="up" value="Add" >
      </form></div></div></div>

            <div class="card" style="background:lightcoral">
                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo">
                    <a data-toggle="collapse" href="#2" aria-expanded="false" aria-controls="2">
                        <h5 class="mb-0" style="color: navy">
                            Update Menu<i class="fa fa-angle-down rotate-icon"></i>
                        </h5></a></div>
                <!-- Card body -->
                <div id="2" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                   <div class="card-body">
             <form style="alignment: right" action="man.php" method="post">
                 <label for="Food_id" class="grey-text" >Food_id</label>
   <input type="number" min="1" max="99999" maxlength="5" name="FID" placeholder="License" required ><br/>
                 <label for="Price" class="grey-text" >Price</label>
        <input type="number" min="50" max="3000" maxlength="7" name="p2" placeholder="price" required>
                 &nbsp;
                 <input type="submit" name="sub" value="Update" >
             </form></div></div></div>

            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne">
                    <a class="collapsed" data-toggle="collapse" href="#1" aria-expanded="false" aria-controls="1">
                        <h5 class="mb-0">
                            Status<i class="fa fa-angle-down rotate-icon"></i>
                        </h5></a></div>
                <!-- Card body -->
                <div id="1" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                    <div class="card-body">
                        <div class="col-md-12">

                            <table border="10" cellpadding="8">
                          <td><h6 align="center">Menu & Price</h6></td>
                          <tr>
                          <th>Food_ID</th>
                          <th>Type</th>
                          <th>Price</th></tr>
                          <tr><?php
                          while($row=mysqli_fetch_array($count)):;    ?>
                          <td><?php echo $row["fiid"]; ?></td>
                          <td><?php echo $row["type"]; ?></td>
                          <td><?php echo $row["price"]; ?></td>
                          </tr>
                          <?php endwhile;  ?>
                          </table>
                        </div></div></div></div></div></div></div>

<!--<table >-->
<!--    <form action="sesion.php" method="post">-->
<!--          <button class="btn btn-indigo" type="submit" name="submit" >Log Out</button>-->
<!--        </div>-->
<!--<!--        <tr><td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td></tr>-->-->
<!--    </form></table>-->

<?php include ("bootstrapScript.php");?>
</body>
</html>

