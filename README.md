Registration and Login Website
---

This project is a simple registration and login system built using PHP, HTML, and CSS, designed to run on a local development environment using XAMPP.

**Table of Contents:**
- Description
- Setup instructions
- Pages
- Technologies Used
- Usage
- Preview

---

**Description**

This website allows users to register, login securely and access personalized content upon authentication. It features a user-friendly interface designed for seamless navigation and includes security measures to safeguard user data.

___

**Setup instructions**
1. Install XAMPP (https://www.apachefriends.org/download.html) on your computer.
2. Launch the XAMPP Control Panel.
3. Download this project and paste it in xampp/htdocs.
4. Start the Apache server and MySQL database.
5. Create the database
   
   a) Open a web browser and go to http://localhost/phpmyadmin/
   
   b) Click on Databases and create a new database: **loginregister**
   
   c) Click on the SQL tab

   d) Copy and paste the following:
   
				CREATE TABLE `users` (
				  `id_person` int(11) NOT NULL AUTO_INCREMENT,
				  `fname` varchar(128) NOT NULL,
				  `lname` varchar(128) NOT NULL,
				  `email` varchar(255) NOT NULL,
				  `username` varchar(128) NOT NULL,
				  `password` varchar(255) NOT NULL,
				  PRIMARY KEY (`id_person`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
   
    e) Click on 'Go' and your database and table are set

___

**Pages**

There are 4 pages included:

- **Register (registration-form.php)**: Allows the user to enter information such as First Name, Last Name, Email, Username and Password.
  
  		--> While registering, the user must enter an email in the valid format.

		--> The password must be at least 8 characters long.
  
  		--> The password must contain at least one lowercase letter, one uppercase letter, one number and one special character.
  
  		--> The user cannot reuse the email or username to create another account.
  
  		--> The password is hashed in the database and salted.
  
- **Registered (registered.php)**: Notifies the user that the registration is successful.
- **Login (login-form.php)**: Allows the user to enter the E-mail and Password that were used during registration.
  		The credentials must match so that the user can gain access. Otherwise the user gets notified with a message 'Wrong credentials'.
- **Welcome (welcome.php)**: The user gets redirected to this page after successful authorization.

___

**Technologies Used**
- **PHP**: Used for backend logic, handling server-side operations, and interacting with the database.
- **HTML**: Used for creating the structure and content of web pages.
- **CSS**: Used for styling the HTML elements to enhance the visual presentation of the web pages.

___

**Usage**

Open the registration-form.php in your preffered browser by typing: **localhost/path_to_the_file/registration-form.php**

After the registration you will automatically be redirected to the Registered page. You can then click on the Log in button to login which will then redirect you to the Welcome page.

___

**Preview**

If You want to view the web page design without the backend logic, you can simply open registration-form.html or login-form.html in your preffered web browser.
