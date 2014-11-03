<title>Printer status</title><body style="font-family: century gothic; font-size: 13px;">
<header>

	<h2>Toshiba & Kyocera MFP t&aelig;llerafl&aelig;sning for DMSD</h2>
<table>
	<tr>
		<?php if(isset($_GET[fuld])){ ?><td><a href="status.php/?fuld=true">Se fuld tæller</a></td><?php } ?>
		<td></td>
	</tr>
</table>
</header>
<?php
if($_GET[fuld] == true){$limit = '';}else{$limit = 'LIMIT 20';}
$link = mysql_connect( 'localhost', 'root', 'C8chokokiks' ) or die( mysql_error() );
mysql_select_db( 'status_printer', $link ) or die( mysql_error() );
echo "<table><tr style='background-color: black; color: white;'>
<td style='min-width: 180px;'>Sidts k&oslash;rt</td>
<td style='width: 200px;'>Hostnavn</td>
<td style='width: 130px;'>Serienummer</td>
<td style='min-width: 100px;'>ialt udskrevet A3 farve</td>
<td style='min-width: 100px;'>ialt udskrevet A3 sort/hvid</td>
<td style='min-width: 100px;'>ialt udskrevet A4 farve</td>
<td style='min-width: 100px;'>ialt udskrevet A4 sort/hvid</td>
<td style='min-width: 100px;'>ialt udskrevet</td>
<td style='min-width: 100px;'>ialt scannet</td>
<td style='min-width: 100px;'>IP</td>
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
