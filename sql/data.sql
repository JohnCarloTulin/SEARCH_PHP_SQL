create table bike_store_applicants (
	id INT AUTO_INCREMENT PRIMARY KEY,
	desired_job VARCHAR(255),
	applicant_first_name VARCHAR(255),
	applicant_last_name VARCHAR(255),
	gender VARCHAR(255),
	address VARCHAR(255),
	email VARCHAR(255),
	nationality VARCHAR(255),
	additional_skills VARCHAR(255),
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);