<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class CronController extends AppController
{
    
    public function generatingTimeslots(){

    	$month = date('m');
    	$year  = date('Y');
    	$number = cal_days_in_month(CAL_GREGORIAN, $month, $year); // get days in months
    	
    	for ($i = 1; $i <= $number ; $i++) { 
    		$date = $i.'-'.$month.'-'.$year;
    		echo $date.'<br>Time : <br>';
    		for ($j= 10; $j <=23 ; $j++) { 
    			echo "&nbsp;&nbsp;&nbsp; ".$j.".00<br>";
    		}
    		echo "---------<br>";
    	}

    	echo "*******Time Slotes Upldated!*******";
    	die;
    }
}
