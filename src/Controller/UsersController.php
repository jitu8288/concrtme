<?php 
// src/Controller/UsersController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsersController extends AppController
{
    public $session;
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event); 
        $this->Auth->allow(['add', 'logout']);
        $this->session = $this->request->session();
        $this->viewBuilder()->layout('user');
      
    }

    public function pro()
    {
      
    }

    public function index()
    {
      
    }
 
    public function register()
    {   
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
			$datas = $this->request->getData();
			$datas['username'] = $datas['mobile'];
			$datas['active'] = 1; // default is active
            $user =  $this->Users->patchEntity($user, $datas);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }


    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();          
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function profile(){
        $this->loadModel('UserMetas');  
        $user_id =  $this->session->read('Auth.User.id');
        $user = $this->Users->get($user_id); 
        $UserMetas = $this->UserMetas->find('all',array('conditions'=>array('UserMetas.user_id'=>$user_id)))->toArray();
        if(count($UserMetas)==0){
            return $this->redirect(['action' => 'profileStepFirst']);
        }

        $user_metas = array();
        foreach ($UserMetas as $key => $value) {
            $user_metas[$value['meta_key']] = $value['meta_value'];
        } 
      
       $this->set('user', $user );
       $this->set('user_metas', $user_metas );
    }


    public function profileStepFirst(){
       $user_id =  $this->session->read('Auth.User.id');
       $user = $this->Users->get($user_id); 
        if ($this->request->is(['post','put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->modified = date("Y-m-d H:i:s");
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Your profile has been updated.'));
            //return $this->redirect(['action' => 'profileStepSecond']);
            return $this->redirect(array('action' => 'profileStepSecond'));
        }
            $this->Flash->error(__('Unable to update your post.'));
        }

       $this->set(compact('user')); 
    }

    public function profileStepSecond(){
       $user_id =  $this->session->read('Auth.User.id');
        $this->loadModel('UserMetas');        
        if ($this->request->is('post')) {         
            $datas = $this->request->getData(); 

            if(!empty($this->request->data['user_profile_photo']['name']))
            {   
                $file = $this->request->data['user_profile_photo']; 
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
                $arr_ext = array('jpg', 'jpeg','png');
       
                if(in_array($ext, $arr_ext))
                {
                    if (!file_exists(WWW_ROOT . 'img/profile')) {
                        mkdir(WWW_ROOT . 'img/profile', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/profile/profile_' . time().$file['name']);
                    $datas['user_profile_photo'] = 'profile_'.time().$file['name'];
                }
            }

            foreach ($datas as $key => $value) {
                $setting = $this->UserMetas->newEntity();
                $data = array('user_id'=> $user_id,'meta_key'=> $key,'meta_value'=>$value);
                $exists=$this->UserMetas->exists(['user_id'=> $user_id,'meta_key'=> $key]);
                if(!$exists){
                  $setting =  $this->UserMetas->patchEntity($setting, $data);
                  $this->UserMetas->save($setting);  
                }else{
                    $query = $this->UserMetas->query();
                    $query->update()->set(['site_value' => $value])->where(['user_id'=> $user_id,'meta_key'=> $key])->execute();
                }                
            }  
            $this->Flash->success(__('Profile updated successfully!'));
            return $this->redirect(['action' => 'profile']);
        }
       
    }


}