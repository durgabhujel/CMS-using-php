<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS using PHP</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" integrity="sha512-cViKBZswH231Ui53apFnPzem4pvG8mlCDrSyZskDE9OK2gyUd/L08e1AC0wjJodXYZ1wmXEuNimN1d3MWG7jaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/f0e17e19a7.js" crossorigin="anonymous"></script>
    <script src="./assets/js/ckeditor/ckeditor.js"></script>
    <script src="./assets/js/ckfinder/ckfinder.js"></script>

    <script src="./assets/js/admin-script.js"></script>
    <script src="./assets/js/ckeditor/adapters/jquery.js"></script>
</head>
<body>
    <header class="admin-header">
        <a class="nav-links" href="<?php echo '?page=page_manager'; ?>">PAGE Manager</a>
        <a class="nav-links" href="<?php echo '?page=admin_manager'; ?>">Admin Manager</a>
        <a class="nav-links" href="<?php echo '?page=news_manager'; ?>">News Manager</a>
        <a class="nav-links" href="<?php echo '?page=download_page'; ?>">Download page</a>
        <a class="nav-links" href="<?php echo '?page=news_letter_suscriber'; ?>">News letter suscriber</a>
        <a class="nav-links" href="<?php echo 'http://' . SITE_URL; ?>">Visit User-end</a>
        <a class="nav-links" href="<?php echo 'login.php?logout=1'; ?>">Log Out</a>
    </header>
    <div class="main-content">    