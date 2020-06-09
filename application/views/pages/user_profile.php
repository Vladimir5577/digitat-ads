<div class="row justify-content-center mt-5">
	<div class="col-md-6">
		<div class="card" >
		  <div class="card-body">
		    <h5 class="card-title mb-4 text-center">Profile</h5>
		    <div class="profile">
		    	<img src="<?php echo ($user['photo'])? base_url().'uploads/'.$user['photo'] : base_url().'/assets/img/user-placeholder.png'; ?>" />
		    	<h3>Name : <?php echo ($user['name'])? $user['name'] : 'No Name'; ?></h3>
		    	<h4>Email : <?php echo $user['email']; ?></h4>
		    </div>
		  </div>
		</div>
	</div>
</div>