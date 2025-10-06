<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
    /* Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        min-height: 100vh;
        background: #f4f7fa;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: #0d1b2a;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 1.8rem;
        color: #00b4d8;
    }

    .sidebar a {
        padding: 12px 20px;
        margin: 5px 0;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.3s;
    }

    .sidebar a:hover {
        background: #00b4d8;
        color: #000;
    }

    /* Main content */
    .main-content {
        flex: 1;
        padding: 40px;
    }

    .header {
        background: linear-gradient(to right, #6B73FF, #000DFF);
        color: white;
        padding: 25px 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .header h1 {
        font-size: 2rem;
    }

    /* Dashboard cards */
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .card {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.2);
    }

    .card h3 {
        margin-bottom: 10px;
        color: #333;
    }

    .card p {
        font-size: 1.1rem;
        color: #555;
    }

    .logout-btn {
        display: inline-block;
        padding: 10px 20px;
        margin-top: 15px;
        background: #ff4c4c;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        transition: 0.3s;
    }

    .logout-btn:hover {
        background: #ff0000;
        transform: scale(1.05);
    }

    @media(max-width: 768px) {
        body {
            flex-direction: column;
        }
        .sidebar {
            width: 100%;
            flex-direction: row;
            overflow-x: auto;
        }
        .sidebar h2 {
            flex: 1 0 100%;
            text-align: center;
        }
        .sidebar a {
            flex: 1 0 auto;
            text-align: center;
        }
        .main-content {
            padding: 20px;
        }
        .cards {
            grid-template-columns: 1fr;
        }
    }
</style>
</head>
<body>
    <div class="sidebar">
        <h2>My Dashboard</h2>
        <a href="#">Home</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Total Users</h3>
                <p>125</p>
            </div>
            <div class="card">
                <h3>Messages</h3>
                <p>57</p>
            </div>
            <div class="card">
                <h3>Tasks</h3>
                <p>12 Pending</p>
            </div>
            <div class="card">
                <h3>Notifications</h3>
                <p>8 New</p>
            </div>
        </div>
    </div>
</body>
</html>
