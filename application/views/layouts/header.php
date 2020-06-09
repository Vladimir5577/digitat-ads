<?php 
  $is_loggedin = $this->session->userdata('login_user_id'); 
?>
<html>
	<head>
		<title>Digital Ads</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/css/style.css' ?>">
	</head>
	<body>
  <div class="wrapper">
	<nav class="navbar my-navbar navbar-expand-lg navbar-light bg-light mb-4">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">Digital ADS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
      <?php 
      if(!$is_loggedin){
      ?>
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo base_url().'auth/login' ?>">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo base_url().'user/register'; ?>">Register <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>
      <?php
      if($is_loggedin) {
      ?>
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo base_url().'ads/addAds'; ?>">Add Advertisement <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo base_url().'user/updateProfile'; ?>">Update profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="<?php echo base_url().'auth/logout'; ?>">Logout <span class="sr-only">(current)</span></a>
      </li>
        <?php
      }
      ?>
    </ul>
    </div>
  </div>
</nav>
