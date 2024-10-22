<?php 
require_once __DIR__ . '/../core/dbConfig.php';  
require_once __DIR__ . '/../core/models.php';   

// Inserting a new repair technician
if (isset($_POST['insertTechnicianBtn'])) {
    if (insertTechnician($pdo, $_POST['username'], $_POST['firstName'], $_POST['lastName'], $_POST['dateOfBirth'], $_POST['specialization'])) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Insertion failed";
    }
}

// Editing a repair technician
if (isset($_POST['editTechnicianBtn'])) {
    if (updateTechnician($pdo, $_POST['firstName'], $_POST['lastName'], $_POST['dateOfBirth'], $_POST['specialization'], $_GET['technician_id'])) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Edit failed";
    }
}

// Deleting a repair technician
if (isset($_POST['deleteTechnicianBtn'])) {
    if (deleteTechnician($pdo, $_GET['technician_id'])) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Deletion failed";
    }
}

// Inserting a new repair job
if (isset($_POST['insertRepairJobBtn'])) {
    if (insertRepairJob($pdo, $_POST['clientName'], $_POST['mouseModel'], $_POST['repairDescription'], $_POST['technician_id'])) {
        header("Location: ../viewRepairJobs.php?technician_id=" . $_POST['technician_id']);
        exit;
    } else {
        echo "Insertion failed";
    }
}

// Editing a repair job
if (isset($_POST['editRepairJobBtn'])) {
    if (updateRepairJob($pdo, $_POST['clientName'], $_POST['mouseModel'], $_POST['repairDescription'], $_POST['status'], $_GET['job_id'])) {
        header("Location: ../viewRepairJobs.php?technician_id=" . $_GET['technician_id']);
        exit;
    } else {
        echo "Update failed";
    }
}

// Deleting a repair job
if (isset($_POST['deleteRepairJobBtn'])) {
    if (deleteRepairJob($pdo, $_GET['job_id'])) {
        header("Location: ../viewRepairJobs.php?technician_id=" . $_GET['technician_id']);
        exit;
    } else {
        echo "Deletion failed";
    }
}
?>