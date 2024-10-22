<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Repair Jobs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <a href="index.php">Return to home</a>
        <?php 
        $getTechnicianInfo = getTechnicianByID($pdo, $_GET['technician_id']); 
        ?>
        <h1>Technician: <?php echo htmlspecialchars($getTechnicianInfo['username']); ?></h1>
        <h2>Add New Repair Job</h2>
        <form action="core/handleForms.php?technician_id=<?php echo $_GET['technician_id']; ?>" method="POST">
            <p>
                <label for="clientName">Client Name</label> 
                <input type="text" name="clientName" required>
            </p>
            <p>
                <label for="mouseModel">Mouse Model</label> 
                <input type="text" name="mouseModel" required>
            </p>
            <p>
                <label for="repairDescription">Repair Description</label> 
                <textarea name="repairDescription" required></textarea>
            </p>
            <input type="hidden" name="technician_id" value="<?php echo $_GET['technician_id']; ?>">
            <p>
                <input type="submit" name="insertRepairJobBtn" value="Add Repair Job">
            </p>
        </form>

        <h2>Repair Jobs</h2>
        <table>
          <tr>
            <th>Job ID</th>
            <th>Client Name</th>
            <th>Mouse Model</th>
            <th>Repair Description</th>
            <th>Status</th>
            <th>Date Added</th>
            <th>Action</th>
          </tr>
          <?php $repairJobs = getRepairJobsByTechnician($pdo, $_GET['technician_id']); ?>
          <?php foreach ($repairJobs as $job): ?>
          <tr>
            <td><?php echo htmlspecialchars($job['job_id']); ?></td>	  	
            <td><?php echo htmlspecialchars($job['client_name']); ?></td>	  	
            <td><?php echo htmlspecialchars($job['mouse_model']); ?></td>	  	
            <td><?php echo htmlspecialchars($job['repair_description']); ?></td>	  	
            <td><?php echo htmlspecialchars($job['status']); ?></td>
            <td><?php echo htmlspecialchars($job['date_added']); ?></td>
            <td>
                <a href="editRepairJob.php?job_id=<?php echo $job['job_id']; ?>&technician_id=<?php echo $_GET['technician_id']; ?>">Edit</a>
                <a href="deleteRepairJob.php?job_id=<?php echo $job['job_id']; ?>&technician_id=<?php echo $_GET['technician_id']; ?>">Delete</a>
            </td>	  	
          </tr>
          <?php endforeach; ?>
        </table>
    </div>
</body>
</html>