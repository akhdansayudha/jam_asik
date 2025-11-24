<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $tanggal_masuk = mysqli_real_escape_string($conn, $_POST['tanggal_masuk']);
    $nama_vendor = mysqli_real_escape_string($conn, $_POST['nama_vendor']);
    
    $sql = "UPDATE barang SET 
            nama_barang='$nama_barang', 
            tanggal_masuk='$tanggal_masuk', 
            nama_vendor='$nama_vendor' 
            WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

$sql = "SELECT * FROM barang WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Barang</h1>
        
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama_barang" value="<?php echo htmlspecialchars($row['nama_barang']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tanggal Masuk:</label>
                <input type="date" name="tanggal_masuk" value="<?php echo $row['tanggal_masuk']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nama Vendor:</label>
                <input type="text" name="nama_vendor" value="<?php echo htmlspecialchars($row['nama_vendor']); ?>" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
