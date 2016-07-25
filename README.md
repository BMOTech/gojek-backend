# GOJEK BACKEND
This Repo contains gojek backend services (API)

##Project Framework (github)
https://github.com/laravel/laravel
 
##Technology
	- laravel 5.1
	- JSON
	- guzzlehttp
	- MySQL
 
##Functionality
	- Send and Receive HTTP Post using JSON as a data
	- Laravel Route
	- Laravel Controller
	- Laravel Mail
	- Laravel DB
 
##How to Start (do command in OS terminal or IDE features)
Nb : assumpsion user (developer) already install NodeJs and NPM on their PC
 
	1. Install compaser dependencies
		1.a navigate to "project root folder"
			e.g : cd C:/gojek-backend/AccountServices
												   
		1.b install dependencies
			C:/gojek-backend/AccountServices>composer install
								   
	2. Run server testing
		C:/gojek-backend/AccountServices>php artisan serve --port=8181
               
##URL Testing
	use rest client to do HTTP Post Request to API (specification available on gojek-backend\docs\ApiSpecification.txt)
               
 
##Services List
	1. AccountServices
		This service contain service for Account Management. For now, only Visitor Registration. This service can be scaled for other Account Management, for instance
		Login, Forgot Password, Reset Password, etc.
		
		Testing command :
			C:/gojek-backend/AccountServices>php artisan serve --port=8181
			
			Sample URL :
			http://localhost:8181/AccountServices/opRegister
		
	2. LoggingServices
		This service is for Logging. All activity from other service can be log freely using this service. All activity will be store in database based on Service.
		The benefit of this service is, this service can be use everywhere. Just do the right request.
		
		Testing command :
			C:/gojek-backend/AccountServices>php artisan serve --port=8282
			
			Sample URL :
			http://localhost:8282/LoggingServices/opLogAccount
		
	3. ContactServices
		This service contains all services for sending notification. Now, only Email channel. For the future this service can be added by other channel like SMS, Line, Whatsapp, etc.
		This common service can be reuse everywhere.
		
		Testing command :
			C:/gojek-backend/AccountServices>php artisan serve --port=8383
			
			Sample URL :
			http://localhost:8383/ContactServices/opSendContact
			
			
##References