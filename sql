CREATE TABLE repair_technicians (
   technician_id INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(50) NOT NULL,
   first_name VARCHAR(50) NOT NULL,
   last_name VARCHAR(50) NOT NULL,
   date_of_birth DATE,
   specialization TEXT,
   date_hired TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE repair_jobs (
   job_id INT AUTO_INCREMENT PRIMARY KEY,
   client_name VARCHAR(50) NOT NULL,
   mouse_model VARCHAR(50) NOT NULL,
   repair_description TEXT,
   status ENUM('Pending', 'In Progress', 'Completed', 'Cancelled') DEFAULT 'Pending',
   technician_id INT,
   date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (technician_id) REFERENCES repair_technicians(technician_id)
);
