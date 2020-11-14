<?php
  $user = array(
    'id'  => '',
    'username' => '',
    'password' => '',
    'role'  => ''
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  if($id) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $datas = $conn->query($query);    
    $user = $datas->fetch_assoc();    
  }
?>
<form method='POST' action='actions/users/save_data.php'>
  <input type='hidden' name='id' value='<?php echo $user["id"]; ?>' />
  <div class="form-group">
    <label for="inputUsername">Username</label>
    <input 
        type="text" 
        class="form-control" 
        id="inputUsername" 
        aria-describedby="usernameHelp"
        name='username'
        value="<?php echo $user['username'] ?>"
        placeholder='Input your username'
    >
    <small 
        id="usernameHelp" 
        class="form-text text-muted"
    >
        Username must be only alphanumeric.
    </small>
  </div>
  <div class="form-group mt-2">
    <label for="inputPassword">Password</label>
    <input 
        type="password" 
        class="form-control" 
        id="inputPassword"
        name='password'
        value='<?php echo $user['password']; ?>'
        placeholder='Input your password'
    >
  </div>
  <div class="form-group">
    <label for="selectRole">Select Role</label>
    <select class="form-control" id="selectRole" name='role'>
      <option 
        value='Administrator'
        <?php if($user['role'] == 'Administrator') { echo 'selected="selected"'; }  ?>
      >
        Administrator
      </option>
      <option
        value='Admin Web'
        <?php if($user['role'] == 'Admin Web') { echo 'selected="selected"'; }  ?>
      >
        Admin Web
      </option>
      <option 
        value='Kang Mie Ayam'
        <?php if($user['role'] == 'Kang Mie Ayam') { echo 'selected="selected"'; }  ?>
      >
        Kang Mie Ayam
      </option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Save</button>
  <a href='index.php?page=users' class="btn btn-secondary mt-2">Cancel</a>
</form>