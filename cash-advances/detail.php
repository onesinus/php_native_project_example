<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "SELECT * FROM cash_advances WHERE id = '$id'";
    $datas = $conn->query($query);    
    $ca = $datas->fetch_assoc();
?>
<a href='index.php?page=cash-advances' class="btn btn-primary mb-2 float-right">List Cash Advance</a>
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

        </td>
        <th>Divisi</th>
        <td>
            
        </td>
    </tr>    
    <tr>
        <th>Nama Project</th>
        <td>
            
        </td>
        <th>Nama PIC</th>
        <td>
            
        </td>        
    </tr>
    <tr>
        <th>Keterangan CA</th>
        <td>
            
        </td>
        <th>Upload Berkas</th>
        <td>
            
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
            <td>PPH</td>
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