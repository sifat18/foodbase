<?php
include 'conn.php';
?>
<?php include ("com.php");?>

<html>
<head>
    <?php include ("head.php");?>
    <style>

    textarea{
    width: 500px;
    height: 50px;
    background-color: whitesmoke;
    resize: none;

    }
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-4">
<?php
    $CD = $_POST['cid'];
    $ID = $_POST['uid'];
    $A = $_POST['date'];
    $M = $_POST['msg'];

    echo "<form style='align' method='post' action='".edcoment($con)."'>
    <input type='hidden' name='cid' value='".$CD."'>
    <input type='hidden' name='uid' value='".$ID."'>
    <input type='hidden' name='date' value='".$A."'>
    <textarea name='msg'>".$M."</textarea><br>
<button style='width:100px;height:30px;background-color:lightgrey;border:none;cursor:pointer;margin-bottom:20px' type='submit' name='Csubmit'> edit</button>
</form>";

?>
</div></div>
<?php include ("bootstrapScript.php");?>
</body>
</html>
