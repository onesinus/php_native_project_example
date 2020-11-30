<?php
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "SELECT * FROM users WHERE id = '$id'";
    $datas = $conn->query($query);    
    $user = $datas->fetch_assoc();
?>
<a href='index.php?page=users' class="btn btn-primary mb-2 float-right">List User</a>
<h1 class='text-center'>Detail User</h1>
<table class='table'>
    <tr>
        <th>Username</th>
        <td>
            <?php echo $user['username'] ?>
        </td>
    </tr>
    <tr>
        <th>NIK Karyawan</th>
        <td>
            <?php echo $user['nik'] ?>
        </td>
    </tr>    
    <tr>
        <th>Jabatan</th>
        <td>
            <?php echo $user['jabatan'] ?>
        </td>
    </tr>    
    <tr>
        <th>Hak Akses</th>
        <td>
            <?php echo $user['role'] ?>
        </td>
    </tr>    
</table>