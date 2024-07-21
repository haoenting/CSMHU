<?php
    require_once('conn.php');
    $user = $_POST['name'];
    $pass = $_POST['password'];

    // session_set_cookie_params(600);
    session_start(); // 開始會話

    // 使用 prepared statement 防止 SQL 注入攻擊
    $sql = "SELECT * FROM user WHERE name = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 's', $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // 帳號是否存在
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $table_password = $row['password'];
        // 驗證密碼是否相符
            if (password_verify($pass, $table_password)) {
            $_SESSION['user_id'] = $user;
            // $_SESSION['login_time'] = time();

            $current_time = date("Y-m-d H:i:s");
            $insert_query = "INSERT INTO `action` VALUES ('$current_time', '$user', 'login in')";
            mysqli_query($link, $insert_query);
            header("Location: catalog.php");
            exit(); // 結束腳本執行，確保重定向正常執行
            } 
        else {
            echo "<script>alert('密碼錯誤。'); window.location = 'index.html';</script>";
            exit();
        }
    } else { // 帳號不存在
        echo "<script>alert('帳號不存在，請註冊帳號。'); window.location = 'index.html';</script>";
        exit();
    }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    ?>
