<h2>Home Users</h2>
<table>
<?php

	echo "<tr>";
		foreach ($users['0']['User'] as $column=>$value){
			echo '<th>';
			if($column != 'password')
				echo($column);
			echo '</th>';
		}
	echo "</tr>";
	foreach($users as $user){
		echo "<tr>";
			foreach ($user['User'] as $column=>$value){
				echo '<td>';
				if($column != 'password')
					echo($value);
				echo '</td>';
			}
		echo "</tr>";
	}
	
?>
</table>


<?php
	echo $this->Html->link('Add User',
		array( 'action'=>'add')
	);


