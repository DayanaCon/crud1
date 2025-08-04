<?php $this->load->view('includes/header');?>


<!-- Main container for the Add User page -->
    <div class= "container">
    <div  class ="row">
    <div class="card" style="width: 50rem;">
      <div class="card-body">
      <h5 class="card-title">Add User</h5>
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url('attach/create_view') ?>">
    
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
<!-- Username Dropdown -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <select name="username" class="form-control" id="username">
                <option value="">-- Select Username --</option>
                <?php foreach ($users as $user): ?>
                <option value="<?php echo $user->username ?>" data-user-id="<?php echo $user->id ?>">
                <?= $user->username ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
<!-- Auto-filled User ID Field -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" maxlength="8" class="form-control" name="user_id"
            placeholder="User ID" id="user_id" readonly>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('username').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const userId = selected.getAttribute('data-user-id');
        document.getElementById('user_id').value = userId || '';
         });
       });
</script>
<!-- Attachment name input field-->
            <div class="mb-3">
            <label for="attachment_name" class="form-label">Attachment Name</label>
            <input type="text"
                 class="form-control" 
                 name = "attachment_name" 
                 id="attachment_name"  
                 placeholder="Attachment_name" >
                 </div>
<!-- Upload attachment -->
             <div class="panel">
             <div class="card" style="width: 17rem;">
             <input type="file" 
             name="attachment_file" 
             class="form-control">
            </div>
            </div>
           </div>
<!-- Created At input field for datetime -->
        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="datetime-local" 
             class="form-control" 
             name="created_at" 
             id="created_at" 
             value="<?php echo isset($lists->created_at) ? 
             date('Y-m-d\TH:i', strtotime($lists->created_at)) : '' ?>">
       </div>

<!-- Created By input field for admin name -->
       <div 
            class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <input type="text" 
            class="form-control" 
            name="created_by" 
            id="created_by" 
            placeholder="Admin Name"
            value="<?php echo isset($lists->created_by) ? htmlspecialchars($lists->created_by, ENT_QUOTES, 'UTF-8') : '' ?>">
      </div>

<!-- Processed By input field for processor name -->
      <div 
            class="mb-3">
            <label for="processed_by" class="form-label">Processed By</label>
            <input 
            type="text" 
            class="form-control" 
            name="processed_by" 
            id="processed_by" 
            placeholder="Processed By"
            value="<?php echo isset($lists->processed_by_by) ? htmlspecialchars($lists->processed_by_by, ENT_QUOTES, 'UTF-8') : '' ?>">
     </div>
<!-- Processed date input field for datetime -->
     <div 
           class="mb-3">
           <label for="processed_date" class="form-label">Processed Date</label>
           <input 
           type="datetime-local" 
           class="form-control" 
           name="processed_date" 
           id="processed_date" 
           value="<?php echo isset($lists->processed_date) ? date('Y-m-d\TH:i', strtotime($lists->processed_date)) : '' ?>">
     </div>
     <!-- Submit button to add the user -->
    <div class="panel">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php base_url('attach/view_page') ?>" class="btn btn-dark">Users</a>
            </form>    
    </div>
    </div>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
<?php $this->load->view('includes/footer');?>