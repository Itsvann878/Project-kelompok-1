<?php
include "header.php"; // Menyertakan header yang sudah dibuat
include "inc.koneksi.php"; // Menyertakan koneksi database
?>
<?php
            // Logika sistem dinamis menggunakan parameter URL
            if (isset($_GET['Pages'])) {
                $page = $_GET['Pages'];

                switch ($page) {
                    case 'Home':
                        // Mengambil file dari folder Pages
                        include "Pages/Home.php";
                        break;
                    case 'About':
                        // Mengambil file dari folder Pages
                        include "Pages/About.php";
                        break;
                    case 'Contact':
                        // Jika Anda punya file contact.php di folder Pages
                        include "Pages/Contact.php";
                        break;
                    case 'employee':
                        // Jika Anda punya file employee.php di folder Pages
                        include "Pages/employee.php";
                        break;
                    case 'employeelist':
                        // Jika Anda punya file employeelist.php di folder Pages        
                        include "Pages/employeelist.php";
                        break;
                    case 'deleteemployee':
                        // Jika Anda punya file deleteemployee.php di folder Pages
                        include "Pages/deleteemployee.php";
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
                // Tampilan default: Mengambil Home.php dari folder Pages
                include "Pages/Home.php";
            }
            
            ?>
            <?php
include "footer.php"; // Menyertakan footer yang sudah dibuat
            ?>