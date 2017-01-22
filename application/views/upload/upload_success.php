
<h3><?=$message?></h3>

<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?=$item;?>: <?=$value;?></li>
    <?php endforeach; ?>
</ul>

<?=anchor('upload', "<button class='btn btn-default'>Upload Another File!</button>");?>
