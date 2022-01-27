<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>html and css project</title>


    <link rel="stylesheet" href="<?= url('public/app/css/style.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
<section class="app">
    <header>
        <nav class="header">
            <img class="header-logo" src="images/logo-black.png" alt="">
            <button class="header-menu-burger" onclick="showMenu()" type="button"><i class="fas fa-bars"></i></button>
            <ul class="header-menu" id="menu">
                <li class="header-menu-item"><a class="header-menu-item-link" href="">NEWS</a>
                    <span>
                        <a href="">sub menu 1</a>
                        <a href="">sub menu 2</a>
                        <a href="">sub menu 3</a>
                    </span>
                </li>
                <li class="header-menu-item"><a class="header-menu-item-link" href="">GUIDES & ANALYTICS</a></li>
                <li class="header-menu-item"><a class="header-menu-item-link" href="">EVENTS</a></li>
                <li class="header-menu-item"><a class="header-menu-item-link" href="">EXPLAINED</a></li>
                <li class="header-menu-item"><a class="header-menu-item-link" href="">ICON CLAENDER</a></li>
            </ul>
            <section class="clear-fix"></section>
        </nav><!--end of navbar-->
    </header><!--end of header-->