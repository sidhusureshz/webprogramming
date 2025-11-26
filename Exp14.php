<!DOCTYPE html>
<html>
<head>
<title>Electricity Bill</title>
</head>
<body bgcolor="lightyellow">

<h2>Electricity Bill Calculator</h2>

<form method="post">
    Enter Units Consumed: 
    <input type="number" name="units" required>
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $units = $_POST["units"];

    // SAME RATE FOR ALL UNITS
    $rate = 5;              // ₹5 per unit (change if needed)
    $amount = $units * $rate;

    // Extra charges (optional)
    $fixed = 50;
    $gst = $amount * 0.18;
    $total = $amount + $fixed + $gst;

    echo "<h3>------ Bill Details ------</h3>";
    echo "Units Consumed: $units <br>";
    echo "Rate per Unit: ₹$rate <br>";
    echo "Energy Charge: ₹".number_format($amount,2)." <br>";
    echo "Fixed Charge: ₹$fixed <br>";
    echo "GST (18%): ₹".number_format($gst,2)." <br><br>";
    echo "<b>Total Bill Amount: ₹".number_format($total,2)."</b>";
}
?>

</body>
</html>

