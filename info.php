<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.es {
		border-style :solid; 
		border-width:2px ;
		border-color: grey;
		padding: 10px;
		background-color: #F9F9F9;

		line-height: 25px;
	}
	.es header{
		text-align: center;
		font-size: 40px;
	}
	.es hr{
		color: grey;

	}

	.es input{
		height: 14px;
	}

	.es select{
		height: 21px;
	}
	.option {
		width: 50px;
	}

	#button {
		margin-left: 60px;
		border:0px solid blue ;

	}
	#Search,#clear{
		background-color: white;
		border:0.2px solid #D4D4D4 ;
	}
	#loc{
		margin-left: 280px;
	}
	
	#map {
		text-align: center;
	    width: 456px;
	    height: 200px;
	    margin-top: 106px;
	    margin-bottom: 106px;
	    background-color: grey;
  	}

  	#detail_and_map_table {
  
	    
	}
	#start,#map{
		padding: 10px;
            display: table-cell;
            border: 0px solid #f40;
	}
	#start{
		width: 100px;
		height: 292px;
		border-left: solid white 20px;
		border-right: solid white 0px;
		padding-top: 30px;
		text-align: left;
		margin-bottom: 50px;
		background-color: white;

	}
	#seatmap_id{

	}
	#leftMap_id{
		
	}
	#WALKING,#BICYCLING,#DRIVING{
		width: 83px;
		height: 18px;
		background-color: #EFEFEF;
		text-align: center;
	}
	#WALKING:hover,#BICYCLING:hover,#DRIVING:hover{
		color: #9B9C9F;
	}
	#map{
		border: solid red 0px;
	}
	#detail_and_map_table{
		width:976px; 
	}
	#detail_address,#detail_city,#detail_pst_code,#detail_upcm_evts,#detail_name{
		text-align: center;
	}
	.left,.leftMap{
		text-align: right;
	}
	.left{
		height: 15px;
	}
	.leftMap{
		width: 200px;
	}
	#leftMap_th{
		padding-top: 0px;
		padding-bottom: 0px;
		height: 300px;
	}

	#detail_upcm_evts a{
		text-decoration: none;
		color: black;
	}
	#detail_upcm_evts a:hover{
		color: #9B9C9F;
	}
	
	table, th, td {
	    border: 3px solid #E4E4E4;
	    border-collapse: collapse;
	    padding: 0px 0px 0px 0px ;
	    font-family: Times;
	}
	#table1 td{
		
	}
	#table1_5,#table1_5 th,#table1_5 td{
		border: 0px solid #E4E4E4;
	    border-collapse: collapse;
	    text-align: left;
	}

	#table1_5{
		margin:auto;
	}


	#table2,#detail_and_map_table,#photo_title,#photo_table,#event_link{
		margin: auto;
		border: none;
	    border-collapse: none;
	}

	#photo_title,#table2 {
		border: 0px solid orange;
		width: 200px;
		color: #B3B4B2;
	}
	#photo_title{
		margin-bottom: 7px;
	}

	#photo_table{
		width: 1200px;
	}

	#photo_table th{
		padding-left: 50px;
		padding-right: 50px;
	}

	#table2 tr,#table2 th,#photo_title tr,#photo_title th{
		border: none;
	}

	#venue_link:hover{
		color: #9B9C9F;
		cursor: pointer;

	}
	#artist_link{
		text-decoration: none;
		color: black;
	}
	#artist_link:hover{
		cursor: pointer;
		color:#9B9C9F;
	}
	#buyat{
		color: black;

	}
	#buyat:hover{
		color: #9B9C9F;
		cursor: pointer;

	}
	#event_link{
		text-decoration: none;
		color: black;
	}
	#event_link:hover{
		color: #9B9C9F;

	}
	.detail_titles{
		font-size: 21px;
	}
	.detail_detail{
		font-size: 15px;
		font-weight: lighter;
	}

	#no_record{
		background-color: #D7D7D7;
	}
	.walk:hover,.bike:hover,.drive:hover{
		background-color: #D7D7D7;
	    cursor: pointer;
	    color: #939594;
	    text-align: center;
	}

	#WALKING2,#BICYCLING2,#DRIVING2{
		margin-top: 0px;
		height: 40px;
		border:none;
		text-align: center;
		padding-top: 18px;
		padding-left: 8px;
		padding-right: 15px;
		font-family: Times;


	}

	#the_detail_table {
		border:none;
	}
	}
</style>

	</style>
</head>
<!---------------------------------------PHP---------------------------------------------->
<?php 
	// Turn off error reporting
	error_reporting(0);

	include "geoHash.php"; 

	$keyword = $segmentId= "";//category
	$radius= $showRadius=$unit= $geoPoint= $tktMst_url=$tableJson0="";

	//This loc number dont show up in html/js in this way
	$my_lat=$my_lon="";
	// $checkedBool = "";
	$not_checkedBool=""; 
	$my_location="";

	//departure location
	$google_lon=$google_lat = "";

	//target locaiton
	$destination_latitude=$target_event_num="";

	//$target_event_num = $_POST["cur_event_num"];

	$test = $_POST["categorys"];

	// $indexString_1 = "pass_target_lon"."$target_event_num";
	// $indexString_2 = "pass_target_lat"."$target_event_num";

	// $destination_latitude = $_POST[$indexString_2];


	$radioString = $_POST["here"];

	// if ($radioString === "here") {
	// 	$checkedBool = "checked";
	// 	$not_checkedBool = "";
	// } else if($radioString === "locationRadio"){
	// 	$checkedBool = "";
	// 	$not_checkedBool = "checked";
	// }
	// else{
	// 	$checkedBool = "checked";
	// 	$not_checkedBool = "";
	// }


?>

<?php 
	function returnCategoryIndex(){
	$index = 0;

	$categoryOption= $_POST["categorys"];
	if ($categoryOption === "Default") {$index = 0;}
	if ($categoryOption === "Music") {$index = 1;}
	if ($categoryOption === "Sports") {$index = 2;}
	if ($categoryOption === "Art & Theatre") {$index = 3;}
	if ($categoryOption === "Film") {$index = 4;}
	if ($categoryOption === "Miscellaneous") {$index = 5;}

	return $index;
	}
