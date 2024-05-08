-- tables --

CREATE TABLE user_table (
	user_id INT PRIMARY KEY,
	name VARCHAR(50),
	nic VARCHAR(12),
	username VARCHAR(50),
	password VARCHAR(50),
	isAdmin VARCHAR(5)
);

CREATE TABLE register_table (
	meter_no VARCHAR(20) primary key,
	file_no VARCHAR(20),
	fname VARCHAR(20),
	lname VARCHAR(20),
	connection_type VARCHAR(20),
	contact_number VARCHAR(10),
	email VARCHAR(50),
	nic	VARCHAR(12),
	street VARCHAR(50),
	city VARCHAR(20),
	province VARCHAR(20),
	zip INT,
	pdf_content VARCHAR(255)
);

CREATE TABLE accept_table (
	meter_no VARCHAR(20) primary key,
	file_no VARCHAR(20),
	fname VARCHAR(20),
	lname VARCHAR(20),
	connection_type VARCHAR(20),
	contact_number VARCHAR(10),
	email VARCHAR(50),
	nic	VARCHAR(12),
	street VARCHAR(50),
	city VARCHAR(20),
	province VARCHAR(20),
	zip INT,
	pdf_content VARCHAR(255)
);



CREATE TABLE view_table (
	fileNo VARCHAR(20)
);


-- procedures --


CREATE PROCEDURE sp_update_admin_status
    @isAdmin VARCHAR(5),
    @user_id INT
AS
BEGIN
    UPDATE user_table
    SET isAdmin = @isAdmin
    WHERE user_id = @user_id;
END;


CREATE PROCEDURE sp_delete_user
    @user_id INT
AS
BEGIN
    DELETE FROM user_table
    WHERE user_id = @user_id;
END;


CREATE PROCEDURE sp_insert_to_register	
    	@meter_no VARCHAR(20),
	@file_no VARCHAR(20),
	@fname VARCHAR(20),
	@lname VARCHAR(20),
	@connection_type VARCHAR(20),
	@contact_number VARCHAR(10),
	@email VARCHAR(50),
	@nic	VARCHAR(12),
	@street VARCHAR(50),
	@city VARCHAR(20),
	@province VARCHAR(20),
	@zip INT,
	@pdf_content VARCHAR(255)
AS
BEGIN
    INSERT INTO register_table
	VALUES (
		@meter_no, @file_no, @fname, @lname, 
		@connection_type, @contact_number, @email, 
		@nic, @street, @city, @province, @zip, @pdf_content
	);
END;


---------------------functions-----------------------

CREATE FUNCTION func_login (
	@username VARCHAR(50), 
	@password VARCHAR(50)
)
RETURNS TABLE
AS
RETURN
(
    SELECT * FROM user_table 
    WHERE username = @username AND password = @password
);


CREATE FUNCTION get_accept_data(
	@meterNo VARCHAR(20), 
	@fileNo VARCHAR(20)
)
RETURNS table
AS
RETURN (
    SELECT * FROM accept_table WHERE meter_no = @meterNo OR file_no = @fileNo
);



---------------------triggers-----------------------

CREATE TRIGGER insert_to_view 
ON register_table
AFTER INSERT
AS
BEGIN
DECLARE @fileNo INT
SELECT @fileNo = inserted.file_no FROM inserted
INSERT INTO view_table VALUES (@fileNo);
END;


CREATE TRIGGER delete_from_view 
ON register_table
AFTER DELETE
AS
BEGIN
    DECLARE @fileNo INT;
    SELECT @fileNo = deleted.file_no FROM deleted;
    DELETE FROM view_table WHERE fileNo = @fileNo;
END;

---------------------views-----------------------

CREATE VIEW user_view
AS
SELECT user_id, name, nic, isAdmin
FROM user_table;


CREATE VIEW fileNo_view
AS
SELECT fileNo FROM view_table;
