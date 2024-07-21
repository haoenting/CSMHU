<?php
    require_once('conn.php');
    $user = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE name = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 's', $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // 檢查是否已存在
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('使用者已註冊!。'); window.location = 'index.html';</script>";
        exit();
    }

    // 執行 SQL INSERT 語句將使用者資料插入到資料庫中
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (name, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user, $hash_password);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($link);
    echo "<script>alert('使用者已註冊!。'); window.location = 'index.html';</script>";
    
?>
    
