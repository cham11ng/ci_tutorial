
<?=form_open_multipart('upload/image_upload');?>
    <?php
        $file_data = array(
        'name'      => 'userfile',
        'value'     => 'Select Image',
        'required'  => 'required'
        );
        echo form_upload($file_data);
    ?>
    <button type="submit" class="btn btn-default">Save</button>
<?=form_close();?>

<?=$error;?>

