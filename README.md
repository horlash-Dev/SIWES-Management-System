SIWES MANAGEMENT SYSTEM

installation

PLEASE HAVE A XAMPP/WAMMP SEVER RUNNING ON YOUR LOCAL PC 

ACCESS THE PROJECT DIRECTORY FOLDER THROUH YOUR BROWSER 

CREATE YOUR DATABASE { siwes_management } ON YOUR LOCAL MACHINE THROUH XAMMP SEVER 

IMPORT THE SQL DATABASE FILE TO YOUR CREATED DATABASE THEN START.

LOGIN THE ADMIN DETAILS AND RUN THE SYSTEM.

NOTE: LOCATE THE PROJECT DIRECTORY AND LOCATE includes folder/ config/ database to modify the database settings.

database settings below:
    private $host= "localhost";
	private $username= "root"; 
	private $token= "";
	private $database= "siwes_management";


SIWES MANAGEMENT SYSTEM

	This project is basically based on The Relationship between Institution Research students and Its Supervisor(Lecturer).

	As we know that a Research students  will need to be attached to a supervisor to Inspect its research Outcome. 

	How it works
	This application is mainly for 	Attaching a supervisor to a students within it region or the same state as the lecturer's. 

	Basically the system have the students dashboard were all is details will displayed and its important for a student to fill is details i.e department, matric id, fullname and so on...
	this being done the system will recognize him/her as a Research students and match him with the most suitable supervisor  accordiing to his submitted details most importantly (Student Department) & ADMIN can also modify and match the students to another supervisor.

	Supervisor Dashboard 
	All supervisor acccount will be created by the admin with it details and the login details will be provided as follows

	 Note: Email is been used to create the supervisor account and the password will be auto-generated by the system 
	 i.e 
	 email:   davidmarkson@mail.com
	 password: siwes.app.davidmarkson

	 all supervisor are expected to login to their dashboard with their email and the password pattern above.
	 (siwes.app.email string without the @mail.com / siwes.app.myemail).

	 Signing In to their dahboard to access their details.
	 A notification bar is available on both student & supervisor dashboard to notify them once the admin has assigned any supervisor to any student in the same region. 

Application Features
	This application was developed with PHP(OOP/PDO) and Mysql database as the backend
	stacks used are listed below
	HTML/CSS
	BOOTSTRAP 3
	MYSQL / MYSQL LITE

	Application Modules:
	User Management
	Admin Module 
	Supervisor Module / Approval Panel
	Student Module
	Authentication system

	ADMIN
	admin has all access to user & supervisor details and system modules as said above the admin has the ability to create a supervisor and fill/update is details. 

	once a students is recognized by the system then the admin will  be able to match him to any available supervisor in the available region.

	A student can be attached to a supervisor and also detached easily, furthermore a supervisor can be asssigned many students as preffered by the admin.
	Once this occur both users will be notify on their dashboard.

	note : The student can easily signup on the site registration page.
			the same login page is used by the admin,students and supervisor.

	CHECK OUT ADMIN LOGIN DETAILS AT A FILE NAMED admin.txt
