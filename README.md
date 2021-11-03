# php-blog

Hi there,

Thank you for your interest in my project. The goal of the project is to build a professional blog application from stretch with php and mysql database and apply it with a MVC framework. The project is part of my PHP/Symfony course via OpenClassrooms.

![project5pic1](https://user-images.githubusercontent.com/87466842/140088382-e5318e92-4077-42f2-a9c0-97b6f1f99e9f.png)
<p align="center">frontpage</p>

![project5pic4](https://user-images.githubusercontent.com/87466842/140088570-752ac9ac-e47e-4852-8ecc-db6b8e3c4019.png)
<p align="center">administration page</p>

<h2>Features</h2>
<li>A user registration system that handles normal users.<br></li>
<li>A user password reset system.<br></li>
<li>An automatic response system when receiving a message from the contact form.<br></li>
<li>The blog will have an administration area and a public area.<br></li>
<li>The administration area will only be accessible to logged in administrator users and the public area to normal logged in users and the general public.<br></li>

<h3>Administrator :</h3>
<li>Can create, view, update, publish and delete any article.<br></li>
<li>Can also view, create,validate and delete comments.<br></li>
<li>Can change the role of a user (Administrator/normal user) and delete a user.<br></li>

<h3>Normal user :</h3>
<li>Can leave a comment on articles. However, comments will only be displayed after validation by the administrator.<br></li>

<h2>Prequisites</h2>
<li>PHP > 7.4.9<br></li>
<li>Local server, e.g. XAMPP/WAMP for local use (mail can work on Gmail if you disable Gmail 2-step verification and enable less secure applications in the Gmail security form).<br></li>
<li>MySQL DBMS such as phpMyAdmin<br></li>
<li>Libraries will be installed using Composer (PHP Mailer, Dotenv).<br></li>
<li>CSS libraries are called directly via CDN (Bootstrap 5.0.2, Font Awesome 5).<br></li>

<h2>Starting the application</h2>
You can run the application on your computer for development and testing purposes by following the simple steps below:<br>

<h3>Installation</h3>

<h4>Step1 Clone / Download</h4>
Clone the repository of this page. Move the "project5PhpBlog" folder to your local PHP development environment.

<h4>Step 2 Database</h4>
Create a new database and import the file P5_php_database.sql into the new database.

<h4>Step 3 Install all dependencies</h4>
Install Composer if you do not have it yet. All dependencies must be installed in a vendor directory.

<h4>Step 4 .Env file</h4>
Create an .env file and copy the text below into your file and modify it as required and place the file in the vendor folder.<br>
<br>
#SMTP configuration to send mail<br>
MAIL_HOST = <br>
MAIL_PORT = <br>
MAIL_USERNAME = <br>
MAIL_PASSWORD= <br>
<br>
#Your database configuration<br>
DB_NAME=<br>
DB_USER=<br>
DB_PASSWORD=<br>
DB_HOST=<br>
<br>
<hr>

You can use the following administrator account to test the blog, or you could simply create your own one!<br>
<br>
Username: administratorSample<br>
Password: Aa12345678<br>
<br>
Enjoy!<br>
<br>
ChingYi P.C
