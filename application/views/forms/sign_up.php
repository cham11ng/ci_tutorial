
<?php echo form_open('sign_up', array('class'=>'form')); ?>
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
        <label for="pass_confirm">Password Confirm</label>
        <input type="password" name="pass_confirm" id="pass_confirm" class="form-control" size="50" />
        <?=form_error('pass_confirm');?>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" name="email" id="email" value="<?=set_value('email');?>" class="form-control" size="50" />
        <?=form_error('email');?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Create Account</button>
    </div>
<?=form_close();?>
