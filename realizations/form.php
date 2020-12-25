<?php
  require "helpers/get_data_from_db.php";

  $lastId = getLastId('realizations');

  $data = array(
    'id'    => $lastId + 1,
    'doc_num' => '',
    'total' => '',
    'description' => '',
    'pic_name' => '',
    'division' => '',
    'is_realized' => '',
    'ppn'   => 0,
    'total'   => 0
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $title = $id == 0 ? 'Add Realization' : 'Edit Realization';
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
        <th>ID Realization</th>
        <td>
            <?php echo $data['id']; ?>
        </td>
        <th>NIK Karyawan</th>
        <td>
            <?php echo $user['nik']; ?>
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
        <th>Based on CA</th>
        <td>
            <select 
                class="form-control" 
                id='ca'
            >
                <option value="">-- Select Cash Advance --</option>
                <?php
                    $ca_query = "SELECT * FROM cash_advances WHERE is_deleted = 0";
                    $ca = $conn->query($ca_query);
                    if ($ca->num_rows > 0):
                        while ($ca_row = $ca->fetch_assoc()):		      				
                ?>
                    <option value="<?php echo $ca_row['id']; ?>">
                        <?php echo $ca_row['description']; ?>
                    </option>
                <?php
                        endwhile;
                    endif;
                ?>
            </select>
        </td>
        <th>Nama Project</th>
        <td>
            <input type="text" id="project_name" class="form-control" disabled />
        </td>
        <th>Nama PIC</th>
        <td>
            <input type="text" id="pic_name" class="form-control" disabled />
        </td>        
    </tr>    
    <tr>
        <th>Divisi</th>
        <td>
            <input type="text" id="division" class="form-control" disabled />
        </td>
        <th>Berkas</th>
        <td>
            <span id="file"></span>
        </td>
        <th></th>
        <td></td>
    </tr>       
</table>
<table 
    class="table table-green"
    style='margin-top: -1%'
>
  <thead>
    <tr>
      <th>Description</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>
            Test
        </td>
        <td>
            TEst 2
        </td>
    </tr>
  </tbody>
</table>
<table 
    class="table table-green"
    style='margin-top: -1%'
>
  <thead>
    <tr>
      <th>Description</th>
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
                id='total'
                placeholder="0"
                disabled
            />            
        </td>
        <td>
            <button class='btn btn-success' id='btnSaveRow'><i class="fas fa-check-circle"></i></button>
            <button class='btn btn-danger' id='btnDeleteRow'><i class="fas fa-trash"></i></button>
            <button class='btn btn-primary' id='btnSaveRealization'><i class="fas fa-save"></i> Save Realization</button>
        </td>
    </tr>
  </tbody>
</table>
<div style='margin-top: -1%; overflow-y: auto; height: 230px;'>
    <table class='table table-hover table-bordered'>
      <tbody style='cursor: pointer;' id='realizationDetail'>
      </tbody>
      <tfoot>
        <tr>
            <td colspan="3" class="text-right">PPN</td>
            <td style='width: 25%'>
                <input 
                    type="number" 
                    id="ppn"
                    class='form-control'
                    value="<?php echo $data['ppn'] ?>"
                />
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-right">Grand Total</td>
            <td style='width: 25%' class='text-right'>
                <input 
                    type="number" 
                    id='grand_total'
                    class='d-none'
                    value="<?php echo $data['total'] ?>"
                />
                <span id='display_grand_total'>
                    <?php echo 'Rp. ' . $data['total'] ?>
                </span>            
            </td>
        </tr>
      </tfoot>
    </table>
</div>
<script src="assets/js/realization/form.js"></script>