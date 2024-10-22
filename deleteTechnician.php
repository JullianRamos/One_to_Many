<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (isset($_GET['technician_id'])) {
    deleteTechnician($pdo, $_GET['technician_id']);
    header("Location: index.php");
    exit;
}
?>