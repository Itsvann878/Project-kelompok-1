<?php
if (!isset($_SESSION)) {
session_start();
}
require "inc.koneksi.php";
?>

<?php
echo "Welcome, <b>". $_SESSION["name"]."</b><br>";
echo "Anda login sebagai, <b>". $_SESSION["role"]."</b>";
?>

<div id="navbar3" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li><a href="dashboardadmin.php">Home</a></li>
        <li><a href="dashboardadmin.php?Pages=employeelist">Employee List</a></li>
        <li><a href="dashboardadmin.php?Pages=departmentlist">Department List</a></li>
        <li><a href="dashboardadmin.php?Pages=userlist">User List</a></li>
        <li><a href="dashboardadmin.php?Pages=projectlist">Project List</a></li>
        <li><a href="dashboardadmin.php?=logout">Logout</a></li>
    </ul>
</div>