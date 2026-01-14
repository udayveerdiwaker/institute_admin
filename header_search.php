<?php $filename=basename($_SERVER['PHP_SELF']);

$fullurl = ($_SERVER['REQUEST_URI']);
$trimmed = trim($fullurl, ".php");
$canonical = rtrim($trimmed, '/') . '/';
 ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"
        async>
    <link href="css/app.css" rel="stylesheet" async>
    <link href="css/searchdesign.css" rel="stylesheet" async>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="no-referrer">
    <meta name="google-adsense-account" content="ca-pub-5857067892659085">
    <title>OnionLand: Access the Dark Web Securely</title>
    <meta name="description"
        content="OnionLand.io is a search engine that enables users to discover and access Tor hidden services, facilitating anonymous and secure exploration of the dark web.">
    <link rel="canonical" href="<?php echo DOMAIN.$canonical ?>" />
    <meta name="robots" content="index, follow">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
    .flex-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: baseline;
        overflow: hidden;
    }

    .result--more__btn {
        margin-top: 50px !important;
        margin-bottom: 50px !important;
    }

    .flex-container .flex-item {
        margin-top: 8px;
        margin-bottom: 12px;
        padding: 4px;
    }

    .flex-container .host {
        letter-spacing: .2px;
        text-overflow: ellipsis;
        white-space: nowrap;
        display: block;
        font-weight: 500;
        overflow: hidden;
        color: rgba(112, 117, 122, .65);
        font-size: 11px;
        height: 16px;
        line-height: 16px;
        position: relative;
        width: 100%;
    }

    .flex-container .image-anchor {
        height: 176px;
        left: 0;
        background: #fff;
        overflow: hidden;
        z-index: 1;
        display: inline-block;
    }

    .flex-container .image-anchor img {
        height: 176px;
        margin-top: 0;
    }

    .link1 {
        color: #006621;
        font-size: 14px;
        font-weight: 500;
    }

    .link2 {
        font-weight: 400;
        color: rgb(77, 89, 106);
        font-size: 12px;
    }

    .g-fav {
        width: 31.9886px;
        height: 31.9886px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        background: rgb(242, 244, 247);
        border-radius: 50%;
    }

    .result--more__btn_clearweb {
        margin-top: 50px !important;
        margin-bottom: 50px !important;
        line-height: 2.5;
        border: 1px solid #babec9;
        text-shadow: 0 1px 1px rgb(255 255 255 / 10%);
        background-color: #f8f8f8;
        color: #474747;
        border-radius: 4px;
        transition: none .3s ease-in-out 0s;
        outline: none !important;
        text-transform: capitalize;
        width: 85%;
        font-weight: 600;
    }

    .beta {
        background: #808080;
        border-radius: 20px;
        color: #fff;
        padding: 1px 11px !important;
        margin-left: 10px;
    }

    .tbb-results .search-tabs ul li {
        display: inline-block;
        padding: 2px 10px;
    }

    .tbb-results .search-tabs ul li a {
        font-size: 16px;
    }

    .addbutton {
        padding: 0 1em;
        border-color: #ddd;
        line-height: 2.5;
        border: 1px solid #babec9;
        text-shadow: 0 1px 1px rgb(255 255 255 / 10%);
        background-color: transparent;
        color: #474747;
        width: 100%;
        border-radius: 50px;
        display: block;
        text-align: center;
    }

    .addbutton:hover {
        background-color: #ebf1ff;
        border: 1px solid #ebf1ff;
    }

    .width-50 {
        margin-bottom: 10px;
    }

    .meta-disc .heading {
        font-weight: 600;
        color: #4d5156
    }

    .meta-disc .title {
        color: #4d5156
    }

    .meta-disc p {
        color: #4d5156 !important;
        margin: 0px;
    }

    .add-data .addbutton {
        color: #4d5156 !important;
    }

    .mobileDevice {
        display: none;
    }

    .result--more__btn_clearweb {
        width: 100% !important;
    }

    .list-item-related-search {
        font-size: 12px;
        border: 1px solid rgba(93, 117, 152, 24%);
        border-radius: 11px;
        padding: 7px 11px !important;
        text-decoration: none;
        width: 225px;
        background: #e9ecef;
        color: black;
        margin-top: 8px;
    }

    .list-item-related-search:before {
        content: "\f002";
        font-family: var(--fa-style-family, "Font Awesome 6 Free");
        font-weight: var(--fa-style, 900);
    }

    .list-related-searches {
        padding-left: 0;
        list-style-type: none;
    }

    .list-item-related-search a {
        color: black;
        font-size: 14px;
    }

    .list-item-related-search {
        cursor: pointer;
    }
    </style>

    <script src="https://cdn.usefathom.com/script.js" data-site="PWORANFD" defer></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5857067892659085"
        crossorigin="anonymous" defer></script>
