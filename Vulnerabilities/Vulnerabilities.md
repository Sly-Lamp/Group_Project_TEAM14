Known Vulnerabilities
=====================

Cross-Site Scripting in Products Search
---------------------------------------
Searches made using the format ' <script>CODE</script> ' will cause the Javascript inside CODE to be run on the search results page.  
This is because the search input is not sanitised, and displayed on the search results page under a 'You searched for: ' message.
Entering the script tags into the search causes the server to load the page using these tags, instead of handling them as pure text.

SQL Injection in Products Search
--------------------------------
Searches made using the format ' ';QUERY# ' will cause the text inside QUERY to be passed to the server as an SQL query.  

This is because the search input is not sanitised, and so the PHP code can be tricked into closing the search query it is supposed to use and opening a new one.
The # at the end of the injection is to prevent syntax errors by commenting out the end of the intended search query - which is still appended to the search input.  

The results of an SQL injection can be displayed onto the search results page by using UNION. An example of this would be searching for:  
' UNION (SELECT id, usrnm, pwd, 4 FROM users)#  
This will cause the results to also include the id, username, and password of all users stored in the database.
It should also be noted that no semicolon is required as this is not a new query, it is only adding to the original search query.  

There are 2 important notes with displaying the results of an SQL injection, to prevent an error that will result in no results being displayed from the UNION: 
1: The table added using UNION should be 4 columns long, as that is how many columns are taken from the products table.  
2: The 4th column being queried for should always be numerical, as that is where the price for the products is stored - which gets used in calculations on the page.  

A slightly less critical note is that the value of the 3rd column is not displayed as itself, but instead as the 'href' value of an image. This can be pulled from the page using 'view source' or 'inspect element'.

NB: Combining SQLI and XSS
--------------------------
The previous two vulnerabilities can be combined using the format:  
" <script>CODE</script>';QUERY# "

Second-Order SQL Injection via Profile Usernames
------------------------------------------------
The data used in 'profile.php' is pulled from the database using a query for the username of the logged-in user, which is not sanitised prior to searching.  
This creates a point of entry for a malicious query to be injected, as usernames can be created with common SQLi characters without issue (e.g: ', ;, -).  
If a user created an account with the username 'USERNAME', the following query would be executed upon the user visiting 'profile.php':
SELECT * FROM users WHERE usrnm='USERNAME'