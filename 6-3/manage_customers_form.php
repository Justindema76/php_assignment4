<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("database.php");

$queryCustomers = 'SELECT * FROM customers';
$statement1 = $db->prepare($queryCustomers);
$statement1->execute();
$customers = $statement1->fetchAll();  
$statement1->closeCursor();

// Check if a last name was submitted
if (isset($_POST['last_name'])) {
    $lastName = $_POST['last_name'];

    // Modify the SQL query to search for customers by last name
    $queryCustomers = 'SELECT * FROM customers WHERE lastName LIKE :lastName';
    $statement1 = $db->prepare($queryCustomers);
    
    // Add wildcards to search for any last names containing the search term
    $statement1->bindValue(':lastName', '%' . $lastName . '%');
    $statement1->execute();
    
    // Fetch the customers that match the search criteria
    $customers = $statement1->fetchAll();  
    $statement1->closeCursor();
}

?>
<!DOCTYPE html>
<html>
   <head>
       <title>Manage Customers</title>
       <link rel="stylesheet" href="main.css"/>       
   </head>
   <body>
   <?php include 'view/header.php'; ?>
       <main>
       
        <h2>Customer Search</h2>
        <table>
        <form action="manage_customers_form.php" method="post" id="manage_customer_form">

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name"/>
            <input type="submit" value="Search">
            <br>
        </form>
        <h2>Results</h2>
        <?php if (!empty($customers)): ?>
             <tr>   
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th></th>
            </tr>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                

                <td>
                    <!-- Edit button -->
                    <form action="select_customers_form.php" method="post">
                        
                        <input type="submit" value="Select">
                    </form>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>No customers found with the last name '<?php echo htmlspecialchars($lastName); ?>'.</p>
        <?php endif; ?>

       
        <br/>

       </main>
       <footer><?php include 'view/footer.php'; ?></footer>
   </body>
</html>
