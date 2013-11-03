<div class="imageDetails index">
	<h2><?php echo __('Image Details');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('image_info_id');?></th>
			<th><?php echo $this->Paginator->sort('tif_img');?></th>
			<th><?php echo $this->Paginator->sort('jpg_img');?></th>
			<th><?php echo $this->Paginator->sort('text_block');?></th>
			<th><?php echo $this->Paginator->sort('caption');?></th>
			<th><?php echo $this->Paginator->sort('credit');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($imageDetails as $imageDetail): ?>
	<tr>
		<td><?php echo h($imageDetail['ImageDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($imageDetail['ImageInfo']['name'], array('controller' => 'image_infos', 'action' => 'view', $imageDetail['ImageInfo']['id'])); ?>
		</td>
		<td><?php echo h($imageDetail['ImageDetail']['tif_img']); ?>&nbsp;</td>
		<td><?php echo h($imageDetail['ImageDetail']['jpg_img']); ?>&nbsp;</td>
		<td><?php echo h($imageDetail['ImageDetail']['text_block']); ?>&nbsp;</td>
		<td><?php echo h($imageDetail['ImageDetail']['caption']); ?>&nbsp;</td>
		<td><?php echo h($imageDetail['ImageDetail']['credit']); ?>&nbsp;</td>
		<td><?php echo h($imageDetail['ImageDetail']['date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $imageDetail['ImageDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $imageDetail['ImageDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $imageDetail['ImageDetail']['id']), null, __('Are you sure you want to delete # %s?', $imageDetail['ImageDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Image Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Image Infos'), array('controller' => 'image_infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Info'), array('controller' => 'image_infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
