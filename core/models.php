<?php  

function insertTechnician($pdo, $username, $first_name, $last_name, $date_of_birth, $specialization) {
    $sql = "INSERT INTO repair_technicians (username, first_name, last_name, date_of_birth, specialization) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$username, $first_name, $last_name, $date_of_birth, $specialization]);
}

function updateTechnician($pdo, $first_name, $last_name, $date_of_birth, $specialization, $technician_id) {
    $sql = "UPDATE repair_technicians SET first_name = ?, last_name = ?, date_of_birth = ?, specialization = ? WHERE technician_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$first_name, $last_name, $date_of_birth, $specialization, $technician_id]);
}

function deleteTechnician($pdo, $technician_id) {
    $pdo->prepare("DELETE FROM repair_jobs WHERE technician_id = ?")->execute([$technician_id]);
    $stmt = $pdo->prepare("DELETE FROM repair_technicians WHERE technician_id = ?");
    return $stmt->execute([$technician_id]);
}

function getAllTechnicians($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM repair_technicians");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getTechnicianByID($pdo, $technician_id) {
    $stmt = $pdo->prepare("SELECT * FROM repair_technicians WHERE technician_id = ?");
    $stmt->execute([$technician_id]);
    return $stmt->fetch();
}

function getRepairJobsByTechnician($pdo, $technician_id) {
    $stmt = $pdo->prepare("SELECT * FROM repair_jobs WHERE technician_id = ?");
    $stmt->execute([$technician_id]);
    return $stmt->fetchAll();
}

function insertRepairJob($pdo, $client_name, $mouse_model, $repair_description, $technician_id) {
    $stmt = $pdo->prepare("INSERT INTO repair_jobs (client_name, mouse_model, repair_description, technician_id) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$client_name, $mouse_model, $repair_description, $technician_id]);
}

function getRepairJobByID($pdo, $job_id) {
    $stmt = $pdo->prepare("SELECT * FROM repair_jobs WHERE job_id = ?");
    $stmt->execute([$job_id]);
    return $stmt->fetch();
}

function updateRepairJob($pdo, $client_name, $mouse_model, $repair_description, $status, $job_id) {
    $stmt = $pdo->prepare("UPDATE repair_jobs SET client_name = ?, mouse_model = ?, repair_description = ?, status = ? WHERE job_id = ?");
    return $stmt->execute([$client_name, $mouse_model, $repair_description, $status, $job_id]);
}

function deleteRepairJob($pdo, $job_id) {
    $stmt = $pdo->prepare("DELETE FROM repair_jobs WHERE job_id = ?");
    return $stmt->execute([$job_id]);
}
?>