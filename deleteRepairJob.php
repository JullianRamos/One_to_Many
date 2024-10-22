<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (isset($_GET['job_id'])) {
    deleteRepairJob($pdo, $_GET['job_id']);
    header("Location: viewRepairJobs.php?technician_id=" . $_GET['technician_id']);
    exit;
}
?>