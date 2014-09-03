<div class="banners view">
<h2><?php echo __('Banner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pic'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['pic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Adsense'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['is_adsense']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adsense Code'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['adsense_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($banner['Banner']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banner Size'); ?></dt>
		<dd>
			<?php echo $this->Html->link($banner['BannerSize']['size'], array('controller' => 'banner_sizes', 'action' => 'view', $banner['BannerSize']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Banner'), array('action' => 'edit', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Banner'), array('action' => 'delete', $banner['Banner']['id']), array(), __('Are you sure you want to delete # %s?', $banner['Banner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Banners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Banner Sizes'), array('controller' => 'banner_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Banner Size'), array('controller' => 'banner_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
