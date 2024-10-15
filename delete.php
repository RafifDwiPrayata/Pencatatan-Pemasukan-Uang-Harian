<?php
require 'db.php';
$id = $_GET['id'];
$stmt = $db->prepare("DELETE FROM personal_contacts WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
?>
