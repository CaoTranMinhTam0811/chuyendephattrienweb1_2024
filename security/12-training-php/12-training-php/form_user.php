<?php
// Start the session
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    // Giải mã ID
    $_id = $userModel->decodeId($_GET['id']); 

    // Kiểm tra xem ID đã được giải mã có hợp lệ hay không
    if ($_id !== null) {
        // Sử dụng ID đã giải mã để tìm người dùng
        $user = $userModel->findUserById($_id); // Update existing user
    } else {
        // Xử lý nếu ID không hợp lệ
        echo "ID không hợp lệ!";
        echo $_id;
        exit;
    }
}


if (!empty($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Biến để lưu thông báo lỗi
    $errors = [];

    // Validate Name
    if (empty($name)) {
        $errors[] = 'Tên là bắt buộc.';
    } elseif (!preg_match('/^[A-Za-z0-9]{5,15}$/', $name)) {
        $errors[] = 'Tên phải từ 5 đến 15 ký tự và chỉ chứa ký tự chữ cái và số.';
    }

    // Validate Password
    if (empty($password)) {
        $errors[] = 'Mật khẩu là bắt buộc.';
    } elseif (strlen($password) < 5 || strlen($password) > 10) {
        $errors[] = 'Mật khẩu phải từ 5 đến 10 ký tự.';
    } elseif (!preg_match('/[a-z]/', $password) || 
              !preg_match('/[A-Z]/', $password) || 
              !preg_match('/[0-9]/', $password) || 
              !preg_match('/[~!@#$%^&*()]/', $password)) {
        $errors[] = 'Mật khẩu phải bao gồm chữ thường, chữ HOA, số và ký tự đặc biệt.';
    }

    // Nếu không có lỗi, thực hiện cập nhật hoặc thêm người dùng
    if (empty($errors)) {
        if (!empty($_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
        exit(); // Thêm exit() sau header để dừng thực thi mã
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>
            
            <?php if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    } ?>
                </div>
            <?php } ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
</html>
