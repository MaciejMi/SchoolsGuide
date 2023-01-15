<?php
$content = $_POST['content'] ?? NULL;
$type = $_POST['type'] ?? NULL;
require './connection.php';

$query_str = "SELECT schools.id FROM schools WHERE schools.name LIKE '%{$content}%'";
$query = $conn->query($query_str);
$result = $query->fetch();

if ($result) {
    header("Location: ../school.php?id={$result[0]}");
} else {

    if ($type == 0) {
        header("Location: ../high_schools.php");
    } else {
        header("Location: ../technical_schools.php");
    }
}
?>