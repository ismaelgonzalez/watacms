<h4>Agregar Fotos</h4>

<?php
echo $this->Form->create('Photo', array(
    'type'=>'file',
    'id'=>'addPhoto',
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
if (sizeof($albums) == 1) {
    echo $this->Form->input('album_select', array(
        'label' => array('text' => 'Album', 'class' => 'control-label my-label col-lg-2'),
        'class' => 'form-control',
        'between' => '<div class="col-lg-4">',
        'options' => array(
            $albums
        ),
        'default' => $album_id,
        'disabled' => true,
        'empty' => array(0 => '-- Elige un album --'),

    ));
    echo $this->Form->input('album_id', array(
        'type' => 'hidden',
        'default' => $album_id,
    ));
}
?>
<h4 class="col-lg-offset-2">Foto 1</h4>
<div class="col-lg-offset-2 fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="btn btn-default fileupload-new">Select image</span>
            <span class="btn btn-default fileupload-exists">Change</span>
            <input type="file" id="pic1" name="data[Photo][pic1]"/>
        </span>
        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title1', array(
    'label' => array('text' => 'T&iacute;tulo', 'class' => 'control-label my-label col-lg-2'),
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('blurb1', array(
    'label' => array(
        'text' => 'Blurb',
        'class' => 'control-label my-label col-lg-2'),
    'type' => 'text',
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
    ));
echo "<hr>";
?>
<h4 class="col-lg-offset-2">Foto 2</h4>
<div class="col-lg-offset-2 fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="btn btn-default fileupload-new">Select image</span>
            <span class="btn btn-default fileupload-exists">Change</span>
            <input type="file" id="pic2" name="data[Photo][pic2]"/>
        </span>
        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title2', array(
    'label' => array('text' => 'T&iacute;tulo', 'class' => 'control-label my-label col-lg-2'),
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('blurb2', array(
    'label' => array(
        'text' => 'Blurb',
        'class' => 'control-label my-label col-lg-2'),
    'type' => 'text',
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo "<hr>";
?>
<h4 class="col-lg-offset-2">Foto 3</h4>
<div class="col-lg-offset-2 fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="btn btn-default fileupload-new">Select image</span>
            <span class="btn btn-default fileupload-exists">Change</span>
            <input type="file" id="pic3" name="data[Photo][pic3]"/>
        </span>
        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title3', array(
    'label' => array('text' => 'T&iacute;tulo', 'class' => 'control-label my-label col-lg-2'),
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('blurb3', array(
    'label' => array(
        'text' => 'Blurb',
        'class' => 'control-label my-label col-lg-2'),
    'type' => 'text',
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo "<hr>";
?>
<h4 class="col-lg-offset-2">Foto 4</h4>
<div class="col-lg-offset-2 fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="btn btn-default fileupload-new">Select image</span>
            <span class="btn btn-default fileupload-exists">Change</span>
            <input type="file" id="pic4" name="data[Photo][pic4]"/>
        </span>
        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title4', array(
    'label' => array('text' => 'T&iacute;tulo', 'class' => 'control-label my-label col-lg-2'),
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('blurb4', array(
    'label' => array(
        'text' => 'Blurb',
        'class' => 'control-label my-label col-lg-2'),
    'type' => 'text',
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo "<hr>";
?>
<h4 class="col-lg-offset-2">Foto 5</h4>
<div class="col-lg-offset-2 fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
    <div>
        <span class="btn btn-file">
            <span class="btn btn-default fileupload-new">Select image</span>
            <span class="btn btn-default fileupload-exists">Change</span>
            <input type="file" id="pic5" name="data[Photo][pic5]"/>
        </span>
        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
    </div>
</div>
<?php
echo $this->Form->input('title5', array(
    'label' => array('text' => 'T&iacute;tulo', 'class' => 'control-label my-label col-lg-2'),
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo $this->Form->input('blurb5', array(
    'label' => array(
        'text' => 'Blurb',
        'class' => 'control-label my-label col-lg-2'),
    'type' => 'text',
    'class' => 'form-control',
    'between' => '<div class="col-lg-4">',
));
echo "<hr>";

echo $this->Form->submit('Enviar', array('formnovalidate' => true, 'class' => 'btn btn-success'));
echo $this->Form->end();

?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".fileupload").fileupload();
    });
</script>