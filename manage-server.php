<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if (strlen($_SESSION['admin_id']) == 0) {
    header('location:logout.php');
} else {

    // $serverList = [];
    $sql = "SELECT * FROM `tbl_server` WHERE 1 ORDER BY id DESC LIMIT 100";
    $query = $dbh->prepare($sql);
    $query->execute();
    $serverList = $query->fetchAll();
    // print_r($serverList);
    // exit;


?>
    <style>
        /* ====== General Reset ====== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ====== Container ====== */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 15px;
        }

        /* ====== Card ====== */
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-body {
            padding: 20px;
        }

        /* ====== Card Title + Button ====== */
        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        /* ====== List Style ====== */
        .list-group {
            list-style: none;
            margin-top: 15px;
        }

        .list-group-item {
            background: #fafafa;
            border: 1px solid #eee;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.3s;
        }

        .list-group-item:hover {
            background: #f0f4ff;
        }

        /* ====== Buttons ====== */
        .btn {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-sm {
            font-size: 13px;
            padding: 5px 10px;
        }

        .btn-primary {
            background: #007bff;
            color: white;
            border: none;
        }

        .btn-outline-info {
            border: 1px solid #17a2b8;
            color: #17a2b8;
        }

        .btn-outline-danger {
            border: 1px solid #dc3545;
            color: #dc3545;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* ====== Responsive Design ====== */
        @media (max-width: 768px) {
            .list-group-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .list-group-item div {
                width: 100%;
                display: flex;
                justify-content: flex-end;
                gap: 10px;
            }

            .btn {
                flex: 1;
                text-align: center;
            }
        }

        @media (max-width: 525px) {
            .card-title {
                font-size: 16px;
            }

            .btn {
                font-size: 12px;
                padding: 4px 6px;
            }
        }
    </style>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <?php include_once('includes/header.php'); ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include_once('includes/sidebar.php'); ?>
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">All Servers</h3>

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Servers</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="container mt-4">

                        <!-- Success/Error Message -->
                        <?php if (isset($_SESSION['msg'])): ?>
                            <div class="alert alert-info"><?php echo $_SESSION['msg'];
                                                            unset($_SESSION['msg']); ?></div>
                        <?php endif; ?>

                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Server List</h5>
                                    <a href="add-server.php" class="btn btn-sm btn-primary">+ Add Server</a>
                                </div>

                                <ul class="list-group">
                                    <?php foreach ($serverList as $srv): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?php echo strtoupper(htmlspecialchars($srv['server_name'])); ?>
                                            <div>
                                                <a href="edit-server.php?editserver=<?php echo $srv['id']; ?>"
                                                    class="btn btn-sm btn-outline-info me-2">
                                                    Edit
                                                </a>
                                                <a href="delete-server.php?delserver=<?php echo $srv['id']; ?>"
                                                    onclick="return confirm('Are you sure you want to delete this <?php echo htmlspecialchars($srv['server_name']); ?> server?');"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Delete
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // Include footer
                include('includes/footer.php');
                ?>
            </div>
        </div>
    <?php } ?>