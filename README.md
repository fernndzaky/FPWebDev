<h1 align="center">
WADS Final Project
</h1>


<p align="center"><img src="public/assets/logo1.png" width="400"></p>

<p align="center">
Semester 4 Final Project Web Development and Security
</p>

About MINDER<br/>
Minder is a web application for musicians to find other musicians to fulfill their musical desire and to achieve their goal or even create a band with other outstanding musicians. <br/><br/>
MINDER Background & Problem<br/>
Our friend is a great guitarist with outstanding skill, but he often hard to find a fit for a band since his former band disbanded. As Computer Science students, we want to help him overcome that kind of problem.<br/><br/>
Documentation on how to deploy in Google Cloud Platform (GCP)<br/>
Create a Google Cloud Platform virtual machine.<br/>
Set up VM and take the ip from google cloud platform and add record of dns to cloudflare. <br/>
Open ssh server from GCP. <br/>
Clone all repositories needed from github to the server. <br/>
In the server, download all the extensions needed such as server, install the latest php, composer and etc.<br/>
Open the laravel folder, composer install, rename .env.example to .env, run php artisan key:generate to generate key for the env. Apply this step to all the laravel folders.<br/>
Create a Google Cloud SQL Instance, insert two databases namely “minder” and “minder2”.<br/>
Migrate databases using php artisan migrate to all the databases in the Google Cloud SQL.<br/>
Change the db name and db host in .env make a connection between the database in gcp <br/>
Add new SSL protection by using GCP IP in cloudflare.<br/>
Create a proxy pass to open the port for the frontend and the backends with sudo nano /etc/nginx/sites-available/default.<br/>
Change the name server between the web host with the cloudflare name server.<br/>
To deploy the web app in the server, use sudo  apt install screen, then call screen, and serve the background along with the port that are stated in the proxy pass, e.g. “php artisan serve --port=8000”. Apply this step to all the laravel folders needed.<br/>
Then the website is ready to go.<br/><br/>

Documentation on how to deploy in Localhost<br/>
Clone all the github needed to your computer.
Use “composer install” to install all dependencies.
Rename .env.example to .env
Rename the database name inside the .env file
Use “php artisan key:generate” to generate key for the .env
Create databases with the same name as the one that written in the .env
Use php artisan migrate in the back end laravel to import all the tables to the localhost sql
Use “php artisan serve” to run laravel projects on the local apache server, but keep in mind to run all the laravel projects on different ports, e.g. 8000, or 8001, and or 8002.
open the 127.0.0.1:[ port ] in the browser and you are good to go. 

Documentation on how to use MINDER
Open the website.
At the homepage you can log in, if you do not have any account yet, you can create one.
Click at the sign up button.
You can choose as a band or musician.
Set up your personal page.
Find your interest in instrument,genre, and region.
Once your account has been setted up.
You can see the ‘Find Musician/Band’ button to find your interest.
Then you will be redirected to the list where you can find your best interest.
You can contact them if you are interested.
Then wait for them to accept your interest.

