<?php
 require_once('../database/config.php');
 ?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Supply Requisition System</title>
  <meta name="description" content="" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
  <!-- Page CSS -->
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
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
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="supply.php" target="_blank" class="menu-link">
                  <div data-i18n="Supply">Supply</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="notification.php" target="_blank" class="menu-link">
                  <div data-i18n="Notification">Notification</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="historylog.php" target="_blank" class="menu-link">
                  <div data-i18n="Historylog">History Logs</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/0.jpg" alt class="w-px-30 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../assets/img/avatars/mailchimp.png" alt class="w-px-40 h-auto rounded-circle" />
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
        <!-- / Navbar -->
        <div class="card" style="padding: 50px; margin: 50px;">
          <h5 class="card-header" style="background-color: ghostwhite;">Supply</h5>
          <div class="table-responsive text-nowrap">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Supply</button>
            <table class="table">
              <thead class="">
                <tr>
                  <th>Id</th>
                  <th>Items</th>
                  <th>Quantity</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                $sql = "SELECT id, item_name, quantity FROM supplies";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["item_name"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>
                              <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#updateModal'>Update</button>
                              <button class='btn btn-sm btn-danger' onclick='deleteSupply(" . $row["id"] . ")'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Modals -->
        <!-- Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Supply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="modal-body p-4">
  <form id="addSupplyForm" method="POST" action="" class="space-y-4">
    <div class="flex flex-col md:flex-row md:items-center md:space-x-2">
      <label for="item_name" class="block mb-2 md:mb-0 text-sm font-medium text-gray-900 dark:text-gray-800 w-full md:w-auto">Item Name:</label>
      <input type="text" id="item_name" name="item_name" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-500 dark:text-gray-900" placeholder="Enter item name">
    </div>
    <div class="flex flex-col md:flex-row md:items-center md:space-x-2">
      <label for="quantity" class="block mb-2 md:mb-0 text-sm font-medium text-gray-900 dark:text-gray-800 w-full md:w-auto">Quantity:</label>
      <input type="number" id="quantity" name="quantity" class="bg-white border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-500 dark:text-gray-900" placeholder="Enter quantity">
    </div>
    <div class="flex justify-start md:justify-end mt-4">
      <button type="button" onclick="addSupply()" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Add Supply</button>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>function addSupply() {
    var form = $('#addSupplyForm');
    $.ajax({
        type: 'POST',
        url: 'add_supply.php',
        data: form.serialize(),
        success: function(response) {
            alert('Supply added successfully:', response);
            location.reload(); // Automatically refresh to show the new supply.
        },
        error: function(xhr, status, error) {
            console.error('Error adding supply:', error);
        }
    });
}
</script>

                  <!--<button type="submit" class="btn btn-primary">Add Supply</button>-->
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Supply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="updateSupplyForm" method="POST" action="update_supply.php">
                  <input type="hidden" id="update_id" name="id">
                  <div class="mb-3">
                    <label for="update_item_name" class="form-label">Item Name</label>
                    <input type="text" class="form-control" id="update_item_name" name="item_name" required>
                  </div>
                  <div class="mb-3">
                    <label for="update_quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="update_quantity" name="quantity" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Update Supply</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-8 mb-4 order-0"></div>
              <div class="col-lg-4 col-md-4 order-1">
                <div class="row"></div>
              </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
      function deleteSupply(id) {
        if (confirm("Are you sure you want to delete this supply?")) {
          window.location.href = `delete_supply.php?id=${id}`;
        }
      }

      $('#updateModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.closest('tr').find('td:first').text();
        var itemName = button.closest('tr').find('td:nth-child(2)').text();
        var quantity = button.closest('tr').find('td:nth-child(3)').text();

        var modal = $(this);
        modal.find('#update_id').val(id);
        modal.find('#update_item_name').val(itemName);
        modal.find('#update_quantity').val(quantity);
      });
    </script>
  </body>
</html>
