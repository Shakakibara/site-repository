

<div>

<h2>Accueil Utilisateurs</h2>
<?php

	if(isset($usercategorie) && $usercategorie == 1){
		echo "<div>";
			echo $this->Html->link(
			    'Liste des utilisateurs',
			    array('action' => 'admin_listusers')
			);
		echo "</div>";
	}






echo "<div>";
	if($this->Session->read('Auth.User.id')){
		echo $this->Html->link(
		    'Mon compte',
		    array('action' => 'edit')
		);
		echo '<br/>';
		echo $this->Html->link(
		    'Se déconnecter',
		    array('action' => 'logout')
		);
	}else{
		echo $this->Html->link('S\'enregistrer',
			array( 'action'=>'add')
		);
		echo '<br/>';
		echo $this->Html->link(
		    'Se connecter',
		    array('action' => 'login')
		);
	}
echo "</div>";





?>

</div>