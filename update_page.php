<?php include ('header.php');?>
<?php include ('connection_inc.php');?>

<?php 
$id = '';
$row = array("first_name" => "", "last_name" => "", "age" => "");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
} 
?>

<?php
if (isset($_POST['update_user'])) {
    $id_new = $_POST['id_new'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $query = "UPDATE `user` SET `first_name` = '$first_name', `last_name` =  '$last_name', `age` = '$age' WHERE `id` = '$id_new'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header("Location: index.php?message=Record updated successfully");
    }
}
?>

<form action="update_page.php?id=<?php echo $id; ?>" method="POST">
    <input type="hidden" name="id_new" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>">
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" name="age" value="<?php echo htmlspecialchars($row['age']); ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="update_user" value="Update">
</form>

<?php include ('footer.php');?>
