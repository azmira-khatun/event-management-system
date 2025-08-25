<?php
//    if(isset($_GET['user'])){
// 	$user = $_GET['user'];
// 	if ($user == 1) {
// 		include "welcome.php";
// 	}elseif($user == 2){
// 		include "welcome.php";
// 	}elseif($user == 3){
// 		header("location:logout.php");
// 	}
// }


   if(isset($_GET["page"])){
	   $page=$_GET["page"];
	   if($page==0){
		   
		 include("blank_page.php"); 
		   
	    }elseif($page==1){
		   
		 include("pages/user/add_user.php"); 
		   
	   }else if($page==2){
		   
		   include("pages/user/manage_user.php");
		  
	   }else if($page==3){
		   include("pages/user/edit_user.php");
		  
	   }else if($page==4){
		   
		   include("pages/eventmanagement/add_event.php");
		  
	   }else if($page==5){
		   
		   include("pages/eventmanagement/manage_event.php");
		  
	   }else if($page==6){
		   
		   include("pages/eventmanagement/edit_event.php");
		  
	   }else if($page==7){
		   
		    include("pages/venue/add_venue.php");
		  
	   }else if($page==8){
		   
		    include("pages/venue/venue-table.php");
		  
	   }else if($page==9){
		   
		    include("pages/venue/edit_venue.php");
		}else if($page==10){
		   
		    include("pages/bookingevent/book.php");
		}else if($page==11){
		   
		    include("pages/bookingevent/booking_save.php");
		}else if($page==12){
		   
		    include("pages/bookingevent/edit.php");
		  
   }else{
	   
       echo "Welcome to my NeW Project";
   }
   }
?>