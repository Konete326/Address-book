<?php
include('header.php');
include('connection.php'); 

if(isset($_POST['login'])) {
    $un = $_POST['name'];
    $pas = $_POST['pass'];

    $q = "SELECT * FROM users WHERE username='$un' AND password='$pas' AND role_id=2";
    $run = mysqli_query($con, $q);
    $data = mysqli_fetch_assoc($run);

    if($data) {
        $_SESSION['Buyername'] = $data['username']; 
        $_SESSION['Buyerid'] = $data['id'];    
        
        echo "<script>alert('Logged in successfully'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid Username or Password'); window.location.href='login.php';</script>";
    }
}
?>
<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">Welcome Back</h2>
        <p class="login-subtitle">Please sign in to continue</p>
        <form class="login-form" method="POST">
            <div class="form-group">
                <input type="text" class="form-input" name="name" placeholder="Username" required>
                <i class="fas fa-user input-icon"></i>
            </div>
            <div class="form-group">
                <input type="password" class="form-input" name="pass" placeholder="Password" required>
                <i class="fas fa-lock input-icon"></i>
            </div>
            <button type="submit" class="login-btn" name="login">Sign In</button>
            <p class="register-link">Don't have an account? <a href="register.php">Create one</a></p>
        </form>
    </div>
</div>

<style>
.login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #FFF3E0 0%, #FF9800 100%);
    padding: 20px;
}

.login-card {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(255, 152, 0, 0.2);
    width: 100%;
    max-width: 400px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 152, 0, 0.1);
}

.login-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(218, 165, 32, 0.3);
}

.login-title {
    color: #F57C00;
    font-size: 28px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.login-subtitle {
    color: #FF9800;
    text-align: center;
    margin-bottom: 30px;
    font-size: 16px;
}

.form-input {
    width: 100%;
    padding: 15px 20px;
    padding-left: 45px;
    border: 2px solid #FFB74D;
    border-radius: 10px;
    font-size: 16px;
    transition: all 0.3s ease;
    outline: none;
    background-color: #FFF8E1;
}

.form-input:focus {
    border-color: #FF9800;
    box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.1);
    background-color: #fff;
}

.input-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #F57C00;
    transition: all 0.3s ease;
}

.login-btn {
    background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);
    color: white;
    padding: 15px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 152, 0, 0.3);
    background: linear-gradient(135deg, #F57C00 0%, #E65100 100%);
}

.register-link {
    text-align: center;
    color: #F57C00;
    margin-top: 20px;
    font-size: 14px;
}

.register-link a {
    color: #FF9800;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border-bottom: 2px solid transparent;
}

.register-link a:hover {
    color: #E65100;
    border-bottom: 2px solid #FF9800;
}

@media (max-width: 480px) {
    .login-card {
        padding: 30px 20px;
    }

    .login-title {
        font-size: 24px;
    }

    .form-input {
        padding: 12px 15px;
        padding-left: 40px;
        font-size: 14px;
    }

    .login-btn {
        padding: 12px;
        font-size: 14px;
    }
}
</style>

