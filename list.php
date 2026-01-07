<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>

</head>

<body>
    <h2>Data Mahasiswa</h2>
    <a href="index.php">Tambah Data</a><br><br>

    <table>
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$no++ . "</td>";
            echo "<td>".htmlspecialchars($row['nim']) . "</td>";
            echo "<td>".htmlspecialchars($row['nama']) . "</td>";
            echo "<td>".htmlspecialchars($row['email']) . "</td>";
            echo "<td>";

            if($row['foto']) {
                echo "<img src='uploads/".htmlspecialchars($row['foto'])."' alt='Foto Mahasiswa'>";
            } else {
                echo "Tidak ada foto";
            }
            echo "</td>";
            echo "<td>
            <a href='edit.php?id=".$row['id']."'>Edit</a> |
            <a href='hapus.php?id=".$row['id']."' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>