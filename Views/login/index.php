<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><b>ĐĂNG NHẬP</b></div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="">Tên Đăng Nhập</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Mật Khẩu</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="ghi_nho">
                                <label for="">Remmember me</label>
                            </div>
                            <div class="form-group mb-3 text-end">
                                <button type="submit" class="btn btn-primary" name="dang_nhap">Đăng Nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_POST['dang_nhap'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ghi_nho = isset($_POST['ghi_nho']) ? $_POST['ghi_nho'] : 1;

            if(isset($_POST['username'], $_POST['password'])) {
                if(!empty($_POST['username']) && !empty($_POST['password'])) {
                    if($username == 'admin' && $password == '123456') {
                        if(isset($ghi_nho) === 1) {
                            setcookie('ghi_nho_dang_nhap', $ghi_nho, time() + 900, '/');
    
                            echo "<script>alert('Đăng Nhập Thành Công');</script>";
                            header('Location: index.php?controller=employee&action=index');
                        }
                    }else {
                        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác');</script>";
                    }
                }else {
                    echo "<script>alert('Đã đăng nhập chưa mà vào, chưa đăng nhập thì đăng nhập đi');</script>";
                }
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>