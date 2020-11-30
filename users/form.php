<?php
  $data = array(
    'id'       => '',
    'username' => '',
    'password' => '',
    'nik'      => '',
    'jabatan' => '',
    'role'     => ''
  );

  $roles = array('Admin', 'Finance', 'Management', 'IT');

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $title = $id == 0 ? 'Add User' : 'Edit User';
  if($id) {
    $query = "SELECT * FROM users WHERE id = '$id'";
    $execute_query = $conn->query($query);    
    $data = $execute_query->fetch_assoc();    
  }
?>
<h1 class='text-center display-4'><?php echo $title; ?></h1>
<hr/>
<form method='POST' action='actions/users/save_data.php'>
  <input type='hidden' name='id' value='<?php echo $data["id"]; ?>' />
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input 
          type="text" 
          class="form-control" 
          id="inputUsername" 
          aria-describedby="usernameHelp"
          name='username'
          value="<?php echo $data['username'] ?>"
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
          value='<?php echo $data['password']; ?>'
          placeholder='Input your password'
          <?php echo ($id == True) ? 'disabled': '' ?>
      >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNik">NIK Karyawan</label>
      <input 
          type="text" 
          class="form-control" 
          id="inputNik" 
          aria-describedby="nikHelp"
          name='nik'
          value="<?php echo $data['nik'] ?>"
          placeholder='Input your NIK'
          autocomplete="off"
      /> 
    </div>
    <div class="form-group col-md-6">
      <label for="inputJabatan">Jabatan</label>
      <input 
          type="text" 
          class="form-control" 
          id="inputJabatan" 
          aria-describedby="jabatanHelp"
          name='jabatan'
          value="<?php echo $data['jabatan'] ?>"
          placeholder='Input your Position'
          autocomplete="off"
      /> 
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="selectRole">Hak Akses</label>
        <select class="form-control" id="selectRole" name='role'>
          <?php
            foreach($roles as $role):
          ?>
            <option 
              value='Admin'
              <?php if($data['role'] == $role) { echo 'selected="selected"'; }  ?>
            >
              <?php echo $role; ?>
            </option>
          <?php 
            endforeach;
          ?>
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