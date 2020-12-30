<?php
    if(isset($_SESSION['message'])):
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php     
    unset($_SESSION['message']);
    else:
?>
    
<?php
    endif; 
?>
<a 
    href='index.php?page=users&action=form' 
    class="btn btn-primary"
    style='float: left;'
>
    Add New User
</a>
<table
    class="table"
>
  <thead>
    <tr>
      <th 
        style='width: 5%'
      >
        #
    </th>
      <th>Nama</th>
      <th>NIK Karyawan</th>
      <th>Jabatan</th>
      <th>Hak Akses</th>
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
                        <?php echo $row['nik'] ?>
                    </td>
                    <td>
                        <?php echo $row['jabatan'] ?>
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
  <tfoot>
    <tr>
        <th colspan='6'></th>
    </tr>
  </tfoot>
</table>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src='assets/js/dataTables.bootstrap5.min.js'></script>
<script src="assets/js/common/list.js"></script>
<script src="assets/js/users/delete.js"></script>