<?php
  $user = array(
    'id'  => '',
    'username' => '',
    'password' => ''
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  if($id) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $datas = $conn->query($query);    
    $user = $datas->fetch_assoc();    
  }
?>
<form method='POST' action='actions/users/change_password.php'>
  <input type='hidden' name='id' value='<?php echo $user["id"]; ?>' />
  <div class="form-group">
    <label for="inputPassword">Old Password</label>
    <input 
        type="password" 
        class="form-control" 
        name='old_password'
        placeholder='Input your Old password'
    >
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword">New Password</label>
      <input 
          type="password" 
          class="form-control" 
          name='new_password'
          placeholder='Input your New password'
      >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Repeat New Password</label>
      <input 
          type="password" 
          class="form-control" 
          name='new_password_repeat'
          placeholder='Re-Input your New password'
      >
    </div>
  </div>  
  <button type="submit" class="btn btn-primary mt-2">Update Password</button>
  <a href='index.php?page=users' class="btn btn-secondary mt-2">Cancel</a>
</form>