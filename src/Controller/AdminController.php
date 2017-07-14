<?php 
// src/Controller/UsersController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class AdminController extends AppController
{

    public $session;  
    public function beforeFilter(Event $event)
    {   
        parent::beforeFilter($event);  
        $this->Auth->allow(['login', 'logout']);  
        $this->loadModel('Admins');
        $this->session = $this->request->session();
        if ($this->session->check('Auth.User.user_type') && $this->session->read('Auth.User.user_type') != "admin") {
            return $this->redirect('/users');
        }
        $this->viewBuilder()->layout('admin');
    }

    public function index()
    {   
        if ($this->session->check('Auth.User.user_type') && $this->session->read('Auth.User.user_type') == "admin") {
            return $this->redirect('/admin/dashboard');
        }else{
            return $this->redirect('/admin/login');
        }
    }

    public function login()
    {   
        if ($this->session->check('Auth.User.user_type') && $this->session->read('Auth.User.user_type') == "admin") {
            return $this->redirect('/admin/dashboard');
        }
         
        $user = $this->Admin->newEntity();
        if ($this->request->is('post')) {         
            $datas = $this->request->getData(); 
            $password = $datas['password'];
            $userName = $datas['username']; 
            $results = $this->Admins->find('all',array('conditions'=>array('Admins.username'=>$userName, 'Admins.password'=> $password)));
            // Once we have a result set we can get all the rows 
            $record = $results->toArray(); 
            if (!empty($record) && count($record)==1) {               
                $this->session->write('Auth.User.user_id', $record[0]->id);
                $this->session->write('Auth.User.user_name', $record[0]->username);
                $this->session->write('Auth.User.name', $record[0]->name);
                $this->session->write('Auth.User.user_type', 'admin');              
                return $this->redirect('/admin/dashboard');
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        $this->set('user', $user);
    }

    public function logout()
    {   
        $this->session->destroy();
        return $this->redirect('/admin/login');
    }

    public function dashboard()
    {
    
    }

    public function users()
    {  $this->loadModel('Users');
       $this->set('users', $this->Users->find('all'));
    }


    public function musicianProfile()
    {
    
    }
    
    public function compaigns()
    {
    
    }

    public function analytics()
    {
    
    }

    public function venues()
    { 
        $this->loadModel('Venues');
        $this->set('venues', $this->Venues->find('all'));
    
    }

    public function venueDelete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Venues');
        $post = $this->Venues->get($id);
        if ($this->Venues->delete($post)) {
            $this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'venues']);
        }

    }

    public function venueAdd(){
        $this->loadModel('Venues'); 
        
        $open_times = array();
        for ($i=10; $i <= 24; $i++) { 
            $open_times[$i] = $i.':00';
        }
        $this->set('open_times', $open_times );
        $venues = $this->Venues->newEntity();       
        if(!empty($this->request->data['logo']['name']))
        {   
            $file = $this->request->data['logo']; 
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1); 
            $arr_ext = array('jpg', 'jpeg','png');
       
        if(in_array($ext, $arr_ext))
        {
            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/venue/venue_' . time().$file['name']);
            $this->request->data['logo'] = 'venue_'.time().$file['name'];
        }
        }

        if ($this->request->is('post')) { 
           $venues = $this->Venues->patchEntity($venues, $this->request->data);
            if ($this->Venues->save($venues)) {
                $this->Flash->success('The venus has been saved.');
                return $this->redirect(['action' => 'venues']);
            } else {
                $this->Flash->error('The venue could not be saved. Please, try again.');
            }
        }  
    }

    public function venueEdit($id = null){
        $this->loadModel('Venues'); 
        $post = $this->Venues->get($id);
            if ($this->request->is(['post','put'])) {
                $post = $this->Venues->patchEntity($post, $this->request->data);
                $post->modified = date("Y-m-d H:i:s");
                if ($this->Venues->save($post)) {
                    $this->Flash->success(__('Your venue has been updated.'));
                    return $this->redirect(['action' => 'venues']);
                }
                $this->Flash->error(__('Unable to update your post.'));
            }
            $this->set('post', $post);

        $open_times = array();
        for ($i=10; $i <= 24; $i++) { 
            $open_times[$i] = $i.':00';
        }
        $this->set('open_times', $open_times );
    }

    public function settings()
    {   
        $this->loadModel('SiteSettings');        
        if ($this->request->is('post')) {         
            $datas = $this->request->getData(); 
            foreach ($datas as $key => $value) {
                $setting = $this->SiteSettings->newEntity();
                $data = array('site_key' => $key , 'site_value' => $value);
                $exists = $this->SiteSettings->exists(['site_key' => $key]);
                if(!$exists){
                  $setting =  $this->SiteSettings->patchEntity($setting, $data);
                  $this->SiteSettings->save($setting);  
                }else{
                    $query = $this->SiteSettings->query();
                    $query->update()->set(['site_value' => $value])->where(['site_key' => $key])->execute();
                }                
            }  
            $this->Flash->success(__('Setting save successfully!'));
        }
        $settings = $this->SiteSettings->find('all')->toArray();
        $datas = array();
        foreach ($settings as $key => $value) {
            $datas[$value['site_key']] = $value['site_value'];
        }
       
        $this->set('settings', $datas );    
    }



}