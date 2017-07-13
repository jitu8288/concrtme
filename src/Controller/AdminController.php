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

    public function musicians()
    {
    
    }


    public function musicianProfile()
    {
    
    }
    
    public function venues()
    {
    
    }

    public function compaigns()
    {
    
    }

    public function analytics()
    {
    
    }

    public function settings()
    {
        if ($this->request->is('post')) {         
            $datas = $this->request->getData();                       
            $this->Flash->success(__('Setting save successfully!'));
        }
    
    }



}