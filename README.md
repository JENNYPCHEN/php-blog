# php-blog

Hi there,

Thank you for your interest in my project. The goal of the project is to build a professional blog application from stretch with php and mysql database and apply it with a MVC framework. The project is part of my PHP/Symfony course via OpenClassrooms.

Features

A user registration system that handles normal users.
A user password reset system.
An automatic response system when receiving a message from the contact form.
The blog will have an administration area and a public area.
The administration area will only be accessible to logged in administrator users and the public area to normal logged in users and the general public.

Administrator :
Can create, view, update, publish and delete any article.
Can also view, create,validate and delete comments.
Can change the role of a user (Administrator/normal user) and delete a user.

Normal user :
Can leave a comment on articles. However, comments will only be displayed after validation by the administrator.

PREQUISITES
PHP > 7.4.9
Local server, e.g. XAMPP/WAMP for local use (mail can work on Gmail if you disable Gmail 2-step verification and enable less secure applications in the Gmail security form).
MySQL DBMS such as phpMyAdmin
Libraries will be installed using Composer (PHP Mailer, Dotenv).
CSS libraries are called directly via CDN (Bootstrap 5.0.2, Font Awesome 5).


Starting the application
You can run the application on your computer for development and testing purposes by following the simple steps below:

INSTALLATION

Step1 Clone / Download
Clone the repository of this page. Move the "project5PhpBlog" folder to your local PHP development environment.

Step 2 Database
Create a new database and import the file P5_php_database.sql into the new database.

Step 3 Install all dependencies
Install Composer if you do not have it yet. All dependencies must be installed in a vendor directory.

Step 4 .Env file
Create an .env file and copy the text below into your file and modify it as required and place the file in the vendor folder.

#SMTP configuration to send mail
MAIL_HOST = 
MAIL_PORT = 
MAIL_USERNAME = 
MAIL_PASSWORD= 

#Your database configuration
DB_NAME=
DB_USER=
DB_PASSWORD=
DB_HOST=


You can use the following administrator account to test the blog, or you could simply create your own one!
Username: administratorSample
Password: Aa12345678

Enjoy!

