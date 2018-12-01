<?php
session_start();
$Email=$_SESSION['email'];
$t;
?>
<?php
;
include 'conn.php';
?>

<?php
function setcoment($con){
    if(isset($_POST['Csubmit'])){
        $ID = $_POST['uid'];
        $A = $_POST['date'];
        $M = $_POST['msg'];
        $T = $_POST['type'];
        global $Email;

        $sql=mysqli_query($con,"insert into com2(uid,email,date,type,msg) VALUES ('$ID','$Email','$A','$T','$M')");
    }}
?>
<?php
function getcoment($con,$r){

    $sql=mysqli_query($con,"select * from com2 where type='$r'");
    while ($row=mysqli_fetch_array($sql)):;
        echo "<div style='position:relative;width:480px;padding:20px;margin-bottom:4px;background-color:lightgray;border-radius:4px'><p>";
        echo $row['uid']."<br>";
        echo $row['date']."<br>";
        echo $row['msg'];
        echo "<form method='post' action='edit.php'>
 <input type='hidden' name='cid' value='".$row['cid']."'>
<input type='hidden' name='uid' value='".$row['uid']."'>
<input type='hidden' name='date' value='".$row['date']."'>
<input type='hidden' name='msg' value='".$row['msg']."'>

<button style='width:40px;height:26px;position:absolute;top:0px;right:0px;background-color:transparent;opacity:2;color: blue;cursor:pointer'>Edit</button>
</form>

</div>";

    endwhile;
}
?>

<?php
function edcoment($con){
    if(isset($_POST['Csubmit'])){
        $CD = $_POST['cid'];
        $ID = $_POST['uid'];
        $A = $_POST['date'];
        $M = $_POST['msg'];

        $sql=mysqli_query($con,"update com2 set msg='$M' where cid='$CD'");
        header("Location:up.php");
    }}
?>
