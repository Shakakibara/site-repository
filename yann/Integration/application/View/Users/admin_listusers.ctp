<?php

if($this->Session->read('Auth.User.id') && $usercategorie == 1){

echo $this->Html->link('Créer un compte utilisateur',
			array( 'action'=>'add')
		);


?>

	<table>
		<tr>
			<th>
				Catégorie
			</th>
			<th>
				Nom
			</th>
			<th>
				Prénom
			</th>
			<th>
				Pseudo
			</th>
			<th>
				Email
			</th>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<?php
		foreach($users as $k => $v){?>
			<tr>
				<td>
					<?php echo $v['Usercategorie']['label']; ?>
				</td>
				<td>
					<?php echo $v['User']['lastname']; ?>
				</td>
				<td>
					<?php echo $v['User']['firstname']; ?>
				</td>
				<td>
					<?php echo $v['User']['username']; ?>
				</td>
				<td>
					<?php echo $v['User']['email']; ?>
				</td>
				<td>
					<?php echo $this->Html->link(
							    'Voir',
							    array('action' => 'admin_viewuser', $v['User']['id'])
							);
					?>
				</td>
				<td>
					<?php echo $this->Html->link(
							    'Editer',
							    array('action' => 'admin_edit', $v['User']['id'])
							);
					?>
				</td>
				<td>
					<?php echo $this->Form->postLink(
		                'Supprimer',
		                array('action' => 'admin_delete', $v['User']['id']),
		                array('confirm' => 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?'));
		            ?>
				</td>
			</tr>
		<?php
		}	

	?>
	</table>

	<?php

	echo $this->Html->link('Revenir à l\'index Utilisateur', array('controller' => 'users', 'action' => 'index'));

      
}else{
	$this->Session->setFlash(__('Vous n\êtes pas autorisé à voir cette page'));
    //Renvoi sur l'index
    return $this->redirect(array('controller'=>'Users' ,'action' => 'index'));
}