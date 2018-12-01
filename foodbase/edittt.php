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
function getcoment($con,$r){

    $sql=mysqli_query($con,"select * from com2 where type='$r'");
    while ($row=mysqli_fetch_array($sql)):;
        echo "<div style='position:relative;width:480px;padding:20px;margin-bottom:4px;background-color:lightgray;border-radius:4px'><p>";
        echo $row['uid']."<br>";
        echo $row['date']."<br>";
        echo $row['msg']."<br>";
    endwhile;
}
?>


?>
