<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Uang Harian</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #F8E8EE;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #F2BED1;
            color: white;
            padding: 40px 20px;
            margin-bottom: 5%;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .saldo {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #F2BED1;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        a {
            text-decoration: none;
            color: #F2BED1;
        }

        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 15px;
            background-color: #F2BED1;
            color: white;
            border-radius: 5px;
        }

        a:hover {
            background-color: #b38d9b;
        }
    </style>
</head>

<body>
    <header>
        <h1>Daftar Catatan Uang Harian</h1>
    </header>

    <section>
        <div class="container">

            <?php
            $stmt = $db->query("SELECT SUM(phone) AS total_saldo FROM personal_contacts");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total_saldo = $row['total_saldo'] ? $row['total_saldo'] : 0;
            ?>
            <div class="saldo">
                Total Saldo: Rp <?= number_format($total_saldo, 0, ',', '.') ?>
            </div>

            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah Pemasukan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $stmt = $db->query("SELECT * FROM personal_contacts");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $formattedDate = date('d-m-Y', strtotime($row['name']));
                    echo "<tr><td>{$formattedDate}</td><td>Rp " . number_format($row['phone'], 0, ',', '.') . "</td>
                    <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> 
                        <span style='margin: 0 10px;'>|</span> 
                        <a href='delete.php?id={$row['id']}'>Hapus</a>
                    </td></tr>";
                }
                

                ?>
            </table>
            <a href="add.php">Tambah Catatan</a>
        </div>
    </section>
</body>

</html>
