<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class VenueController extends AppController
{

    public $session;  
    public function beforeFilter(Event $event)
    {   
        parent::beforeFilter($event);  
        $this->loadModel('Managers');
        $this->session = $this->request->session();
        $this->viewBuilder()->layout('admin');
    }

    public function managerAdd($venue_id = null){    
        $this->set('venue_id', $venue_id );
        $manager = $this->Managers->newEntity();
        if ($this->request->is('post')) { 
            $datas = $this->request->data;
            $datas['active'] = 1;
            $manager = $this->Managers->patchEntity($manager, $datas);
            if ($this->Managers->save($manager)) {
                $this->Flash->success('The manager has been saved.');
                return $this->redirect(['controller' => 'venue' , 'action' => 'managerView' ,$datas['venue_id'] ]);
            } else {
                $this->Flash->error('The manager could not be saved. Please, try again.');
            }
        }
    }

    public function managerView($venue_id = null){  
        $this->set('venue_id', $venue_id );     
        $this->set('managers' , $this->Managers->find('all' , array('conditions'=>array('Managers.venue_id' => $venue_id))));
       
    } 

    public function managerEdit($id = null , $venue_id = null){
        $this->set('venue_id', $venue_id );
        $manager = $this->Managers->get($id);
            if ($this->request->is(['post','put'])) {
                $manager = $this->Managers->patchEntity($manager, $this->request->data);
                $manager->modified = date("Y-m-d H:i:s");
                if ($this->Managers->save($manager)) {
                    $this->Flash->success(__('Your manager data has been updated.'));
                    return $this->redirect(['controller' => 'admin' , 'action' => 'venues']);
                }
                $this->Flash->error(__('Unable to update your post.'));
            }
            $this->set('manager', $manager);
    }

    public function managerDelete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $manager = $this->Managers->get($id);
        if ($this->Managers->delete($manager)) {
            $this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));
            return $this->redirect(['controller' => 'admin' , 'action' => 'venues']);
        }

    }
}