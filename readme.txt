step 1: Download the project zip folder from the GitHub repository.
step 2: Navigate to the location where the project zip folder was downloaded.
step 3: Extract the zip folder to the 'htdocs' directory located in the XAMPP folder (C:\xampp\htdocs).
step 4: Open the extracted project folder and create a new folder named 'uploads'.
step 5: Copy the DLL files from the 'dlls' folder and paste them into the 'ext' folder (C:\xampp\php\ext).
step 6: Open the XAMPP control panel, click 'Config' next to 'Apache', and select 'PHP (php.ini)' and Press Ctrl+F, 
	type "module settings", and press Enter.
step 7: Copy and paste the following lines under the 'module settings' section and save the changes (Ctrl+S):
		extension=php_sqlsrv_82_ts_x64.dll
		extension=php_pdo_sqlsrv_82_ts_x64.dll  

step 8: Open the project folder in your development environment, navigate to db_connection.php, and update the $servername variable 		with your server name from SQL Server Management Studio (e.g., $servername = "ISHARAPC\SQLEXPRESS";). Save the changes.
step 9: Open SQL Server Management Studio, create a new database named 'myDB', and execute all queries one by one from the 'SQL_Queries' 	file.
step 10:Open the XAMPP control panel, start 'Apache', click 'Admin', then type your project URL (e.g., http://localhost/project_name/) 	in the browser, and hit Enter.

Additional Requirements: Ensure that all prerequisites are installed (e.g., XAMPP, SQL Server, SQLSRV drivers).