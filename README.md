# riverviewcs
This is assessment of the RiverView B2B. 

**********Getting start*********

Go to the htdocs folder where you have installed .Open the cmd. Run this command “ git clone url-------------------- “
Go to the project file which is reverviewcsassesments.
Config the .env file. [put the username, password and database name of the database]
Run “php artisan migrate”
Go to this URL and install the postman chrom app in your chrome browser.

*******API DOCUMENTATION********

Create new author

		 Copy this http://localhost/riverviewcsassesments/public/api/author  paste in the postman and this is post type request.
     
Create new article
		
    Copy this http://localhost/riverviewcsassesments/public/api/articles  paste in the postman and this is post type request.
    
READ route for ALL articles
	
	Copy this http://localhost/riverviewcsassesments/public/api/articles  paste in the postman and this is get type request.    
  
READ route for One articles

	Copy this http://localhost/riverviewcsassesments/public/api/articles/1  paste in the postman and this is get type request.
  
UPDATE route for an article 
       
	Copy this http://localhost/riverviewcsassesments/public/api/articles/2  paste in the postman and this is put type request.
  
Delete route for an article
	
  	Copy this http://localhost/riverviewcsassesments/public/api/articles/4  paste in the postman and this is get type request. This is HTTP code 204. There is no any return.
    
    Backup Database

Add this cron in your server 
* * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
Or if you need to see that manually run this command

php artisan db:backup

    
