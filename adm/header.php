<?php 
session_start();
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Onyx ADM</title>
	<link rel="stylesheet" href="../css/table_jui.css" />
  <link rel="stylesheet" href="../css/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="../js/jquery.mim.js"></script>
  <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    oTable = $('#example').dataTable({
      "bPaginate": true,
      "bJQueryUI": true,
      "sPaginationType": "full_numbers"
    });
  });
  </script>
</head>
<body>

</body>
</html>
