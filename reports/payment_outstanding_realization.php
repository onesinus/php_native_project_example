<h3 class="text-center">Payment Outstanding Realization</h3>

<table class='table'>
    <tr>
        <th>From</th>
        <td>
            <input class='form-control col-md-6' type="date" id="from_date">
        </td>
        <th>To</th>
        <td>
            <input class='form-control col-md-6' type="date" id="to_date">
        </td>
    </tr>    
</table>
<table 
    class="table table-green"
>
    <thead>
        <tr>
        <th>Number</th>
        <th>Total</th>
        <th>Status</th>
        <th>Created Date</th>
        </tr>
    </thead>
    <tbody id="reportData">
        <tr>
            <td colspan="4" class='text-center'>
                No Data
            </td>
        </tr>
    </tbody>
</table>
<script src="assets/js/reports/payment_outstanding_realization.js"></script>
