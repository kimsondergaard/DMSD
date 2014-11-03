<head>
<link href="print.css" type="text/css" rel="stylesheet" media="print">
<title>Printer status</title>

<style type="text/css">

/*------------------------------------------------------------------
Table Style
------------------------------------------------------------------ */
table a:link {
    color: #666;
    font-weight: bold;
    text-decoration:none;
}
table a:visited {
    color: #999999;
    font-weight:bold;
    text-decoration:none;
}
table a:active,
table a:hover {
    color: #bd5a35;
    text-decoration:underline;
}
table {
    font-family:Arial, Helvetica, sans-serif;
    color:#666;
    font-size:12px;
    background:#eaebec;
    border:#ccc 1px solid;

    border-radius:3px;
    border-collapse:collapse; border-spacing: 0; 

    box-shadow: 0 1px 2px #d1d1d1;
    min-width: 1000px;
}
table th {
    padding:10px 10px 10px 10px;
    border-top:0;
    border-bottom:1px solid #e0e0e0;
    border-left: 1px solid #e0e0e0;

    background: #ededed;
}
table th:first-child {
    text-align: left;
}
table tr:first-child th:first-child {
    border-top-left-radius:3px;
    border-left: 0;
}
table tr:first-child th:last-child {
    border-top-right-radius:3px;
}
table tr {
    text-align: center;
}
table td:first-child {
    text-align: left;
    border-left: 0;
}
table td {
    padding:10px;
    border-bottom:1px solid #e0e0e0;
    border-left: 1px solid #e0e0e0;
    background: #fafafa;
}
table tr:last-child td {
    border-bottom:0;
}
table tr:last-child td:first-child {
    border-bottom-left-radius:3px;
}
table tr:last-child td:last-child {
    border-bottom-right-radius:3px;
}
table tr:hover td {
    background: #f2f2f2;

}
table th, table td {
    width: 160px;

}
#wrapper {
    width: 740px;
    height: 200px;
    overflow-x: scroll;
    overflow-y: scroll;
	margin: 0 auto;
}
table thead {
    position: fixed;
}
</style>

</head>
<html>
<body style="font-family: century gothic; font-size: 13px; background-image: url('http://p1.pichost.me/i/5/1282860.jpg'); background-repeat: no-repeat; background-attachment: fixed; color: white; ">
<header>

	<h2>Toshiba & Kyocera MFP t&aelig;llerafl&aelig;sning for DMSD</h2>

		<?php if(isset($_GET['fuld'])){ }else{?><td><a href="status.php/?fuld=true">Se fuld t&aelig;ller</a></td><?php } ?>

</header>
<?php
if($_GET[fuld] == true){$limit = '';}else{$limit = 'LIMIT 20';}
$link = mysql_connect( 'localhost', 'root', 'C8chokokiks' ) or die( mysql_error() );
mysql_select_db( 'status_printer', $link ) or die( mysql_error() );
echo "<table id='wrapper'><tr style='background-color: white; color: black;'>
<th style='min-width: 180px;'>Sidst k&oslash;rt</th>
<th style='width: 200px;'>Hostnavn</th>
<th style='width: 140px;'>Serienummer</th>
<th style='min-width: 50px;'>ialt udskrevet A3 farve</th>
<th style='min-width: 50px;'>ialt udskrevet A3 sort/hvid</th>
<th style='min-width: 50px;'>ialt udskrevet A4 farve</th>
<th style='min-width: 50px;'>ialt udskrevet A4 sort/hvid</th>
<th style='min-width: 80px;'>ialt udskrevet</th>
<th style='min-width: 70px;'>ialt scannet</th>
<th style='min-width: 105px;'>IP</th>
</tr>";

$result = mysql_query("SELECT * FROM status ORDER BY tid DESC $limit");
		while($row = mysql_fetch_assoc($result)){
		
		echo "<tr>";
		echo "<td>";  if($row[tid] !== "Such Object available on this agent at this OID"){echo $row[tid];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[hostnavn] . "</td>";
		echo "<td>";  if($row[hostnavn] !== "Such Object available on this agent at this OID"){echo $row[hostnavn];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[serienummer] . "</td>";
		echo "<td>";  if($row[serienummer] !== "Such Object available on this agent at this OID"){echo $row[serienummer];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[a3f] . "&nbsp;</td>";
		echo "<td>";  if($row[a3f] !== "Such Object available on this agent at this OID"){echo $row[a3f];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[a3sh] . "&nbsp;</td>";
		echo "<td>";  if($row[a3sh] !== "Such Object available on this agent at this OID"){echo $row[a3sh];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[a4f] . "&nbsp;</td>";
		echo "<td>";  if($row[a4f] !== "Such Object available on this agent at this OID"){echo $row[a4f];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[a4sh] . "&nbsp;</td>";
		echo "<td>";  if($row[a4sh] !== "Such Object available on this agent at this OID"){echo $row[a4sh];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[ialt] . "&nbsp;</td>";
		echo "<td>";  if($row[ialt] !== "Such Object available on this agent at this OID"){echo $row[ialt];}else{echo "&nbsp;";} echo "</td>";
		//echo "<td>" .  $row[scan] . "&nbsp;</td>";
		$toshscan = $_row[scanskopi] + $_row[scanfkopi] + $_row[scansnet];
		echo "<td>";  if($row[scan] !== "Such Object available on this agent at this OID"){echo $row[scan];}else{print_r($toshscan);} echo "</td>";
		//echo "<td>" . $row[ip] . "</td>";
		echo "<td>";  if($row[ip] !== "Such Object available on this agent at this OID"){echo $row[ip];}else{echo "&nbsp;";} echo "</td>";


		echo "</tr>";
}
echo "</table>";
?>
</body>
</html>