<h1>Mot de passe oublié</h1>
<?php

echo $this->Form->create('User');
echo $this->Form->input('email', array('label'=>'Email utilisé lors de l\'inscription'));
echo $this->Form->end('Envoyer un nouveau mot de passe');
echo $this->Html->link('Annuler',
	array( 'action'=>'index')
);