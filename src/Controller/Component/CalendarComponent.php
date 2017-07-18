<?php 
namespace App\Controller\Component;
use Cake\Controller\Component;

class CalendarComponent extends Component {

    private $dayLabels   = array("SUN","MON","TUE","WED","THU","FRI","SAT");     
    private $currentYear = 0;     
    private $currentMonth= 0;     
    private $currentDay  = 0;     
    private $currentDate = null;     
    private $daysInMonth = 0;     
    private $naviHref    = null;	
    private $selectedUser= null;
    private $selectedMonth = null;
    private $selectedYear = null;	
	private $listdata;
    private $total_slots_number;
     

    public function setData($listdata, $total_slots_number){  
      	$this->total_slots_number = $total_slots_number;
		$this->listdata = $listdata;
     }
     
    /**
    * print out the calendar
    */
  /**
    * print out the calendar
    */
    public function show() {
        $year = null;         
        $month = null;         
        if(null==$year&&isset($_GET['year'])){ 
            $year = $_GET['year'];         
        }else if(null==$year){ 
            $year = date("Y",time());           
        }          
         
        if(null==$month&&isset($_GET['month'])){ 
            $month = $_GET['month'];         
        }else if(null==$month){ 
            $month = date("m");         
        }                  
       
		$this->currentYear = $year;    	  
		$this->selectedYear = date("Y",time());         
		$this->currentMonth= $month;
		$this->selectedMonth = date("m");         
		$this->daysInMonth=$this->_daysInMonth($month,$year); 
 
         
        $content= '<div class="sticky_nav sticky-search-div"><ul class="centr month-tab">'.
                        $this->_createNavi().
                   '</ul>';
                       
       $content .= '<div class="backline_calendar clearfix"><div class="col-sm-1 pad_no" style="display:none"></div><ul class="centr week-tab clearfix"><li>'.$this->_createLabels().'</li></ul></div></div>';

		$content.='<ul class="dates cntr clearfix">';  
        $weeksInMonth = $this->_weeksInMonth($month,$year);
		// Create weeks in a month
		$setCount = 1;
		for( $i= 0; $i < $weeksInMonth; $i++ ){
			$content.='<li>';
		 
		 	for( $j=0; $j <=6; $j++ ){
				if($setCount & 1){
					$addClass = "clor";
				} else {
					$addClass = null;
				}
				$content.=$this->_showDay($i*7+$j, $addClass);
				$setCount++;
				if($j == 6)	{
					$setCount = $setCount + 2;
				}
			}
			
			$content.='</li>';
		}

		$content.='</ul>';         
		
		return $content;   
    }

    private function _showDay($cellNumber, $addClass = null){

		if($this->currentDay==0){
			$firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

			if(intval($cellNumber) == intval($firstDayOfTheWeek)){
				$this->currentDay=1;
			}
		}

		if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
			$this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
			$cellContent = $this->currentDay;
			$this->currentDay++;   
		}else{
			$this->currentDate =null;
			$cellContent=null;
		}
		
		$addClass = (empty($addClass)) ? "" : $addClass;
		$current_id = $this->currentDate;
		$cdate  = date('Y-m-d');
		$clist = isset($this->listdata[$current_id]) ? $this->listdata[$current_id] : 0 ;
		$clistdata = "";

		if($cdate <= $this->currentDate)	{
			for($i = 0; $i < $clist ; $i++){
				$clistdata .= '<i class="glyphicon glyphicon-one-fine-dot"></i>';
			}
			$addClass .=" cursor-point ";
		} else{
			$addClass .= " blocked ";
		}


		if($clistdata){
			$clistdata = '<div>'.$clistdata.'</div>';
		}

		return '<div id="li-'.$this->currentDate.'" data-total="'.$clist.'" data-current-date="'.$this->currentDate.'" class="date show-next-block '.$addClass.' '.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
		($cellContent==null?'mask':'').'">'.$cellContent.$clistdata.'</div>';
    }
     
    /**
    * create navigation
    */
    private function _createNavi(){			
		$nxtTag = $crtTag = $prtTag = '';		
		$nextMonth = $this->selectedMonth==12?1:intval($this->selectedMonth)+1;
		$nextYear = $this->selectedMonth==12?intval($this->selectedYear)+1:$this->selectedYear;
		$postnextMonth = $this->selectedMonth==12?2:intval($this->selectedMonth)+2;
		$postnextMonth = ($postnextMonth > 12) ? 1 : $postnextMonth;
		$postnextYear = $this->selectedMonth==12?intval($this->selectedYear)+1:$this->selectedYear;
		$postnextYear = $nextMonth == 12?   $nextYear + 1 :  $nextYear;
		$monthTable = array("1" => "January","2" => "February", "3" => "March", "4" => "April", "5" => "May", "6" => "June", "7" => "July", "8" => "August", "9" => "September", "10" => "October", "11" => "November", "12" => "December");

		$userNameTag = (empty($this->selectedUser)) ? "" : 'user='.$this->selectedUser.'&';
		if($this->currentMonth == $nextMonth){
			$nxtTag = "colr";
		} else if($this->currentMonth == $postnextMonth){
			$prtTag = "colr";
		} else {
			$crtTag = "colr";
		}


		return '<li class="month '.$crtTag.' rad-lft"><a class="next" data-c-month="'.sprintf("%02d", $this->selectedMonth).'" data-c-year="'.$this->selectedYear.'" href="'.$this->naviHref.'?'.$userNameTag.'month='.sprintf("%02d", $this->selectedMonth).'&year='.$this->selectedYear.'">'.date('F',strtotime($this->selectedYear.'-'.$this->selectedMonth.'-1')).'</a></li>'.
				'<li class="month '.$nxtTag.' "><a class="next" data-c-month="'.sprintf("%02d", $nextMonth).'" data-c-year="'.$nextYear.'" href="'.$this->naviHref.'?'.$userNameTag.'month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">'.$monthTable[$nextMonth].'</a></li>'.
				'<li class="month '.$prtTag.' rad-rit"><a class="prev" data-c-month="'.sprintf("%02d", $postnextMonth).'" data-c-year="'.$postnextYear.'" href="'.$this->naviHref.'?'.$userNameTag.'month='.sprintf('%02d',$postnextMonth).'&year='.$postnextYear.'">'.$monthTable[$postnextMonth].'</a></li>';
            
    }
         
    /**
    * create calendar week labels
    */
    private function _createLabels(){  
                 
        $content='';
		$setCount = 2;         
        foreach($this->dayLabels as $index=>$label){
			if($setCount & 1){
				$addClass = "clor";
			} else {
				$addClass = "";
			}
             
            $content.='<div class="week '.$addClass.' '.($label==6?'end title':'start title').' title">'.$label.'</div>';
			$setCount++;
        }
         
        return $content;
    }
     
     
     
    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){
         
        if( null==($year) ) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));		
		if ($month == 1) {
			$daysInMonths = $daysInMonths + 1;
		}
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));         
        if($monthEndingDay<$monthStartDay){             
            $numOfweeks++;         
        }

		if ($month == "1") {
			$numOfweeks++;
		}
        if ($month == "4") {
            $numOfweeks++;
        }	
		
        return $numOfweeks;
    }
 
    /**
    * calculate number of days in a particular month
    */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }


}



