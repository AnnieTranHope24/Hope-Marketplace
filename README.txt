Annie Tran
Folders: css, images, includes (with common php functions), js (javaScript files),
partials (footer, head, header), UPLOADS (photos)

We included the common_functions.php when we wanted to use the fucntions related to cart.
We included the partials in almost all of the php pages as most of them need the three elements.

Main database: hopemarketplace.sql that includes 3 tables: items, credentials, and cart

<-- Bereket Bessie -->
Error Handling: The file "form.php" is a form for users to post items to our database. The form has several input fields that are restricted in various ways to prevent 
code injections. Error handling and input validation is futher elaborated within the comments of the file.

Web Security: The file "login.php" is a form that handles user authentication and registration. It connects to a database, checks user credentials, and sets session variables for authenticated users. 
              The file also checks if a user is already logged in and redirects them to the index page. Proper handling of user authentication is important for web security to prevent unauthorized access to sensitive information or functionalities. 
              The file uses PDO prepared statements to protect against SQL injection and uses hashing to protect against password attacks