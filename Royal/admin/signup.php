<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Signup | PolluxUI</title>
    
    <!-- ✅ Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    
    <!-- ✅ Bootstrap & CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #1e1e2f, #2a2a3b);
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .signup-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            width: 350px;
            text-align: center;
            transition: 0.3s ease-in-out;
        }

        .signup-box:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.4);
        }

        .signup-box h4 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .signup-box h6 {
            font-weight: 300;
            color: #bbb;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
            padding: 12px;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
        }

        .form-control:focus {
    background: rgba(255, 255, 255, 0.3);
    outline: none;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
    color: white;
}

        .btn-primary {
            background: #ffbf00;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            transition: 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: #d9a600;
            transform: scale(1.05);
        }
        .text-primary {
            color: #ffbf00 !important;
            transition: 0.3s ease-in-out;
        }

        .text-primary:hover {
            color: #d9a600 !important;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-box">
        <div class="brand-logo">
        <img src="assets/img/logo/logo-2.png" alt="logo" width="200">
        </div>
        <h4>Create Your Account</h4>
        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps.</h6>

        <!-- ✅ Signup Form -->
        <form class="pt-3" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-block" name="signup">SIGN UP</button>
            </div>
            <div class="text-center mt-4">
                <span>Already have an account? <a href="login.php" class="text-primary">Login</a></span>
            </div>
        </form>
    </div>

    <?php
    include('connection.php');

    if(isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_id = 1; 
        $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $check_result = mysqli_query($con, $check_query);
        
        if(mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('Username or Email already exists!'); window.location.href='signup.php';</script>";
        } else {
            $insert_query = "INSERT INTO users (role_id, username, email, password) VALUES ('$role_id', '$username', '$email', '$password')";
            $result = mysqli_query($con, $insert_query);

            if($result) {
                echo "<script>alert('Signup successful!'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Signup failed. Please try again.'); window.location.href='signup.php';</script>";
            }
        }
    }
    ?>
</body>

</html>
