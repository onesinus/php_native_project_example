<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "
        SELECT 
            ca.*,
            u.nik 
        FROM cash_advances ca
        INNER JOIN users u
        ON ca.created_by = u.id
        WHERE 
            ca.id = '$id'
    ";
    $datas = $conn->query($query);    
    $ca = $datas->fetch_assoc();

    $user = isset($_SESSION['user_logged_in']) ? $_SESSION['user_logged_in'] : null;
    $role = isset($user["role"]) ? $user["role"] : '';
?>
<?php
    if($ca['status'] == 'Open' && in_array($role, ['Management', 'IT'])):
?>
    <button 
        data-id='<?php echo $ca["id"]; ?>' 
        data-description='<?php echo $ca["description"]; ?>' 
        class="btnApprove btn btn-success float-right"
    >
    Approve
    </button>
<?php
    endif;
?>
<a href='index.php?page=cash-advances' class="btn btn-primary mr-1 float-right">List Cash Advance</a>
<h1 class='text-center'>Detail Cash Advance</h1>
<table class='table'>
    <tr>
        <th>ID Cash Advance</th>
        <td>
            <?php echo $ca['id'] ?>
        </td>
        <th>Number</th>
        <td>
            <?php echo $ca['doc_num'] ?>
        </td>
    </tr>
    <tr>
        <th>NIK Karyawan</th>
        <td>
            <?php echo $ca['nik'] ?>            
        </td>
        <th>Divisi</th>
        <td>
            <?php echo $ca['division'] ?>
        </td>
    </tr>    
    <tr>
        <th>Nama Project</th>
        <td>
            <?php echo $ca['description'] ?>
        </td>
        <th>Nama PIC</th>
        <td>
            <?php echo $ca['pic_name'] ?>
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php echo $ca['status'] ?>
        </td>
        <th>Berkas</th>
        <td>
            <a target="_blank" href='uploaded_files/<?php echo $ca['file'] ?>'>
                <?php echo $ca['file'] ?>
            </a>
        </td>
    </tr>       
</table>
<table 
    class="table table-green"
>
  <thead>
    <tr>
      <th>Description</th>
      <th>Qty</th>
      <th>Bugdet Estimation</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
      <?php
            $query = "SELECT * FROM cash_advance_details WHERE cash_advance_id = '$id'";
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
                        <?php echo $row['qty'] ?>
                    </td>
                    <td>
                        <?php echo $row['amount'] ?>
                    </td>
                    <td>
                        <?php echo $row['total_amount'] ?>
                    </td>
                </tr>
        <?php
                endwhile;
            endif;
        ?>
  </tbody>
  <tfoot>
    <tr>
            <td colspan="2"></td>
            <td>PPN</td>
            <td></td>
    </tr>
    <tr>
            <td colspan="2"></td>
            <td>Jumlah</td>
            <td>
                <?php echo $ca['total'] ?>        
            </td>
    </tr>
    <tr>
        <th colspan='7'></th>
    </tr>
  </tfoot>
</table>
<script src="assets/js/cash-advances/approve.js"></script>