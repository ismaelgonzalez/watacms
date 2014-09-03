<div class="banners index">
	<h2><?php echo __('Banners'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('pic'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('is_adsense'); ?></th>
			<th><?php echo $this->Paginator->sort('adsense_code'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('banner_size_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($banners as $banner): ?>
	<tr>
		<td><?php echo h($banner['Banner']['id']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['name']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['link']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['pic']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['is_adsense']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['adsense_code']); ?>&nbsp;</td>
		<td><?php echo h($banner['Banner']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($banner['BannerSize']['size'], array('controller' => 'banner_sizes', 'action' => 'view', $banner['BannerSize']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $banner['Banner']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $banner['Banner']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $banner['Banner']['id']), array(), __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Banner Sizes'), array('controller' => 'banner_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner Size'), array('controller' => 'banner_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
