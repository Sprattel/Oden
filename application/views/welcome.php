<!DOCTYPE html>
<html >

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<title>Oden framework</title>
  <link type="text/css" rel="stylesheet" href="/css/default.css" media="screen" />

</head>

<body>
<?=

$this->element('debugbar', array('debugFiles' => $debugFiles, 10))

?>
<h1>Welcome to the Oden framework!</h1>
<?=

date('Y-m-d h:s');

?><br />

</body>
</html>