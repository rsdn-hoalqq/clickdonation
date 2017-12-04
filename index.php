<?php 
	// get total money
	require_once('clicks/classes/Database.php');
	require_once('clicks/classes/UserInfo.php'); 
	
	$db = new Database();
	$curentDate = Date('Y-m-d');
	$sql = "SELECT count(*) from clicks WHERE click_date = '$curentDate'";
	$moneyCurent = $db->getOne($sql);

	$sql = "SELECT count(*) from clicks";
	$totalMoney = $db->getOne($sql);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="ja" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="ja" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="ja" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="ja" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="ja"> <!--<![endif]-->

<head>
<!--[if lte IE 9]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1;" /><![endif]-->

<!-- meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="robots" content="index, follow">
<meta name="title" content="">
<meta name="author" content="">
<meta name="copyright" content="">
<meta name="description" content="株式会社ピーエスシーはICTサービス全般の企画・開発・設計から構築・導入、運用・保守までをワンストップで提供します。" />
<meta name="keywords" content="株式会社ピーエスシー,PSC,ピーエスシー,ITサービス,ICTサービス,ソリューションコンサルティング,システムインテグレーションサービス,ネットワーク・インフラ&amp;セキュリティー構築,セキュリティソリューション,サーバ仮想化,ITサービス,サーバ移転・移設,ストレージソリューション,キッティング&amp;インストレーション,全国展開マネジメントサービス,IT基地局構築,PCライフサイクルマネジメント,オンラインサービス,ソフトウェア+サービス,プラットフォーム+サービス,サーバ・ネットワーク監視+サービス,ハウジング,クラウドコンピューティング,システムアウトソーシング,システム運用,デスクトップマネージメント,情報システム支援サービス,IT資産コンサルティング" />
<meta name="format-detection" content="telephone=no">	



<title>クリック募金 | 株式会社ピーエスシー</title>

<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="https://use.fontawesome.com/71b50c9dd6.css" rel="stylesheet" type="text/css">
<link href="assets/bootstrap/css/animate.css" rel="stylesheet">
<link href="assets/bootstrap/css/psc.css" rel="stylesheet">
<link href="assets/bootstrap/css/psc-responsive.css" rel="stylesheet">
<!--subpage common-->
<link href="assets/bootstrap/css/sub.css" rel="stylesheet">
<link href="assets/bootstrap/css/clickdonation.css" rel="stylesheet">

<!-- Fav and touch icons -->
<!--<link rel="apple-touch-icon" href="">
<link rel="icon" type="image/x-icon" href="">
<link rel="shortcut icon" type="image/x-icon" href="">-->

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="https://use.typekit.net/ojk7amh.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<script>
//Google Analyticsです。公開直前にコメントアウトを解除してください

//  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
// 
//  ga('create', 'UA-791291-1', 'psc-inc.co.jp');
//  ga('send', 'pageview');
// 
//  //新たなトラッキング
//  ga('create', 'UA-102889871-1', 'auto', {'name': 'newTracker'});
//  ga('newTracker.send', 'pageview');
</script>
<style>
	/*#disabled-tag-as {
	   pointer-events: none;
	   cursor: default;
	}*/
</style>
</head>

<body id="stand">

<!-- wrapper -->
<div id="wrapper">


<header id="header">
<div id="fixed-header" class="container clearfix">
<h1 id="logo"><a href="http://www.psc-inc.co.jp/" target="_blank"><img src="assets/images/common/logo.png" alt="株式会社ピーエスシー" width="100"></a></h1>	

<div id="sp-gnav" class="clearfix">

<div class="sub-menu">
<ul class="clearfix">
<li>株式会社 ピーエスシー</li>
</ul>
</div>

</div>
<!-- //sp-gnav -->

</div>
</header>


<!-- page=id -->
<div id="clickdonation" class="sub">

<!-- main -->
<div id="main">
<div class="container">
<h2 class="normal-tit">クリック募金</h2>
<!-- <button onclick="destroyCookie()">Clear Cookie</button> -->
<div class="inner">

