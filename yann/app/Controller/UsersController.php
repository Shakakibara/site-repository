<?php



class UsersController extends AppController {



    public $helpers = array('Html', 'Form');
    public $components = array('Session');



    public function index() {

        $this->set('users', $this->User->find('all'));

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
       
            //Envoi de la table Civilities dans la Vue Users
            $this->loadModel('Civility');
            $civilities = $this->Civility->find('all'); 
            $value = array();
            $option = array();
            foreach($civilities as $civility){

                    $tCivilities[$civility['Civility']['id']]=$civility['Civility']['label'];
            } 
            
            $this->set('option', $tCivilities);

            


        
    }

    public function test() {

        $this->set('test',$this->request->data);

    }


}
 
