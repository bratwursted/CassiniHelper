<div class="imageDetails form">
<?php echo $this->Form->create('ImageDetail');?>
	<fieldset>
		<legend><?php echo __('Add Image Detail'); ?></legend>
	<?php
		echo $this->Form->input('image_info_id');
		echo $this->Form->input('tif_img');
		echo $this->Form->input('jpg_img');
		echo $this->Form->input('text_block');
		echo $this->Form->input('caption');
		echo $this->Form->input('credit');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Image Details'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Image Infos'), array('controller' => 'image_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Info'), array('controller' => 'image_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
