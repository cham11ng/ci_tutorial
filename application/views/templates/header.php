<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=$title?></title>

    <?=link_tag('assets/img/icon.ico', 'shortcut icon', 'image/ico')?>
    <?=link_tag('assets/css/bootstrap.min.css')?>
    <?=link_tag('assets/css/style.css')?>

    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
</head>
<body class="container">
<h1><?=$title?></h1>
<nav>
    <ul class="nav nav-tabs">
        <li><?=anchor("home", "HOME");?></li>
        <li><?=anchor("about", "ABOUT");?></li>
        <li><?=anchor("news", "NEWS");?></li>

        <?php if($this->session->has_userdata('is_logged_in')): ?>
        <li><?=anchor("logout", "LOGOUT");?></li>
        <?php else: ?>
        <li><?=anchor("sign_up", "SIGN UP");?></li>
        <li><?=anchor("login", "LOGIN");?></li>
        <?php endif; ?>
    </ul>
</nav>