?>

<?php 
	 

	if( !empty($_POST)) {

	$keyword = $_POST["keyword"]; //$keyword = preg_replace('/\s+/', '+', $keyword);
	 $segmentIdArray = array('0' => "",'1' => "KZFzniwnSyZfZ7v7nJ",'2' => "KZFzniwnSyZfZ7v7nE",'3' => "KZFzniwnSyZfZ7v7na",'4' => "KZFzniwnSyZfZ7v7nn",'5' => "KZFzniwnSyZfZ7v7n1" );
	 //echo returnCategoryIndex();
	 //echo "________________________";
	 $segmentId = $segmentIdArray[returnCategoryIndex()];

	if ($_POST["Distance"] !="") {
		$radius= $_POST["Distance"];	 
		$showRadius = $radius;
	}
	else{
		$showRadius= 10;		

	}
	
	$unit = "miles";
	$google_loc_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".preg_replace('/\s+/', '+', $_POST["location"])."&key=AIzaSyAIToX3e-MuzjTM3RoDOZ0h1mkTwB8gXjQ";


	$google_loc_json =json_decode( file_get_contents($google_loc_url) );

	
	//echo file_get_contents($google_loc_url) ;

	if($google_loc_json->status === "OK"
	){
		$my_lat = $google_loc_json->results[0]->geometry->location->lat;
		$my_lon = $google_loc_json->results[0]->geometry->location->lng;
	}
	else if ($google_loc_json->status === "ZERO_RESULTS") {
		$my_lat = "no_record";
		$my_lon = "no_record";
	}
	else{
		
	}
	//Keep the location in html 
	$my_location = $_POST["location"];

	//This is user input location
	if ($my_lat !== "" && $my_lon !== "" && $my_lat !== "no_record") {
		$geoPoint =encode($my_lat,$my_lon);
		$tktMst_url = "https://app.ticketmaster.com/discovery/v2/events.json?apikey=PlOuJLEb8XdeMgz9EiDPe0CyVGSLCG9W"."&keyword=".preg_replace('/\s+/', '+', $keyword)."&segmentId=".$segmentId."&radius=".$showRadius."&unit=miles"."&geoPoint=".$geoPoint;

		$google_lat = $my_lat;
		$google_lon = $my_lon;
		
	}
	else if ($my_lat === "no_record") {
		$tktMst_url = "";
	}
	else{
		$geoPoint =encode($_POST[pass_lat],$_POST[pass_long]);
		$tktMst_url = "https://app.ticketmaster.com/discovery/v2/events.json?apikey=PlOuJLEb8XdeMgz9EiDPe0CyVGSLCG9W"."&keyword=".preg_replace('/\s+/', '+', $keyword)."&segmentId=".$segmentId."&radius=".$showRadius."&unit=miles"."&geoPoint=".$geoPoint;

		$google_lat = $_POST[pass_lat];
		$google_lon = $_POST[pass_long];

	}
	//$tktMst_url = "https://app.ticketmaster.com/discovery/v2/events.json?apikey=PlOuJLEb8XdeMgz9EiDPe0CyVGSLCG9W"."&keyword=".preg_replace('/\s+/', '+', $keyword)."&segmentId=".$segmentId."&radius=".$showRadius."&unit=miles"."&geoPoint=".$geoPoint;
	
	$tableJson0 = json_encode( file_get_contents($tktMst_url) );
	$tableJson0 = substr($tableJson0, 1, -1);
	 //echo "/--@----/".$google_loc_json;

	}

				  
?>
<?php  
	$event_id = $_POST["event_id"];
	$event_index = $_POST["event_index"];


	//if($event_id != ""){
	$event_url = "https://app.ticketmaster.com/discovery/v2/events/".$event_id.".json?apikey=PlOuJLEb8XdeMgz9EiDPe0CyVGSLCG9W&";
	$event_json = json_encode( file_get_contents($event_url) );
	$event_json = substr($event_json, 1, -1);
	//}

	sleep(1);

	
	//event_array._embedded.venues[0].name
	$venue_json_for_php = file_get_contents($event_url);
	$venue_json_for_php = json_decode($venue_json_for_php);
	$venue_name="";

	if(sizeof($venue_json_for_php->_embedded->venues) >0)
	{
		$venue_name = $venue_json_for_php->_embedded->venues[0]->name;
	}
	$venue_name = preg_replace('/\s+/', '%20', $venue_name);
	$venue_url = "https://app.ticketmaster.com/discovery/v2/venues?apikey=PlOuJLEb8XdeMgz9EiDPe0CyVGSLCG9W&keyword=".$venue_name;


	sleep(1);

	$venue_json_for_real = json_encode( file_get_contents($venue_url) );
	$venue_json_for_real = substr($venue_json_for_real, 1, -1);
	


?>
<!---------------------------------------PHP---------------------------------------------->

<body>
<form id="es" style="font-family: Times; width:600px ;margin:auto;" class="es" method="POST" action = "">
	<header><i>Events Search</i></header>
	<hr>
	<b>Keyword </b><input type="text" id="keyword"name="keyword" value="<?php echo $keyword?>" required><br/>
	<b>Category </b>
	<select id="categorys" name="categorys" >
		  <option value="Default" <?php if ($test == "Default") {echo "selected = 'selected'"; } ?> >Default</option>
		  <option value="Music" <?php if ($test == "Music") {echo "selected = 'selected'"; } ?> >Music</option>
		  <option value="Sports" <?php if ($test == "Sports") {echo "selected = 'selected'"; } ?> >Sports</option>
		  <option value="Art & Theatre" <?php if ($test == "Art & Theatre") {echo "selected = 'selected'"; } ?>>Art & Theatre</option>
		  <option value="Film" <?php if ($test == "Film") {echo "selected = 'selected'"; } ?> >Film</option>
		  <option value="Miscellaneous" <?php if ($test == "Miscellaneous") {echo "selected = 'selected'"; } ?> >Miscellaneous</option>
	</select>
	<br/>
	<b>Distance(miles)</b><input id="Distance" type="text"  name="Distance" value="<?php echo $radius?>" placeholder="10"><b> from</b>
