<?php

//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com

if ((preg_match("/function_php_oop.php/", $_SERVER['PHP_SELF']))) {
	Header("Location: ../index.php");
	die();
} else {
	check_login('admin_username_lcm', 'login.php');
	//-------------------------------------------------------------------
	//Open and OFF System
	class SetTime{ 
        public $STS_Type,$STS_TimeStart,$STS_TimeEnd;
        public $SetTimeStart_txt,$SetTimeEnd_txt;
        function __construct($STS_Type,$STS_TimeStart,$STS_TimeEnd){
            $this->STS_Type=$STS_Type;
            $this->STS_TimeStart=$STS_TimeStart;
            $this->STS_TimeEnd=$STS_TimeEnd;
    //---------------------------------------------------------------------------
            $SetTimeStart_txt="no_time";
            $SetTimeEnd_txt="no_time";
            $SetTimeServer=date("Y-m-d H:i:s");
    //---------------------------------------------------------------------------
                if(($this->STS_Type=="run_time")){
                    $date_start=date("Y-m-d H:i:s",strtotime($this->STS_TimeStart));
                    $date_end=date("Y-m-d H:i:s",strtotime($this->STS_TimeEnd));
                }else{
                    $date_start="-";
                    $date_end="-";
                }
    //Time zone
                if(($date_start=="-" and $date_end=="-")){
                    $SetTimeStart_txt="no_time";
                    $SetTimeEnd_txt="no_time";
                }elseif(($date_start=="-" or $date_end=="-")){
                    $SetTimeStart_txt="no_time";
                    $SetTimeEnd_txt="no_time";
                }else{
                    $key_date_start=strtotime($date_start);
                    $key_date_end=strtotime($date_end);
                    $key_SetTimeServer=strtotime($SetTimeServer);
    //test_time_start
                    if(($key_SetTimeServer>=$key_date_start)){
                        $SetTimeStart_txt="time_off";
                    }else{
                        $SetTimeStart_txt="time_on";
                    }
    //test_time_start end
    //test_time_end
                    if(($key_SetTimeServer>=$key_date_end)){
                        $SetTimeEnd_txt="time_on";
                    }else{
                        $SetTimeEnd_txt="time_off";
                    }
    //test_time_end end
                }
    //Time zone end
            $this->SetTimeStart_txt=$SetTimeStart_txt;
            $this->SetTimeEnd_txt=$SetTimeEnd_txt;
        }function TxtTimeStart(){
            return $this->SetTimeStart_txt;
        }function TxtTimeEnd(){
            return $this->SetTimeEnd_txt;
        }
    }
	//Open and OFF System end
	//print_status
		class PrintStatus{
			public $PS_Txt;
			public $ps_key;
			function __construct($PS_Txt){
				$this->PS_Txt=$PS_Txt;
				$ps_key=0;
					if(($this->PS_Txt=="Approved" or $this->PS_Txt=="ปกติ")){
						$ps_key=1;
					}elseif(($this->PS_Txt=="ลาออก")){
						$ps_key=2;
					}elseif(($this->PS_Txt=="จบการศึกษา")){
						$ps_key=3;
					}elseif(($this->PS_Txt=="ลาพัก")){
						$ps_key=4;
					} else{
						$ps_key=0;
					}
				$this->ps_key=$ps_key;
			}function StatusKey(){
				return $this->ps_key;
			}
		}
	//print_status end

	//strtotime	
	class strtotime_date{
		public $txt_date;
		public $datestart;
		function __construct($txt_date){
			$this->txt_date = $txt_date;
			if (($this->txt_date != "")) {
				$this->txt_date = explode("/", $this->txt_date);
				$datestart1 = $this->txt_date[0];
				$datestart2 = $this->txt_date[1];
				$datestart3 = $this->txt_date[2];
				$datestart = $datestart3 . "-" . $datestart2 . "-" . $datestart1;
			} else {
				$datestart = "-";
			}
			$this->datestart = $datestart;
		}
		function print_txt_date(){
			return $this->datestart;
		}
	}
	//strtotime end	
	//-------------------------------------------------------------------	
	//strto_datetime
	class strto_datetime
	{
		public $txt_type, $txt_datetime;
		public $print_datetime;
		function __construct($txt_type, $txt_datetime)
		{
			$this->txt_type = $txt_type;
			$this->txt_datetime = $txt_datetime;
			if (($this->txt_type == "th")) {
				@$strYear = date("Y", strtotime($this->txt_datetime)) + 543;
				@$strMonth = date("n", strtotime($this->txt_datetime));
				@$strDay = date("j", strtotime($this->txt_datetime));
				@$strHour = date("H", strtotime($this->txt_datetime));
				@$strMinute = date("i", strtotime($this->txt_datetime));
				@$strSeconds = date("s", strtotime($this->txt_datetime));
				$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
				$strMonthThai = $strMonthCut[$strMonth];
				$strYear = substr($strYear, 2);
				$print_datetime = $strDay . " " . $strMonthThai . " " . $strYear;
			} elseif (($this->txt_type == "th_full")) {
				@$strYear = date("Y", strtotime($this->txt_datetime)) + 543;
				@$strMonth = date("n", strtotime($this->txt_datetime));
				@$strDay = date("j", strtotime($this->txt_datetime));
				@$strHour = date("H", strtotime($this->txt_datetime));
				@$strMinute = date("i", strtotime($this->txt_datetime));
				@$strSeconds = date("s", strtotime($this->txt_datetime));
				$strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
				$strMonthThai = $strMonthCut[$strMonth];
				$print_datetime = $strDay . " " . $strMonthThai . " " . $strYear;
			} elseif (($this->txt_type == "en")) {
				@$strYear = date("Y", strtotime($this->txt_datetime));
				@$strMonth = date("n", strtotime($this->txt_datetime));
				@$strDay = date("j", strtotime($this->txt_datetime));
				@$strHour = date("H", strtotime($this->txt_datetime));
				@$strMinute = date("i", strtotime($this->txt_datetime));
				@$strSeconds = date("s", strtotime($this->txt_datetime));
				$strMonthCut = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				$strMonthEng = $strMonthCut[$strMonth];
				$print_datetime = $strMonthEng . " " . $strDay . " " . $strYear;
			} elseif ($this->txt_type == "datetime_th") {
				@$strYear = date("Y", strtotime($this->txt_datetime)) + 543;
				@$strMonth = date("n", strtotime($this->txt_datetime));
				@$strDay = date("j", strtotime($this->txt_datetime));
				@$strHour = date("H", strtotime($this->txt_datetime));
				@$strMinute = date("i", strtotime($this->txt_datetime));
				@$strSeconds = date("s", strtotime($this->txt_datetime));
				$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
				$strMonthThai = $strMonthCut[$strMonth];
				$print_datetime = $strDay . " " . $strMonthThai . " " . $strYear . " " . $strHour . ":" . $strMinute . " น.";
			} elseif (($this->txt_type == "th_year")) {
				@$strYear = date("Y", strtotime($this->txt_datetime)) + 543;
				@$strMonth = date("n", strtotime($this->txt_datetime));
				@$strDay = date("j", strtotime($this->txt_datetime));
				@$strHour = date("H", strtotime($this->txt_datetime));
				@$strMinute = date("i", strtotime($this->txt_datetime));
				@$strSeconds = date("s", strtotime($this->txt_datetime));
				$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
				$strMonthThai = $strMonthCut[$strMonth];
				$print_datetime = $strDay . " " . $strMonthThai . "" . $strYear;
			} elseif ($this->txt_type == "datetime_th_full") {
				@$strYear = date("Y", strtotime($this->txt_datetime)) + 543;
				@$strMonth = date("n", strtotime($this->txt_datetime));
				@$strDay = date("j", strtotime($this->txt_datetime));
				@$strHour = date("H", strtotime($this->txt_datetime));
				@$strMinute = date("i", strtotime($this->txt_datetime));
				@$strSeconds = date("s", strtotime($this->txt_datetime));
				$strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
				$strMonthThai = $strMonthCut[$strMonth];
				$print_datetime = $strDay . " " . $strMonthThai . " " . $strYear . " " . $strHour . ":" . $strMinute . "น.";
			} else {
				$print_datetime = "-";
			}
			$this->print_datetime = $print_datetime;
		}
		function print_datetime()
		{
			return $this->print_datetime;
		}
	}
	//strto_datetime end
	//-------------------------------------------------------------------

	class  dateofbirthRS
	{
		public $birthdate;
		public $wyear, $wmonth, $wday, $ystr, $agestr;
		function __construct($birthdate)
		{
			$this->birthdate = $birthdate;
			$today = date('d-m-Y');
			list($bday, $bmonth, $byear) = explode('-', $this->birthdate);
			list($tday, $tmonth, $tyear) = explode('-', $today);
			if ($byear < 1970) {
				$yearad = 1970 - $byear;
				$byear = 1970;
			} else {
				$yearad = 0;
			}
			$mbirth = mktime(0, 0, 0, $bmonth, $bday, $byear);
			$mtoday = mktime(0, 0, 0, $tmonth, $tday, $tyear);

			$mage = ($mtoday - $mbirth);
			$wyear = (date('Y', $mage) - 1970 + $yearad);
			$wmonth = (date('m', $mage) - 1);
			$wday = (date('d', $mage) - 1);

			$ystr = ($wyear > 1 ? " ปี" : " ปี");
			$mstr = ($wmonth > 1 ? " เดือน" : " เดือน");
			$dstr = ($wday > 1 ? " วัน" : " วัน");

			if (($wyear > 0 and $wmonth > 0 and $wday > 0)) {
				$agestr = $wyear . $ystr . " " . $wmonth . $mstr . " " . $wday . $dstr;
			} elseif (($wyear == 0 and $wmonth == 0 and $wday > 0)) {
				$agestr = $wday . $dstr;
				//$wyear=0;
				//$wmonth=0;
			} elseif (($wyear > 0 and $wmonth > 0 and $wday == 0)) {
				$agestr = $wyear . $ystr . " " . $wmonth . $mstr;
				//$wday=0;
			} elseif (($wyear == 0 and $wmonth > 0 and $wday > 0)) {
				$agestr = $wmonth . $mstr . " " . $wday . $dstr;
				//$wyear=0;
			} elseif (($wyear > 0 and $wmonth == 0 and $wday > 0)) {
				$agestr = $wyear . $ystr . " " . $wday . $dstr;
				//$wmonth=0;
			} elseif (($wyear == 0 and $wmonth > 0 and $wday == 0)) {
				$agestr = $wmonth . $mstr;
				//$wyear=0;
				//$wday=0;
			} else {
				$agestr = "";
				//$wyear="";
				//$wmonth="";
				//$wday="";
			}
			$this->wyear = $wyear;
			$this->wmonth = $wmonth;
			$this->wday = $wday;
			$this->ystr = $ystr;
			$this->agestr = $agestr;
		}
		function __destruct()
		{
			$this->wyear;
			$this->wmonth;
			$this->wday;
			$this->ystr;
			$this->agestr;
		}
	}


	//-------------------------------------------------------------------
}
