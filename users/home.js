 document.getElementById('user-menu-toggle').addEventListener('click', () => {
    document.getElementById('user-menu').classList.toggle('hidden');
  });

  document.getElementById('request-button').addEventListener('click', () => {
    document.getElementById('request-modal').classList.remove('hidden');
  });

  document.getElementById('cancel-button').addEventListener('click', () => {
    document.getElementById('request-modal').classList.add('hidden');
  });

  function openProfile() {
    fetchRequestStatus();
    document.getElementById('profileModal').classList.remove('hidden');
  }

  function closeProfile() {
    document.getElementById('profileModal').classList.add('hidden');
  }

 function updateRequestStatus(status) {
    const statusMapping = {
      'pending': 'Pending',
      'approved': 'Approved',
      'cancelled': 'Cancelled',
      'rejected': 'Rejected'
    };

    const statusClassMapping = {
      'pending': 'status-pending',
      'approved': 'status-approved',
      'cancelled': 'status-cancelled',
      'rejected': 'status-rejected'
    };

    // Log the status value to debug mismatches
    console.log(`Received status: ${status}`);

    const statusText = statusMapping[status] || 'Approved';
    const statusClass = statusClassMapping[status] || 'status-unknown';

    const statusElement = document.getElementById('requestStatus');
    statusElement.innerHTML = `Request Status: <span class="${statusClass}">${statusText}</span>`;
  }

  function fetchRequestStatus() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../admin/fetch_user_status.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        console.log(response); // Debug response data
        updateRequestStatus(response.status);
      } else {
        updateRequestStatus('unknown');
      }
    };
    xhr.onerror = function() {
      updateRequestStatus('unknown');
    };
    xhr.send();
  }

    //ajax call
    $(document).ready(function() {
      // Load supplies data
      function loadSupplies() {
        $('#supplyData').load('../admin/fetch_supplies.php');
      }
      loadSupplies();

      // Refresh the supplies table every 5 seconds
      setInterval(loadSupplies, 5000);

      // Show request modal with item data
      window.requestItem = function(itemId, itemName, maxQuantity) {
        $('#request-modal').removeClass('hidden');
        $('#request-form [name="item-id"]').val(itemId);
        $('#request-form [name="item-name"]').val(itemName);
        $('#request-form [name="quantity"]').attr('max', maxQuantity);
      };

      // Close request modal
      $('#cancel-button').on('click', function() {
        $('#request-modal').addClass('hidden');
      });

      // Submit request form via AJAX
      $('#request-form').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        const itemId = form.find('[name="item-id"]').val();
        const itemName = form.find('[name="item-name"]').val();
        const quantity = form.find('[name="quantity"]').val();

        $.ajax({
          url: '../admin/request.php',
          type: 'POST',
          data: {
            item: itemName,
            quantity: quantity
          },
          success: function(response) {
            const data = JSON.parse(response);
            if (data.message) {
              alert(data.message);
            } else {
              alert('Error: ' + data.error);
            }
            $('#request-modal').addClass('hidden');
          },
          error: function() {
            alert('Error submitting request.');
          }
        });
      });
    });