
<h2><?=$title;?></h2>
<?=form_open('news/post', array('class'=>'form'));?>

    <label for="title">Title</label>
    <input type="text" name="title" value="<?=set_value('title');?>" class="form-control" id="title" />
    <?=form_error('title');?>

    <label for="text">Text</label>
    <textarea name="text" class="form-control" rows="5" id="text"><?=set_value('text');?></textarea>
    <?=form_error('text');?>

    <button type="submit" class="btn btn-default">Post</button>

<?=form_close()?>