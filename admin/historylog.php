<?php
  require_once ('../database/config.php');
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>History Log - Admin - Supply Requisition System</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>

  <style>
    .card {
      animation: fadeInUp 1s ease-in-out;
      box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
      border: none;
      border-radius: 0.5rem;
    }

    .navbar-nav-right {
      animation: fadeInDown 1s ease-in-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .content-wrapper {
      padding: 2rem;
    }

    .card-body {
      padding: 2rem;
    }

    .card-title {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .btn-outline-primary {
      border: 1px solid #696cff;
      color: #696cff;
    }

    .btn-outline-primary:hover {
      background-color: #696cff;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="../index.php" class="app-brand-link">
            <img src="../img/slsulogo.png" alt="Slsu Logo" class="app-brand-logo" style="max-width: 80px; height: auto; margin-right: -18px;">
            <span class="app-brand-logo demo"></span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">SLSU-BC SRS</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-item active open">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">Dashboards</div>
              <div class="badge bg-danger rounded-pill ms-auto">3</div>
            </a>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-item">
            <a href="supply.php" class="menu-link">
              <div data-i18n="Supply">Supply</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="notification.php" class="menu-link">

                <div data-i18n="Notification">Notification</div>
          </a>
        </li>
        <li class="menu-item active">
          <a href="historylog.php" class="menu-link">
            <div data-i18n="History Logs">History Logs</div>
          </a>
        </li>
      </ul>
    </aside>

    <div class="layout-page">
      <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
          </a>
        </div>
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                  <img src="../assets/img/avatars/0.jpg" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-medium d-block">Admin</span>
                        <small class="text-muted"></small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="../logout.php">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Log Out</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-primary">History Logs</h5>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Request ID</th>
                        <th>Username</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Request Date</th>
                      </tr>
                    </thead>
                    <tbody id="history-log-list"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery Library -->

<!-- Fetch History Logs -->
<script>
  function fetchHistoryLogs() {
    $.ajax({
      url: 'historylog_data.php',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        let logsHTML = '';

        response.historylogs.forEach(log => {
          logsHTML += `
            <tr>
              <td>${log.request_id}</td>
              <td>${log.username}</td>
              <td>${log.item}</td>
              <td>${log.quantity}</td>
              <td>${log.status}</td>
              <td>${log.request_date}</td>
            </tr>
          `;
        });

        $('#history-log-list').html(logsHTML);
      },
      error: function () {
        console.error('Error fetching history logs.');
        }
      });
    }

    // Call the function to load history logs on page load
    $(document).ready(function () {
      fetchHistoryLogs();
    });
  </script>

<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../assets/vendor/js/menu.js"></script>
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/dashboards-analytics.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>