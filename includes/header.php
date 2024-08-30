<?php
session_start();

// Define the application URL
define('APP_URL', 'http://localhost/5/job-portal/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encarta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f2f2;
        }

        .navbar {
            background-color: black;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
        }

        .nav-links {
            list-style: none;
            display: flex;
            justify-content: center;
            flex: 2;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            padding: 5px 0;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #f0a500;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #000;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #fff;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="logo" href="#">UniBlend</a>
        <ul class="nav-links">
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="<?php echo APP_URL; ?>index.php">Home</a></li>
                <li><a href="<?php echo APP_URL; ?>posted.php">Applications</a></li>
                <li><a href="<?php echo APP_URL; ?>resume/index.php">CV-Builder</a></li>
                <li class="dropdown">
                    <button class="dropbtn">JOB</button>
                    <div class="dropdown-content">
                        <a href="<?php echo APP_URL; ?>profile.php">Profile</a>
                        <a href="<?php echo APP_URL; ?>post.php">Hire</a>
                        <a href="<?php echo APP_URL; ?>saved.php">Saved</a>
                        <a href="<?php echo APP_URL; ?>applied.php">Applied</a>
                    </div>
                </li>
                <li class="dropdown">
                    <button class="dropbtn"><?php echo htmlspecialchars($_SESSION['username']); ?></button>
                    <div class="dropdown-content">
                        <a href="<?php echo APP_URL; ?>bio.php">Bio</a>
                        <a href="<?php echo APP_URL; ?>set.php">Settings</a>
                        <a href="<?php echo APP_URL; ?>logout.php">Logout</a>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
