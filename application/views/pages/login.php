<div class="row justify-content-center mt-5">
	<div class="col-md-4">
		<div class="card" >
		  <div class="card-body">
		    <h5 class="card-title mb-4 text-center">Login</h5>
		    <?php echo (isset($error) && $error === true)? '<p class="text-center text-danger">Login failed</p>' : '' ; ?>
		    <form action="<?php echo base_url()."auth/loginAction" ?>" method="POST">
		    	<div class="form-row">
		    		<label>Email</label>
		    		<input type="text" name="email" placeholder="Enter Email" class="form-control col-md-12" />
		    	</div>
		    	<div class="form-row">
		    		<label>Password</label>
		    		<input type="password" name="password" placeholder="Enter Password" class="form-control col-md-12" />
		    	</div>
		    	<div class="form-row mt-3">
		    		<input class="btn btn-success "  type="submit" />
		    	</div>
		    </form>
		  </div>
		</div>
	</div>
</div>