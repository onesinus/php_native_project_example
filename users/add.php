<form method='POST' action='actions/users/save_data.php'>
  <div class="form-group">
    <label for="inputUsername">Username</label>
    <input 
        type="text" 
        class="form-control" 
        id="inputUsername" 
        aria-describedby="usernameHelp"
        name='username'
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
    >
  </div>
  <div class="form-group">
    <label for="selectRole">Select Role</label>
    <select class="form-control" id="selectRole" name='role'>
      <option value='Administrator'>Administrator</option>
      <option value='Admin Web'>Admin Web</option>
      <option value='Kang Mie Ayam'>Kang Mie Ayam</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary mt-2">Save</button>
</form>