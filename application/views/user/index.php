<?php $this->load->view('includes/header'); ?>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">User List</h5>
<!-- Add User Button -->
        <a href="<?= base_url('user/add') ?>" class="btn btn-primary mb-3">Add User</a>

 <!-- Table Column Titles: Displaying each attribute of the user -->
        <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($users as $row) { ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['mobile']?></td>
                            <td><?=$row['address']?></td>
                            <td><?=$row['created_at']?></td>
                            <td><?=$row['created_by']?></td>  
                            <td>
                                
 <!-- Edit Button: Redirects to the edit page for the selected user -->
  <?php echo "dev1-042825test"; ?>
 <a href="<?= site_url('user/edit/' . $row['id']) ?>" class="btn btn-sm btn-primary">Edit</a>

 <!-- Delete Button: Links to the delete function with confirmation before deleting the user -->

    <a href="<?= base_url('user/delete/' . $row['id']) ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a>
    </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            Successfully Added
                        </div>
                    <?php }
                    ?>
                    <?php
                    if ($this->session->flashdata('deleted')) { ?>
                        <div class="alert alert-success" role="alert">
                            Successfully Deleted
                        </div>
                    <?php }
                    ?>
                    <?php
                    if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert">
                            Failed!
                        </div>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('includes/footer'); ?>