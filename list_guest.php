<?php 

 include 'sidebar.php';  ?>

<div class="main-content">
  <div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
      <h4>Guest Entries</h4>
      <a href="add_guest.php" class="btn btn-primary">+ Add Guest</a>
    </div>

    <div class="card shadow-sm">
      <div class="table-responsive p-3">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Guest Name</th>
              <th>Phone</th>
              <th>Purpose</th>
              <th>Date</th>
              <th>Time</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $q = mysqli_query($conn, "SELECT * FROM guest_entries ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($q)) {
          ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['guest_name'] ?></td>
              <td><?= $row['phone'] ?></td>
              <td><?= $row['purpose'] ?></td>
              <td><?= $row['visit_date'] ?></td>
              <td><?= $row['visit_time'] ?></td>
              <td>
                <a href="view_guest.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">View</a>
                <a href="delete_guest.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Delete this entry?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?php include 'footer.php'; ?>
