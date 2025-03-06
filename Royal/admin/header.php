<?php
session_start();
if (!isset($_SESSION['AdminName'])) {
    header('location:login.php');
    exit;
}

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
  <title>Royal Admin Dashboard</title>

  <!-- ✅ External Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

  <!-- ✅ External JavaScript & Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>

    body {
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      transition: all 0.3s ease;
    }

    .custom-sidebar {
      width: 270px;
      height: 100vh;
      background: #222;
      position: fixed;
      left: 0;
      top: 0;
      transition: all 0.3s ease-in-out;
      box-shadow: 2px 0px 10px rgba(0,0,0,0.3);
      z-index: 1000;
      color: #fff;
    }
    .custom-sidebar.active {
      left: -270px;
    }
    .custom-sidebar-wrapper {
      padding: 20px;
    }
    .custom-sidebar h4 {
      text-align: center;
      font-size: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid #444;
      margin-bottom: 10px;
    }
    .custom-sidebar ul {
    list-style: none;
    padding: 0;
    gap: 14px;
    margin-top: 20px;
}
    .custom-sidebar ul li {
    padding: 12px 15px;
    transition: all 0.3s;
    width: 100%;
}
    .custom-sidebar ul li:hover {
      background: #333;
    }
    .custom-sidebar ul li a {
      text-decoration: none;
      color: #fff;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 15px;
    }
    .custom-sidebar ul li.active a {
      color: #00A6FF;
      font-weight: bold;
    }
    
    .custom-sidebar ul li i {
      width: 20px;
    }

    .custom-menu-toggle {
      display: none;
      font-size: 22px;
      cursor: pointer;
      padding: 10px 15px;
      background: #222;
      color: #fff;
      border-radius: 5px;
      position: absolute;
      top: 15px;
      left: 15px;
      z-index: 1000;
      box-shadow: 0px 2px 5px rgba(0,0,0,0.3);
    }

    .custom-nav-item ul {
      padding-left: 20px;
      display: none;
      background: #333;
    }
    .custom-nav-item.custom-dropdown-active ul {
      display: block !important;
    }
    @media (max-width: 768px) {
      .custom-menu-toggle {
        display: block;
      }
      .custom-sidebar {
        left: -270px;
        transition: all 0.3s ease-in-out;
      }
      .custom-sidebar.active {
        left: 0;
      }
    }
    @media (max-width: 989px) {
      .custom-menu-toggle {
        display: block;
      }
      .custom-sidebar {
        left: -270px;
        transition: all 0.3s ease-in-out;
      }
      .custom-sidebar.active {
        left: 0;
      }
      .custom-sidebar ul {
        margin-top: 31px;
}
    }

    .head-h {
    display: flex;
    gap: 14px;
    align-items: center;
    justify-content: center;
}
.logo {
    width: 63px;
}
  </style>
</head>

<body>


  <span class="custom-menu-toggle"><i class="fas fa-bars"></i></span>


  <div class="custom-sidebar" id="custom-sidebar">
    <div class="custom-sidebar-wrapper">
      <div class="head-h">
      <div class="logo">
      <a href="index.php" rel="noopener noreferrer"> <img src="assets/img/logo/logo.png" alt="logo" ></a>
    </div>
    <h4>Admin Panel</h4>
    </div>
      <ul class="nav">
        <li class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">
          <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="<?php echo ($current_page == 'view_users.php') ? 'active' : ''; ?>">
          <a href="view_users.php"><i class="fas fa-users"></i> Users</a>
        </li>

<li class="custom-nav-item custom-dropdown">
          <a href="#" class="custom-nav-link custom-reports-dropdown"><i class="fas fa-chart-bar"></i> Categories <i class="fa fa-chevron-down float-end"></i></a>
          <ul class="nav flex-column">
            <li class="<?php echo ($current_page == 'view_categories.php') ? 'active' : ''; ?>">
              <a href="view_categories.php"><i class="fas fa-star"></i> Main Categories</a>
            </li>
            <li class="<?php echo ($current_page == 'view_subcategories.php') ? 'active' : ''; ?>">
              <a href="view_subcategories.php"><i class="fas fa-user"></i> Sub Categories</a>
            </li>
          </ul>
        </li>

        <li class="<?php echo ($current_page == 'view_products.php') ? 'active' : ''; ?>">
          <a href="view_products.php"><i class="fas fa-box"></i> Products</a>
        </li>
        <li class="<?php echo ($current_page == 'view_orders.php') ? 'active' : ''; ?>">
          <a href="view_orders.php"><i class="fas fa-shopping-cart"></i> Orders</a>
        </li>

        <li class="custom-nav-item custom-dropdown">
          <a href="#" class="custom-nav-link custom-reports-dropdown"><i class="fas fa-chart-bar"></i> Reports <i class="fa fa-chevron-down float-end"></i></a>
          <ul class="nav flex-column">
            <li class="<?php echo ($current_page == 'best_selling_products.php') ? 'active' : ''; ?>">
              <a href="best_selling_products.php"><i class="fas fa-star"></i> Best Selling Products</a>
            </li>
            <li class="<?php echo ($current_page == 'top_customers.php') ? 'active' : ''; ?>">
              <a href="top_customers.php"><i class="fas fa-user"></i> Top Customers</a>
            </li>
          </ul>
        </li>
        <li class="<?php echo ($current_page == 'view_contact.php') ? 'active' : ''; ?>">
          <a href="view_contact.php"><i class="fas fa-box"></i> Contacts</a>
        </li>
        <li>
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>

  <script>
    $(document).ready(function(){
      $(".custom-menu-toggle").click(function(){
        $("#custom-sidebar").toggleClass("active");
      });

      $(".custom-reports-dropdown").click(function(event){
        event.preventDefault();
        $(this).parent().toggleClass("custom-dropdown-active");
      });

      $(document).click(function(event) {
        if (!$(event.target).closest(".custom-sidebar, .custom-menu-toggle").length) {
          $("#custom-sidebar").removeClass("active");
        }
      });
    });
  </script>

</body>
</html>
