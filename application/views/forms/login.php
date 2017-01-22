
<?php echo form_open('login', array('class'=>'form')); ?>
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?=set_value('username');?>" class="form-control" size="50" />
    <?=form_error('username');?>

</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" size="50" />
    <?=form_error('password');?>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-default">Login</button>
</div>
<?=form_close();?>
