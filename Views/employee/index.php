<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        THÊM MỚI EMPLOYEE
                    </div>
                    <form method="post" id="form_employee">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label">Họ Tên</label>
                                <input type="text" class="form-control" id="ho_ten">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Điện Thoại</label>
                                <input type="text" class="form-control" id="dien_thoai">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Ngày Sinh</label>
                                <input type="date" class="form-control" id="ngay_sinh">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Giới Tính</label>
                                <select id="gioi_tinh" class="form-control">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="dia_chi">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" id="them_moi" class="btn btn-primary">Thêm Mới</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DANH SÁCH EMPLOYEE</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_employee">
                                <thead>
                                    <tr class="text-center text-nowrap">
                                        <th>#</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Điện Thoại</th>
                                        <th>Ngày Sinh</th>
                                        <th>Giới Tính</th>
                                        <th>Địa Chỉ</th>
                                        <th>Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function showTable() {
                $.ajax({
                    'url': 'index.php?controller=employee',
                    'type': 'get',
                    'success': function(data) {
                        var content = '';
                        var data_js = <?php echo json_encode($data); ?>;

                        console.log(data_js);

                        $.each(data_js, function(key, value) {
                            content += '<tr class="text-center align-middle text-nowrap">';
                            content += '<th>' + (key + 1) + '</th>';
                            content += '<td>' + value.ho_ten + '</td>';
                            content += '<td>' + value.email + '</td>';
                            content += '<td>' + value.dien_thoai + '</td>';
                            content += '<td>' + value.ngay_sinh + '</td>';
                            content += '<td>';
                            if(value.gioi_tinh == 1) {
                                content += '<button class="btn btn-primary">Nam</button>';
                            }else {
                                content += '<button class="btn btn-primary">Nữ</button>';
                            }
                            content += '</td>';
                            content += '<td>' + value.dia_chi + '</td>';
                            content += '<td>';
                            content += '<button class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button>';
                            content += ' ';
                            content += '<button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                            content += '</td>';
                        });

                        $("#table_employee tbody").html(content);
                    }
                });
            }
            showTable();

            $('#them_moi').on('click', function() {
                var ho_ten = $('#ho_ten').val();
                var email = $('#email').val();
                var dien_thoai = $('#dien_thoai').val();
                var ngay_sinh = $('#ngay_sinh').val();
                var gioi_tinh = $('#gioi_tinh').val();
                var dia_chi = $('#dia_chi').val();

                var z = {
                    'ho_ten': ho_ten,
                    'email': email,
                    'dien_thoai': dien_thoai,
                    'ngay_sinh': ngay_sinh,
                    'gioi_tinh': gioi_tinh,
                    'dia_chi': dia_chi
                }
                
                if (ho_ten == '' || email == '' || dien_thoai == '' || ngay_sinh == '' || dia_chi == '') {
                    alert('Không được bỏ trống thông tin');
                } else {
                    $.ajax({
                        'url': 'index.php?controller=employee&action=store',
                        'type': 'post',
                        'data': z,
                        'success': function(data) {
                            alert('Thêm mới thành công!');
                            $('#form_employee')[0].reset();
                            showTable();
                        }
                    });
                } 
            });
        });
    </script>
</body>
</html>