
<?php

class User extends AppModel {

	    public $validate = array(
	    'civility_id' => array(
	    	'required' => true,
	    	'allowEmpty' => false,
	    	'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre civilité !',
	            
	        ),
	    ),
        'pseudo' => array(
            'regex' => array(
                'rule'     => '/^[a-zA-Z\-_0-9]+$/',
                'message'  => 'Chiffres et lettres uniquement !'
            ),
            'between' => array(
                'rule'    => array('between', 3, 15),
                'message' => 'Pseudo entre 3 et 15 caractères !',
        	),
        	'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre pseudo !',
	            
	        ),
     		'required' => true,        
        ),
        'mail' => array(
	        'validEmailRule' => array(
	            'rule' => 'email',
	            'message' => 'Addresse Email invalide !',
	            'required' => true
	        ),
	        'uniqueEmailRule' => array(
	            'rule' => 'isUnique',
	            'message' => 'Adresse Email déjà utilisé !',
	            'required' => true,
	        ),
	        'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre Adresse Email !',
	            
	        ),
        	'allowEmpty' => false
	    ),
	    'password' => array(
	    	'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre mot de passe !',
	            'required' => true
	        ),
	        'between' => array(
                'rule'    => array('between', 6, 50),
                'message' => 'Mot de passe entre 6 et 50 caractères',
                'required' => true,
            )

	    ),
	    'repassword' => array(
	    	'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez confirmer votre mot de passe !',
	            
	        ),
	    	'equaltofield' => array(
            'rule' => array('equaltofield','password'),
            'message' => 'Le mot de passe et la confirmation du mot de passe doivent être identiques !',
			'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
	    'lastname' => array(
	    	'between' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Nom entre 3 et 30 caractères',
            ),
            'path' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !'
            ),
            'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre nom !',
	            
	        ),
	        'required' => true
	    ),
	    'firstname' => array(
	    	'between' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Prénom entre 3 et 30 caractères',
            ),
            'path' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !'
            ),
            'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre prénom !',
	            
	        ),
	        'required' => true
	    ),
        'street' => array(
        	'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre rue !',
	            
	        ),
            'alphaNumeric' => array(
                'rule'     => '/^[a-zA-Z\-\s0-9]+$/',
                'message'  => 'Chiffres et lettres uniquement !'
            ),
            'between' => array(
                'rule'    => array('between', 3, 50),
                'message' => 'Rue entre 3 et 50 caractères',
        	),
     		'required' => true,        
        ),
        'zipcode' => array(
        	'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre code postal !',
	            
	        ),
            'numeric' => array(
                'rule'     => '/^[0-9]{5}$/',
                'message'  => '5 Chiffres uniquement !'
            ),
     		'required' => true, 
    	),
    	'city' => array(
	    	'between' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Ville entre 3 et 30 caractères',
            ),
            'path' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !'
            ),
            'notEmpty' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre ville !',
	            
	        ),
	        'required' => true
	    ),
	    'birth' => array(
	    	'required' => true,
	    )


    );

function equaltofield($check,$otherfield)
    {
        //get name of field
        $fname = '';
        foreach ($check as $key => $value){
            $fname = $key;
            break;
        }
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
    } 



}