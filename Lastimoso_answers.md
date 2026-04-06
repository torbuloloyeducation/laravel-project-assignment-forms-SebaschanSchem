Task 1:

When the user enters an email and clicks Save, the form sends a POST request to the server with the email as data.
The server then validates the input to make sure it is not empty and is a proper email format.
If the email passes validation, it is stored in the session and acts as temporary storage tied to the user's browser.
The page then reloads and the GET route retrieves the emails from the session and passes them to the Blade view for display.
If the session is cleared or expires, all saved emails will be gone since they are not permanently stored in a database.

What is the difference between GET and POST?
* GET is used to retrieve data from the server and the data is visible in the URL.
POST is used to send data to the server and the data is hidden in the request body.
To sum up. GET loads the page and displays saved emails, while POST submits the form and stores the email in the session.

Why do we use @csrf in forms?
* @csrf generates a hidden security token in the form that Laravel checks every time a POST request is made.
It verifies that the request is coming from your own website and not from a malicious external source.
Without it, Laravel will reject the form submission and return a 419 error.

What is session used for in this activity?
* Session is used to temporarily store the list of emails submitted by the user.
Use session to remember the emails between page reloads.
Every time the page loads, the emails are retrieved from the session and displayed on the page.

What happens if session is cleared?
* If the session is cleared, all the saved emails will be lost and the list will go back to empty.
This is because the emails are only stored temporarily in the session and not saved in a database.
