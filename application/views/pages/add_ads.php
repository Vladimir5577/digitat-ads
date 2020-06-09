<div class="row justify-content-center mt-5">
	<div class="col-md-4">
		<div class="card" >
		  <div class="card-body">
		    <h5 class="card-title mb-4 text-center">Add Advertisement</h5>
		    <?php if($form_status === false) { ?>
		    	<p class="text-center text-danger mt-4">Updation failed</p>
		    <?php } ?>
		    <?php if($form_status === true) { ?>
		    	<p class="text-center text-success mt-4">Updation success</p>
		    <?php } ?>
		    <form class="mt-5" enctype="multipart/form-data" action="<?php echo base_url().'ads/adsAddAction'; ?>" method="POST">
		    	<div class="form-row">
		    		<label>Title</label>
		    		<input type="text" name="title" value="" placeholder="Enter Title" class="form-control col-md-12 <?php echo ($errors && isset($errors['title']) && $errors['title'])? 'is-invalid' : ''; ?> " />
		    		<?php if($errors && isset($errors['title']) && $errors['title']){ ?>
		    		<div class="invalid-feedback">
        				<?php echo $errors['title']; ?>
      				</div>
      				<?php } ?>
		    	</div>
		    	<div class="form-row">
		    		<label>Description</label>
		    		<textarea name="description"  class="form-control col-md-12 <?php echo ($errors && isset($errors['description']) && $errors['description'])? 'is-invalid' : ''; ?> "></textarea>
		    		<?php if($errors && isset($errors['description']) && $errors['description']){ ?>
		    		<div class="invalid-feedback">
        				<?php echo $errors['title']; ?>
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