<div class="row">
	<div class="col-lg-8 col-lg-offset-2" >
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo h($post['Post']['Post']['title']); ?></div>
		  	<div class="panel-body"><?php echo h($post['Post']['Post']['body']); ?></div>
		  	<div class="panel-footer">Created: <?php echo $post['Post']['Post']['created']; ?></div>
		</div>
		<div class="panel panel-default">
			<?php// debug($post);?>
		  	<div class="panel-body"> 
		  		<?php echo $this->Form->create('Post', array('action' => 'comment')); ?>
		  			<input type="hidden" name="post_id" value="<?php echo h($post['Post']['Post']['id']);?>">
		  			<textarea name="comment" class="form-control comment" col="5" rows="5" placeholder="Comment here"></textarea>
		  		
		  		<?php echo $this->Form->end('Save Comment');?>
		  	</div>
		  	<div class="panel panel-default">
		  		<div class="panel-heading">User Comments</div>
		  		<div class="panel-body"> 
		  		 <div class="list-group">
		  		 <?php 
		  		 	foreach ($post['Comment'] as $key => $value) {
		  		 		//debug($value);
		  		 		echo '<a href="#" class="list-group-item"><span class="badge">'.$value['Comment']['created'].'</span>'.$value['Comment']['comment'].'</a>';
		  		 	}
		  		 ?>
				 
				</div>
				</div>
		  	</div>
		  	
		</div>
	</div>
</div>
