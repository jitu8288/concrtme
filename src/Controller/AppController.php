<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;


class AppController extends Controller
{


    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth',['loginAction' => [
                        'controller' => 'Users',
                        'action' => 'login'
                     ],'authenticate' => [
                          'Form' => [
                            'userModel' => 'Users', // Added This
                            'fields' => [
                              'username' => 'username',
                              'password' => 'password',
                             ]
                           ]
                     ],'loginRedirect' => [
                         'controller' => 'Users',
                         'action' => 'profile'
                     ],
                ]);

    }


    public function beforeFilter(Event $event)
    {
      $this->Auth->allow(['index', 'view', 'display']);
      $this->fetchSettings();  
      $this->genreList();
              header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
    }

 
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }


    public function fetchSettings(){
        $this->loadModel('SiteSettings');   
        $settings = $this->SiteSettings->find('all')->toArray();
       
        foreach ($settings as $key => $value) {            
                $constant = "_".strtoupper($value['site_key']);
                $val = $value['site_value'];
                if(!defined($constant)){
                     eval("define(\$constant, \$val);");
                }
        }

        $this->loadModel('Venues');
        $venue = $this->Venues->find('all', ['conditions' => ['subdomain' => 'park']
            ])->first();
        eval("define('VENUE_ID', \$venue['id']);");
        eval("define('VENUE_NAME', \$venue['name']);");
        eval("define('VENUE_LOGO', \$venue['logo']);"); 
    }

    public function genreList(){
        $eventgenres = array('Cabaret','Comedy/Stand-up','Educational','Experimental','Poetry/Reading','Private Event (venue open to public)','Private Event (venue closed to public)','Screening','Theatre','Other');
        $genreList = array('Alternative/Indie Rock' => 'Alternative/Indie Rock',
                        'Ambient'  => 'Ambient',
                        'Country'  =>  'Country',
                        'Classical'=>  'Classical',
                        'Dance/EDM'=>  'Dance/EDM',
                        'Electronic'=>  'Electronic',
                        'Folk'     =>  'Folk',
                        'Jazz/Blues'=>  'Jazz/Blues',
                        'Latin'     =>  'Latin',
                        'Metal'     =>  'Metal',
                        'Pop'       =>  'Pop',
                        'Rap & Hip-Hop'=>  'Rap & Hip-Hop',
                        'R&B/Soul'  =>  'R&B/Soul',
                        'Reggae'    =>  'Reggae',
                        'Reggaeton' =>  'Reggaeton',
                        'Religious' =>  'Religious',
                        'Rock'      =>  'Rock',
                        'World'     =>  'World');

        eval("define('EVENT_GENRE', \$eventgenres);"); 
        eval("define('MUSICIAN_GENRE', \$genreList);"); 

    }

}
