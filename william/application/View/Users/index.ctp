

<div>

<h2>Accueil Utilisateurs</h2>



<!-- On affiche tous les utilisateurs dans une table (debug) -->
<?php
	
	//Si pas d'utilisateurs dans la base de donnée, on passe sur le else sans afficher les colonnes
	if(isset($users['0']['User'])){
		?>
		<table>
			<?php
			//Première ligne contenant les titres des colonnes
			echo "<tr>";
			foreach ($users['0']['User'] as $column=>$value){
				
				if($column != 'password'){
					echo '<th>';
					echo($column);
					echo '</th>';
				}
			}
			echo "</tr>";
			//Lignes suivantes, 1 par utilisateur enregistré
			foreach($users as $user){
				echo "<tr>";
					foreach ($user['User'] as $column=>$value){
						if($column != 'password'){
							echo '<td>';
							echo($value);
							echo '</td>';
						}

					}
					echo '<td>';
						echo $this->Html->link(
			                'Editer',
			                array('action' => 'edit', $user['User']['id'])
			            );
			            echo '</td>';
				echo "</tr>";
			}
		?>
		</table>
		<?php	
	}else{
		echo "<h3>Il n'y a aucun utilisateur dans la base</h3>";
	}



	//Lien Enregistrer un Utilisateur
	echo $this->Html->link('S\'enregistrer',
		array( 'action'=>'add')
	);

	echo "<br/>";
	



	?>

</div>