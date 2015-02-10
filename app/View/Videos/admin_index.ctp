<div class="videos index">
	<h2><?php echo __('Videos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('video'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('blurb'); ?></th>
			<th><?php echo $this->Paginator->sort('section_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_published'); ?></th>
			<th><?php echo $this->Paginator->sort('published_date'); ?></th>
			<th><?php echo $this->Paginator->sort('published_time'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($videos as $video): ?>
	<tr>
		<td><?php echo h($video['Video']['id']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['video']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['title']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['blurb']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($video['Section']['name'], array('controller' => 'sections', 'action' => 'view', $video['Section']['id'])); ?>
		</td>
		<td><?php echo h($video['Video']['is_published']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['published_date']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['published_time']); ?>&nbsp;</td>
		<td><?php echo h($video['Video']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $video['Video']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $video['Video']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $video['Video']['id']), array(), __('Are you sure you want to delete # %s?', $video['Video']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Video'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taggeds'), array('controller' => 'taggeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tagged'), array('controller' => 'taggeds', 'action' => 'add')); ?> </li>
	</ul>
</div>
