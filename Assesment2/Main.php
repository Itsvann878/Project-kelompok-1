<?php

if (!isset($_SESSION)) {
    session_start();
}

include "header.php"; 
include "inc.koneksi.php"; 
?>

<div class="container mt-5 mb-5"> 
    <div class="row">
        <div class="col-md-12">
            
            <?php
            // Logika sistem dinamis menggunakan parameter URL
            if (isset($_GET['Pages'])) {
                $page = $_GET['Pages'];

                switch ($page) {
                    case 'Home':
                        include "Pages/Home.php";
                        break;
                    case 'About':
                        include "Pages/About.php";
                        break;
                    case 'Contact':
                        include "Pages/Contact.php";
                        break;
                    case 'employee':
                        include "Pages/employee.php";
                        break;
                    case 'employeelist':     
                        include "Pages/employeelist.php";
                        break;
                    case 'deleteemployee':
                        include "Pages/deleteemployee.php";
                        break;
                    case 'employeeproject':
                        include "Pages/employeeproject.php";
                        break;
                    case 'employeeprojectlist':     
                        include "Pages/employeeprojectlist.php";
                        break;
                    case 'deleteemployeeproject':
                        include "Pages/deleteeemployeeproject.php";
                        break;
                    case 'register' :
                        include "Pages/register.php";
                        break;
                    default:
                        echo "
                        <div class='alert alert-danger text-center'>
                            <h3>404 Not Found</h3>
                            <p>Maaf, halaman tidak tersedia.</p>
                        </div>";
                        break;
                }
            } else {
                include "Pages/Home.php";
            }
            ?>

        </div>
    </div>
</div>
<?php
include "footer.php"; 
?>