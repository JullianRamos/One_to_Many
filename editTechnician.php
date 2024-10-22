<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Technician</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getTechnicianByID = getTechnicianByID($pdo, $_GET['technician_id']); ?>
	<h1>Edit the Technician!</h1>
	<form action="core/handleForms.php?technician_id=<?php echo $_GET['technician_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getTechnicianByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getTechnicianByID['last_name']; ?>">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getTechnicianByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="specialization">Specialization</label> 
			<input type="text" name="specialization" value="<?php echo $getTechnicianByID['specialization']; ?>">
		</p>
		<p>
			<input type="submit" name="editTechnicianBtn" value="Update Technician">
		</p>
	</form>
</body>
</html>