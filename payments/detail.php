<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "
        SELECT 
            p.*,
            r.doc_num r_doc_num,
            ca.description ca_description,
            u.nik 
        FROM payments p
        INNER JOIN realizations r
        ON r.id = p.realization_id
        INNER JOIN cash_advances ca
        ON ca.id = r.cash_advance_id
        INNER JOIN users u
        ON p.created_by = u.id
        WHERE 
            p.id = '$id'
    ";

    $datas = $conn->query($query) or die(mysqli_error($conn));
    $realization = $datas->fetch_assoc();
?>
<a href='index.php?page=payments' class="btn btn-primary mr-1 float-right">List Payment</a>
<h1 class='text-center'>Detail Payment</h1>
<table class='table'>
    <tr>
        <th>ID Payment</th>
        <td>
            <?php echo $realization['id'] ?>
        </td>
        <th>Realization</th>
        <td>
            <?php echo $realization['r_doc_num'] ?>
        </td>
    </tr>
    <tr>
        <th>Cash Advance</th>
        <td>
            <?php echo $realization['ca_description'] ?>            
        </td>
        <th>Amount</th>
        <td>
            <?php echo $realization['amount'] ?>
        </td>
    </tr>    
    <tr>
        <th>Payment Type</th>
        <td>
            <?php echo $realization['payment_type'] ?>            
        </td>
        <th>Bank</th>
        <td>
            <?php echo $realization['bank'] ?>
        </td>
    </tr>    
    <tr>
        <th>Account Number</th>
        <td>
            <?php echo $realization['account_number'] ?>            
        </td>
        <th>Account Name</th>
        <td>
            <?php echo $realization['account_name'] ?>
        </td>
    </tr>    
</table>