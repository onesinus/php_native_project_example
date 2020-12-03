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
<style>
    .table tr th{
        padding: 0.5%;
    }

    .table tr td {
        padding: 0.45%;
    }
</style>
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
                id='doc_num'
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
                id='division'
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
                id='project_name'
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
                id='pic_name'
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
                id='evidence'
            />
        </td>
        <th>Sudah direalisasi?</th>
        <td>
            <input 
                type="checkbox" 
                id='is_realized'
            />
        </td>
    </tr>       
</table>
<table 
    class="table table-green"
    style='margin-top: -1%'
>
  <thead>
    <tr>
      <th>Description</th>
      <th>Qty</th>
      <th>Bugdet Estimation</th>
      <th>Total</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>
            <input 
                type="text" 
                class="form-control" 
                id='description'
            />
        </td>
        <td>
            <input 
                type="number" 
                class="form-control" 
                id='qty'
                placeholder="0"
                min="0"
            />
        </td>
        <td>
            <input 
                type="number" 
                class="form-control" 
                id='amount'
                placeholder="0"
                min="0"
            />
        </td>
        <td>
            <input 
                type="number" 
                class="form-control" 
                id='total'
                placeholder="0"
                disabled
            />            
        </td>
        <td>
            <button class='btn btn-success' id='btnSaveRow'><i class="fas fa-check-circle"></i></button>
            <button class='btn btn-danger' id='btnDeleteRow'><i class="fas fa-trash"></i></button>
            <button class='btn btn-primary' id='btnSaveCa'><i class="fas fa-save"></i> Save CA</button>
        </td>
    </tr>
  </tbody>
</table>
<div style='margin-top: -1%; overflow-y: auto; height: 230px;'>
    <table class='table table-hover table-bordered'>
      <tbody style='cursor: pointer;' id='caDetail'>
      </tbody>
      <tfoot>
        <tr>
            <td colspan="3" class="text-right">PPN</td>
            <td class='text-right'>Rp. 3000</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">PPH</td>
            <td class='text-right'>Rp. 3000</td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Grand Total</td>
            <td class='text-right'>
                <?php echo $data['total'] ?>
            </td>
        </tr>
      </tfoot>
    </table>
</div>
<script src="assets/js/cash-advances/form.js"></script>