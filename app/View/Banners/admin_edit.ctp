<div class="banners form">
	<?php echo $this->Form->create('Banner',
		array(
			'type' => 'file',
			'class' => 'form-horizontal',
			'role' => 'form',
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				'div' => array('class' => 'form-group'),
				'class' => array('form-control'),
				'label' => array('class' => 'col-lg-2 control-label'),
				'between' => '<div class="col-lg-2">',
				'after' => '</div>',
				'error' => array('attributes' => array('wrap' => 'div', 'class' => 'alert alert-danger')),
			)
		));
	?>
	<fieldset>
		<legend><?php echo __('Admin Editar Banner'); ?></legend>
		<?php
		echo $this->Form->input('id', array(
			'default' => $banner['Banner']['id']
		));
		echo $this->Form->input('name', array(
			'label' => array('text' => 'Nombre', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $banner['Banner']['name'],
		));
		echo $this->Form->input('link', array(
			'label' => array('text' => 'Link', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-4">',
			'default' => $banner['Banner']['link'],
		));
		?>
		<div class="form-group">
			<label class="control-label my-label col-lg-2" style="padding-top: 0">Es Banner de Adsense?</label>
			<div class="col-lg-4">
				<label for="BannerIsAdsense1">Si</label>
				<input type="radio" name="data[Banner][is_adsense]" id="BannerIsAdsense1" value="1" <?php if ($banner['Banner']['is_adsense'] == 1) { echo 'checked="checked"'; } ?>>
				<label for="BannerIsAdsense0">No</label>
				<input type="radio" name="data[Banner][is_adsense]" id="BannerIsAdsense0" value="0" <?php if ($banner['Banner']['is_adsense'] == 0) { echo 'checked="checked"'; } ?>">
			</div>
		</div>
		<?php
		if ($banner['Banner']['is_adsense'] == 1) {
			echo $this->Form->input('adsense_code', array(
				'label' => array('text' => 'Código Adsense', 'class' => 'control-label my-label col-lg-2'),
				'class' => 'form-control',
				'type' => 'textarea',
				'between' => '<div class="col-lg-4">',
				'before' => '<div class="form-group banner-adsense">',
				'default' => $banner['Banner']['adsense_code']
			));
			echo $this->Form->input('pic', array(
				'label' => array('text' => 'Banner Nuevo', 'class' => 'control-label my-label col-lg-2'),
				'class' => 'form-control',
				'type' => 'file',
				'between' => '<div class="col-lg-4">',
				'before' => '<div class="form-group banner-image" style="display: none;">',
			));
			echo $this->Form->input('old_image', array(
				'type' => 'hidden',
				'default' => $banner['Banner']['pic'],
				'before' => '<div class="form-group banner-image" style="display: none;">',
			));
		}
		if ($banner['Banner']['is_adsense'] == 0) {
			echo $this->Form->input('adsense_code', array(
				'label' => array('text' => 'Código Adsense', 'class' => 'control-label my-label col-lg-2'),
				'class' => 'form-control',
				'type' => 'textarea',
				'between' => '<div class="col-lg-4">',
				'before' => '<div class="form-group banner-adsense" style="display: none;">',
				'default' => $banner['Banner']['adsense_code']
			));
			echo $this->Form->input('pic', array(
				'label' => array('text' => 'Banner Nuevo', 'class' => 'control-label my-label col-lg-2'),
				'class' => 'form-control',
				'type' => 'file',
				'between' => '<div class="col-lg-4">',
				'before' => '<div class="form-group banner-image">',
			));
			echo $this->Form->input('old_image', array(
				'type' => 'hidden',
				'default' => $banner['Banner']['pic'],
				'before' => '<div class="form-group banner-image">',
			));
			?>
			<div class="form-group">
				<div class="col-lg-6" style="text-align: right">
					<p>
						Imagen actual: <?php echo $banner['Banner']['pic']; ?>
						<?php $this->Thumbs->banner_thumbnail($banner, 300); ?>
					</p>
					<p></p>
				</div>
			</div>
		<?php
		}
		echo $this->Form->input('start_date', array(
			'label' => array('text' => 'Fecha de Inicio', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'default' => $banner['Banner']['start_date'],
		));
		echo $this->Form->input('end_date', array(
			'label' => array('text' => 'Fecha de Expiración', 'class' => 'control-label my-label col-lg-2'),
			'type' => 'text',
			'default' => $banner['Banner']['end_date'],
		));
		echo $this->Form->input('banner_size_id', array(
			'label' => array('text' => 'Tipo de Banner', 'class' => 'control-label my-label col-lg-2'),
			'class' => 'form-control',
			'between' => '<div class="col-lg-2">',
			'empty' => array('' => '-- Elige el Tipo de Banner --'),
			'default' => $banner['Banner']['banner_size_id'],
		));
		?>
	</fieldset>
	<?php
	echo "<div class='form-group col-lg-5'>";
	echo $this->Form->submit('Enviar', array('formnovalidate' => true, 'class' => 'btn btn-success'));
	echo "</div>";
	echo $this->Form->end();
	?>
</div>
<script type="text/javascript">
	$(function () {
		$('#BannerStartDate').datepicker({dateFormat:'dd-mm-yy'});
		$('#BannerEndDate').datepicker({dateFormat:'dd-mm-yy'});
		$('#BannerIsAdsense1').click(function() {
			$('.banner-image').fadeOut('slow');
			$('.banner-adsense').fadeIn('slow');
		});

		$('#BannerIsAdsense0').click(function() {
			$('.banner-image').fadeIn('slow');
			$('.banner-adsense').fadeOut('slow');
		});
	});
</script>