<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "SELECT * FROM users WHERE id = '$id'";
    $datas = $conn->query($query);    
    $user = $datas->fetch_assoc();
?>
<a href='index.php?page=users' class="btn btn-primary mb-2 float-right">List User</a>
<table class='table'>
    <tr>
        <th>Username</th>
        <td>
            <?php echo $user['username'] ?>
        </td>
    </tr>
    <tr>
        <th>Role</th>
        <td>
            <?php echo $user['role'] ?>
        </td>
    </tr>    
</table>