<!------------------------------------------------------------------------------------------->
<input id= "here"   		type="radio" onclick="setCurrentLocAndDisable()" name="here" value="here" <?php if($radioString == "here" || ($radioString != "here" && $radioString != "locationRadio") ){echo 'checked';} ?> ><b>Here</b><br/>

<div id="loc">
<input id = "locationRadio" type="radio" onclick="setMyLocAndEnable()" 		 name="here" value="locationRadio" <?php if($radioString == "locationRadio"){echo 'checked';} ?> >
<!-------------------------------------------------------------------------------------------->



					<input id= "location" type="text"  '<?php if($radioString != "locationRadio"){echo disabled;} ?>' name="location" placeholder="location"  value="<?php echo $my_location?>">
					<br/>
</div>
	

	<!--For passing the la and long to php encoder-->
	<input type="hidden" id = "pass_lat" name = "pass_lat" value = "zero" >
	<input type="hidden" id = "pass_long" name = "pass_long" value = "zero" >
	
	<input type="hidden" id ="saved_pass_lat" value="zero" >
	<input type="hidden" id ="saved_pass_lon" value="zero" >

	<input type="hidden" id ="saved_user_pass_lat" value="<?php echo $my_lat ?>" >
	<input type="hidden" id ="saved_user_pass_lon" value="<?php echo $my_lon ?>" >
	
	<input type="hidden" id ="flag" value="false" >
	<input type="hidden" id="event_id" name="event_id" value="<?php echo $event_id ?>">
	<input type="hidden" id="event_index" name="event_index" value="<?php echo $event_index ?>">
	<!--
	<input type="hidden" id="radio_indicator" value="zero">
	<input type="hidden" id = "cur_event_num" name="cur_event_num" value="">
	
	-->
<div id="button">
	<button style="border-radius: 0px;" type= "submit" id = "Search" onclick = "search()" disabled = "">Search</button>	<button id='clear' style="border-radius: 0px;" type = "button" onclick="resetAll()">Clear</button>
</div>
</form>

	

<br/>
<table id="table1" width=1350px style="margin: auto; border:solid green 1px" ></table>
<table id="table1_5" ></table>


<!----venue title---->
<table id= "table2"></table>
<table id="detail_and_map_table"   hidden border=1 >
			<tr>
		    <th class="left"><b>Name</b></th>
		    <td id="detail_name"></th>
		    </tr>

		    <tr id="leftMap_id">
		    <th class="leftMap"><b>Map</b></th>
		    <td id="leftMap_th">
		    	<div>
		    	<div id="start">
		            <div  id="WALKING" onclick="calculateAndDisplayRoute('WALKING')">Walk there</div>
		            <div  id="BICYCLING" onclick="calculateAndDisplayRoute('BICYCLING')"> Bike there</div>
		            <div id="DRIVING" onclick="calculateAndDisplayRoute('DRIVING')">Drive there</div>
        		</div><div id="map"></div>
        		</div>
		    </th>
		    </tr>

		    <tr>
		    <th class="left"><b>Address</b></th>
		    <td id="detail_address"></th>
		    </tr>

		    <tr>
		    <th class="left"><b>city</b></th>
		    <td id="detail_city"></th>
		    </tr>

		    <tr>
		    <th class="left"><b>Postal Code</b></th>
		    <td id="detail_pst_code"></th>
		    </tr>

		    <tr>
		    <th class="left"><b>Upcomming Events</b></th>
		    <td id="detail_upcm_evts"></th>
		    </tr>
</table>

<!----venue photo title--->
<table id="photo_title"></table>
<table hidden id="photo_table"></table>

