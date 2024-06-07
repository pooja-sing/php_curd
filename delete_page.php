<?php  include ('connection_inc.php');?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
} 

$query ="delete from `user` where `id`= '$id'";
$result = mysqli_query($conn, $query);
if(!$result){
    die("error".mysqli_error($conn));
}else{
    header("location:index.php?mes:recorde deteted succsefulley");
}

?>