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
<a 
    href='index.php?page=payments&action=form' 
    class="btn btn-primary"
    style='float: left;'
>
    Add New Payment
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
      <th>Realization</th>
      <th>Cash Advance</th>
      <th>Description</th>
      <th>Total</th>
      <th>Status</th>
      <th>Created</th>
      <th
      >
        Actions
    </th>
    </tr>
  </thead>
  <tbody>
      <?php
            $query = "
                SELECT
                    r.doc_num realization_number,
                    ca.doc_num ca_number,
                    p.amount,
                    p.status,
                    p.created_date,
                    r.cash_advance_id,
                    ca.description
                FROM payments p
                INNER JOIN realizations r
                ON p.realization_id = r.id
                INNER JOIN cash_advances ca
                ON ca.id = r.cash_advance_id
                WHERE 
                    p.is_deleted = 0
            ";

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
                        <?php echo $row['realization_number'] ?>
                    </td>
                    <td>
                        <?php echo $row['ca_number'] ?>
                    </td>
                    <td>
                        <?php echo $row['description'] ?>
                    </td>
                    <td>
                        <?php echo $row['amount'] ?>
                    </td>
                    <td>
                        <?php echo $row['status'] ?>
                    </td>
                    <td>
                        <?php echo $row['created_date'] ?>
                    </td>

                    <td>
                        <a href='index.php?page=payments&action=detail&id=<?php echo $row["id"]; ?>' class="btn btn-success">
                            Detail
                        </a>

                        <?php
                            if($row['status'] == 'Open'):
                        ?>
                            <!-- <a href='index.php?page=payments&action=form&id=<?php echo $row["id"]; ?>' class="btn btn-warning">
                                Edit
                            </a> -->
                            <!-- <button 
                                data-id='<?php echo $row["id"]; ?>' 
                                data-ca-id='<?php echo $row["cash_advance_id"]; ?>' 
                                data-description='<?php echo $row["description"]; ?>' 
                                class="btnDelete btn btn-danger"
                            >
                                Delete
                            </button> -->
                        <?php
                            endif;
                        ?>
                    </td>
                </tr>
        <?php
                endwhile;
            endif;
        ?>
  </tbody>
  <tfoot>
    <tr>
        <th colspan='8'></th>
    </tr>
  </tfoot>
</table>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src='assets/js/dataTables.bootstrap5.min.js'></script>
<script src="assets/js/common/list.js"></script>
<script src="assets/js/payments/delete.js"></script>