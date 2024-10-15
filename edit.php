<?php require 'db.php'; ?>
<?php
$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM personal_contacts WHERE id = ?");
$stmt->execute([$id]);
$contact = $stmt->fetch(PDO::FETCH_ASSOC);

$dateValue = date('Y-m-d', strtotime($contact['name']));

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $stmt = $db->prepare("UPDATE personal_contacts SET name = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $phone, $id]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
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
        <h1>Edit Catatan Pemasukan</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <input type="date" name="name" value="<?php echo $dateValue; ?>" required>
            <input type="number" name="phone" value="<?php echo $contact['phone']; ?>" required>
            <button type="submit" name="submit">Update</button>
        </form>
        <a href="index.php"><button class="back-button">Kembali</button></a>
    </div>
</body>

</html>
