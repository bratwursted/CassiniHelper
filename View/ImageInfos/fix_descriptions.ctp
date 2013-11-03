<div class="image-data">
    
    <table>
    <?php
    if (!empty($images)) : 
        foreach ($images as $image) : ?>
        <tr>
            <td> <?php echo $this->Html->link($image['ImageInfo']['name'], array('action' => 'view', $image['ImageInfo']['id'])); ?> </td>
            <td> <?php echo $image['ImageInfo']['img_desc']; ?> </td>
            <td> <?php echo substr($image['ImageDetail']['caption'], 0, strpos($image['ImageDetail']['caption'], '</p>') + 4); ?></td>
            </tr>
        <?php endforeach;
        endif; ?>
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
