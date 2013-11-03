<div class="imageInfos form">
<?php echo $this->Form->create('ImageInfo');?>
	<fieldset>
		<legend><?php echo __('Add Image Info'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('target');
		echo $this->Form->input('img');
		echo $this->Form->input('img_desc');
		echo $this->Form->input('delete_flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Image Infos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Image Details'), array('controller' => 'image_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Detail'), array('controller' => 'image_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
