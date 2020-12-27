<?php
  require "helpers/get_data_from_db.php";

  $lastId = getLastId('payments');

  $data = array(
    'id'    => $lastId + 1,
    'doc_num' => '',
    'total' => '',
    'description' => '',
    'pic_name' => '',
    'division' => '',
  );

  $id = isset($_GET['id']) ? $_GET['id'] : 0;
  $title = $id == 0 ? 'Add Payment' : 'Edit Payment';
  if($id) {
    $query = "SELECT * FROM payments WHERE id = '$id'";
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
        <th>ID Payment</th>
        <td>
            <?php echo $data['id']; ?>
        </td>
        <th>Realization</th>
        <td>
            <select 
                class="form-control" 
                id='realization'
            >
                <option value="">-- Select Realization --</option>
                <?php
                    $realization_query = "SELECT * FROM realizations WHERE status = 'Open' AND is_deleted = 0";
                    $realization = $conn->query($realization_query);
                    if ($realization->num_rows > 0):
                        while ($realization_row = $realization->fetch_assoc()):		      				
                ?>
                    <option value="<?php echo $realization_row['id']; ?>">
                        <?php echo $realization_row['doc_num']; ?>
                    </option>
                <?php
                        endwhile;
                    endif;
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <th>Cash Advance</th>
        <td>
            <input type="hidden" id="cash_advance_id" />
            <input type="text" id="cash_advance" class="form-control" disabled />
        </td>
        <th>NIK Karyawan</th>
        <td>
            <input type="text" id="nik_karyawan" class="form-control" disabled />
        </td>    
    </tr>    
    <tr>
        <th>Created Date</th>
        <td>
            <input type="text" id="realization_created_date" class="form-control" disabled />
        </td>
        <th>Modified Date</th>
        <td>
            <input type="text" id="realization_modified_date" class="form-control" disabled />
        </td>
    </tr>
    <tr>
        <th>Payment Type</th>
        <td>
            <select type="text" id="payment_type" class="form-control">
                <option value=''>-- Select Payment Type --</option>
                <option value='cash'>Cash</option>
                <option value='transfer'>Transfer</option>
            </select>
        </td>
        <th>Bank</th>
        <td>
            <input type="text" id="bank" class="form-control" />
        </td>
    </tr>
    <tr>
        <th>Account Number</th>
        <td>
            <input type="text" id="account_number" class="form-control" />
        </td>
        <th>Account Name</th>
        <td>
            <input type="text" id="account_name" class="form-control" />
        </td>
    </tr>
    <tr>
        <th>Amount</th>
        <td>
            <input type="number" min="0" id="amount" class="form-control" />
        </td>
        <th></th>
        <td></td>
    </tr>    
</table>
<button class='btn btn-primary' id='btnSavePayment'><i class="fas fa-save"></i> Save Payment</button>
<a href='index.php?page=payments' class='btn btn-secondary'><i class="fas fa-arrow-left"></i> Cancel</a>

<script src="assets/js/payments/form.js"></script>