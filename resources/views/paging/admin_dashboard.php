<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'nama_database');

// Proses tambah/edit/hapus data tiket
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_ticket'])) {
        $nama_tiket = $_POST['nama_tiket'];
        $harga = $_POST['harga'];
        $kuota = $_POST['kuota'];
        $query = $conn->prepare("INSERT INTO tiket (nama_tiket, harga, kuota) VALUES (?, ?, ?)");
        $query->bind_param('sii', $nama_tiket, $harga, $kuota);
        $query->execute();
    } elseif (isset($_POST['delete_ticket'])) {
        $ticket_id = $_POST['ticket_id'];
        $query = $conn->prepare("DELETE FROM tiket WHERE id = ?");
        $query->bind_param('i', $ticket_id);
        $query->execute();
    }
}

$tiket = $conn->query("SELECT * FROM tiket");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <h2>Manage Tickets</h2>
    <form method="POST" action="">
        <input type="text" name="nama_tiket" placeholder="Ticket Name" required>
        <input type="number" name="harga" placeholder="Price" required>
        <input type="number" name="kuota" placeholder="Quota" required>
        <button type="submit" name="add_ticket">Add Ticket</button>
    </form>
    <ul>
        <?php while ($row = $tiket->fetch_assoc()): ?>
            <li>
                <?= $row['nama_tiket'] ?> - <?= $row['harga'] ?> - <?= $row['kuota'] ?>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="ticket_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="delete_ticket">Delete</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
