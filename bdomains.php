<?php
session_start();
// error_reporting(0);
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../includes/dbconnection.php');
if (strlen($_SESSION['student_id']) == 0) {
  header('location:logout.php');
} else {
$search = isset($_GET['url']) ? trim($_GET['url']) : '';
?>

  <style>
    .table td {
      vertical-align: middle;
      font-size: 0.875rem;
      line-height: 1.5;
      white-space: inherit !important;
    }

    .table th {
      vertical-align: middle;
      font-size: 1rem;
      line-height: 1.5;
    }

    .input_text {
      font-size: 1.10rem;
      padding: 0.8rem 2rem;
    }

    /* Wrapper responsive layout */
    .d-flex.flex-wrap.gap-3.align-items-center.mb-3 {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: stretch;
      justify-content: flex-start;
    }

    /* Card general styling */
    .d-flex .card {
      flex: 1 1 auto;
      min-width: 207px;
      padding: 10px;
      box-sizing: border-box;
    }

    /* Search input & button full responsive */
    .form-group {
      display: flex;
      flex-wrap: nowrap;
      gap: 8px;
      width: 100%;
    }

    .form-group input {
      flex: 1 1 auto;
      min-width: 150px;
    }

    .form-group button {
      flex: 0 0 auto;
      white-space: nowrap;
    }

    /* Dropdown buttons responsive */
    .card .btn.dropdown-toggle {
      width: 100%;
      text-align: center;
    }

    /* Dropdown menu fix for mobile */
    .dropdown-menu {
      min-width: 100%;
      font-size: 14px;
    }

    /* Tablet view */
    @media (max-width: 768px) {
      .d-flex.flex-wrap.gap-3.align-items-center.mb-3 {
        justify-content: center;
      }

      .d-flex .card {
        flex: 1 1 100%;
        max-width: 100%;
      }

      .form-group {
        flex-direction: column;
      }

      .form-group input,
      .form-group button {
        width: 100%;
      }
    }

    /* Mobile view */
    @media (max-width: 480px) {
      .form-group input {
        font-size: 14px;
        padding: 8px;
      }

      .form-group button {
        font-size: 14px;
        padding: 8px;
      }

      .btn.dropdown-toggle {
        font-size: 14px;
        padding: 10px;
      }

      .dropdown-menu {
        font-size: 13px;
      }
    }

    /* Pagination container */
    .pagination {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      
      list-style: none;
      padding: 0;
      margin: 10px 0;
      gap: 6px;
    }

    /* Pagination links */
    .pagination li a {
      display: inline-block;
      padding: 8px 16px;
      text-decoration: none;
      color: #333;
      background: #f1f1f1;

      border-radius: 50px;
      font-size: 14px;
      font-weight: 500;
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }

    /* Hover effect */
    .pagination li a:hover {
      background: #007bff;
      color: #fff;
      border-color: #007bff;
    }

    /* Disabled state */
    .pagination li.disabled a {
      pointer-events: none;
      opacity: 0.5;
      background: #e9ecef;
      color: #999;
    }

    /* Responsive for tablets */
    @media (max-width: 768px) {
      .pagination li a {
        padding: 6px 12px;
        font-size: 13px;
      }
    }

    /* Responsive for mobiles */
    @media (max-width: 480px) {
      .pagination {
        gap: 4px;
      }

      .pagination li a {
        padding: 5px 10px;
        font-size: 12px;
      }
    }
  </style>



  <div class="container-scroller">

    <!-- Header -->
    <?php include_once('includes/header.php'); ?>
    <!-- End Header -->

    <div class="container-fluid page-body-wrapper">

      <!-- Sidebar -->
      <?php include_once('includes/sidebar.php'); ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="content-wrapper">

          <!-- Page Header -->
          <div class="page-header d-flex justify-content-between align-items-center flex-wrap">
            <h3 class="page-title mb-2 mb-sm-0">Blocked Onion domains</h3>

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blocked Onion domains</li>
              </ol>
            </nav>
          </div>
          <!-- End Page Header -->

          <!-- Page Content -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <!-- Search Form -->
                  <div class="row">
                    <div class="col-12 mb-3">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <!-- Search & Filter Section -->
                          <div class="d-flex flex-wrap gap-3 align-items-center mb-3">
                            <div class="card mb-3  col-auto">
                              <!-- <strong>Search Domain:</strong> -->
                              <form method="get" action="bdomains.php" class="form-inline my-2 my-lg-0">
                                <div class="form-group">
                                  <input id="searchdata" type="text" name="url" required="true" class="form-control input_text"
                                    placeholder="Search Domain" value="<?php echo isset($_GET['url']) ? htmlspecialchars($_GET['url']) : ''; ?>">
                                  <button type="submit" class="btn btn-primary input_text" id="submit">Search</button>
                                </div>
                              </form>

                            </div>
                          
                  
                          </div>
                        </div>
                        <!-- // Search form ended -->

                        <div class="table-responsive border rounded" style="z-index: 0; transform: translate3d(0px, 0px, 0px) !important;">
                          <table class="table table-hover table-bordered align-middle text-nowrap">
                            <thead class="table-primary sticky-top">
                              <tr>
                                <th>S.No</th>
                                <th>Emails</th>
                                <th>Url</th>
                              
                                <!-- <th>Issue With Url</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              // Pagination Logic
// Current Page Number
$pageno = isset($_GET['pageno']) ? (int)$_GET['pageno'] : 1;
$no_of_records_per_page = 100;
$offset = ($pageno - 1) * $no_of_records_per_page;

// Filters
$whereConditions = [];
$params = [];

// Search by URL
if (isset($_POST['search']) && !empty($_POST['url'])) {
    $url = trim($_POST['url']);
    $whereConditions[] = "url LIKE CONCAT('%', :url, '%')";
    $params[':url'] = $url;
} elseif (!empty($_GET['url'])) {
    $url = trim($_GET['url']);
    $whereConditions[] = "url LIKE CONCAT('%', :url, '%')";
    $params[':url'] = $url;
} else {
    $url = ''; // default empty
}

// WHERE clause
$whereSQL = "";
if (!empty($whereConditions)) {
    $whereSQL = " WHERE " . implode(" AND ", $whereConditions);
}

// Count total records
$ret = "SELECT COUNT(*) FROM report_abuse $whereSQL";
$query1 = $dbh->prepare($ret);
foreach ($params as $key => $val) {
    $query1->bindValue($key, $val);
}
$query1->execute();
$total_rows = $query1->fetchColumn();
$total_pages = ceil($total_rows / $no_of_records_per_page);

// Final query with pagination
$sql = "SELECT * FROM report_abuse $whereSQL ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
$query = $dbh->prepare($sql);
foreach ($params as $key => $val) {
    $query->bindValue($key, $val);
}
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
    
                         
                              // Table output
                              $cnt = $offset + 1;
                              if ($query->rowCount() > 0) {
                                foreach ($results as $row) { ?>
                                  <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo htmlentities($row['email']); ?></td>
                                    <td><?php echo htmlentities($row['url']); ?></td>
                                  
                                    <!-- <td><?php echo htmlentities($row['issue_with_url']); ?></td> -->
                                  
                                  </tr>
                                <?php
                                  $cnt++;
                                }
                              } else { ?>
                                <tr>
                                  <td colspan="11" class="text-center text-muted">No Records Found</td>
                                </tr>
                              <?php } ?>

                            </tbody>
                          </table>
                        </div>
                        <div align="left" class="mt-4">
                          <ul class="pagination">
                            <?php $urlParam = $url ? '&url=' . urlencode($url) : '';?>
                            <li><a href="?pageno=1<?php echo $urlParam; ?>"><strong>First</strong></a></li>
                            <li class="<?php if ($pageno <= 1) {
                                          echo 'disabled';
                                        } ?>">
                              <a href="<?php if ($pageno <= 1) {
                                          echo '#';
                                        } else {
                                          echo "?pageno=" . ($pageno - 1) . $urlParam;
                                        } ?>"><strong>
                                  < Prev</strong></a>
                            </li>
                            <li class="<?php if ($pageno >= $total_pages) {
                                          echo 'disabled';
                                        } ?>">
                              <a href="<?php if ($pageno >= $total_pages) {
                                          echo '#';
                                        } else {
                                          echo "?pageno=" . ($pageno + 1) . $urlParam;
                                        } ?>"><strong>Next ></strong></a>
                            </li>
                            <li><a href="?pageno=<?php echo $total_pages; ?><?php echo $urlParam; ?>"><strong>Last</strong></a></li>
                          </ul>


                          <?php
//                           echo '<ul class="pagination">';
// if ($pageno > 1) {
//     echo '<li><a href="?pageno=' . ($pageno - 1) . '&url=' . urlencode($url) . '">Prev</a></li>';
// }
// for ($i = 1; $i <= $total_pages; $i++) {
//     $active = ($i == $pageno) ? 'class="active"' : '';
//     echo "<li $active><a href='?pageno=$i&url=" . urlencode($url) . "'>$i</a></li>";
// }
// if ($pageno < $total_pages) {
//     echo '<li><a href="?pageno=' . ($pageno + 1) . '&url=' . urlencode($url) . '">Next</a></li>';
// }
// echo '</ul>';

                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- content-wrapper -->

        <!-- Footer -->
        <?php include_once('includes/footer.php'); ?>
        <!-- End Footer -->

      </div> <!-- main-panel -->

    </div> <!-- container-fluid page-body-wrapper -->

  </div> <!-- container-scroller -->

<?php } ?>