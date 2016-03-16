This program allows the user to install a .csv file to a mysql database. Below you will find the instructions to 
get this program up and running in minutes. 

Originally this was written for a wordpress site. I have modified it to help other people get a head start if they need to use this for any reason. 

1. create a database and record username and password. 
2. open the Dbconfig.php file. At the top of the file please enter your credentials for
    $db_host   = '<HOST-NAME>';
	 $db_user   = '<DB-USERNAME>';
	 $db_pass   = '<DB-PASSWORD>';
	 $db_name   = '<DB-NAME>';
	 $table_name = "<DB-TABLE-NAME>";
3. For the sake of getting the program running there is a csv file already in the root directory. You can click install from the index.php file and the program will install the csv file. Once you can see the program is working 
you may change up structure of the mysql queries to create any table you want. You may also rename the table or
the table colums.
4. If you do change the table colums you will need to make sure to update the values from all of the files listed below.
	inventory-load.php
	inventory-search.php
	wuno-uploader.php

EXTRA INFO ABOUT THE APP
This app checks to see if a table with the desired name exist. If it does it drops it then creates a new table 
with the values in the current csv file which is located in the root directory. 

Once the data is loaded into the database when you return to the index.php page you will see it auto load the 
first 15 results from the database into the page. To load more data you must scroll down the page. An ajax function controlls loading more data on scroll. If you do notice the page is not loading more data this is because the 
height of the page is not filled up with enough data. to fix this increase the offset to a hire number so the page is filled up enough. 

There is a search function built into the app which is controlled with an ajax function. The ajax function fires
off on keyup from the search input field. 

at the bottom of the index.php page there are a few javascript variables being defined. if you decide to change 
the offset make sure you update it's corresponding javascript var as well. 

Enjoy!
