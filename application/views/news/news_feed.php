
<h3><?php echo "Hello World ! You are at ".$title; ?></h3>

<?php foreach ($news as $news_item): ?>
    <section class="panel">
        <header><h4><?=highlight_phrase($news_item['title'], 'Barcelona', '<span style="color:#990000;">', '</span>');?></h4></header>
        <article>
            <p><?=word_censor(character_limiter($news_item['text'], 250), array('is'), '*censored*');?></p>
            <span>Posted On: <?=$news_item['posted_date'];?></span>
            <p>
                <?=anchor('news/'.$news_item['slug'], "View article");?>
                <?=anchor('news/modify/'.$news_item['slug'], "Edit article");?>
            </p>
        </article>
    </section>
<?php endforeach; ?>

<?=$page_links;?>

<?=anchor('news/post', "<button class='btn btn-default'>Write Article</button>");?>
