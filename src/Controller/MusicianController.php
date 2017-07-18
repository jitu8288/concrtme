<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;
use Cake\Event\Event;

class MusicianController extends AppController
{
    public $components = array("Calendar");
    var $helpers = array('Html','Form');

    public function beforeFilter(Event $event)
	{
        parent::beforeFilter($event);
	    $this->Auth->allow('getslotsbydate');
	}
     
    public function index(){   
        $this->viewBuilder()->layout('calendar');
        $this->loadModel('Timeslots');
        
        $booking_start_time = 18.00; 
        $total_slots_numbers = 6;
        $month = date('m');
        $year = date('Y');
        if(isset($_GET['month'])){
            $month = $_GET['month'];
        } 
        if(isset($_GET['year'])){
            $year = $_GET['year'];
        }
        
        $conn = ConnectionManager::get('default');
        $datas = $conn->execute('SELECT slot_date, COUNT(slot_date) AS total_slots FROM `timeslots` WHERE YEAR(slot_date) = '.$year.' and MONTH(slot_date) = '.$month.' and  `venue_id` = '.VENUE_ID.' and  `time_slot_display` = 1 and `status` = 1 and `slot_time` >= '.$booking_start_time.' GROUP BY `slot_date`');
        
        $rows = $datas->fetch('assoc');
        $slots = array();
        foreach ($datas as $row) {
            $slots[$row['slot_date']] = $row['total_slots'];             
        }
       
        $this->Calendar->setData($slots, $total_slots_numbers);
        $HTML  = '<div class="container calendar">
		    	<div id="calendarhtml">';
		$HTML .= $this->Calendar->show();
		$HTML .= '</div></div>';	    
        $this->set('Showcalendar', $HTML);

    }


    public function getslotsbydate(){
    	$date_field = $_REQUEST['date_field'];
    	echo $date_field;die;
    }
}
