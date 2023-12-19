Webhost link: https://hopemarketplace.000webhostapp.com/login.php

![HOME!](home.png)

I tried but failed to integrate my changes on the webhost. Please use local host to see all the functionalities of 
the website. We included the hopemarketplace.sql that can be imported on phpmyadmin.

Folders: css, images, includes (with common php functions), js (javaScript files),
partials (footer, head, header, carousel), UPLOADS (photos)

We included the common_functions.php when we wanted to use the fucntions related to cart.
We included the partials in almost all of the php pages as most of them need the three elements.

Main database: hopemarketplace.sql that includes 3 tables: items, credentials, and cart
Website flow and functionalities:
- When you first visit our website, you'll be asked to enter the login information. If you didn't have an account, you would need to sign in
- All pages have the main components: nav bar, including the logo, search bar, login, cart, and footer. They work as follow:
        - Clicking the logo leads to the home page
        - Searching any word yields the products containing the word
        - Clicking the log-in icon leads to the account page where you can manage your account
        - Hovering in the log-in icon gives the log-out option where you can log out
        - The cart icon desplays how many items currently in your cart and is linked to the cart page
        - Hovering in the category bar gives subcategory options
        - The footer contains the about us link that links to the about us page
Main page:
- Our main page has a carousel displaying our web purposes and the item categories we have. It changes pages automatically but you can also
change pages yourself by clicking the arrow buttons. Each page links to a category page (not actually a separate page but index.php with proper
info printed out by php based on the set _GET or _POST attributes).
- When click each category, proper items displayed
- When clicking add item, item is added to the cart and the total number at the cart icon updated. If the item is already added, error pops up, you
cannot add it to the cart
Cart page:
- When check the box and click remove, the item is removed from the cart and the total number of item at the cart icon is deducted.
- If you don't check the box, it requires you to check to be sure you want to remove the item.
- The total price adds up the prices of the items.
- Continue shopping links to the main page.
Your Account page:
- Sell items links to a form where you can post an item
About us: info about the website and developers

Error Handling: The file "form.php" is a form for users to post items to our database. The form has several input fields that are restricted in various ways to prevent 
code injections. Error handling and input validation is futher elaborated within the comments of the file.

Web Security: The file "login.php" is a form that handles user authentication and registration. It connects to a database, checks user credentials, and sets session variables for authenticated users. 
              The file also checks if a user is already logged in and redirects them to the index page. Proper handling of user authentication is important for web security to prevent unauthorized access to sensitive information or functionalities. 
              The file uses PDO prepared statements to protect against SQL injection and uses hashing to protect against password attacks