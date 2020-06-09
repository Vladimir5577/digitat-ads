<div class="row justify-content-center mt-5">
	<div class="col-md-4">
		<div class="card" >
		  <div class="card-body">
		    <h5 class="card-title mb-4 text-center">Update Profile</h5>
		    <img style="width: 100%; height: auto;" src="<?php echo ($user['photo'])? base_url().'uploads/'.$user['photo'] : base_url().'assets/img/user-placeholder.png' ; ?>" />
		    <?php if($upload_status === false) { ?>
		    	<p class="text-center text-danger mt-4">Updation failed</p>
		    <?php } ?>
		    <?php if($upload_status === true) { ?>
		    	<p class="text-center text-success mt-4">Updation success</p>
		    <?php } ?>
		    <form class="mt-5" enctype="multipart/form-data" action="<?php echo base_url().'user/updateUserProfileAction'; ?>" method="POST">
		    	<div class="form-row">
		    		<label>Name</label>
		    		<input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Enter Name" class="form-control col-md-12 <?php echo ($errors && isset($errors['name']) && $errors['name'])? 'is-invalid' : ''; ?> " />
		    		<?php if($errors && isset($errors['name']) && $errors['name']){ ?>
		    		<div class="invalid-feedback">
        				<?php echo $errors['name']; ?>
      				</div>
      				<?php } ?>
		    	</div>
		    	<div class="form-row">
		    		<label>Photo</label>
		    		<input type="file" name="photo" class="form-control col-md-12 <?php echo ($errors && $errors['photo'])? 'is-invalid' : ''; ?>  " />
		    		<?php if($errors && $errors['photo']){ ?>
		    		<div class="invalid-feedback">
        				<?php echo $errors['photo']; ?>
      				</div>
      				<?php } ?>
		    	</div>
		    	<div class="form-row mt-3">
		    		<input class="btn btn-success " value="Update User" type="submit" />
		    	</div>
		    </form>
		  </div>
		</div>
	</div>
</div>