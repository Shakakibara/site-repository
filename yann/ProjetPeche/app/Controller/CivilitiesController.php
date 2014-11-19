<?php
 


class CivilitiesController extends AppController {

	
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function index() {
        
        $this->set('civilities', $this->Civility->find('all'));
    }

}
 
