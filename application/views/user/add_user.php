<?php $this->load->view('includes/header');?>

<!-- Main container for the Add User page -->
    <div class= "container">
    <div  class ="row">
    <div class="card" style="width: 100rem;">
      <div class="card-body">
      <h5 class="card-title">Add User</h5>
      <form method="post" action="<?= base_url() ?>user/add">

      <!-- Display flash messages for success or error -->

             <?php
                if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        Successfully Added
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
            <div class="mb-3">
<!-- Username input field -->

                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" id="username" >             
            </div>

<!-- Email input field -->

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email"class="form-control" name = "email" id="email"  placeholder="Email" aria-describedby="emailHelp">
            </div>
<!-- Mobile number input field -->
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" maxlength= "11" class="form-control" name = "mobile" placeholder="Mobile" id="mobile">
            </div>
<!-- Address input field -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name = "address" placeholder="Address" class="form-control" id="address">
            </div>
<!-- Created At input field for datetime -->
        <div class="mb-3">
           <label for="created_at" class="form-label">Created At</label>
          <input 
           type="datetime-local" 
           class="form-control" 
           name="created_at" 
           id="created_at" 
        value="<?= isset($user->created_at) ? date('Y-m-d\TH:i', strtotime($user->created_at)) : '' ?>">
     </div>
<!-- Created By input field for admin name -->
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

<!-- Submit button to add the user -->
            <button type="submit" class="btn btn-primary">Submit</button>
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