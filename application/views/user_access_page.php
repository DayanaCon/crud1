<?php $this->load->view('includes/header'); ?>
<!--<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Sub Admin</h5>
                </div>
					  <div class="card-body">
					   <form method="post" autocomplete="off" action="<?=base_url('admin/user_access_page')?>">
        <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Username</th>
                        </tr>
                       </thead>
                       <tbody>
                        <?php $i=1; foreach($admins as $row) { ?>
                        <tr>
                        <td><?=$i++?></td>
                        <td><?=$row['username']?></td>
                        </tr>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <?php echo $this->session->userdata('email'); ?><br>
    <?php echo $this->session->userdata('password'); ?><br>
    <?php echo $this->session->userdata('user_access'); ?><br>
    <?php echo $this->session->userdata('access_id'); ?><br>
    <a href = "<?= base_url('admin/logout')?>" class="btn btn-sm btn-danger">Logout</a>
<?php $this->load->view('includes/footer'); ?>