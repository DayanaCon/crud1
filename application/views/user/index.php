<?php $this->load->view('includes/header'); ?>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">User List</h5>
               
                <div class="container">
             <div class="d-flex justify-content-end mt-3">
               <a href="<?= base_url('admin/logout') ?>" class="btn btn-sm btn-dark">Logout</a>
             </div>
            </div>
                <!-- Add User Button -->
                <a href="<?= base_url('user/add') ?>" class="btn btn-primary mb-3">Add User</a>
<!-- Table Column Titles: Displaying each attribute of the user -->
        <table class="table table-bordered">
                <thead>
                <tr>
                <th>Photo</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Created By</th>
                <th>Resume</th> 
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($users as $row) { ?>
            <tr>
                <td>
                    <?php if (!empty($row['photo'])) { ?>
                        <img src="<?= base_url('uploads/' . $row['photo']) ?>" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                    <?php } else { ?>
                        <span>No Photo</span>
                    <?php } ?>
                </td>
                <td><?=$i++?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['created_at'] ?></td>
                <td><?= $row['created_by'] ?></td>
                <!-- Resume Download Cell -->
                <td>
                    <?php if (!empty($row['attachment'])) { ?>
                        <a href="<?= site_url('user/download/' . $row['attachment']) ?>" class="btn btn-sm btn-info">Download Resume</a>
                    <?php } else { ?>
                        <span>No Attachment</span>
                    <?php } ?>
                </td>
                <td>
                    <a href="<?= site_url('user/edit/' . $row['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?= base_url('user/delete/' . $row['id']) ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
            <?php } ?>
              </tbody>
            </table>
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        Successfully Added
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('deleted')) { ?>
                    <div class="alert alert-success" role="alert">
                        Successfully Deleted
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                        Failed!
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php if (!empty($expiring_vehicles)): ?>
<!-- Modal -->
<div class="modal fade" id="reminderModal" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="reminderModalLabel">Reminder</h5>
      </div>
      <div class="modal-body">
        The following vehicles will expire within a month:
        <ul>
          <?php foreach ($expiring_vehicles as $vehicle): ?>
            <li><?= $vehicle->plate_number ?> - Expiry: <?= date('F d, Y', strtotime($vehicle->registration_expiry_date)) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Delay 2 minutes (120000 milliseconds)
    setTimeout(function () {
      var reminderModal = new bootstrap.Modal(document.getElementById('reminderModal'));
      reminderModal.show();
    }, 120000);
  });
</script>
<?php $this->load->view('includes/footer'); ?>