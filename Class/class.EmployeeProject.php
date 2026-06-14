<?php 
class EmployeeProject extends Connection
{
    private $id ='';
    private $ssn = '';
    private $pcode = '';
    private $hours='';

    private $fname = '';
    public $hasil = false;
    public $message = '';

    public function __get($atribute){
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }
    public function __set ($atribut, $value) {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }

    public function AddEmployeeProject() {
        $sql = "INSERT INTO employee_project (ssn, pcode, hours)
                VALUES ('$this->ssn', '$this->pcode', '$this->hours')";
        $this->hasil = mysqli_query($this->connection, $sql);
        
        if ($this->hasil)
            $this->message = 'Data berhasil ditambahkan!';
        else
            $this->message = 'Data gagal ditambahkan!';
    }

    public function UpdateEmployeeProject(){
        $sql = "UPDATE employee_project
                SET ssn = '$this->snn',
                    pcode = '$this->pcode',
                    hours = '$this->hours'
                WHERE id = '$this->id'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message = 'Data berhasil diubah!';
        else
            $this->message = 'Data gagal diubah!';
    }

    public function DeleteEmployeeProject(){
        $sql = "DELETE FROM employee_project WHERE id = '$this->id'";
        $this->hasil = mysqli_query($this->connection, $sql);

        if($this->hasil)
            $this->message = 'Data berhasil dihapus!';
        else
            $this->message = 'Data gagal dihapus!';
    }

    public function SelectAllEmployeeProject(){
        // join dengan master employee untuk mengambil nama 
        $sql = "SELECT ep.id, ep.ssn, e.fname, ep.pcode, ep.hours
                FROM employee_project ep
                INNER JOIN employee e ON ep.ssn = e.ssn
                ORDER BY ep.id";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $count = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
                $objEP = new EmployeeProject();
                $objEP->id = $data['id'];
                $objEP->ssn = $data['ssn'];
                $objEP->fname = $data['fname'];
                $objEP->pcode = $data['pcode'];
                $objEP->hours = $data['hours'];
                $arrResult[$count] = $objEP;
                $count++;

            }
        } return $arrResult;
    }

    public function SelectOneEmployeeProject(){
        $sql = "SELECT ep.*, e.fname
                FROM employee_project ep
                INNER JOIN employee e ON ep.ssn = e.ssn
                WHERE ep.id = '$this->id'";
        $resultOne = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_array($resultOne);
            $this->ssn = $data['ssn'];
            $this->fname = $data['fname'];
            $this->pcode = $data['pcode'];
            $this->hours = $data['hours'];
        }
    }

}
?>