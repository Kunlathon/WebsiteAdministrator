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
	check_login('admin_username_aba', 'login.php');
	//-------------------------------------------------------------------	
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
