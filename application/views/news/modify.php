
<h2><?=$title;?></h2>
<?=form_open('news/modify/'.$news_item['slug'], array('class'=>'form'))?>

    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="<?=set_value('title', $news_item['title']);?>" />
    <?=form_error('title');?>

    <label for="text">Text</label>
    <textarea name="text" class="form-control" rows="5" id="text"><?=set_value('text', $news_item['text']);?></textarea>
    <?=form_error('text');?>

    <?=form_hidden('slug', set_value('slug', $news_item['slug']));?>
    <?=form_hidden('posted_date', set_value('posted_date', $news_item['posted_date']));?>

    <button type="submit" class="btn btn-default">Save</button>

<?=form_close();?>
