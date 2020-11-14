<a 
    href='index.php?page=users&action=form' 
    class="btn btn-primary mb-2"
>
    Add New User
</a>
<table 
    id='table'
    class="table"
    style='width: 100%'
>
  <thead>
    <tr>
      <th 
        style='width: 5%'
      >
        #
    </th>
      <th>Username</th>
      <th>Role</th>
      <th
          style='width: 35%'  
      >
        Actions
    </th>
    </tr>
  </thead>
  <tbody>
      <?php
            $query = "SELECT * FROM users";
            $datas = $conn->query($query);
            if ($datas->num_rows > 0):
                $i = 0;
                while ($row = $datas->fetch_assoc()):		      				
                    $i++;
      ?>
                <tr>
                    <td scope="row">
                        <?php echo $i ?>
                    </td>
                    <td>
                        <?php echo $row['username'] ?>
                    </td>
                    <td>
                        <?php echo $row['role'] ?>
                    </td>
                    <td>
                        <a href='index.php?page=users&action=detail&id=<?php echo $row["id"]; ?>' class="btn btn-success">
                            Detail
                        </a>
                        <a href='index.php?page=users&action=change_password&id=<?php echo $row["id"]; ?>' class="btn btn-secondary">
                            Change Password
                        </a>
                        <a href='index.php?page=users&action=form&id=<?php echo $row["id"]; ?>' class="btn btn-warning">
                            Edit
                        </a>
                        <button 
                            data-id='<?php echo $row["id"]; ?>' 
                            data-username='<?php echo $row["username"]; ?>' 
                            class="btnDelete btn btn-danger"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
        <?php
                endwhile;
            endif;
        ?>
  </tbody>
</table>

<script src="js/jquery.dataTables.min.js"></script>
<script src='js/dataTables.bootstrap5.min.js'></script>
<script src="js/users/list.js"></script>
<script src="js/users/delete.js"></script>