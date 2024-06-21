<?php
require_once('../database/config.php');
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>User Dashboard | Sneat - Bootstrap 5 HTML Admin Template</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
   <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .app-brand-link {
      display: flex;
      align-items: center;
      text-decoration: none;
    }
    .app-brand-logo {
      max-width: 73px;
      height: auto;
      margin-right: 10px;
    }
    .app-brand-text {
      font-size: 1.25rem;
      font-weight: bold;
      color: #333;
    }
    .status-pending {
      color: #ffcc00; /* Yellow */
    }
    .status-approved {
      color: #28a745; /* Green */
    }
    .status-cancelled,
    .status-rejected {
      color: #dc3545; /* Red */
    }
    .status-unknown {
      color: #28a745; /* Gray */
    }
  </style>
</head>

<body>
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img src="../img/slsulogo.png" alt="Slsu Logo" class="app-brand-logo">
              <span class="app-brand-text demo">SLSU-BC SRS</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <!-- Main Navigation Links -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>

              <!-- User Profile Component -->
              <li class="nav-item ms-3">
                <div class="relative">
                  <!-- User Menu Toggle Button -->
                  <button class="-blue-50 text-white py-2 px-4 rounded-full flex items-center" id="user-menu-toggle">
                    <img src="../assets/img/avatars/1.png" alt="User Avatar" class="w-8 h-8 rounded-full"/> <!-- User Avatar Image -->
                  </button>

                  <!-- Dropdown Menu -->
                  <div class="hidden absolute right-0 mt-2 w-48 bg-white shadow-md rounded-md" id="user-menu">
                    <ul class="py-2">
                      <!-- Profile Link -->
                      <li class="px-4 py-2 hover:bg-zinc-100 cursor-pointer">
                        <a href="#" class="block px-1 py-1 text-black" onclick="openProfile()">Status</a>
                      </li>
                      <!-- Logout Link -->
                      <li class="px-4 py-2 hover:bg-zinc-100 cursor-pointer">
                        <a href="../logout.php" class="block w-full h-full">Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
              <!-- /User Profile Component -->
            </ul>
          </div>
          <!-- /Navbar Navigation -->

        </nav>
        <!-- /Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
              <div class="p-4 flex justify-end">
                <input type="text" placeholder="Search items..." class="border rounded-lg p-2 w-1/3">
              </div>
              <table class="min-w-full">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="py-3 px-6 border-b border-gray-200 text-center">ITEM ID</th>
                    <th class="py-3 px-6 border-b border-gray-200 text-left">ITEM NAME</th>
                    <th class="py-3 px-6 border-b border-gray-200 text-center">QUANTITY</th>
                    <th class="py-3 px-6 border-b border-gray-200 text-left">ACTION</th>
                  </tr>
                </thead>
                <tbody class="bg-white" id="supplyData">
                  <?php
                  $sql = "SELECT id, item_name, quantity FROM supplies ORDER BY id DESC";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr data-item-id='" . htmlspecialchars($row["id"]) . "'>";
                          echo "<td class='py-4 px-6 border-b text-center'>" . htmlspecialchars($row["id"]) . "</td>";
                          echo "<td class='py-4 px-6 border-b text-left item-name'>" . htmlspecialchars($row["item_name"]) . "</td>";
                          echo "<td class='py-4 px-6 border-b text-center item-quantity'>" . htmlspecialchars($row["quantity"]) . "</td>";
                          echo "<td class='py-4 px-6 border-b text-left'>";
                          echo "<button class='bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600' id='request-button' onclick='requestItem(" . $row["id"] . ")'>Request</button>";
                          echo "</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='4' class='text-center py-4 px-6 border-b'>No supplies found</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /Content -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Request Modal -->
  <div class="fixed inset-0 bg-zinc-800 bg-opacity-50 flex items-center justify-center hidden" id="request-modal">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
      <h3 class="text-xl font-bold mb-4">Request Item</h3>
      <form id="request-form">
        <div class="mb-4">
          <label class="block text-zinc-700">Item ID</label>
          <input type="text" class="border rounded-lg p-2 w-full" name="item-id" id="modal-item-id" readonly>
        </div>
        <div class="mb-4">
          <label class="block text-zinc-700">Item Name</label>
          <input type="text" class="border rounded-lg p-2 w-full" name="item-name" id="modal-item-name" readonly>
        </div>
        <div class="mb-4">
          <label class="block text-zinc-700">Quantity</label>
          <input type="number" class="border rounded-lg p-2 w-full" name="quantity" id="modal-quantity">
        </div>
        <div class="flex justify-end">
          <button type="button" class="bg-zinc-500 text-white px-4 py-2 rounded mr-2" id="cancel-button">Cancel</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Profile Modal -->
  <div id="profileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
      <h2 class="text-lg font-semibold mb-4">Status</h2>
      <p id="requestStatus">Request Status: </p>
      <div class="flex justify-end mt-4">
        <button class="bg-zinc-500 text-white px-4 py-2 rounded-lg" onclick="closeProfile()">Close</button>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <script src="../assets/js/main.js"></script>

  <!-- Custom Script -->
 <script src="home.js"></script>
</body>
</html>