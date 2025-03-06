<?php 
include("header.php");
include("connection.php");

$q = "SELECT id, username, email, phone, address, created_at FROM users";
$result = mysqli_query($con, $q);
?>

<div class="main-panel">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Users List</h4>
            <input type="text" id="userSearch" class="form-control search-bar" placeholder="Search Users..." style="width: 250px;">
          </div>
          <div class="card-body">
            <div class="table-responsive text-center">
              <table class="table" id="userTable">
                <thead class="text-primary">
                  <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Joined Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td class="text-dark"><?php echo htmlspecialchars($row['username']); ?></td>
                      <td class="text-dark"><?php echo htmlspecialchars($row['email']); ?></td>
                      <td class="text-dark"><?php echo htmlspecialchars($row['phone']); ?></td>
                      <td class="text-dark">
                        <div class="address-box">
                          <?php echo htmlspecialchars($row['address']); ?>
                        </div>
                      </td>
                      <td class="text-dark"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                      <td class="crud-buttons">
                        <button type="button" class="btn btn-info btn-round" onclick="viewUserDetails(<?php echo $row['id']; ?>)">View Details</button>
                        <button type="button" class="btn btn-danger btn-round" onclick="deleteUser(<?php echo $row['id']; ?>)">Delete</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="userDetailsContent">
      </div>
    </div>
  </div>
</div>

<style>
  .address-box {
    max-width: 300px;
    word-wrap: break-word;
    white-space: normal;
  }

  @media (max-width: 768px) {
    .address-box {
      max-width: 200px;
    }
  }

  @media (max-width: 576px) {
    .address-box {
      max-width: 150px;
    }
  }
  
  @media (max-width: 658px) {
    .search-bar {
      width: 203px !important;
    }
    h4 {
      font-size: 1.300em;
    }
  }
  
  @media (max-width: 509px) {
    .card-header {
      flex-direction: column;
    }
    .search-bar {
      width: 272px !important;
      margin-top: 10px;
    }
    h4 {
      font-size: 2.3em;
    }
  }
  
  .crud-buttons {
    display: flex;
    gap: 5px;
    flex-direction: column;
  }
</style>

<script>
function viewUserDetails(userId) {
  $.ajax({
    url: 'get_user_details.php',
    type: 'GET',
    data: { id: userId },
    success: function(response) {
      $('#userDetailsContent').html(response);
      $('#userDetailsModal').modal('show');
    },
    error: function() {
      alert('Error fetching user details');
    }
  });
}

function deleteUser(userId) {
  if (confirm('Are you sure you want to delete this user?')) {
    $.ajax({
      url: 'delete_user.php',
      type: 'POST',
      data: { id: userId },
      success: function(response) {
        if (response === 'success') {
          location.reload();
        } else {
          alert('Error deleting user');
        }
      },
      error: function() {
        alert('Error deleting user');
      }
    });
  }
}

document.getElementById("userSearch").addEventListener("keyup", function() {
  let value = this.value.toLowerCase();
  let rows = document.querySelectorAll("#userTable tbody tr");
  rows.forEach(row => {
    row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
  });
});
</script>

<?php include("footer.php"); ?>