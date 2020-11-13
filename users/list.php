<a href='index.php?page=users&action=add' class="btn btn-primary mb-2 float-right">Add New User</a>
<table class="table table-bordered table-hover table-responsive">
  <thead>
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Role</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php
            $query = "SELECT * FROM users";
            $datas = $conn->query($query);
            if ($datas->num_rows > 0):
                $i = 1;
                while ($row = $datas->fetch_assoc()):		      				
      ?>
                <tr>
                    <th scope="row">
                        <?php echo $row['id'] ?>
                    </th>
                    <td>
                        <?php echo $row['username'] ?>
                    </td>
                    <td>
                        <?php echo $row['role'] ?>
                    </td>
                    <td>
                        <button class="btn btn-success">
                            Detail
                        </button>
                        <button class="btn btn-warning">
                            Edit
                        </button>
                        <button class="btn btn-danger">
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