<section class="panel">
    <h3> <?php echo $news_item['title']; ?></h3>
    <article><p> <?php echo $news_item['text']; ?></p></article>
    <span>Posted On: <?=mdate('%d %M %Y',$news_item['posted_date']);?></span>
    <p>
        <?=anchor('news/modify/'.$news_item['slug'], "<button class='btn btn-default'>Edit article</button>");?>
    </p>
</section>