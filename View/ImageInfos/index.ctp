<?php echo $this->Html->css('jquery.fancybox.css', null, array('inline' => false)); ?>
<?php echo $this->Html->script(array('http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js', 'jquery.fancybox.pack.js', 'fancybox'), array('inline' => false)); ?>
<?php
if (isset($this->params['named']['page'])) {
	$this_page = $this->params['named']['page']; 
} else {
	$this_page = 1;
}
$this_target = null; 
if (isset($this->params['pass'][0])) {
	$this_target = $this->params['pass'][1]; 
}
?>
<div class="imageInfos index">
	<h2><?php echo __('Cassini Images');?></h2>
	<?php if (isset($filter)): ?>
	<h4>Showing target "<?php echo $filter; ?>"</h4>
	<?php endif; ?>
	<div id="image-grid">
		<?php foreach ($imageInfos as $imageInfo): ?>
		<div class="grid-element">
			<a href="http://photojournal.jpl.nasa.gov<?php echo $imageInfo['ImageDetail']['jpg_img']; ?>" class="fancybox">
			<?php echo $this->Html->image('http://photojournal.jpl.nasa.gov' . $imageInfo['ImageInfo']['img'], array('alt' => $imageInfo['ImageInfo']['name'])); ?></a>
			<?php // echo $this->Html->link($this->Html->image('http://photojournal.jpl.nasa.gov' . $imageInfo['ImageInfo']['img'], array('alt' => $imageInfo['ImageInfo']['name'])), 'http://photojournal.jpl.nasa.gov/' . $imageInfo['ImageDetail']['jpg_img'], array('class' => 'fancybox')); ?>
			<?php echo $this->Html->para(null, $this->Html->link($imageInfo['ImageInfo']['name'], array('action' => 'view', $imageInfo['ImageInfo']['id']))); ?>
			<?php echo $this->Html->link(__('Remove'), array('action' => 'remove', $imageInfo['ImageInfo']['id'], $this_target, $this_page), array('class' => 'remove-button')); ?>
		</div>
	<?php endforeach; ?>
	</div> 
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
		<?php
		if ($filters) {
			foreach($filters as $filter): ?>
			<li><?php echo $this->Html->link($filter['ImageInfo']['target'] . ' | ' . $filter['Target']['count'], array('action' => 'index', 'target', $filter['ImageInfo']['target'])); ?></li>
		<?php endforeach;
		} ?>
		<h4>Images</h4>
		<li><?php echo $this->Html->link(__('Fetch images'), array('action' => 'grabImage')); ?></li>
		<!--
		<h4>Image type</h4>
		<li><?php echo $this->Html->link(__('GIFs'), array('action' => 'findGifs')); ?></li>
		<li><?php echo $this->Html->link(__('New Image Info'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Image Details'), array('controller' => 'image_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image Detail'), array('controller' => 'image_details', 'action' => 'add')); ?> </li>
	-->
	</ul>
	<?php
		echo $this->Element('image_search');
	?>
		
</div>
