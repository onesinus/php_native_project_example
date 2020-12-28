<h3 class="text-center">Cash Advance Report</h3>

<table class='table'>
    <tr>
        <th>Date</th>
        <td>
            <input class='form-control col-md-4' type="date" id="filter_date">
        </td>
        <th>Status</th>
        <td>
            <select id="filter_status" class='form-control'>
                <option value="All">All</option>
                <option value="Open">Open</option>
                <option value="APPV">APPV</option>
                <option value="Paid">Paid</option>
                <option value="Closed">Closed</option>
            </select>
        </td>
    </tr>    
</table>
<table 
    class="table table-green"
>
    <thead>
        <tr>
            <th>Number</th>
            <th>Description</th>
            <th>Total</th>
            <th>Status</th>
            <th>Created Date</th>
        </tr>
    </thead>
    <tbody id="reportData">
        <tr>
            <td colspan="5" class='text-center'>
                No Data
            </td>
        </tr>
    </tbody>
</table>
<script src="assets/js/reports/cash_advances.js"></script>
