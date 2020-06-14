<div class="row justify-content-center mt-5">
	<div class="col-md-6">
		<div class="card" >
		  <div class="card-body">
		    <h5 class="card-title mb-4 text-center">Profile</h5>
		    <div class="profile">
		    	<img style="width: 100%;" src="<?php echo ($user['photo'])? base_url().'uploads/'.$user['photo'] : base_url().'/assets/img/user-placeholder.png'; ?>" />
		    	<h3>Name : <?php echo ($user['name'])? $user['name'] : 'No Name'; ?></h3>
		    	<h4>Email : <?php echo $user['email']; ?></h4>
		    	<h3>Rating:  <?php echo $rate; ?></h3>

		    </div>
		    <?php if($logged_in_user_id && ($user['id'] != $logged_in_user_id) ){ ?>

		    <!-- Comment form -->
		    <div class="add-comment">
		    	<?php if(is_bool($comment_added) && $comment_added === true){?>
		    		<p class="text-center text-success">Comment Added successfully</p>
		    	<?php } ?>
		    	<?php if(is_bool($comment_added) && $comment_added === false){?>
		    		<p class="text-center text-danger">Something went wrong!</p>
		    	<?php } ?>
		    	<form method="post" action="<?php echo base_url()."comment/addCommentAction" ?>">
		    		<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
		    		<input type="hidden" name="commented_by" value="<?php echo $this->session->userdata("login_user_id"); ?>">
		    		<div class="form-row mb-3">
			    		<label>Write comment</label>
			    		<textarea type="file" name="comment" class="form-control col-md-12 <?php echo ($errors && isset($errors['comment']))? ' is-invalid' : ''; ?>" /></textarea>
			    		<?php if($errors && isset($errors['comment'])) { ?>
			    		<div class="invalid-feedback">
        					<?php echo $errors['comment']; ?>
      					</div>
      					<?php } ?>
		    		</div>
		    		<div class="form-row">
		    			<input type="submit" class="btn btn-primary" value="Add Comment" />
		    		</div>
		    	</form>
		    </div>
		    
		    <?php if(is_bool($rating_added) && $rating_added === true){?>
		    		<p class="text-center text-success">Rating Added successfully</p>
		    	<?php } ?>
		    	<?php if(is_bool($rating_added) && $rating_added === false){?>
		    		<p class="text-center text-danger">Something went wrong!</p>
		    	<?php } ?>
		    <?php if(!$is_already_rated) { ?>
		    <!-- Ratign form -->
			<form action="<?php echo base_url() . 'user/addRatingAction'; ?>" method="post">
				<input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
		    	<input type="hidden" name="commented_by" value="<?php echo $this->session->userdata("login_user_id"); ?>">
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1">
				  <label class="form-check-label" for="inlineRadio1">1</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2">
				  <label class="form-check-label" for="inlineRadio2">2</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="3">
				  <label class="form-check-label" for="3">3</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="4">
				  <label class="form-check-label" for="inlineRadio2">4</label>
				</div><div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="5">
				  <label class="form-check-label" for="inlineRadio1">5</label>
				</div>
				<input type="submit" name="rate" value="Rate user">
				<?php if($errors && isset($errors['rating'])) { ?>
	    		<div style="color: red">
				<?php echo $errors['rating']; ?>
					</div>
				<?php } ?>
			</form>
			<?php } ?>

		    <?php } ?>


		    <?php

			foreach ($comment_user as $key => $value) {
			?>

			<div>
				<h5><?php echo $value->comment; ?></h5>
				<p>Wrotten by:  <?php echo $value->name; ?></p>
			</div>

		<?php 
			}

			// echo "Rate: " . $value->rate;	
		?>
		  </div>
		</div>
	</div>
</div>