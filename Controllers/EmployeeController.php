<?php

class EmployeeController extends Controller {
    private $employee;

    public function __construct()
    {
        $this->loadModel('Employee');
        $this->employee = new Employee;
    }

    public function index() {
        $data = $this->employee->all();
        return $this->view('employee.index', [
            'data' => $data
        ]);
    }

    public function store() {
        if(isset($_POST['ho_ten'], $_POST['email'], $_POST['dien_thoai'], $_POST['ngay_sinh'], $_POST['gioi_tinh'], $_POST['dia_chi'])) {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $dien_thoai = $_POST['dien_thoai'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];

            $this->employee->create($ho_ten, $email, $dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi);
        }
    }
}