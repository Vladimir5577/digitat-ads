<div class="container">
	<ul class="list-box">
		<?php if(!$ads) { ?>
			<li><p>No Ads found</p></li>
		<?php } ?>
		<?php if($ads && is_array($ads) && count($ads) > 0){ ?>
		<?php foreach($ads as $data) { ?>
		<li class="list-box-item">
			<div class="list-box-img">
				<img src="<?php echo base_url().'uploads/ads/'.$data['photo']; ?>" />
			</div>
			<div class="list-box-content">
				<h3><?php echo $data['title']; ?></h3>
				<p><?php echo $data['description']; ?></p>
				<div class="list-box-footer">
					<p><strong>Created By </strong><a href="<?php echo base_url().'user/userProfile/'.$data['user_id']; ?>"><?php echo ($data['name'])? $data['name']: 'No name'; ?></a></p>
				</div>
			</div>
		</li>
		<?php } ?>
		<?php } ?>
	</ul>
	<ul class="pagenation">
		<?php if($page > 0) { ?>
			<li><a href="<?php echo base_url().'?page='.($page - 1); ?>">prev</a></li>
		<?php } ?>
		<?php if($limit * ($page + 1) < $totalRecords) { ?>
			<li><a href="<?php echo base_url().'?page='.($page+1); ?>">next</a></li>
		<?php } ?>
	</ul>
</div>