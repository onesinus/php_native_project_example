<a 
    href='index.php?page=cash-advances&action=form' 
    class="btn btn-primary mb-2"
>
    Add New Cash Advance
</a>

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
    endif; 
?>
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
      <th>Number</th>
      <th>Description</th>
      <th
          style='width: 35%'  
      >
        Actions
    </th>
    </tr>
  </thead>
  <tbody>
      <?php
            $query = "SELECT * FROM cash_advances";
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
                        <?php echo $row['doc_num'] ?>
                    </td>
                    <td>
                        <?php echo $row['description'] ?>
                    </td>
                    <td>
                        <a href='index.php?page=cash-advances&action=detail&id=<?php echo $row["id"]; ?>' class="btn btn-success">
                            Detail
                        </a>
                        <a href='index.php?page=cash-advances&action=form&id=<?php echo $row["id"]; ?>' class="btn btn-warning">
                            Edit
                        </a>
                        <button 
                            data-id='<?php echo $row["id"]; ?>' 
                            data-Cash Advancename='<?php echo $row["Cash Advancename"]; ?>' 
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
        <th colspan='5'></th>
    </tr>
  </tfoot>
</table>

<script src="js/jquery.dataTables.min.js"></script>
<script src='js/dataTables.bootstrap5.min.js'></script>
<script src="js/common/list.js"></script>
<script src="js/cash-advances/delete.js"></script>