<?php 
	/**
	 * class for getter and setter method
    this page not used in project
	 */
	// session_start();
	class Reservation{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }

	  private $source;
	  private $destination;
	  private $date;
	  private $class;
	  private $trainName;
	  private $trainNo;
	  private $arrivalTime;
	  private $departTime;
	  private $duration;
	  public $pName ;
	  private $pAge = array();
	  private $pGender = array();
	  private $pMail;
	  private $pPhno;
	  private $travellerNo;

      public function setSource($source){
         $this->source = $source;
      }
      public function getSource(){
         return $this->source;
      }
      public function setDestination($destination){
         $this->destination = $destination;
      }
      public function getDestination(){
         return $this->destination;
      }
      public function setDate($date){
         $this->date = $date;
      }
      public function getDate(){
         return $this->date;
      }
      public function setClass($class){
         $this->class = $class;
      }
      public function getClass(){
         return $this->class;
      }
      public function setTrainName($trainName){
         $this->trainName = $trainName;
      }
      public function getTrainName(){
         return $this->trainName;
      }
      public function setTrainNo($trainNo){
         $this->trainNo = $trainNo;
      }
      public function getTrainNo(){
         return $this->trainNo;
      }
      public function setArrivalTime($arrivalTime){
         $this->arrivalTime = $arrivalTime;
      }
      public function getArrivalTime(){
         return $this->arrivalTime;
      }
      public function setDepartTime($departTime){
         $this->departTime = $departTime;
      }
      public function getDepartTime(){
         return $this->departTime;
      }
      public function setDuration($duration){
         $this->duration = $duration;
      }
      public function getDuration(){
         return $this->duration;
      }
      // public function setpName($pName){
      //    $this->pName = $pName;
      // }
      // public function getpName(){
      //    return $this->pName;
      // }
      // public function setpAge($pAge){
      //    $this->pAge = $pAge;
      // }
      // public function getpAge(){
      //    return $this->pAge;
      // }
      // public function setpGender($pGender){
      //    $this->pGender = $pGender;
      // }
      // public function getpGender(){
      //    return $this->pGender;
      // }
      public function setpMail($pMail){
         $this->pMail = $pMail;
      }
      public function getpMail(){
         return $this->pMail;
      }
      public function setPhno($pPhno){
         $this->pPhno = $pPhno;
      }
      public function getPhno(){
         return $this->pPhno;
      }
      public function setTravellerNo($travellerNo){
         $this->travellerNo = $travellerNo;
      }
      public function getTravellerNo(){
         return $this->travellerNo;
      }

	}


	// $re = new Reservation();

	// $_SESSION["reserve"] = $re;
	// $re->setSource("Aurangabad"); 
	// $re->setDestination("scesadnk"); 
	// // $re.setpName("name3");

	// // for ($i=0; $i < $re.pName.lenght(); $i++) { 
	 	// echo $re->getSource()."<br>";
	 	// echo $re->getDestination()."<br>";
	 	// echo $re->getArrivalTime()."<br>";
	 	// echo $re->getDepartTime()."<br>";
	 	// echo $re->getDate()."<br>";
	 	// echo $re->getDuration()."<br>";
	 	// echo $re->getTrainName()."<br>";
	 	// echo $re->getTrainNo()."<br>";
	//  	echo $re->getDestination();
	 // } 

	// $time2 = "10:00";
	// $time1 = "19:00";
	// $hourdiff = round(abs(strtotime($time1) - strtotime($time2)) / 3600,1);
	// echo $hourdiff;
 

// $s=array('Hyd','Kol','Agra','Guj','Surat', 'Mumbai');
//     for($i=0;$i<6;$i++)
//     { echo "<br>";
//     for($j=0;$j<3;$j++) {
//           echo $s[$i][$j]." ";
//     } }





 ?>