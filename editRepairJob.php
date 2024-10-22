<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Repair Job</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <a href="viewRepairJobs.php?technician_id=<?php echo $_GET['technician_id']; ?>">View The Jobs</a>
        <h1>Edit the Repair Job!</h1>
        <?php $repairJob = getRepairJobByID($pdo, $_GET['job_id']); ?>
        <form action="core/handleForms.php?job_id=<?php echo $_GET['job_id']; ?>&technician_id=<?php echo $_GET['technician_id']; ?>" method="POST">
            <p>
                <label for="clientName">Client Name</label> 
                <input type="text" name="clientName" value="<?php echo htmlspecialchars($repairJob['client_name']); ?>" required>
            </p>
            <p>
                <label for="mouseModel">Mouse Model</label> 
                <input type="text" name="mouseModel" value="<?php echo htmlspecialchars($repairJob['mouse_model']); ?>" required>
            </p>
            <p>
                <label for="repairDescription">Repair Description</label> 
                <textarea name="repairDescription" required><?php echo htmlspecialchars($repairJob['repair_description']); ?></textarea>
            </p>
            <p>
                <label for="status">Status</label> 
                <select name="status">
                    <option value="Pending" <?php echo $repairJob['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="In Progress" <?php echo $repairJob['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                    <option value="Completed" <?php echo $repairJob['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="Cancelled" <?php echo $repairJob['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                </select>
            </p>
            <input type="hidden" name="technician_id" value="<?php echo $_GET['technician_id']; ?>">
            <p>
                <input type="submit" name="editRepairJobBtn" value="Update Job">
            </p>
        </form>
    </div>
</body>
</html>