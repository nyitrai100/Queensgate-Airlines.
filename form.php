<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload-form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="form">
        <h1 class="title">Upload a flight</h1>

        <form action="#" class="myform">
            <div class="control-from">
                <label for="firstname">First Name *</label>
                <input type="text" id="firstname" value="" required>
            </div>

            <div class="control-from">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" value="" required>
            </div>

            <div class="control-from">
                <label for="emailaddress">Email Address *</label>
                <input type="text" id="emailaddress" value="" required>
            </div>

            <div class="control-from">
                <label for="phonenumber">Phone Number</label>
                <input type="phone" id="phonenumber" value="" required>
            </div>

            <div class="full-width">
                <label for="companyname">Company Name</label>
                <input type="text" id="companyname" value="" required>
            </div>

            <div class="control-from">
                <label for="businesscategory">Business Category</label>
                <input type="text" id="businesscategory" value="" required>
            </div>

            <div class="control-from">
                <label for="location">Location </label>
                <input type="text" id="location" value="" required>
            </div>

            <div class="button">
                <button id="register">Register</button>
            </div>

        </form>
    </div>
</div>
</body>
</html>