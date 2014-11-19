<?php



class UserscategoriesController extends AppController {



    public $helpers = array('Html', 'Form');
    public $components = array('Session');



    public function index() {

        $this->set('userscategories', $this->Userscategorie->find('all'));

    }
    public function add() {
        if ($this->request->is('Post')) {
            $this->User->create();
            
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your account has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your account.'));
        }
	}

}
 
