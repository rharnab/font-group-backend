//========================================================================================
### For makeing a database please create this table with name of database "font_group_system"
### Please customize your field size if needed. 

CREATE TABLE fonts (
id INT AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255),
font_name VARCHAR(255),
file_path VARCHAR(255),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE font_groups (
id INT AUTO_INCREMENT PRIMARY KEY,
group_title VARCHAR(255),
font_names VARCHAR(255),
font_ids VARCHAR(100),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


