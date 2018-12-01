<!--connection to db -->
<?php
session_start();
$Email=$_SESSION['email'];
include 'conn.php';

error_reporting(E_PARSE | E_ERROR);
?>
<?php
$f=mysqli_query($con,"select * from login where email='$Email'");
$ff=mysqli_fetch_array($f);
$CoID=$ff['Uid'];
$count = mysqli_query($con, "select seat.bus_id,prefix,count(*) as total  from  bus inner join seat on bus.bus_id=seat.bus_id where Available='0' and
company_id='$CoID' group by prefix order  by bus_id;");
?>
<!--<!--posting from cmt to insert to employee table-->
<?php
/*if(isset($_POST["sd"])){
    $em=$_POST['em'];
    $cn=$_POST['Cn'];
    $qs = mysqli_query($con,"insert into employee(Name,mobile) VALUES('$em','$cn')");
    if($qs) {
        header("Location:cmt.php");
    }
    else {
        echo "fail employee query";
    }}
*/?>
<!--inserting Bus data to multiple table from the cmt page-->
<?php
//$f=mysqli_query($con,"select * from login where email='$Email'");
//$ff=mysqli_fetch_array($f);
//$Name=$ff['Username'];
//$CoID=$ff['Uid'];
//$i=1;
//$po=5;
    if(isset($_POST["submit"])){
        $Rname=$_POST['rn'];
        $Li=$_POST['li'];
        $type=$_POST['type'];
    $It=$_POST['item'];
    $C=$_POST['phone'];
    $pri=$_POST['p'];
    $Lo=$_POST['lo'];

    $query=mysqli_query($con,"insert into manager(name,contact) VALUES('$Rname','$C')");
    $q5 = mysqli_query($con,"insert into restraunt(Rid,name,busid,location,contact) VALUES('$Rname','$Li','$Lo','$C')");
    $q2 = mysqli_query($con, "insert into food(name,price,type) VALUES('$It','$pri','$type')");
//        while($i<=$po){
//            $q3 = mysqli_query($con, "insert into seat(bus_id,prefix,postfix) VALUES('$bus_id','$pre','$i')");
//            $i=$i+1;
//        }
//    $q4 = mysqli_query($con, "insert into travel(bus_id,Name,time,date) VALUES('$bus_id','$RN','$Time','$date')");
    if($q2 && $query && $q5) {

                header("Location:cmt.php");
        echo "Succcesful registry";
            }
            else {
                    echo "fail query";
                }}
?>


<html>
<head><title> Restraunt panel </title>
    <?php include ("head.php");?>
</head>

<h1 align="center">Welcome Manager</h1>
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
                    ADD NEW RESTRAUNT DETAILS <i class="fa fa-angle-down rotate-icon"></i>
                </h5></a></div>
        <!-- Card body -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
            <div class="card-body">
                <table>
                    <form action="cmt.php" method="post">
                        <tr><td>Restaurant Name</td>
                            <td><input type="text" name="rn" placeholder="Restaurant Name" required ></td><br/>
                        </tr>
                        <tr><td>License</td>
                            <td><input type="number" min="1" max="99999" maxlength="5" name="li" placeholder="License" required ></td><br/>
                        </tr>
                        <tr><td>Type</td>
                            <td><select name="type">
                                    <option value="dq">Select</option>
                                    <option value="Kacchi">Kacchi</option>
                                    <option value="Khichuri">Khichuri</option>
                                    <option value="Fastfood">Fastfood</option>
                                </select></td></tr>
                        <tr><td>Item Name</td>
                            <td><input type="text" name="item" placeholder="Item Name" required ></td><br/>
                        </tr>
                        <tr><td>Price</td>
                            <td><input type="number" min="50" max="3000" maxlength="7" name="p" placeholder="price" required></td><br/>
                        </tr>
                        <tr><td>Contact</td>
                            <td><input type="number" min="1" max="99999999999999" maxlength="5" name="phone" placeholder="Contact" required ></td><br/>
                        </tr>
                        <tr><td>Location</td>
                            <td><input type="text" name="lo" placeholder="Location" required ></td><br/>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Add" ></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <!-- Accordion card -->
    <!-- Accordion card -->
    <!--<div class="card">-->

        <!-- Card header -->
        <!--<div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    ADD EMPLOYEE DETAILS <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>-->

        <!-- Card body -->
        <!--<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
            <div class="card-body">

                <table align="center">
                    <form action="cmt.php" method="post">
                        <tr><td>New employee</td>
                            <td><input type="text" name="em" placeholder="Employee_name" required ></td><br/>
                        </tr>
                        <tr><td>Contact No</td>
                            <td><input type="number" min="1" max="99999999999" maxlength="11" name="Cn" placeholder="number"></td><br/>
                        </tr>
                        <tr><td>&nbsp;</td>
                            <td><input type="submit" name="sd" value="Submit" ></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
-->
    <div class="card">

        <!-- Card header -->
        <div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" href="#1" aria-expanded="false" aria-controls="1">
                <h5 class="mb-0">
                    Restaurant Status<i class="fa fa-angle-down rotate-icon"></i>
                </h5></a></div>
        <!-- Card body -->
        <div id="1" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
            <div class="card-body">
                <div class="col-md-12">

<!--                    <table border="10" cellpadding="8">-->
<!--                        <td><h4 align="center">Seat status</h4></td>-->
<!--                        <tr>-->
<!--                            <th>Bus_ID</th>-->
<!--                            <th>Seat</th>-->
<!--                            <th>NO</th></tr>-->
<!--                        <tr>--><?php
//                            while($row=mysqli_fetch_array($count)):;    ?>
<!--                            <td>  --><?php //echo $row["bus_id"]; ?><!--</td>-->
<!--                            <td>  --><?php //echo $row["prefix"]; ?><!--</td>-->
<!--                            <td>  --><?php //echo $row["total"]; ?><!--</td>-->
<!--                        </tr>-->
<!--                        --><?php //endwhile;  ?>
<!--                    </table>-->
                </div></div></div></div></div></div>
<!--<div class="col-md-8">-->
<!--<figure class="align-content-sm-around">-->
<!--    <img src="concorde-II-floor-plan-7.jpg"  width="700" height="450">-->
<!--</figure>-->
<!---->
<!--</div>-->
</div>
<table align="bottom" >
    <form action="sesion.php" method="post">
        <tr>
            <td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td>
        </tr></form></table>
<?php include ("bootstrapScript.php");?>
</body>
</html>


