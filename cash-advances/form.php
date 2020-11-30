<?php
  require "helpers/get_data_from_db.php";

  $lastId = getLastId('cash_advances');

  $data = array(
    'id'    => '',
    'doc_num' => '',
    'total' => '',
    'description' => '',
    'pic_name' => '',
    'division' => ''
  );

  $detail = array(
      'total'   => ''
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $title = $id == 0 ? 'Add Cash Advance' : 'Edit Cash Advance';
  if($id) {
    $query = "SELECT * FROM cash_advances WHERE id = '$id'";
    $execute_query = $conn->query($query);    
    $data = $execute_query->fetch_assoc();    
  }
?>
<table class='table'>
    <tr>
        <th>ID Cash Advance</th>
        <td>
            <?php echo $lastId + 1 ?>
        </td>
        <th>Number</th>
        <td>
            <input 
                type="text" 
                class="form-control" 
                name='doc_num'
                value="<?php echo $data['doc_num'] ?>"
                placeholder='Input your CA Number'
                autocomplete="off"
            />
        </td>
    </tr>
    <tr>
        <th>NIK Karyawan</th>
        <td>
            <?php echo $user['nik']; ?>
        </td>
        <th>Divisi</th>
        <td>
            <input 
                type="text" 
                class="form-control" 
                name='division'
                value="<?php echo $data['division'] ?>"
                placeholder='Input your Division'
                autocomplete="off"
            />            
        </td>
    </tr>    
    <tr>
        <th>Nama Project</th>
        <td>
            <input 
                type="text" 
                class="form-control" 
                name='description'
                value="<?php echo $data['description'] ?>"
                placeholder='Input your project name'
                autocomplete="off"
            />
        </td>
        <th>Nama PIC</th>
        <td>
            <input 
                type="text" 
                class="form-control" 
                name='pic_name'
                value="<?php echo $data['pic_name'] ?>"
                placeholder='Input your project name'
                autocomplete="off"
            />
        </td>        
    </tr>
    <tr>
        <th>Upload Berkas</th>
        <td>
            <input 
                type="file" 
                class="form-control" 
                name='evidence'
            />
        </td>
        <th>Keterangan CA</th>
        <td>
            Yes
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
    <tr>
        <td>
            <input 
                type="text" 
                class="form-control" 
                name='description[]'
            />
        </td>
        <td>
            <input 
                type="number" 
                class="form-control" 
                name='qty[]'
            />
        </td>
        <td>
            <input 
                type="number" 
                class="form-control" 
                name='amount[]'
            />
        </td>
        <td>
            <input 
                type="number" 
                class="form-control" 
                name='total[]'
            />            
        </td>
    </tr>
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
                <?php echo $data['total'] ?>        
            </td>
    </tr>
    <tr>
        <th colspan='7'></th>
    </tr>
  </tfoot>
</table>