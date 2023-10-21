<?php
//gives fatal eror if duplicate user. create error message to handle

include 'database.php'; // Include the database connection details
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Check if the form has been submitted

    // Extracting data from the form
    $E_First_Name = $mysqli->real_escape_string($_POST['E_First_Name']);
    $E_Last_Name = $mysqli->real_escape_string($_POST['E_Last_Name']);
    $Hire_Date = $mysqli->real_escape_string($_POST['Hire_Date']);
    $Title_Role = $mysqli->real_escape_string($_POST['Title_Role']);
    $Employee_ID = $mysqli->real_escape_string($_POST['Employee_ID']);
    $password = password_hash($mysqli->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hashing the password before storing it in the database

    // Inserting the data into the database
    $sql = "INSERT INTO employee (E_First_Name, E_Last_Name, Hire_Date, Title_Role, Employee_ID,password) 
            VALUES ('$E_First_Name', '$E_Last_Name','$Hire_Date', '$Title_Role', '$Employee_ID','$password')";

    if ($mysqli->query($sql) === TRUE) {
        // echo "Account created successfully!";
        $mysqli->close();
        header('Location: home_employee.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

}
?>
<!DOCTYPE html>
<!-- Page for creating new employees -->
<head>
    <title>Employee Registration</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/pizza.ico" type="image/x-icon">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <!-- <a href="#">Order Now</a>
        <a href="#">Profile</a> -->
    </div>
    <form action="employee_register.php" method="post">
        <h2>Create Employee Account</h2>
        <div>       
            <label for="E_First_Name">Name  </label>
            <input type="text" id="E_First_Name" name="E_First_Name" placeholder="First" style="width: 75px;" required>
            <label for="E_Last_Name"></label>
            <input type="text" id="E_Last_Name" name="E_Last_Name" placeholder="Last" style="width: 75px;" required>
        </div><br>

        <!-- pulls current date and assigns to Hire_Date -->
        <input type="hidden" id="Hire_Date" name="Hire_Date">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const currentDate = new Date();
                const formattedDate = `${currentDate.getFullYear()}/${(currentDate.getMonth() + 1).toString().padStart(2, '0')}/${currentDate.getDate().toString().padStart(2, '0')}`;
                document.getElementById('Hire_Date').value = formattedDate;
            });
        </script>

        <div>
            <label for="Title_Role">Role  </label>
            <select id="Title_Role" name="Title_Role" placeholder="Select role" style="width: 150px;"required>
                <option value="" selected disabled>Select</option>
                <option value="TM">Team Member</option>
                <option value="SUP">Supervisor</option>
                <option value="MAN">Manager</option>
            </select>
        </div><br>
        
        <div>
            <label for="Employee_ID">Employee ID  </label>
            <input type="text" id="Employee_ID" name="Employee_ID" pattern="\d{6,8}" placeholder="6-8 digits required" required>
        </div><br>

        <div>
            <label for="password">Password  </label>
            <input type="password" id="password" name="password" placeholder="Create password" required>
        </div><br>
        
        <!-- need to add SQL code to ensure passwords match and set up error if not -->
        <!-- <div>
            <label for="password">Confirm Password  </label>
            <input type="password" id="password" name="password" placeholder="Confirm password" required>
        </div><br> -->

        <div>
            <input class = button type="submit" value="Register">
        </form>
</body>
</html>


