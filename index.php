<?php  include ('header.php');?>
<?php  include ('connection_inc.php');?>

        <div class="main_con">
        <h2>ALL STUDENT</h2>
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#exampleModal">Add</button>
        </div>
   
    <table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    </thead>

    <tbody>
        <?php 
        $query ="select * from `user`";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("query faild".mysqli_error($conn));
        }else{
            while($row=mysqli_fetch_assoc($result)){
                ?>
              <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['first_name'];?></td>
    <td><?php echo $row['last_name'];?></td>
    <td><?php echo $row['age'];?></td>
    <td><a href="update_page.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
    <td><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
   
  </tr>
                <?php
        }
    }

        ?>
   

</tbody>
</table>

<?php
if(isset($_GET['message'])){
    echo'<h6>'.$_GET['message'].'</h6>';
}
if(isset($_GET['insert_message'])){
    echo'<h6>'.$_GET['insert_message'].'</h6>';
}
?>
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add STUDENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">

  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="age">Age</label>
    <input type="text" class="form-control" id="age" name="age" placeholder="Age">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_student" value="Add">
      </div>
    </div>
  </div>
</div>
</form>

<?php  include ('footer.php');?>
   