<div id="demo"></div>


	<script type="text/javascript">
		//Ticket master Consumer key: PlOuJLEb8XdeMgz9EiDPe0CyVGSLCG9W
		//Google map API key(for my location):AIzaSyBEsnSVh41MPIpy-rbIkf1CmQ945SE9l6c
		//after enable nilling: AIzaSyAIToX3e-MuzjTM3RoDOZ0h1mkTwB8gXjQ
		var loca_json ;
		var loca_data;
		var table1Array;
		var event_array;
		var venue_array;
		var cur_event_num;

		//radio_indicator = 0;

		///Send Request 
		function request_Location_Json(){
			var url = "http://ip-api.com/json/";
		    var xmlHttp = new XMLHttpRequest();
			xmlHttp.open( "GET", url, false );
			xmlHttp.send();
			loca_json = xmlHttp.responseText;	    
			loca_data = JSON.parse(loca_json);

			enableSearch();
		}
		
		///Enable button
		function enableSearch() {
			document.getElementById("Search").disabled = false;

			document.getElementById("saved_pass_lat").value = loca_data.lat;
			document.getElementById("saved_pass_lon").value = loca_data.lon;
		}

		function setCurrentLocAndDisable(){
			document.getElementById("pass_lat").value = loca_data.lat;
			document.getElementById("pass_long").value = loca_data.lon;

			document.getElementById("location").required = false;
			document.getElementById("location").value = "";
			document.getElementById("location").disabled = true;

			radio_indicator = 0;

		}

		function setMyLocAndEnable(){

			//disable
			document.getElementById("pass_lat").value = "zero";
			document.getElementById("pass_long").value = "zero";

			//alert("am I here?");
			document.getElementById("location").disabled = false;
			document.getElementById("location").required = true;

			//radio_indicator = 3;
			//alert(radio_indicator);

		}

		function myOnload() {
			//json Key: lat lon status
			request_Location_Json();			

			document.getElementById("pass_lat").value = loca_data.lat;
			document.getElementById("pass_long").value = loca_data.lon;

		}
		//myOnload();
		window.load = myOnload();
		//function f(){
			//myOnload();
			//searchFunction();print_table1(table1Array);

		//}
		//alert("<?php echo "lk".$_POST["pass_lat"].$_POST["pass_long"]; ?>" );

		function search() {
			document.getElementById('event_id').value = "";
			if(document.getElementById('keyword').value == ""){

			}
			else if(document.getElementById("locationRadio").checked == true && document.getElementById('location').value == ""){

			}
			else{
				submit();

			}

		}
		function submit() {
			document.getElementById('es').submit();
			return false;
		}
		function showPage2(i) {

			
		}
		function saveEventId(i) {
			document.getElementById('event_id').value = table1Array[i].id;
			document.getElementById('event_index').value = i;

			//#alert("i am id"+document.getElementById('event_id').value);
		}
		function detailPage(i) {
			// saveEventId(i);
			// submit();
			// showPage2(i);

		}

		function showDetails(i) {



		}
		function showVenueTitle(i) {
	

		}
		function hideVenueTitle(i) {
			

		}

		function showVenueDetail(i) {

		}

		function showPhotosSwitch(i) {
		
		 }
		 function hidePhotoTitle(i) {
		
		}
		function showPhotoTitle(i) {
			
		}

		function print_tableNorecord() {
			var text = "";
			text+="<table  border=1>";
			text+="<tr>";
			text += "<th id='no_record'>"+"No Records has been found"+"</th>";
			text+="</tr>";
			text+="</table>";
			document.getElementById("table1").innerHTML = text;



		}
		function showMap0(i) {
			var small_map_id = "table0"+i;
			var hidden_status = document.getElementById(small_map_id).hidden;
			var flag = document.getElementById("flag");

			//show small map
			if(hidden_status != false){

				document.getElementById(small_map_id).hidden = false;

				var target_lat = table1Array[i]._embedded.venues[0].location.latitude;
				var target_lon = table1Array[i]._embedded.venues[0].location.longitude;

				initMap(target_lat,target_lon,0,i);

				var map_name_already_on = "table0"+flag.value;
				if (flag.value != "false" ) {
					document.getElementById(map_name_already_on).hidden = true;
				} 

				flag.value = i;
				

			}
			//hide the map
			else{
				document.getElementById(small_map_id).hidden = true;
				flag.value = "false";

			}
		}
		function print_table1(){
			var text = "";

		    text+="<tr>";
		    
		    	text += "<th style='width:100px;'><b>"+"Date"+"</b></th>";
		    	text += "<th style='width:120px;'><b>"+"Icon"+"</b></th>";
		    	text += "<th style='width:1750px;'><b>"+"Event"+"</b></th>";
		    	text += "<th style='width:410px;'><b>"+"Genre"+"</b></th>";
		    	text += "<th style='width:1900px;'><b>"+"Venue"+"</b></th>";
		    
		    text+="</tr>";

			for (var i=0; i < table1Array.length; i++) {
				text+="<tr >";

				text += "<td style='width:180px; text-align:center;padding:0px 0px 0px 0px;'>"+""+table1Array[i].dates.start.localDate+"<br>";

				if("localTime" in table1Array[i].dates.start){
					text += ""+table1Array[i].dates.start.localTime+""+"</td>";
				}else{
					text += "</td>";
				}

				if(table1Array[i].images.length == 0){
					text += "<td>"+"N/A"+"</td>";
				}
				else{
				text += "<td style='text-align:center;padding:0px 0px 0px 0px; '>"+"<img src='"+table1Array[i].images[0].url+"'" +" height='58' width= '85'>"+"</td>";
				}

				//event
				//text += "<td style='padding-left:10px;'>"+"<a id = 'event_link' href='#' onclick='detailPage("+ i +"); return false;'>"+table1Array[i].name+""+"</td>";
				text += "<td style='padding-left:10px;'>"+"<a id = 'event_link' href='#' onclick='saveEventId("+ i +");submit();'>"+table1Array[i].name+""+"</td>";
				//genre
				if("classifications" in table1Array[i]){
					if(table1Array[i].classifications.length>0){
						if("segment" in table1Array[i].classifications[0]){
							if("name" in table1Array[i].classifications[0].segment){
								text += "<td style='padding-left:5px;'>"+"<p>"+table1Array[i].classifications[0].segment.name+"</p>"+"</td>";
							}
							else{
								text += "<td>"+"<p style='margin-left:5px;'>"+" N/A"+"</p>"+"</td>";

							}
						
						}
					}
					else{
						text += "<td>"+"<p style='margin-left:5px;'>"+"N/A"+"</p>"+"</td>";
					}
				}
				else{
					text += "<td>"+"<p style='margin-left:5px;'>"+"N/A"+"</p>"+"</td>";
				}
				//Venue: Location
				if("name" in table1Array[i]._embedded.venues[0] && "venues" in table1Array[i]._embedded &&"_embedded" in table1Array[i] && table1Array[i]._embedded.venues.length>0 && table1Array[i]._embedded.venues[0].name !==undefined && table1Array[i]._embedded.venues[0].name !== "Undefined"){
						text += "<td>"+"<div id='venue_link' style='margin-left:15px' onclick='showMap0("+i+ ")' >"+table1Array[i]._embedded.venues[0].name+"</div>";

						//////////////////map table////////////////
						text += "<table border=1 hidden style=' margin-left:19px; border:solid white 0px; width:0.01px; height:0.01px;position: absolute;'id='table0"+i+"'>";

							text +=	"<tr><td style=' border:solid white 0px; height:0px; padding:0;' >";
								text += "<div style='position: absolute; width: 490px;height: 390px;background-color: grey;' id='map0"+i+"'>";
								text += "</div>";
							 

								text += "<div style='position: absolute; width:110px; border:solid blue 0px;background-color: #EFEFEF; ' id='start0"+i +"'>";

					        		text += '<div class = "walk" id=WALKING2 onclick=calculateAndDisplayRoute('+"'WALKING'"+")"+">Walk there</div>";
					        		text += '<div class = "bike" id=BICYCLING2 onclick=calculateAndDisplayRoute('+"'BICYCLING'"+")"+">Bike there</div>";
					        		text += '<div class = "drive" id=DRIVING2 onclick=calculateAndDisplayRoute('+"'DRIVING'"+")"+">Drive there</div>";

								text += "</div>";

								
						text +=	"</td></tr>";
						text += "</table>";
						//////////////////map table////////////////


						text += "</td>";
				}
				else{
					text += "<td>"+"N/A" +"</td>" ;
				}
				
				text+="</tr>";

				var target_lat = table1Array[i]._embedded.venues[0].location.latitude;
				var target_lon = table1Array[i]._embedded.venues[0].location.longitude;

				
			}
			document.getElementById("table1").innerHTML = text;
			//document.getElementById("textH").innerHTML = textH;

			

		}


		///
		//function searchFunction() {
			
				
				//alert("<?php echo $tktMst_url."end" ?>");
				//alert("<?php echo $_POST["pass_lat"].'here'.$_POST["pass_long"] ?>");

				var json_raw = ""; 
				json_raw = "<?php echo $tableJson0?>";

				var json_event = "";
				json_event = "<?php echo $event_json ?>";
				//alert("1053here" +json_event);

				var json_venue = "";
				json_venue = "<?php echo $venue_json_for_real ?>";
					
				if(json_raw == "als"){
					print_tableNorecord();
					//alert("case1");
				}
				else if(json_raw == ""){
				}
				else if(!json_raw.includes("_embedded") ){
					print_tableNorecord();					
					//alert("case2");
				}
				else{
					if("events" in JSON.parse(json_raw)._embedded ){
						if(JSON.parse(json_raw)._embedded.events.length ==0){
							//alert("case4");
							print_tableNorecord();
						}
						else{

							//#alert("line1061 "+document.getElementById('event_id').value);

							table1Array = JSON.parse(json_raw)._embedded.events;

							if(json_event == "als"){
								
							}
							else{
								event_array = JSON.parse(json_event);
								//alert(event_array);
							}

							if(json_venue == "als" || json_venue == "" || (!json_venue.includes("_embedded") ) ){
								//no venue info REcord here handle!!
								detail_and_map_table.innerHTML = "<tr><th><b>"+"No Venue Infos Found"+"</b></th></tr>";
							}
							else{
								venue_array = JSON.parse(json_venue);
							}
							
							//alert('<?php echo "1114".$venue_name ?>');
							//alert('<?php echo $venue_json_for_php->_embedded->venues[0]->name ?>');
							


							if(document.getElementById('event_id').value === ""){
								print_table1();	
							}
							else{
								var event_num = document.getElementById('event_index').value;
								detailPage_2(event_num);
								console.log(venue_array);

							}
							
						}
					}
					else{
						print_tableNorecord();
						//alert("case3");
					}
				}
				
		//}
		function detailPage_2(i) {
			showDetails_2(i);
			if(venue_array !== undefined){
				showVenueTitle_2(i);
				showPhotoTitle_2(i);

				if(venue_array !== undefined && "_embedded" in venue_array && "venues" in venue_array._embedded && venue_array._embedded.venues.length>0 && "location" in venue_array._embedded.venues[0] && "latitude" in venue_array._embedded.venues[0].location && "longitude" in venue_array._embedded.venues[0].location ){
					var target_lat = Number(venue_array._embedded.venues[0].location.latitude);
					var target_lon = Number(venue_array._embedded.venues[0].location.longitude);
					initMap(target_lat,target_lon,1,i);
				}
			}
			else{
				//alert('ss');
				showVenueTitle_2(i);
				showPhotoTitle_2(i);
			}
		}

		function showDetails_2(i) {
			console.log(event_array);
			var detail_text = ""; var artistList_text="";
			cur_event_num=i;
			if("name" in event_array && event_array.name !== undefined && event_array.name !== "Undefined"){
				detail_text +="<tr>";    
			    detail_text += "<th class = 'detail_titles' style='font-size:30px; text-align:center;' colspan='100'><b>"+event_array.name+"</b></th>";		    
			    detail_text +="</tr>";
			}
			
			if("localDate" in event_array.dates.start && "start" in event_array.dates && "dates" in event_array && event_array.dates.start.localDate !== "Undefined"){
				detail_text +="<tr>";    
		    	detail_text += "<th class = 'detail_titles'><b>"+"Date"+"</b> <p class='detail_detail'>"+event_array.dates.start.localDate;
		    	if("localTime" in event_array.dates.start && event_array.dates.start.localTime !== "Undefined"){
		    		detail_text += " "+event_array.dates.start.localTime  +"</p></th>";
		    	}
		    	else{
		    		detail_text += "</p></th>";
		    	}
		    		
			}
		    

		    if("seatmap" in event_array){
		    	if("staticUrl" in event_array.seatmap && event_array.seatmap.staticUrl !== "Undefined"){	
		    		detail_text +="<td id='seatmap_id' rowspan='10'>" ;	    
		    		detail_text += "<img style='max-width:500px;' src='" +event_array.seatmap.staticUrl+"'>" + "</td>";
				}
				else{

				}
		    }

		    detail_text +="</tr>";


		    if("_embedded" in event_array && "attractions" in event_array._embedded && event_array._embedded.attractions.length>0){
		    var attractions_length = event_array._embedded.attractions.length;
		    for (var t=0; t< attractions_length ; t++) {
		    	if("url" in event_array._embedded.attractions[t] && event_array._embedded.attractions[t].url !== "Undefined" && "name" in event_array._embedded.attractions[t] && event_array._embedded.attractions[t].name !== "Undefined"){
		    		artistList_text += "<a id ='artist_link' target='_blank' href= '" +event_array._embedded.attractions[t].url +"' >"+event_array._embedded.attractions[t].name+ "</a>";
		    	
		    		artistList_text += " | ";
		    	}

		    	
		    	
		    }
		    artistList_text = artistList_text.slice(0,-2);
		    
			    if(artistList_text ==""){}
			    else{
			    detail_text +="<tr>";    
				detail_text += "<th class = 'detail_titles'><b>"+"Artist/Team"+"</b><br/>"+"<p class='detail_detail'>"+artistList_text +"</p></th>";		    
				detail_text +="</tr>";
				}
			}
			//venues
			if("name" in event_array._embedded.venues[0] &&event_array._embedded.venues.length>0 && "venues" in event_array._embedded && "_embedded" in event_array && event_array._embedded.venues[0].name !== "Undefined"){
				detail_text +="<tr>";    
				detail_text += "<th class = 'detail_titles'><b>"+"Venue"+"</b> <p class='detail_detail'>"+event_array._embedded.venues[0].name+"</p></th>";		    
				detail_text +="</tr>";
			}
		    

			
			//genres
			if("classifications" in event_array && event_array.classifications.length>0){
				
				var genres_text=""; 

				if("subGenre" in event_array.classifications[0] && "name" in event_array.classifications[0].subGenre && event_array.classifications[0].subGenre.name !== undefined && event_array.classifications[0].subGenre.name !== "Undefined"){
					genres_text += event_array.classifications[0].subGenre.name+" | ";
				}

				if("genre" in event_array.classifications[0] && "name" in event_array.classifications[0].genre && event_array.classifications[0].genre.name !== undefined && event_array.classifications[0].genre.name !== "Undefined"){
					genres_text += event_array.classifications[0].genre.name+" | ";
				}

				if("segment" in event_array.classifications[0] && "name" in event_array.classifications[0].segment && event_array.classifications[0].segment.name !== undefined && event_array.classifications[0].segment.name !== "Undefined"){
					genres_text += event_array.classifications[0].segment.name+" | ";
				}

				if("subType" in event_array.classifications[0] && "name" in event_array.classifications[0].subType && table1Array[i].classifications[0].subType.name !== undefined && event_array.classifications[0].subType.name !== "Undefined"){
					genres_text += event_array.classifications[0].subType.name+" | ";
				}

				if("type" in event_array.classifications[0] && "name" in event_array.classifications[0].type && event_array.classifications[0].type.name !== undefined && event_array.classifications[0].type.name !== "Undefined"){
					genres_text += event_array.classifications[0].type.name +" | ";
				}
				if(genres_text ==""){}
				else{
					detail_text +="<tr>";    
					detail_text += "<th class = 'detail_titles'><b>"+"Genres"+"</b> <p class='detail_detail'>";
					genres_text = genres_text.slice(0,-2);
					detail_text += genres_text;
					detail_text += "</p></th>";		    
					detail_text +="</tr>";
					}
				
			}
		if ("priceRanges" in event_array ){
				if(event_array.priceRanges.length>0){
					if("currency" in event_array.priceRanges[0]){
						if("min" in event_array.priceRanges[0] && "max" in event_array.priceRanges[0] ){
							detail_text +="<tr>";    
							detail_text += "<th class = 'detail_titles'><b>"+"Price Ranges"+"</b> <p class='detail_detail'>";
							detail_text += event_array.priceRanges[0].min+" - "+event_array.priceRanges[0].max +" "+event_array.priceRanges[0].currency;
							detail_text += "</p></th>";
							detail_text +="</tr>";

						}
						else if("min" in event_array.priceRanges[0] && !("max" in event_array.priceRanges[0])){
							detail_text +="<tr>";    
							detail_text += "<th class = 'detail_titles'><b>"+"Price Ranges"+"</b> <p class='detail_detail'>";
							detail_text += event_array.priceRanges[0].min+event_array.priceRanges[0].currency;
							detail_text += "</p></th>";
							detail_text +="</tr>";
						}
						else if("max" in event_array.priceRanges[0] && !("min" in event_array.priceRanges[0])){
							detail_text +="<tr>";    
							detail_text += "<th class = 'detail_titles'><b>"+"Price Ranges"+"</b> <p class='detail_detail'>";
							detail_text += event_array.priceRanges[0].max+event_array.priceRanges[0].currency;
							detail_text += "</p></th>";
							detail_text +="</tr>";
						}
						else{
							detail_text += "";
						}
						
					}
					else{
						detail_text += "";
					}
				}
				else{
					detail_text += "";
				}
			}
			else{
				detail_text += "";
			}
	
			if("dates" in event_array && "status" in event_array.dates && "code" in event_array.dates.status && event_array.dates.status.code !== "Undefined"){

				var string = event_array.dates.status.code;
				detail_text +="<tr>";    
				detail_text += "<th class = 'detail_titles'><b>"+"Ticket Status"+"</b> <p class='detail_detail'>"+string.charAt(0).toUpperCase() + string.slice(1)+"</p></th>";		    
				detail_text +="</tr>";
				
			}
			
			if("url" in event_array && event_array.url !== "Undefined"){
		    detail_text +="<tr>";    
			detail_text += "<th class = 'detail_titles'><b>"+"Buy Ticket At"+"</b><br/> <a id='buyat' style='text-decoration:none;' target='_blank' href='"+event_array.url  +"'><p class='detail_detail'>Ticketmaster</p></a></th>";		    
			detail_text +="</tr>";
			}
			detail_text +="<br><br>";

			document.getElementById("table1_5").innerHTML = detail_text;
			//document.getElementById("table1").width = 666;
			//document.getElementById("table1").border = none;
			document.getElementById("table1").innerHTML = "";
		}

		function showVenueTitle_2(i) {
			var venue_Text = "";

			//venue_Text +="<table  >";

			venue_Text +="<tr>";    
		    venue_Text += "<th >"+"click to show venue info"+"</th>";
			venue_Text +="</tr>";

			venue_Text +="<tr>";
		    venue_Text += "<th>"+"<img src='http://csci571.com/hw/hw6/images/arrow_down.png' style = 'width:40px; height:20px;' onclick= 'showVenueDetail_2("+i+")'>"+"</th>";
		    venue_Text +="</tr>";
		    venue_Text +="<br>";

			document.getElementById("table2").innerHTML = venue_Text;
		}

		function showVenueDetail_2(i) {
			var detail_and_map_table = document.getElementById("detail_and_map_table");
			var detail_and_map_table_hidden_status = detail_and_map_table.hidden;

			var photo_table = document.getElementById("photo_table");
			document.getElementById('detail_and_map_table').height = 468;

			if(venue_array !== undefined && "venues" in venue_array._embedded && "_embedded" in venue_array && venue_array._embedded.venues.length>0 ){
				//give text details
				if("name" in venue_array._embedded.venues[0] && venue_array._embedded.venues[0].name !== 'Undefined'){
					document.getElementById("detail_name").innerHTML = venue_array._embedded.venues[0].name;
				}
				else{
					document.getElementById("detail_name").innerHTML = "N/A"
				}
				
				if("address" in venue_array._embedded.venues[0] && "line1" in venue_array._embedded.venues[0].address && venue_array._embedded.venues[0].address.line1 !== 'Undefined'){
					document.getElementById("detail_address").innerHTML = venue_array._embedded.venues[0].address.line1;
				}
				else{
					document.getElementById("detail_address").innerHTML = "N/A";
				}

				if("city" in venue_array._embedded.venues[0] && "name" in venue_array._embedded.venues[0].city && venue_array._embedded.venues[0].city.name !== "Undefined" ){

					if("state" in venue_array._embedded.venues[0] && "stateCode" in venue_array._embedded.venues[0].state && venue_array._embedded.venues[0].state.stateCode !== "Undefined"){
						document.getElementById("detail_city").innerHTML = venue_array._embedded.venues[0].city.name +"," + venue_array._embedded.venues[0].state.stateCode;
					}
					else{
						document.getElementById("detail_city").innerHTML = venue_array._embedded.venues[0].city.name;
					}
				}
				else{
					document.getElementById("detail_city").innerHTML = "N/A";
				}


				if("postalCode" in venue_array._embedded.venues[0] && venue_array._embedded.venues[0].postalCode !== 'Undefined'){
					document.getElementById("detail_pst_code").innerHTML = venue_array._embedded.venues[0].postalCode;
				}
				else{
					document.getElementById("detail_pst_code").innerHTML = "N/A";

				}
				if("url" in venue_array._embedded.venues[0] && venue_array._embedded.venues[0].url !== 'Undefined'){

					document.getElementById("detail_upcm_evts").innerHTML = "<a target='_blank' href='"+ venue_array._embedded.venues[0].url +"'>"+venue_array._embedded.venues[0].name+" Tickets</a>";
				}
				else{
					document.getElementById("detail_upcm_evts").innerHTML = "N/A";
				}


			
				


				
				




				//show map
				if (detail_and_map_table_hidden_status != false && venue_array !== undefined) {
					//1
					hideVenueTitle_2(i);
					detail_and_map_table.hidden = false;
					var target_lat = venue_array._embedded.venues[0].location.latitude;
					var target_lon = venue_array._embedded.venues[0].location.longitude;

					initMap(target_lat,target_lon,1,i);

					if(photo_table.hidden == false){
						//2
						showPhotosSwitch_2(i);
					}
				}
				//hide map 
				else{
					
					showVenueTitle_2(i);
					detail_and_map_table.hidden = true;
				}


			}
			else{
				
				//detail_and_map_table.width = 1200;
				document.getElementById('detail_and_map_table').height = 21;
				document.getElementById('detail_and_map_table').width = 1200;
				detail_and_map_table.innerHTML = "<tr><th><b>"+"No Venue Info Found"+"</b></th></tr>";

				if (detail_and_map_table_hidden_status != false) {
					//1
					hideVenueTitle_2(i);
					detail_and_map_table.hidden = false;

					if(photo_table.hidden == false){
						//2
						showPhotosSwitch_2(i);
					}
				}
				//hide map 
				else{
					
					showVenueTitle_2(i);
					detail_and_map_table.hidden = true;
				}
			}


			
			
		}

		function hideVenueTitle_2(i) {
			var venue_Text = "";

			//venue_Text +="<table >";

			venue_Text +="<tr>";    
		    venue_Text += "<th >"+"click to hide venue info"+"</th>";
			venue_Text +="</tr>";

			venue_Text +="<tr>";
		    venue_Text += "<th>"+"<img src='http://csci571.com/hw/hw6/images/arrow_up.png' style = 'width:40px; height:20px;' onclick= 'showVenueDetail_2("+i+")'>"+"</th>";
		    venue_Text +="</tr>";
		    venue_Text +="<br>";

			document.getElementById("table2").innerHTML = venue_Text;
		}
		function showPhotosSwitch_2(i) {
			var photo_table = document.getElementById("photo_table");
			var photo_table_hidden_status = photo_table.hidden;
			var detail_and_map_table = document.getElementById("detail_and_map_table");
			var photo_Text = ""; var ct = 0;

			if(venue_array !== undefined && "venues" in venue_array._embedded && "_embedded" in venue_array){
				if (venue_array._embedded.venues.length>0) {
					if ("images" in venue_array._embedded.venues[0]) {
						if (venue_array._embedded.venues[0].images.length>0) {

							for (var t =0;t< venue_array._embedded.venues[0].images.length; t++) {

								if("url" in venue_array._embedded.venues[0].images[t]){
									photo_Text +="<tr>";    
							    	photo_Text += "<th >"+"<img style='max-width:1000px;' src='"+venue_array._embedded.venues[0].images[t].url +"'" +">"+"</th>";
									photo_Text +="</tr>"; 
								}
								else{
									ct += 1;
								}
							
							}
							if(ct == venue_array._embedded.venues[0].images.length){
								photo_table.innerHTML ="<tr><th><b>"+"No Venue Photos Found"+"</b></th></tr>";
							}
							else{
								photo_table.innerHTML = photo_Text;
							}
						}
						else{
							photo_table.innerHTML ="<tr><th><b>"+"No Venue Photos Found"+"</b></th></tr>";
						}
					}
					else{
						photo_table.innerHTML ="<tr><th><b>"+"No Venue Photos Found"+"</b></th></tr>";
						}

				}
				else{
					photo_table.innerHTML ="<tr><th><b>"+"No Venue Photos Found"+"</b></th></tr>";
						}
			}
			 else {
			 	photo_table.innerHTML ="<tr><th><b>"+"No Venue Photos Found"+"</b></th></tr>";
			}

			//photo_table.innerHTML = "<img src='"+table1Array[i]._embedded.venues[0].images[0].url +"'" +">";


			//show photo
			if (photo_table_hidden_status != false ) {
				//
				hidePhotoTitle_2(i);
				photo_table.hidden = false;
				//alert(detail_and_map_table.hidden);

				if(detail_and_map_table.hidden == false){
					showVenueTitle_2(i);
					detail_and_map_table.hidden = true;
				}
			//hide photo
			} else{
				//
				showPhotoTitle_2(i);
				photo_table.hidden = true;
			}
		}

		function hidePhotoTitle_2(i) {
			var venue_Text = "";

			venue_Text +="<table border=1 >";

			venue_Text +="<tr>";    
		    venue_Text += "<th >"+"click to hide venue photos"+"</th>";
			venue_Text +="</tr>";

			venue_Text +="<tr>";
		    venue_Text += "<th>"+"<img src='http://csci571.com/hw/hw6/images/arrow_up.png' style = 'width:40px; height:20px;' onclick= 'showPhotosSwitch_2("+i+")'>"+"</th>";
		    venue_Text +="</tr>";



			document.getElementById("photo_title").innerHTML = venue_Text;
		}
		function showPhotoTitle_2(i) {
			var photo_Text = "";
			var photo_Text = "";

			photo_Text +="<table border=1 >";

			photo_Text +="<tr>";    
		    photo_Text += "<th >"+"click to show venue photos"+"</th>";
			photo_Text +="</tr>";

			photo_Text +="<tr>";
		    photo_Text += "<th>"+"<img src='http://csci571.com/hw/hw6/images/arrow_down.png' style = 'width:40px; height:20px;' onclick= 'showPhotosSwitch_2("+i+")'>"+"</th>";
		    photo_Text +="</tr>";

			document.getElementById("photo_title").innerHTML = photo_Text;
		}
		function resetAll() {
			document.getElementById("location").required = false;
			document.getElementById("keyword").required = false;

			document.getElementById("keyword").value = "";
			document.getElementById("Distance").value = "";
			document.getElementById("location").value = "";


			document.getElementById("categorys").value = "Default";
			document.getElementById("here").checked = true;

			document.getElementById("location").required = true;
			document.getElementById("keyword").required = true;
			document.getElementById("location").disabled = true;

			document.getElementById("table1").innerHTML = "";
			document.getElementById("table2").innerHTML = "";
			document.getElementById("table1_5").innerHTML = "";
			document.getElementById("detail_and_map_table").innerHTML = "";

			document.getElementById("photo_title").innerHTML = "";
			document.getElementById("photo_table").innerHTML = "";

		}
	</script>
	<script>
		var markerArray=[];
        var directionsService ="";
        var map = "";
        var directionsDisplay = "";
        var stepDisplay = "";
        var marker = "";
        var google_lat = "";
		var google_lon = "";

		function initMap(lat,lon,indicator,i) {
			google_lat = parseFloat(lat);
			google_lon = parseFloat(lon);//alert(google_lat);		alert(google_lon);

			var map_loc = {lat: google_lat, lng: google_lon};
			if(indicator == 0){
				var small_map_id2 = "map0"+i;
				//alert(small_map_id2);
				map = new google.maps.Map(
			    document.getElementById(small_map_id2), {zoom: 13, center: map_loc});
			}
			else{
				if(map_loc !== NaN && google_lat !== "" && google_lat !== NaN && (!isNaN(google_lat))){

					map = new google.maps.Map(
			      		document.getElementById('map'), {zoom: 13, center: map_loc});
				}
			}

			if(!isNaN(google_lat)){
				marker = new google.maps.Marker({position: map_loc, map: map});

			markerArray = [];
			directionsService = new google.maps.DirectionsService;

			// Create renderer for directions and bind it to the map.
	  		var rendererOptions = {
	    		map: map
	  		}
	  		directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions)
	 		stepDisplay = new google.maps.InfoWindow();
			}
			
				
		}

		function calculateAndDisplayRoute(mode) {
			var departure_lat = "";
			var departure_lon = "";

			if(document.getElementById("location").value != ""){
				departure_lat = Number(document.getElementById("saved_user_pass_lat").value);
			 	departure_lon = Number(document.getElementById("saved_user_pass_lon").value);
			}
			else{
			 	departure_lat = Number(document.getElementById("saved_pass_lat").value);
			 	departure_lon = Number(document.getElementById("saved_pass_lon").value);
			}


			//alert("departure_lat"+departure_lat+"departure_lon" +departure_lon);

			var departure = new google.maps.LatLng(departure_lat, departure_lon);
			var target = new google.maps.LatLng(google_lat, google_lon);

	        // First, remove any existing markers from the map.
	        for (var i = 0; i < markerArray.length; i++) {
	          markerArray[i].setMap(null);
	        }

	        // Retrieve the start and end locations and create a DirectionsRequest using
	        // WALKING directions.
	        directionsService.route({
	          //origin: departure_lat,departure_lon,
	          origin: departure,

	          destination: target,
	          travelMode: mode
	        }, function(response, status) {
	          // Route the directions and pass the response to a function to create
	          // markers for each step.
	          if(status === 'ZERO_RESULTS'){
	          	window.alert('Directions request failed due to ' + "Can't go in this way");
	          }
	          if (status === 'OK') {
	            //document.getElementById('demo').innerHTML = '<b>' + response.routes[0].warnings + '</b>';
	            directionsDisplay.setDirections(response);
	          } else {
	            window.alert('Directions request failed due to ' + status);
	          }
	        });
     	}
    </script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIToX3e-MuzjTM3RoDOZ0h1mkTwB8gXjQ&callback=initMap">
    </script>
</body>
</html>