</head>

<body>
    <div class="header">

        <div class="clearfix"></div>
    </div>

    <div class="tbb-results">
        <div class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">


                        <div class="search_wrapper searchpage">
                            <form id="searchform" class="searchform search_input" action="<?php echo DOMAIN;?>/search"
                                onsubmit="fathom.trackGoal('VTKGHUB1', 0);" method="get">
                                <span class="search-input__left-icon"><svg width="20" height="21" viewBox="0 0 20 21"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 2.25488C5.13401 2.25488 2 5.38889 2 9.25488C2 13.1209 5.13401 16.2549 9 16.2549C10.8867 16.2549 12.5991 15.5084 13.858 14.2947C13.884 14.2611 13.9124 14.2287 13.9433 14.1978C13.9741 14.1669 14.0065 14.1385 14.0402 14.1125C15.2537 12.8537 16 11.1415 16 9.25488C16 5.38889 12.866 2.25488 9 2.25488ZM16.0321 14.8724C17.2636 13.3327 18 11.3798 18 9.25488C18 4.28432 13.9706 0.254883 9 0.254883C4.02944 0.254883 0 4.28432 0 9.25488C0 14.2254 4.02944 18.2549 9 18.2549C11.1251 18.2549 13.0782 17.5183 14.6179 16.2866L18.2933 19.962C18.6838 20.3525 19.317 20.3525 19.7075 19.962C20.098 19.5715 20.098 18.9383 19.7075 18.5478L16.0321 14.8724Z"
                                            fill="#5653D2"></path>
                                    </svg></span>
                                <button class="search-input__button search-input__button--back" type="button"><svg
                                        id="arrow-left" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-arrow-left">
                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                        <polyline points="12 19 5 12 12 5"></polyline>
                                    </svg></button>
                                <button class="search-input__button search-input__button--search" type="button"><i
                                        class="fa fa-search"></i></button>
                                <input type="text" placeholder="Search" autocomplete="off" autofocus="" name="q"
                                    value="<?=$searchText?>" class="autocomplate ui-autocomplete-input"
                                    id="search_input" autocapitalize="off" autocorrect="off" spellcheck="off">
                                <button class="search-input__clear" type="button" onclick="ClearFields();"><svg
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18" stroke="#585D72" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                        <path d="M6 6L18 18" stroke="#585D72" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                        </path>
                                    </svg><span class="search-input__clear-border"> </span></button>
                                <div class="search-input__suggestions-list">
                                    <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content"
                                        id="ui-id-1" tabindex="0" style="display: none;"></ul>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="search-status">
            <div class="container">
                <div class="row">
                    <!--<div class="col-sm-12">
About 12,505 results found.
<small><strong>(Query 1.65400 seconds)</strong></small>
</div>-->
                </div>
            </div>
        </div>
        <div class="search-tabs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li class="<?php echo ($filename=='search.php')?"active":""; ?>"><a
                                    href="search?q=<?=$searchText; ?>">All</a></li>
                            <li class="<?php echo ($filename=='clearweb.php')?"active":""; ?>"><a
                                    href="clearweb?q=<?=$searchText; ?>">Clearnet<span class="beta">Beta</span></a></li>

                            <li class="<?php echo ($filename=='searchimg.php')?"active":""; ?>"><a
                                    href="searchimg?q=<?=$searchText; ?>">Images</a></li>
                            <!--<li><a rel="nofollow" href="#">Legacy(Tor v2)</a></li>

<li><a href="#" rel="nofollow">I2P</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <style scoped="">
                @media (max-width: 768px) {
                    .mobile-hidden {
                        display: none;
                    }
                }

                .ad-slots {
                    margin-left: 4.167%;
                    padding-top: 40px
                }

                .ad-slots img {
                    margin-bottom: 20px;
                }
                </style>