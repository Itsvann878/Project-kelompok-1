<?php
require_once('./Class/class.Employee.php');

if (isset($_GET['ssn'])) {
    $objEmployee = new Employee();
    $objEmployee->ssn = $_GET['ssn'];
    $objEmployee->DeleteEmployee();
    
    echo "<script> alert('$objEmployee->message'); </script>";
    echo "<script>window.location = 'Main.php?Pages=employeelist'</script>";
} else {
    echo '<script>window.history.back()</script>';
}
?>