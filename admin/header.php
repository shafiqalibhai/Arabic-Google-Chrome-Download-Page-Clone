<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BTB Admin</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="stylesheets/template.css" media="screen" />
<link type="text/css" href="http://jqueryui.com/latest/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.core.js"></script>
<script type="text/javascript" src="http://jqueryui.com/latest/ui/ui.datepicker.js"></script>
<script type="text/javascript">
	$(function() {
		$('#datepicker-from').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy.mm.dd'
		});
		$('#datepicker-to').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy.mm.dd'
		}).attr("disabled", true);
		
		$("#datepicker-from").change(function() {
			$('#datepicker-to').removeAttr("disabled"); 
		});
	});

</script>
</head>
<body>
<div id="wrap">
<div id="header">
<h1><a href="index.php">Admin Panel</a></h1>
<h2>Welcome <b><?=$session->username?></b></h2>
</div>
<div id="top"></div>