<head>
	<title><?=$identity['title']?></title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Travelix Project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Favicons -->
	<link href="<?=base_url($identity['favicon'])?>" rel="icon">

	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/tijket/assets/styles/bootstrap-4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>/tijket/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	
	<?=isset($css)? view($view['pages'].$css) : '';?>
</head>

