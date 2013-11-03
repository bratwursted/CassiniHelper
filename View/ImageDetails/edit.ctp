<div class="imageDetails form">
<?php echo $this->Form->create('ImageDetail');?>
	<fieldset>
		<legend><?php echo __('Edit Image Detail'); ?></legend>
	<?php
		echo $this->Form->input('id');
		// echo $this->Form->input('image_info_id');
		echo $this->Form->input('tif_img', array('type' => 'text'));
		echo $this->Form->input('jpg_img', array('type' => 'text'));
		echo $this->Form->input('caption', array('rows' => 40));
		echo $this->Form->input('text_block', array('rows' => 25));
		echo $this->Form->input('credit', array('type' => 'text'));
		echo $this->Form->input('date', array('type' => 'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImageDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImageDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Image Details'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Image Infos'), array('controller' => 'image_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Info'), array('controller' => 'image_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
