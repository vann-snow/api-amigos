// Function to fetch notifications
    function fetchNotifications() {
      $.ajax({
        url: 'admin_notification.php',
        type: 'GET',
        success: function (response) {
          const data = JSON.parse(response);
          // Update badge count
          $('#notification-badge').text(data.notifications.length);

          // Populate notification list
          let notificationsHTML = '';
          data.notifications.forEach(notification => {
            notificationsHTML += `
              <tr>
                <td>${notification.id}</td>
                <td>${notification.item}</td>
                <td>${notification.quantity}</td>
                <td>${notification.user}</td>
                <td>${notification.date}</td>
                <td>
                  <button class="btn btn-success" onclick="approveRequest(${notification.id})">Approve</button>
                  <button class="btn btn-danger" onclick="rejectRequest(${notification.id})">Reject</button>
                </td>
              </tr>
            `;
          });
          $('#notification-list').html(notificationsHTML);
        },
        error: function () {
          console.error('Error fetching notifications.');
        }
      });
    }

    // Call the function to load notifications
    fetchNotifications();

 // Function to approve a request
function approveRequest(id) {
  $.ajax({
    url: 'update_request.php',
    type: 'POST',
    data: { request_id: id, action: 'approve' },
    dataType: 'json',
    success: function (response) {
      alert(response.message);
      fetchNotifications(); // Refresh notifications list
    },
    error: function (xhr, status, error) {
      console.error('Error approving request:', xhr.responseText, status, error);
      alert('Error approving request.');
    }
  });
}

// Function to reject a request
function rejectRequest(id) {
  $.ajax({
    url: 'update_request.php',
    type: 'POST',
    data: { request_id: id, action: 'reject' },
    dataType: 'json',
    success: function (response) {
      alert(response.message);
      fetchNotifications(); // Refresh notifications list
    },
    error: function (xhr, status, error) {
      console.error('Error rejecting request:', xhr.responseText, status, error);
      alert('Error rejecting request.');
    }
  });
}
  
  // Function to update the request status via AJAX
  function adminActionChangeStatus(requestId, newStatus) {
    $.ajax({
      url: 'update_request.php',
      type: 'POST',
      data: {
        request_id: requestId,
        action: newStatus
      },
      dataType: 'json',
      success: function(response) {
        alert(response.message); // Optional: Display the response message
        fetchNotifications(); // Refresh the notification list
      },
      error: function(xhr, status, error) {
        console.error(`Error updating request status: ${xhr.responseText}, ${status}, ${error}`);
        alert(`Error updating request to ${newStatus}.`);
      }
    });
  }

    // Fetch notifications periodically
    $(document).ready(function () {
      fetchNotifications();
      setInterval(fetchNotifications, 5000); // Refresh every 5 seconds
    });