<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}


// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Institute Exam User Panel</title>

    <!-- Bootstrap 5 -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Bootstrap Icons -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css' rel='stylesheet'>

    <!-- <link rel='stylesheet' href='assets/style.css'> -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css'>

    <style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Header */
    header {
        background: #343a40;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 20px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    header h5 {
        margin: 0;
        font-size: 18px;
    }

    .menu-toggle {
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: #343a40;
        color: white;
        position: fixed;
        top: 45px;
        /* height of header */
        left: 0;
        height: 100%;
        overflow-y: auto;
        transition: left 0.3s ease;
        z-index: 999;
    }

    .sidebar h4 {
        padding: 20px;
        background: #212529;
        text-align: center;
        margin: 0;
    }

    .sidebar a {
        display: block;
        color: #ddd;
        text-decoration: none;
        padding: 12px 20px;
        transition: background 0.2s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background: #495057;
        color: #fff;
    }

    /* Main content area */
    .main-content {
        margin-left: 250px;
        margin-top: 60px;
        padding: 20px;
        transition: margin-left 0.3s ease;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .menu-toggle {
            display: block;
        }

        .sidebar {
            top: 50px;

            left: -260px;
        }

        .sidebar.show {
            left: 0;
        }

        .main-content {
            margin-left: 0;
        }
    }

    .card-box {
        padding: 18px;
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
    }

    .icon {
        font-size: 28px;
        color: #0d6efd;
    }

    .stat-number {
        font-size: 22px;
        font-weight: 700;
        margin-top: 6px;
    }

    @media (max-width:768px) {
        .stat-number {
            font-size: 18px
        }
    }
    </style>