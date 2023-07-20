<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">

<head>
  <meta charset="UTF-8">
  <?php
    $host = $_SERVER['HTTP_HOST'];
    $base_url = "https://$host/";
    // echo $base_url;
    $site_title="ダミーカンパニー";
    ?>

  <?php if($page=="home"): ?>
  <title><?php echo $site_title; ?></title>
  <meta name="description" content="ページ内容を説明するテキストを設定します。">
  <meta property="og:title" content="<?php echo $site_title; ?>">
  <meta property="og:description" content="ページ内容を説明するテキストを設定します。">
  <?php elseif($page=="form"): ?>
  <title>お問い合わせ｜<?php echo $site_title; ?></title>
  <meta name="description" content="ページ内容を説明するテキストを設定します。">
  <meta property="og:title" content="お問い合わせ｜<?php echo $site_title; ?>">
  <meta property="og:description" content="ページ内容を説明するテキストを設定します。">
  <?php elseif($page=="article"): ?>
  <title>〇〇の記事一覧｜<?php echo $site_title; ?></title>
  <meta property="og:title" content="〇〇の記事一覧｜<?php echo $site_title; ?>">
  <meta property="og:description" content="ページ内容を説明するテキストを設定します。">
  <?php elseif($page=="article_detail"): ?>
  <title>〇〇の記事タイトル｜<?php echo $site_title; ?></title>
  <meta property="og:title" content="〇〇の記事タイトル｜<?php echo $site_title; ?>">
  <meta property="og:description" content="ページ内容を説明するテキストを設定します。">
  <?php endif; ?>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <link rel="shortcut icon" href="/img/favicon.ico" type="image/vnd.microsoft.ico">
  <link rel="apple-touch-icon" href="/img/favicon.png">
  <meta property="og:site_name" content="<?php echo $site_title; ?>">

  <?php if($page=="home"): ?>
  <meta property="og:type" content="website">
  <?php else: ?>
  <meta property="og:type" content="article">
  <?php endif; ?>

  <meta property="og:url" content="ページのURLを出力してください">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image" content="画像のフルパス/img/ogp_large.png">
  <meta property="og:image" content="画像のフルパス/img/ogp_large.png">


  <!--Google Fonts使用時 <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="/css/app.min.css">
  <?php if($page=="home"): ?>
  <link rel="stylesheet" href="css/index.min.css">
  <?php elseif($page=="form"): ?>
  <link rel="stylesheet" href="css/form.min.css">
  <?php endif; ?>

</head>

<body>
  <div class="u-overflow_x_hidden">
    <header class="l-page_header">
      <div class="l-page_header__contents">
        <<?php echo $page == "home" ? "h1" : "div"; ?> class="l-page_header__logo"><a href="/"><img src="/img/common/logo.svg" alt="ダミーカンパニー" width="160" height="20"></a></<?php echo $page == "home" ? "h1" : "div"; ?>>

        <?php if($page!=="form"): ?>
        <nav class="l-page_header__menu_pc">
          <ul>
            <li><a href="<?php echo $page !== "home" ? $base_url : ""; ?>#section_title">見出しセクション</a></li>
            <li><a href="<?php echo $page !== "home" ? $base_url : ""; ?>#section_textsize">テキストサイズセクション</a></li>
            <li><a href="<?php echo $page !== "home" ? $base_url : ""; ?>#section_lineheight">行間セクション</a></li>
            <li><a href="/article.php">記事一覧</a></li>
            <li><a href="/form.php">お問い合わせ</a></li>
          </ul>
        </nav>
        <?php endif; ?>

        <?php if($page!=="form"): ?>
        <div class="l-page_header__menu_btn">
          <span class="l-page_header__menu_border"></span>
          <span class="l-page_header__menu_border"></span>
          <span class="l-page_header__menu_border"></span>
        </div>
        <?php endif; ?>
      </div>

      <?php if($page!=="form"): ?>
      <nav class="l-page_header__menu_sp">
        <ul>
          <li><a href="<?php echo $page !== "home" ? $base_url : ""; ?>#section_title">見出しセクション</a></li>
          <li><a href="<?php echo $page !== "home" ? $base_url : ""; ?>#section_textsize">テキストサイズセクション</a></li>
          <li><a href="<?php echo $page !== "home" ? $base_url : ""; ?>#section_lineheight">行間セクション</a></li>
          <li><a href="/article.php">記事一覧</a></li>
          <li><a href="/form.php">お問い合わせ</a></li>
        </ul>
      </nav>
      <?php endif; ?>

      <?php if($page=="form"): ?>
      <div class="u-cw_narrow">
        <h1 class="c-page_title">お問い合わせ</h1>
      </div>
      <?php elseif($page=="article"): ?>
      <div class="u-cw">
        <h1 class="c-page_title">◯◯の記事一覧</h1>
      </div>
      <?php endif; ?>
    </header>
    <div class="l-page_contents">