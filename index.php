<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouse Repair Services - Technician Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Mouse Repair Services</h1>
        <h2>Add New Technician</h2>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="username">Username</label> 
                <input type="text" name="username" required>
            </p>
            <p>
                <label for="firstName">First Name</label> 
                <input type="text" name="firstName" required>
            </p>
            <p>
                <label for="lastName">Last Name</label> 
                <input type="text" name="lastName" required>
            </p>
            <p>
                <label for="dateOfBirth">Date of Birth</label> 
                <input type="date" name="dateOfBirth" required>
            </p>
            <p>
                <label for="specialization">Specialization</label> 
                <input type="text" name="specialization" required>
            </p>
            <p>
                <input type="submit" name="insertTechnicianBtn" value="Add Technician">
            </p>
        </form>
        
        <h2>Technicians List</h2>
        <?php $technicians = getAllTechnicians($pdo); ?>
        <ul>
            <?php foreach ($technicians as $technician): ?>
            <li>
                <?php echo htmlspecialchars($technician['username']); ?> - 
                <a href="viewRepairJobs.php?technician_id=<?php echo $technician['technician_id']; ?>">View Jobs</a> |
                <a href="editTechnician.php?technician_id=<?php echo $technician['technician_id']; ?>">Edit</a> |
                <a href="deleteTechnician.php?technician_id=<?php echo $technician['technician_id']; ?>">Delete</a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>