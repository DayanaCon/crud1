<?php $this->load->view('includes/header'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title text-center">ATTACHMENT LIST</h5>
                <div class="d-flex justify-content-end mb-3">
                    <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-sm btn-dark">Logout</a>
                </div>
                <a href="<?php echo base_url('attach/create_view') ?>" class="btn btn-primary mb-3">Add User</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Attachment File</th>
                            <th>Created At</th>
                            <th>Created By</th>
                            <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lists as $row): ?>
                                <tr>
                                <td><?= $row->us_id?></td>
                                <td><?= $row->urs_name ?></td>
                                <td><?= $row->adds ?></td>
                                <td>
                                <?php if (!empty($row->att_file)): ?>
                                <a href="<?php echo base_url('attach/download/'. $row->att_file) ?>" class="btn btn-sm btn-info">Download</a>
                                <?php else: ?>
                                <span>No Attachment</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $row->cre_at ?></td>
                                <td><?= $row->cre_by ?></td>
                                <td>
                                    <a href="<?php echo site_url('attach/edit_view/' . $row->us_id) ?>" 
                                    class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url('attach/delete/'. $row->us_id) ?>" 
                                    onclick="return confirm('Are you sure you want to delete this user?')" 
                                    class="btn btn-sm btn-danger">Delete</a>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
             
                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success mt-3">Successfully Added</div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('deleted')): ?>
                    <div class="alert alert-success mt-3">Successfully Deleted</div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger mt-3">Failed!</div>
                <?php endif;?>
                <?php?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('includes/footer'); ?>


