<h1 align="center">
WADS Final Project
</h1>


<p align="center"><img src="public/assets/logo1.png" width="400"></p>

<p align="center">
Semester 4 Final Project Web Development and Security
</p>

About MINDER<br/><br/>
Minder is a web application for musicians to find other musicians to fulfill their musical desire and to achieve their goal or even create a band with other outstanding musicians. <br/><br/>
MINDER Background & Problem<br/>
Our friend is a great guitarist with outstanding skill, but he often hard to find a fit for a band since his former band disbanded. As Computer Science students, we want to help him overcome that kind of problem.<br/><br/>
Documentation on how to deploy in Google Cloud Platform (GCP)<br/>
1.Create a Google Cloud Platform virtual machine.<br/>
2.Set up VM and take the ip from google cloud platform and add record of dns to cloudflare. <br/>
3.Open ssh server from GCP. <br/>
4.Clone all repositories needed from github to the server. <br/>
5.In the server, download all the extensions needed such as server, install the latest php, composer and etc.<br/>
6.Open the laravel folder, composer install, rename .env.example to .env, run php artisan key:generate to generate key for the env. Apply this step to all the laravel folders.<br/>
7.Create a Google Cloud SQL Instance, insert two databases namely “minder” and “minder2”.<br/>
8.Migrate databases using php artisan migrate to all the databases in the Google Cloud SQL.<br/>
9.Change the db name and db host in .env make a connection between the database in gcp <br/>
10.Add new SSL protection by using GCP IP in cloudflare.<br/>
11.Create a proxy pass to open the port for the frontend and the backends with sudo nano /etc/nginx/sites-available/default.<br/>
12.Change the name server between the web host with the cloudflare name server.<br/>
13.To deploy the web app in the server, use sudo  apt install screen, then call screen, and serve the background along with the port that are stated in the proxy pass, e.g. “php artisan serve --port=8000”. Apply this step to all the laravel folders needed.<br/>
14.Then the website is ready to go.<br/><br/>

Documentation on how to deploy in Localhost<br/><br/>
1.Clone all the github needed to your computer.<br/>
2.Use “composer install” to install all dependencies.<br/>
3.Rename .env.example to .env<br/>
4.Rename the database name inside the .env file<br/>
5.Use “php artisan key:generate” to generate key for the .env<br/>
6.Create databases with the same name as the one that written in the .env<br/>
7.Use php artisan migrate in the back end laravel to import all the tables to the localhost sql<br/>
8.Use “php artisan serve” to run laravel projects on the local apache server, but keep in mind to run all the laravel projects on 9.different ports, e.g. 8000, or 8001, and or 8002.<br/>
10.open the 127.0.0.1:[ port ] in the browser and you are good to go. <br/><br/>

Documentation on how to use MINDER<br/><br/><br/>
1.Open the website.<br/>
2.At the homepage you can log in, if you do not have any account yet, you can create one.<br/>
3.Click at the sign up button.<br/>
4.You can choose as a band or musician.<br/>
5.Set up your personal page.<br/>
6.Find your interest in instrument,genre, and region.<br/>
7.Once your account has been setted up.<br/>
8.You can see the ‘Find Musician/Band’ button to find your interest.<br/>
9.Then you will be redirected to the list where you can find your best interest.<br/>
10.You can contact them if you are interested.<br/>
11.Then wait for them to accept your interest.<br/>
