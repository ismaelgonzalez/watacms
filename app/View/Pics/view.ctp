<div class="pics view">
<h2><?php echo __('Pic'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['pic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blurb'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['blurb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pic['Section']['name'], array('controller' => 'sections', 'action' => 'view', $pic['Section']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Published'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['is_published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published Date'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['published_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published Time'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['published_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($pic['Pic']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pic'), array('action' => 'edit', $pic['Pic']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pic'), array('action' => 'delete', $pic['Pic']['id']), array(), __('Are you sure you want to delete # %s?', $pic['Pic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pics'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pic'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
