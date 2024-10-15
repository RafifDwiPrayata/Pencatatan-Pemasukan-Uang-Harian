<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan</title>

    <style>
        body {
            background-color: #F8E8EE;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background-color: #F2BED1;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: white;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="date"],
        input[type="number"],
        button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="date"]:focus,
        input[type="number"]:focus {
            border-color: #ff6347;
        }

        button {
            background-color: #FDCEDF;
            color: white;
            border: 2px solid white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: white;
            color: #FDCEDF;
            border: 2px solid #FDCEDF;
        }

        .back-button {
            background-color: #FDCEDF;
            border: 2px solid white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: white;
            color: #FDCEDF;
            border: 2px solid #FDCEDF;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Tambah Catatan Pemasukan</h1>
        <form action="add.php" method="post">
    <input type="date" name="name" placeholder="Tanggal Pemasukan" required>
    <input type="number" name="phone" placeholder="Jumlah Pemasukan" required>
    <button type="submit" name="submit">Simpan</button>
</form>


        <div class="align-right">
            <a href="index.php">
                <button class="back-button">Kembali</button>
            </a>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $stmt = $db->prepare("INSERT INTO personal_contacts (name, phone) VALUES (?, ?)");
        $stmt->execute([$name, $phone]);
        header("Location: index.php");
    }
    ?>
</body>

</html>