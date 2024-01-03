<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        button {
           
            color: black;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

 </style>
</head>
<body>
<h2><center>ELECTRICITY BILL CALCULATOR</center></h2>
<?php
// Define variables and set to empty values
$units = $bill = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate units
    if (empty($_POST["units"])) {
        $unitsErr = "Units consumed is required";
    } else {
        $units = test_input($_POST["units"]);
        // Check if units is a positive integer
        if (!is_numeric($units) || $units <= 0) {
            $unitsErr = "Please enter a valid positive number for units";
        }
    }

    // If units are valid, calculate the bill
    if (empty($unitsErr)) {
        $tariff = 1.5; // Example tariff: 1.5 per unit
        $fixedCharge = 50; // Example fixed charge
        $bill = $fixedCharge + ($units * $tariff);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="units">Units Consumed:</label>
    <input type="text" name="units" id="units" value="<?php echo $units; ?>">
    <span class="error"><?php echo isset($unitsErr) ? $unitsErr : ''; ?></span>

    <br>

    <button type="submit">Submit</button>
</form>

<?php
// Display the calculated bill if available
if (!empty($bill)) {
    echo "<h2><center>Electricity Bill: $bill</center></h2>";
}
?>

</body>
</html>
