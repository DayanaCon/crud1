<?php 
$this->load->view('includes/header');?>

<!-- Main container for the Edit User page -->

    <div class= "container">
    <div  class ="row">
    <div class="card" style="width: 50rem;">
      <div class="card-body">
      <h5 class="card-title">Update User</h5>  
                 <?php
                if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        Successfully Updated
                    </div>
                <?php }
                ?>

<!-- Flash messages to indicate success or failure -->
                 <?php
                if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                        Failed!
                    </div>
                <?php }
                ?>
<!-- Form to update the user information -->

      <form method="post" action="<?= base_url() ?>user/edit/<?=$id?>">

<!-- Username input field -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" placeholder="Username" value="<?=$user->username?>" class="form-control" id="username" >             
            </div>

<!-- Email input field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email"class="form-control" name = "email" id="email"  value="<?=$user->email?>"placeholder="Email" aria-describedby="emailHelp">
            </div>
<!-- Mobile number input field -->
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" maxlength= "10" class="form-control" name = "mobile" value="<?=$user->mobile?>" placeholder="Mobile" id="mobile">
            </div>

<!-- Address input field -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name = "address" placeholder="Address" value="<?=$user->address?>" class="form-control" id="address">
            </div>

<!-- Created At field for date and time -->
            <div class="mb-3">
           <label for="created_at" class="form-label">Created At</label>
          <input 
           type="datetime-local" 
           class="form-control" 
           name="created_at" 
           id="created_at" 
        value="<?= isset($user->created_at) ? date('Y-m-d\TH:i', strtotime($user->created_at)) : '' ?>">
     </div>
<!-- Created By field for the name of the person who created the record -->
    <div class="mb-3">
    <label for="created_by" class="form-label">Created By</label>
    <input 
        type="text" 
        class="form-control" 
        name="created_by" 
        id="created_by" 
        placeholder="Admin Name"
        value="<?= isset($user->created_by) ? htmlspecialchars($user->created_by, ENT_QUOTES, 'UTF-8') : '' ?>">
    </div>
  <!-- Update and Cancel buttons -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= base_url('user/index') ?>" class="btn btn-dark">User List</a>
            </form>      
       </div>
     </div>
    </div>
   </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>
<?php $this->load->view('includes/footer');?>