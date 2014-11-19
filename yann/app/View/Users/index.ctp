<h2>Home Users</h2>
<table>
<?php

	echo "<tr>";
		if(isset($users['0']['User']))
			foreach ($users['0']['User'] as $column=>$value){
				
				if($column != 'password'){
					echo '<th>';
					echo($column);
					echo '</th>';
				}
					
		}else{
			echo "<h3>Il n'y a aucun utilisateur dans la base</h3>";
		}

	echo "</tr>";
	foreach($users as $user){
		echo "<tr>";
			foreach ($user['User'] as $column=>$value){
				
				if($column != 'password'){
					echo '<td>';
					echo($value);
					echo '</td>';
				}
					
			}
		echo "</tr>";
	}
	
?>
</table>


<?php
	echo $this->Html->link('Add User',
		array( 'action'=>'add')
	);


