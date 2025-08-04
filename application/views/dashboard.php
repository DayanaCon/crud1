<?php 
if($this->session->userdata('UserLoginSession'))
{
    $udata = $this->session->userdata('UserLoginSession');
    echo 'Welcome'.' '.$udata['username'];
}
else
{
    redirect(base_url('admin/login_page'));
}

 ?>
 <a href="<?=base_url('admin/logout')?>">Logout</a>
