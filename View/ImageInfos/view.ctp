<div class="imageInfos view">
<h2><?php  echo __('Image Info');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imageInfo['ImageInfo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($imageInfo['ImageInfo']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imageInfo['ImageInfo']['target'], array('action' => 'index', 'target', $imageInfo['ImageInfo']['target'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img'); ?></dt>
		<dd>
			<?php echo h($imageInfo['ImageInfo']['img']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Img Desc'); ?></dt>
		<dd>
			<?php echo h($imageInfo['ImageInfo']['img_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flag'); ?></dt>
		<dd>
			<?php echo h($imageInfo['ImageInfo']['delete_flag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Save Image'), array('action' => 'grabImage', $imageInfo['ImageInfo']['id'])); ?></li>
		<li>&nbsp; </li>
		<li><?php echo $this->Html->link(__('Edit Image Info'), array('action' => 'edit', $imageInfo['ImageInfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Image Detail'), array('controller' => 'image_details', 'action' => 'edit', $imageInfo['ImageDetail']['id'])); ?></li>
		<!-- 
		<li><?php echo $this->Form->postLink(__('Delete Image Info'), array('action' => 'delete', $imageInfo['ImageInfo']['id']), null, __('Are you sure you want to delete # %s?', $imageInfo['ImageInfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Infos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Info'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Image Details'), array('controller' => 'image_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Detail'), array('controller' => 'image_details', 'action' => 'add')); ?> </li>
		-->
	</ul>
	
	<?php
		echo $this->Element('image_search');
	?>
</div>
	<div class="related">
		<h3><?php echo __('Related Image Details');?></h3>
	<?php if (!empty($imageInfo['ImageDetail'])):?>
		<dl style="width: 100%">
			<dt><?php echo __('Id');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['id'];?>
&nbsp;</dd>
		<dt><?php echo __('Image Info Id');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['image_info_id'];?>
&nbsp;</dd>
		<dt><?php echo __('Tif Img');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['tif_img'];?>
&nbsp;</dd>
		<dt><?php echo __('Jpg Img');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['jpg_img'];?>
&nbsp;</dd>
		<dt><?php echo __('Caption');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['caption'];?>
&nbsp;</dd>
		<dt><?php echo __('Credit');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['credit'];?>
&nbsp;</dd>
		<dt><?php echo __('Date');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['date'];?>
&nbsp;</dd>
		<!-- 
		<dt><?php echo __('Text Block');?></dt>
		<dd>
	<?php echo $imageInfo['ImageDetail']['text_block'];?>
&nbsp;</dd>
		-->
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Image Detail'), array('controller' => 'image_details', 'action' => 'edit', $imageInfo['ImageDetail']['id'])); ?></li>
			</ul>
		</div>
	</div>
	