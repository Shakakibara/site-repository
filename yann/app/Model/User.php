
<?php

class User extends AppModel {

	    public $validate = array(
	    'civility_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Veuillez renseigner votre civilité !', 
	        'allowEmpty' => false,
	        'required' => true
	    ),
        'pseudo' => array(
            'pseudo-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre pseudo !',
	            
	        ),
	        'pseudo-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-_0-9]+$/',
                'message'  => 'Chiffres et lettres uniquement !',
                
            ),
            'pseudo-rule-3' => array(
                'rule'    => array('between', 3, 15),
                'message' => 'Pseudo entre 3 et 15 caractères !',
                
        	),  
        	'pseudo-rule-3' => array(
	            'rule' => 'isUnique',
	            'message' => 'Pseudo déjà utilisé !',
	            
	        ), 
        ),
        'mail' => array(
	        'mail-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre Adresse Email !',
	            
	        ),
	        'mail-rule-2' => array(
	            'rule' => 'email',
	            'message' => 'Addresse Email invalide !',
	            
	        ),
	        'mail-rule-3' => array(
	            'rule' => 'isUnique',
	            'message' => 'Adresse Email déjà utilisé !',
	            
	        ),
	    ),
	    'password' => array(
	    	'password-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre mot de passe !',
	            
	        ),
	        'password-rule-2' => array(
                'rule'    => array('between', 6, 50),
                'message' => 'Mot de passe entre 6 et 50 caractères',
                
            ),
        ),
	    'repassword' => array(
	    	'repassword-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez confirmer votre mot de passe !',
	            
	        ),
	    	'repassword-rule-2' => array(
	            'rule' => array('equaltofield','password'),
	            'message' => 'Le mot de passe et la confirmation du mot de passe doivent être identiques !',
				'on' => 'create', // Limit validation to 'create' or 'update' operations
				
            ),
        ),
	    'lastname' => array(
	    	'lastname-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre nom !',
	            
	        ),
	        'lastname-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !',
                
            ),
	        'lastname-rule-3' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Nom entre 3 et 30 caractères',
                
            ),
        ),
	    'firstname' => array(
	    	'firstname-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre prénom !',
	            
	        ),
	        'firstname-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !',
                
            ),
	        'firstname-rule-3' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Prénom entre 3 et 30 caractères',
                
            ),
        ),
        'street' => array(
        	'street-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre rue !',
	            
	        ),
            'street-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s0-9\']+$/',
                'message'  => 'Chiffres et lettres uniquement !',
                
            ),
            'street-rule-3' => array(
                'rule'    => array('between', 3, 50),
                'message' => 'Rue entre 3 et 50 caractères',
                
        	),
     	),
        'zipcode' => array(
        	'zipcode-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre code postal !',
	            
	        ),
            'zipcode-rule-2' => array(
                'rule'     => '/^[0-9]{5}$/',
                'message'  => '5 Chiffres uniquement !',
                
            ),
     	),
    	'city' => array(
	    	'city-rule-1' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Veuillez renseigner votre ville !',
	            
	        ),
	        'city-rule-2' => array(
                'rule'     => '/^[a-zA-Z\-\s]+$/',
                'message'  => 'Lettres uniquement !',
                
            ),
	        'city-rule-3' => array(
                'rule'    => array('between', 3, 30),
                'message' => 'Ville entre 3 et 30 caractères',
       		),   
	    ),

    );

	public function equaltofield($check,$otherfield)
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