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
    'total'   => 0,
    'difference'   => 0
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $title = $id == 0 ? 'Add Realization' : 'Edit Realization';
  if($id) {
    $query = "SELECT * FROM realizations WHERE id = '$id'";
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
<input type="hidden" id="total_ca">
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
                    $ca_query = "SELECT * FROM cash_advances WHERE status = 'APPV' AND is_deleted = 0";
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
        <th>Nama PIC</th>
        <td>
            <input type="text" id="pic_name" class="form-control" disabled />
        </td>    
        <th>Divisi</th>
        <td>
            <input type="text" id="division" class="form-control" disabled />
        </td>
    </tr>    
    <tr>
        <th>Created Date</th>
        <td>
            <input type="text" id="ca_created_date" class="form-control" disabled />
        </td>
        <th>Modified Date</th>
        <td>
            <input type="text" id="ca_modified_date" class="form-control" disabled />
        </td>
        <th>Berkas</th>
        <td>
            <a id="file"></a>
        </td>
        <th></th>
        <td></td>
    </tr>       
</table>
<table 
    class="table table-green"
    style='margin-top: -1%;  overflow-y: auto; height: 10px;'
    id="caDetail"
>
  <thead>
    <tr>
      <th>Description</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td colspan="2" class='text-center'>No CA Selected</td>
    </tr>
  </tbody>
</table>
<table 
    class="table table-green"
    style='margin-top: -1%;'
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
<div style='margin-top: -1.2%; overflow-y: auto; height: 150px;'>
    <table class='table table-hover table-bordered'>
      <tbody style='cursor: pointer;' id='realizationDetail'>
      </tbody>
      <tfoot>
        <tr>
            <td class="text-right">Total</td>
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
        <tr>
            <td class="text-right">Selisih</td>
            <td style='width: 25%' class='text-right'>
                <input 
                    type="number" 
                    id='difference'
                    class='d-none'
                    value="<?php echo $data['difference'] ?>"
                />            
                <span id='display_difference'>
                    <?php echo 'Rp. ' . $data['difference'] ?>
                </span>
            </td>
        </tr>
      </tfoot>
    </table>
</div>
<script src="assets/js/realizations/form.js"></script>