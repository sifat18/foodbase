
<?php

session_start();
$Email=$_SESSION['email'];
include 'conn.php';
$count=mysqli_query($con,"select Riid,name,fiid,count(*) as total from menu inner join restraunt on restraunt.Rid=menu.Riid GROUP by Riid order  by Riid;");
?>
<?php
$f=mysqli_query($con,"select * from login where email='$Email'");
$ff=mysqli_fetch_array($f);
$CoID=$ff['Username'];
?>

<?php
if(isset($_POST["submit"])){
    $U=$_POST['U'];
    $type=$_POST['type'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $RE_Pass=$_POST['RE_Pass'];
    if($Password==$RE_Pass){
    $query=mysqli_query($con,"insert into login(Username,Type,email,pass) VALUES('$U','$type','$Email','$Password')");
    if($query){
        echo $_SESSION['message']= "Success";
    }
    else{
        echo "fail query";
    }}
else {
        echo $_SESSION['message']= "Pass Mismatch.TRY AGAIN";
}
}
?>

<html>
<head><title> Admin panel </title>
    <?php include ("head.php");?>
    <style type="text/css">
        body{
            background-image: url("image/p6.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        input[type=text],[type=number],[type=email],[type=password],select, textarea {
            width: 90%;
            padding: 2% ;
            border: 3px solid #ccc;
            border-radius: 10px;
            align-items: center;
align-content: center;
            align-self: center;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: 1px solid;
            border-radius: 4px;
            cursor: pointer;
            width: 90%;
            float: bottom;
        }
    </style>

</head>
<body >
<!--Navbar-->
<nav class="navbar navbar-expand-md navbar-dark ">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">ADMIN</a>

        <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">HomePage
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="man.php">Restaurants</a>
            </li></ul>
        <form class="form-inline">
                <ul class="navbar-nav mr-center">
                <li class="nav-item">
                    <a class="nav-link" href="sesion.php"><strong>LOG OUT</strong></a>
                </li></ul></form></div></nav>


<h1 align="center" style= "color: yellowgreen">Welcome Admin <?php echo $CoID ;?></h1>
<div class="row">
<div class="col-md-4"></div>
 <div class="col-md-4" >
    <!--Accordion wrapper-->
    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
<div class="card">
<!-- Card header -->
            <div class="card-header" role="tab" id="headingTwo">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h5 class="mb-0">
                        Add new Manager/Admin user<i class="fa fa-angle-down rotate-icon"></i>
                    </h5></a></div>
<!-- Card body -->
            <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                <div class="card-body">
                        <form action="home_admin.php" method="post">

                            <label for="Add Admin/Manager" class="grey-text" >Add Admin/Manager</label>
                                <select name="type">
                                        <option value="dq">Select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Manager">Manager</option>
                                    </select><br>
                            <label for="Username" class="grey-text" >Username</label><br>
                            <input type="text" name="U" placeholder="Username" required ><br>
                            <label for="Email" class="grey-text" >Email</label><br>
                            <input type="email" name="Email" placeholder="email" required ><br>
                            <label for="Password" class="grey-text" >Password</label><br>
                            <input type="password" name="Password" placeholder="Password" required><br>
                            <label for="Verify Password" class="grey-text" >Verify Password</label><br>
                            <input type="password" name="RE_Pass" placeholder="Re-enter Password" required ><br><br>
                            &nbsp;
                            <input  type="submit" name="submit" value="Add" >
                        </form></div></div></div>
        <div class="card">
<!-- Card header -->
            <div class="card-header" role="tab" id="headingTwo">
                <a class="collapsed" data-toggle="collapse" href="#1" aria-expanded="false" aria-controls="1">
                    <h5 class="mb-0">
                       Restraunt Status<i class="fa fa-angle-down rotate-icon"></i>
                    </h5></a></div>

            <!-- Card body -->
            <div id="1" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                <div class="card-body">


                <table border="10" cellpadding="8">
                  <td><h4 align="center">status</h4></td>
                    <tr>
                        <th>Rest_ID</th>
                        <th>Name</th>
                        <th>Total_Items</th>
                    </tr>
               <?php
                while($row=mysqli_fetch_array($count)):;    ?>
                    <td><?php echo $row["Riid"]; ?></td>
           <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["total"]; ?></td>
                    </tr>
            <?php endwhile;  ?>
                        </table>
                    </div></div></div></div>
<!--<table align="bottom" >-->
<!--    <form action="sesion.php" method="post">-->
<!--        <button class="btn btn-red" type="submit" name="submit" >Log Out</button>-->
<!--<!--    <tr><td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td></tr>-->-->
<!--</form>-->
<!---->
<!--</table>-->
 </div>
<div class="col-md-4"></div>
</div>
    <?php include ("bootstrapScript.php");?>
</body>
</html>

