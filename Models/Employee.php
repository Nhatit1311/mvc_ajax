<?php 

require "../config/Database.php";

class Employee extends Database {

    public function execute($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }

    public function create($ho_ten, $email, $dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi) {
        $sql = "INSERT INTO employees (ho_ten, email, dien_thoai, ngay_sinh, gioi_tinh, dia_chi)
                VALUES ('$ho_ten', '$email', '$dien_thoai', '$ngay_sinh', '$gioi_tinh', '$dia_chi')";

        $this->execute($sql);
    }

    public function all() {
        $data = null;

        $sql = "SELECT * FROM employees";
        $result = $this->execute($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}