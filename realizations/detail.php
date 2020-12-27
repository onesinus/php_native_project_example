<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "
        SELECT 
            r.*,
            ca.description,
            u.nik 
        FROM realizations r
        INNER JOIN cash_advances ca
        ON r.cash_advance_id = ca.id
        INNER JOIN users u
        ON ca.created_by = u.id
        WHERE 
            ca.id = '$id'
    ";
    $datas = $conn->query($query);    
    $realization = $datas->fetch_assoc();
?>
<?php
    if($realization['status'] == 'Open'):
?>
    <button 
        data-id='<?php echo $realization["id"]; ?>' 
        data-ca-id='<?php echo $realization["cash_advance_id"]; ?>' 
        data-description='<?php echo $realization["description"]; ?>' 
        class="btnApprove btn btn-success float-right"
    >
    Approve
    </button>
<?php
    endif;
?>
<a href='index.php?page=realizations' class="btn btn-primary mr-1 float-right">List Realization</a>
<h1 class='text-center'>Detail Realization</h1>
<table class='table'>
    <tr>
        <th>ID Realization</th>
        <td>
            <?php echo $realization['id'] ?>
        </td>
        <th>Number</th>
        <td>
            <?php echo $realization['doc_num'] ?>
        </td>
    </tr>
    <tr>
        <th>Cash Advance</th>
        <td>
            <?php echo $realization['description'] ?>            
        </td>
        <th>Status</th>
        <td>
            <?php echo $realization['status'] ?>
        </td>
    </tr>    
</table>
<table 
    class="table table-green"
>
  <thead>
    <tr>
      <th>Description</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
      <?php
            $query = "SELECT * FROM realization_details WHERE realization_id = '$id'";
            $datas = $conn->query($query);
            if ($datas->num_rows > 0):
                $i = 0;
                while ($row = $datas->fetch_assoc()):		      				
                    $i++;
      ?>
                <tr>
                    <td>
                        <?php echo $row['description'] ?>
                    </td>
                    <td>
                        <?php echo $row['amount'] ?>
                    </td>
                </tr>
        <?php
                endwhile;
            endif;
        ?>
  </tbody>
  <tfoot>
    <tr>
            <td>Jumlah</td>
            <td>
                <?php echo $realization['total'] ?>        
            </td>
    </tr>
    <tr>
            <td>Selisih</td>
            <td>
                <?php echo $realization['difference'] ?>        
            </td>
    </tr>
    <tr>
        <th colspan='7'></th>
    </tr>
  </tfoot>
</table>
<script src="assets/js/realizations/approve.js"></script>