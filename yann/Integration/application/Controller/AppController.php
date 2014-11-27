<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array(
					'BsHelpers.Bs', 
					'BsHelpers.BsForm',
					'Html', 
			        'Form',
		        );
	public $components = array(
						'RequestHandler',
						'DebugKit.Toolbar',
				        'Session', 
				        'Auth' => array(
				            'loginRedirect' => array('controller' => 'Users', 'action' => 'index'),
				            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
			        	)
		        	);

	public function beforeFilter()
	{
		if ($this->RequestHandler->isAjax) {
			$this->layout = null;
		}
		$this->Auth->allow('index');
	}

 //Met une majuscule sur tous les caractères suivant un espace blanc ou un tiret dans la chaine
    public function ucname($string) {
        $string =ucwords(strtolower($string));

        foreach (array('-', '\'') as $delimiter) {
          if (strpos($string, $delimiter)!==false) {
            $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
          }
        }
        return $string;
    }

    //Met une chaine en majuscule
    public function titleCase($string){
      return strtoupper($string);
    }

    //Met une chaine en minuscule
    public function lowerCase($string){
      return strtolower($string);
    }
	
}

