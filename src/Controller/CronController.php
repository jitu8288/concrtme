<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use App\Controller\AppController;
use Cake\Event\Event;


class CronController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['generatingTimeslots' , 'getSlots']);
    }


    public function generatingTimeslots(){
        $this->loadModel('Timeslots');
    	$month = date('m', strtotime('+1 month'));
    	$year  = date('Y');
    	$number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // get days in months
    	
    	for ($i = 1; $i <= $number ; $i++) { 
    		$date = $i.'-'.$month.'-'.$year;
            $date = date('Y-m-d',strtotime($date));
    		echo $date.'<br>Time : <br>';

    		for ($j= 10; $j <=23 ; $j++) { 
    			echo "&nbsp;&nbsp;&nbsp; ".$j.".00<br>";
                $time = $j.".00";

                $timeslots = $this->Timeslots->newEntity();
                $data = array('slot_date' => $date , 'slot_time' => $time , 'venue_id' => 3);
                $exists = $this->Timeslots->exists(['slot_date' => $date , 'slot_time' => $time]);
                if(!$exists){
                    $timeslots =  $this->Timeslots->patchEntity($timeslots, $data);
                    $this->Timeslots->save($timeslots);  
                }            
         	}
    		echo "---------<br>";
    	}

    	echo "*******Time Slotes Upldated!*******";
    	die;
    }


    public function getSlots(){
        $this->loadModel('Timeslots');
        $conn = ConnectionManager::get('default');
        $datas = $conn->execute('SELECT slot_date, COUNT(slot_date) AS total_slots FROM `timeslots` WHERE `time_slot_display` = 1 and `slot_time` >= 18.00 GROUP BY `slot_date`');
        
        $rows = $datas->fetch('assoc');
        $slots = array();
        foreach ($datas as $row) {
            $slots[$row['slot_date']] = $row['total_slots'];             
        }
        echo "<pre>";
        print_r($slots);
        die;
    }

}
