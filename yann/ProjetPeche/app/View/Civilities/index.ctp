<h2>Civilities</h2>

<table>
<?php
echo "<tr>";
	foreach ($civilities['0']["Civility"] as $column=>$value){ 
		echo '<th>';
			echo($column);
		echo '</th>';
	}
echo "</tr>";

	foreach($civilities as $civility){

		echo "<tr>";
			foreach ($civility['Civility'] as $column=>$value){
				echo '<td>';
					echo($value);
				echo '</td>';
			}
		echo "</tr>";
	}
?>
</table>