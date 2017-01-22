
<?php $placeholder = 'Write Something Here "HAHA" Nothing'; ?>

<?=form_open('form', array('method'=>'get', 'role'=>'form'));?>
<?=form_fieldset('Fill Up for Registration');?>
<div class="form-group">
    <?php
    echo form_label('Username:', 'username');
    $username_data = array(
        'name'      => 'username',
        'id'        => 'username',
        'class'     => 'form-control',
        'required'  => 'required',
    );
    echo form_input($username_data);
    ?>
</div>
<div class="form-group">
    <?php
    echo form_label('Password:', 'password');
    $password_data = array(
        'name'      => 'password',
        'id'        => 'password',
        'class'     => 'form-control',
        'required'  => 'required',
    );
    echo form_password($password_data);
    ?>
</div>
<div class="form-group">
    <label>Select Gender:</label>
    <label class="radio-inline"><input type="radio" name="gender" value="male" checked="checked">Male</label>
    <label class="radio-inline"><input type="radio" name="gender" value="female">Female</label>
    <label class="radio-inline"><input type="radio" name="gender" value="female">Other</label>
</div>
<div class="form-group">
    <?php
    echo form_label('Write Something:', 'text');
    $text_data = array(
        'name'      => 'text',
        'id'        => 'text',
        'rows'      => '4',
        'class'     => 'form-control',
        'placeholder' => $placeholder,
    );
    echo form_textarea($text_data);
    ?>
</div>

<div class="form-group">
    <?php
    echo form_label('Address:', 'address');
    $address_data = array(
        'name'      => 'address',
        'id'        => 'address',
        'rows'      => '2',
        'class'     => 'form-control',
        'placeholder' => html_escape($placeholder),
    );
    echo form_textarea($address_data);
    ?>
</div>

<div class="form-group">
    <label>Programming :</label>
    <label class="checkbox-inline">
        <input type="checkbox" value="">PHP
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" value="">C++
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" value="">Java
    </label>
</div>

<div class="form-group">
    <?php
    echo form_label('Select Country:', 'country');
    $country_extra = array(
        'class' => 'form-control',
        'id'    => 'country'
    );
    $options = array(
        'maldives'      => 'Maldives',
        'afghanistan'   => 'Afghanistan',
        'srilanka'      => 'Srilanka',
        'india'         => 'India',
        'nepal'         => 'Nepal'
    );
    echo form_dropdown('country', $options, 'Nepal', $country_extra);
    ?>
</div>
<?php
$data = array(
    'id'        => 'submit',
    'type'      => 'submit',
    'class'     => 'btn btn-default',
    'content'   => 'Post'
);
echo form_button($data);
echo form_fieldset_close();
echo form_close();
?>