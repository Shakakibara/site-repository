<h2>Home Users</h2>
<table>
<?php

	echo "<tr>";
		foreach ($userscategories['0']['UserCatgeorie'] as $column=>$value){
			echo '<th>';
				echo($column);
			echo '</th>';
		}
	echo "</tr>";
	foreach($userscategories as $userscategorie){
		echo "<tr>";
			foreach ($userscategorie['UserCatgeorie'] as $column=>$value){
				echo '<td>';
					echo($value);
				echo '</td>';
			}
		echo "</tr>";
	}
	
?>
</table>


