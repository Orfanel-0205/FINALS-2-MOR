Automated Electronic Voting System
This project is a web-based electronic voting system developed using CodeIgniter 4. It provides a secure platform for conducting elections with role-based access for admin and voters.

Features
User authentication (login/logout)

Admin dashboard to manage elections and candidates

Voter dashboard to view ongoing elections and cast votes

One vote per user per election

Real-time vote count display after election ends

Role-based access control (admin and voter)

Input validation and CSRF/XSS protection

Responsive UI with basic CSS styling

Technologies Used
PHP (CodeIgniter 4)

MySQL (phpMyAdmin)

HTML, CSS, JavaScript

MVC Design Pattern

Database Structure
The following tables are used:

users – stores user info (username, password, role)

elections – holds election data (title, description, time)

candidates – candidates linked to specific elections

votes – stores voting records

Foreign key constraints ensure relational integrity.

Roles
Admin can:

Create, update, and delete elections

Add and manage candidates

View vote results

Voter can:

View ongoing elections

Vote once per election

View results after elections

Installation Instructions
Clone the repository:

bash
Copy
Edit
git clone https://github.com/your-username/electronic-voting-system.git
Move the project to your web server root:

Example for XAMPP:

bash
Copy
Edit
C:/xampp/htdocs/FINALS_2_MOR
Set up the database:

Create a database in phpMyAdmin (e.g., it0049db)

Import the provided it0049db.sql file

Update .env or app/Config/Database.php with your database credentials.

Run migrations (optional if already imported):

bash
Copy
Edit
php spark migrate
php spark db:seed AdminSeeder
Start the project in the browser:

bash
Copy
Edit
http://localhost/FINALS_2_MOR/login
Default Admin Account
Username: admin

Password: admin123

You can change this in the AdminSeeder or directly in the database (passwords are hashed using password_hash()).

Folder Structure
app/Controllers – Auth, Vote, and Admin controllers

app/Models – UserModel, ElectionModel, CandidateModel, VoteModel

app/Views – Separated by role (auth/, admin/, vote/)

public/assets/css/style.css – Basic design for UI elements

Security Practices
Passwords are hashed before storage

Sessions are secured using CodeIgniter session handling

Filters are used to restrict access to protected routes

CSRF tokens are included in forms

User inputs are validated and escaped

Sample Screens
Login page

Admin election dashboard

Voter election list and voting form

Vote results

Notes
Make sure mod_rewrite is enabled in Apache and .htaccess is correctly configured.

Routes are defined in app/Config/Routes.php.


