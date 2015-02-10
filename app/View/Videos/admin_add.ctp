<div class="videos form">
<?php echo $this->Form->create('Video'); ?>
	<fieldset>
		<legend><?php echo __('Add Video'); ?></legend>
	<?php
		echo $this->Form->input('video');
		echo $this->Form->input('title');
		echo $this->Form->input('blurb');
		echo $this->Form->input('section_id');
		echo $this->Form->input('is_published');
		echo $this->Form->input('published_date');
		echo $this->Form->input('published_time');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Videos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taggeds'), array('controller' => 'taggeds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tagged'), array('controller' => 'taggeds', 'action' => 'add')); ?> </li>
	</ul>
</div>
