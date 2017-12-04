<?php 
	// get total money
	require_once('clicks/classes/Database.php');
	require_once('clicks/classes/UserInfo.php'); 
	
	if($_POST){
		$db = new Database();
		if(empty($_POST['begin'])){
			$error = "Please enter start date";
		}elseif(empty($_POST['end'])){
			$error = "Please enter end date";
		}elseif(strtotime($_POST['begin']) > strtotime($_POST['end'])){
			$error = "Start date must be less than end date";
		}else{
			$sql = "SELECT SUM(total) as totals FROM totals WHERE click_date >= '".$_POST['begin']."' and click_date <= '".$_POST['end']."'";
			$datas = $db->getOne($sql);
			$data = "開始日,終了日,クリック数\n";
			if(!empty($datas)){
				$data .= "'".Date('Y/m/d',strtotime($_POST['begin']))."','".Date('Y/m/d',strtotime($_POST['end']))."',".$datas."\n";
				// $data .= Date('Y/m/d',strtotime($_POST['begin'])).','.Date('Y/m/d',strtotime($_POST['end'])).','.$datas."\n";
				$user = new UserInfo();
				$user->array_to_csv_download($data, $filename = "export.csv");
			}
		}		
	}
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



<title>ダウンロード CSV</title>

<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<style>
	body{
		background-color: #F5F5F5;
	}
	.colorWhite{
		background-color: white;
	}
	.titlePage{
		    margin-left: 10px;
    		margin-top: 30px;
	}
	.contentCalenda{
		margin: 15px;
	}
	.special{
		margin: 0px 5px;
	}
	.btnCsv{
		margin-left: 40px;
		padding: 6px 20px;
	}
</style>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="assets/js/jquery-1.11.3.min.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
    	dateFormat: "yy-mm-dd"
    });
    $('div.alert').delay(2000).slideUp();
  } );
  </script>
</head>
<body>
	<div class="container colorWhite">
	    <div class="row">
	    	<?php if(!empty($error)){ ?>
	    		<div class="alert alert-danger">
				  <?php echo $error; ?>
				</div>
	    	<?php } ?>
	    	<div class="titlePage"><h1>期間</h1></div>
	    	<div class="contentCalenda">
	    		<form class="form-inline" action="" method="POST">
					<div class="form-group mx-sm-3">
					    <input type="text" size="30" class="form-control datepicker" value="<?php echo empty($_POST['begin']) ? '' : $_POST['begin']; ?>" placeholder="Start date" name="begin">
					    <span class="special"><strong>~</strong></span>
					    <input type="text" size="30" class="form-control datepicker" value="<?php echo empty($_POST['end']) ? '' : $_POST['end']; ?>" placeholder="End date" name="end">
					</div>
					<button type="submit" class="btn btn-basic btnCsv">ダウンロード</button>
				</form>
	    	</div>
	    </div>
	</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>