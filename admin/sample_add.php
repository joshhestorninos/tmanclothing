<?php

include 'includes/session.php';

if (isset($_POST['add'])) {
    $employee = $_POST['employee'];
    $date = $_POST['date'];
    $part = $_POST['part'];
    $rate = $_POST['rate'];
    $pcs = $_POST['pcs'];
    $value = "VALUES ";
    foreach ($pcs as $var => $val) {
        if ($var > 0) {
            $value .= ", ";
        }
        $sub = $rate[$var] * $pcs[$var];
        $value .= "('{$part[$var]}','$employee','{$pcs[$var]}','$sub','$date')";
    }
    $value .= ";";
  
    $sql = "INSERT INTO employee_rates (part_id, employee_id, pcs, rate, date) $value";
    
   // echo$sql;die;
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Performance added successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: sample.php');
?>