<div class="banners form">
<?php echo $this->Form->create('Banner'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Banner'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('link');
		echo $this->Form->input('pic');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('is_adsense');
		echo $this->Form->input('adsense_code');
		echo $this->Form->input('status');
		echo $this->Form->input('banner_size_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Banner Sizes'), array('controller' => 'banner_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner Size'), array('controller' => 'banner_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
