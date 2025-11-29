<?php    
include("sidebar.php"); ?>

<div class="main-content">
    <div class="card shadow p-4">
        <h3 class="mb-3">Guest Entry Form</h3>

        <form action="insert_guest.php" method="POST">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Guest Name</label>
                    <input type="text" name="guest_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Purpose of Visit</label>
                    <input type="text" name="purpose" class="form-control" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="visit_date" class="form-control" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Time</label>
                    <input type="time" name="visit_time" class="form-control" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Final Comments</label>
                    <textarea name="comments" class="form-control"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Attended By</label>
                    <input type="text" name="attended_by" class="form-control">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Save Entry</button>
                    <a href="list_guest.php" class="btn btn-secondary">View All</a>
                </div>
            </div>

        </form>
    </div>
</div>

<?php include("footer.php"); ?>
