<div class="row justify-content-center mt-5">
	<div class="col-md-4">
		<div class="card" >
		  <div class="card-body">
		    <h5 class="card-title mb-4 text-center">Register</h5>
		    <?php echo (isset($validation_errors) && !empty($validation_errors)) || (isset($reg_success) && $reg_success === false) ? '<p class="text-danger text-center" >Registration failed</p>' : ''; ?>
		    <?php echo (isset($reg_success) && $reg_success === true)? '<p class="text-success text-center" >Registration finished successfully</p>' : '' ?>
		    <form action="<?php echo base_url().'user/registerAction'; ?>" method="POST">
		    	<div class="form-row">
		    		<label>Email</label>
		    		<input type="text" name="email" placeholder="Enter Email" class="form-control col-md-12 <?php echo isset($validation_errors['email'])? 'is-invalid' : ''; ?> " />
		    		<?php echo isset($validation_errors['email'])?  '<div class="invalid-feedback">
        				'.$validation_errors['email'].'
      				</div>' : '';  ?>
		    	</div>
		    	<div class="form-row">
		    		<label>Password</label>
		    		<input type="password" name="password" placeholder="Enter Password" class="form-control col-md-12 <?php echo isset($validation_errors['password'])? 'is-invalid' : ''; ?>" />
		    		
		    		<?php echo isset($validation_errors['password'])?  '<div class="invalid-feedback">
        				'.$validation_errors['password'].'
      				</div>' : '';  ?>
		    	</div>
		    	<div class="form-row mt-3">
		    		<input class="btn btn-success "  type="submit" />
		    	</div>
		    </form>
		  </div>
		</div>
	</div>
</div>