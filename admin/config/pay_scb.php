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

    class qrcode_scb{
        public $BillerId,$Ref1,$Ref2,$Amount,$Width;
        public $qrcode;
        //public $Height;
        function __construct($BillerId,$Ref1,$Ref2,$Amount,$Width){
            $this->BillerId=$BillerId;
            $this->Ref1=$Ref1;
            $this->Ref2=$Ref2;
            $this->Amount=$Amount;
            $this->Width=$Width;
            //$this->Height=$Height;
            $copy_amount=number_format($this->Amount=$Amount, 2, '.', '');
            $pay_amount=str_replace('.','',$copy_amount);
            $qrcode='https://chart.googleapis.com/chart?cht=qr&chl=%7C'.$this->BillerId.'%0D'.$this->Ref1.'%0D'.$this->Ref2.'%0D'.$pay_amount.'&chs='.$this->Width.'x'.$this->Width.'&choe=UTF-8&chld=L|2';
                if(isset($qrcode)){
                    $this->qrcode=$qrcode;
                }else{
                    $this->qrcode=null;
                }
        }function call_qrcode_scb(){
            return $this->qrcode;
        }
    }

?>


<?php
   /* $txt01="099400043439110";
    $txt02="RC0468";
    $txt03="ICTTEST";
    $txt04="150";
    $txt05="180";
    
    $qrcode_scb=new qrcode_scb($txt01,$txt02,$txt03,$txt04,$txt05);*/
    
?>

  
 
     