<figure id="mainvisual">
<img src="assets/images/clickdonation/mainvisual.jpg" alt="東日本大震災支援 夢を応援プロジェクト 奨学金×地域発の教育プログラムで若者をサポート">
</figure>
<div id="fund-explain">
<p>
株式会社ピーエスシーでは東日本大震災被災地の若者支援のためにこれからもクリック募金を続けてまいります。<br>
震災被害により経済的事由から就学が困難な状況が見込まれる生徒の経済的不安を緩和することを目的とした支援活動の一環です。<br>
どうか皆様の温かいお気持ちを被災地の皆様へ送っていただきたいと存じます。<br>
〈<span class="blue">東北の学生を応援する</span>〉をクリックしてください。<br>
１クリックあたり３円を皆様に代わって株式会社ピーエスシーが公益社団法人 Civic Forceに寄付いたします。<br>
募金は奨学金の一部として使われます。
</p>
</div><!-- //fund-explain -->
<p class="blue-big-btn wow bounceIn" data-wow-delay="0s" data-wow-duration="0.5s">
<a href="javascript:void(0)" onclick="addMoney()" id="disabled-tag-a">
<svg id="icon-click" data-name="icon-click" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 237.84 238" width="50" height="50"><title>CLICK!</title><path d="M235.25,201,188,153.68l33.73-19.49a7.94,7.94,0,0,0-1-14.26l-150.43-60A7.94,7.94,0,0,0,59.92,70.25l60,150.44a7.95,7.95,0,0,0,14.26,1L153.66,188l47.28,47.29a7.95,7.95,0,0,0,11.24,0l23.07-23.07a7.94,7.94,0,0,0,0-11.23Zm-28.69,17.46-49-49A8,8,0,0,0,152,167.1a8.44,8.44,0,0,0-1,.07,7.94,7.94,0,0,0-5.84,3.91l-16.47,28.52L81.53,81.54l118,47.09-28.52,16.47a7.95,7.95,0,0,0-1.64,12.5l49,49Zm0,0"/><rect class="cls-1" width="237.84" height="238"/><path d="M34.88,23.64A7.95,7.95,0,0,0,23.64,34.88L41.3,52.54A7.95,7.95,0,0,0,52.53,41.3Zm0,0"/><path d="M40.86,78.57a7.94,7.94,0,0,0-7.95-7.94h-25a7.94,7.94,0,0,0,0,15.89h25a8,8,0,0,0,7.95-7.95Zm0,0"/><path d="M37.64,103.1,20,120.75A7.94,7.94,0,1,0,31.22,132l17.66-17.66A7.94,7.94,0,1,0,37.64,103.1Zm0,0"/><path d="M78.57,40.86a8,8,0,0,0,7.95-7.95v-25a7.95,7.95,0,0,0-15.89,0v25a8,8,0,0,0,7.95,7.95Zm0,0"/><path d="M108.7,51.2a7.93,7.93,0,0,0,5.62-2.32L132,31.22A7.95,7.95,0,1,0,120.74,20L103.09,37.64A7.94,7.94,0,0,0,108.7,51.2Zm0,0"/>
<foreignobject display="none" width="50" height="57">
<img src="assets/images/clickdonation/icon_click.png" alt="CLICK!" width="50" height="50">
</foreignobject>
</svg>
東北の学生を応援する
</a>
</p>

<div id="achievement" class="table-layout two">
<dl class="left">
<dt class="wow fadeIn" data-wow-delay="0.3s" data-wow-duration="0.2s">今日のクリック</dt>
<dd class="blue wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.2s"><?php echo empty($moneyCurent) ? '' : $moneyCurent *3; ?>円</dd>
<!-- 942 -->
</dl><!-- //left -->
<dl class="right">
<dt class="wow fadeIn" data-wow-delay="0.7s" data-wow-duration="0.2s">現在の寄付総額</dt>
<dd class="blue wow fadeInUp" data-wow-delay="0.9s" data-wow-duration="0.2s"><?php echo empty($totalMoney) ? '' : $totalMoney *3; ?>円</dd>
</dl><!-- //right -->
</div><!-- //achievement -->

</div><!-- //inner -->

<div id="supplement" class="table-layout two">

<dl class="left">
<dt class="dot-title">支援団体</dt>
<dd>
<dl>
<dt>公益社団法人 Civic Force</dt>
<dd>
<p>Civic Forceは、2009年に国内の大規模災害時に迅速で効果的な支援を行うため、NPO/NGO・企業・政府・行政をつなぐ中間組織として設立。災害時支援に必要な「情報」「人」「資金」「モノ」を活用し、東日本大震災では発災翌日からヘリを投入して大規模な支援活動を展開しました。</p>
<figure>
<img src="assets/images/clickdonation/bnr_civic_force.jpg" alt="Civic Force">
</figure>
<p class="dot-button wow fadeIn" data-wow-delay="0.6s" data-wow-duration="0.3s"><a href="http://www.civic-force.org/emergency/higashinihon/choki/children/" target="_blank">夢を応援プロジェクト 活動報告</a></p>
</dd>
</dl>
</dd>
</dl><!-- //left -->
<dl class="right">
<dt class="dot-title">PSCの取り組み</dt>
<dd>
<p>PSCを取り巻く全ての人々と環境と共に、発展し続ける企業を目指します。
日本の経済・社会を担う企業に必要とされるのは、利益の追求のみならず、顧客、取引先、株主、従業員、地域社会等、自社を取り巻く全ての人々と環境(=ステークホルダー)に対して、どのように貢献していくかということです。
PSCでは現在のみならず、この先の未来にも、継続したサービスを提供していくために、多岐にわたる取り組みを行っております。</p>
<p class="dot-button wow fadeIn" data-wow-delay="0.6s" data-wow-duration="0.3s"><a href="http://www.psc-inc.co.jp/about/csr/" target="_blank">CSR(企業の社会的責任について)</a></p>
</dd>
</dl><!-- //right -->

</div><!-- //supplement -->

</div><!-- //container -->
</div>
<!-- //main -->



</div>


<footer id="footer">
<div class="box">
<div class="box-header">
<h2 class="logo"><img src="assets/images/common/footer_logo.png" alt="株式会社ピーエスシー"></h2>
<h3>成長企業が、<br>成長期に、<br>もっとも出会いたい<br>IT企業へ</h3>
<div class="info">
<p>〒105-0011<br>東京都港区芝公園 2-2-18 オーク芝公園ビル<br>TEL <span class="pc-tel">03-3435-1044</span><a href="tel:03-3435-1044" class="sp-tel">03-3435-1044</a> / FAX 03-3435-1418</p>
<p>Copyright © 1996-2017<br>PSC Inc. All Rights Reserved.</p>
</div>
</div>

</div>
<button id="pagetop">PAGE TOP</button>
</footer>
</div>
<!-- //wrapper -->

<!-- ********************************** js ********************************** -->
<div id="loading" class="sub-loading">
<div class="inner"><div class="spinner"></div></div></div>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.matchHeight-min.js"></script>
<script src="assets/js/common.js"></script>
<script src="checkcookie.js"></script>
<script src="scripts_ip.js"></script>
</body>
</html>