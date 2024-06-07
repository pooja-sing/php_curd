<?php 
include 'connection_inc.php';
if(isset($_POST["add_student"])){
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name'];
   $age=$_POST['age'];
  



   

if($first_name==""||empty($first_name)){
    header("location:index.php?message=you need to fill valid info");

}
else{
    $query ="INSERT INTO `user`(`first_name`,`last_name`,`age`) VALUES ('$first_name','$last_name','$age')";
    $result = mysqli_query( $conn,$query);
    
    if(!$result){
        die("query failed");
    }
    else{
        header("location:index.php?insert_message=Record added successfully");
    }
    
}
}

?>