<?php
  $user = array(
    'id'       => '',
    'username' => '',
    'password' => '',
    'nik'      => '',
    'role'     => ''
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $title = $id == 0 ? 'Add User' : 'Edit User';
  if($id) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $datas = $conn->query($query);    
    $user = $datas->fetch_assoc();    
  }
?>
<h1 class='text-center display-4'><?php echo $title; ?></h1>
<hr/>
<form method='POST' action='actions/users/save_data.php'>
  <input type='hidden' name='id' value='<?php echo $user["id"]; ?>' />
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input 
          type="text" 
          class="form-control" 
          id="inputUsername" 
          aria-describedby="usernameHelp"
          name='username'
          value="<?php echo $user['username'] ?>"
          placeholder='Input your username'
          autocomplete="off"
      /> 
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <input 
          type="password" 
          class="form-control" 
          id="inputPassword"
          name='password'
          value='<?php echo $user['password']; ?>'
          placeholder='Input your password'
          <?php echo ($id == True) ? 'disabled': '' ?>
      >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNik">NIK</label>
      <input 
          type="text" 
          class="form-control" 
          id="inputNik" 
          aria-describedby="nikHelp"
          name='nik'
          value="<?php echo $user['nik'] ?>"
          placeholder='Input your NIK'
          autocomplete="off"
      /> 
    </div>
    <div class="form-group col-md-6">
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
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <button type="submit" class="btn btn-primary form-group col-md-12">Save</button>
    </div>
    <div class="form-group col-md-6">
      <a href='index.php?page=users' class="btn btn-secondary form-group col-md-12">Cancel</a>
    </div>
  </div>
  <hr/>
</form>