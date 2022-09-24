<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$identity['dashboard_title']?></title>
	
	<!-- Favicons -->
	<link href="<?=base_url($identity['favicon'])?>" rel="icon">
	<link href="<?=base_url($identity['favicon'])?>" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<?=view($view['layout'].'partials/plugins_css');?>
</head>
