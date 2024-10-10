<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />       
</head>
<body>
    <?php include("view/header.php"); ?>
    <main>
    <h2>View/Update Customer</h2>

    <form action="under_construction.php" method="post" id="add_product_form">
        
            
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName"/><br>
           
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName"/><br>
           
                <label for="address">Address:</label>
                <input type="text" name="address"/><br>
           
               <label for="city">City:</label>
                <input type="text" name="city"/><br>

                <label for="state">State:</label>
                <input type="text" name="state"/><br>

                <label for="postalCode">Postal Code:</label>
                <input type="text" name="postalCode"/><br>

                <label for="countryCode">Country Code:</label>
                <input type="text" name="countryCode"/><br>

                <label for="phone">Phone:</label>
                <input type="text" name="phone"/><br>

                <label for="email">Email:</label>
                <input type="text" name="email"/><br>

                <label for="password">Password:</label>
                <input type="text" name="password"/><br>

                

                <!-- update customer button -->
            <div id="buttons">
                <input type="submit" value="Update Customers" class="submit-button"/><br />
            </div>
        </form>

        <p><a href="manage_customers_form.php">Search Customers</a></p>
    </main>
    <?php include("view/footer.php"); ?>
</body>
</html>
