<?php
try {
    $db = new PDO('sqlite:pemasukan.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS personal_contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        name TEXT, 
        phone TEXT)");
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
?>
