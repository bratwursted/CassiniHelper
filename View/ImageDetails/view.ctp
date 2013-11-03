<div class="imageDetails view">
<h2><?php  echo __('Image Detail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageDetail['ImageInfo']['name'], array('controller' => 'image_infos', 'action' => 'view', $imageDetail['ImageInfo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tif Img'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['tif_img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jpg Img'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['jpg_img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text Block'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['text_block']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caption'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['credit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($imageDetail['ImageDetail']['date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Image Detail'), array('action' => 'edit', $imageDetail['ImageDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image Detail'), array('action' => 'delete', $imageDetail['ImageDetail']['id']), null, __('Are you sure you want to delete # %s?', $imageDetail['ImageDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Infos'), array('controller' => 'image_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Info'), array('controller' => 'image_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
