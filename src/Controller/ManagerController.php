<?php 
// src/Controller/UsersController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class ManagerController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);        
        $this->Auth->allow(['login','logout']);
    }   

}