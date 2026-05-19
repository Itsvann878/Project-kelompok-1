<?php

    class Connection
{
    private $host = "localhost";
    private $struser = "root";
    private $strpassword = "";
    private $strdbname = "company";
    public $connection;

    function __construct()
    {
        $conn = new mysqli($this->host, $this->struser, $this->strpassword);
        $dbselect = mysqli_select_db($conn, $this->strdbname);
        $this->connection = $conn;
        }
    }
 ?>