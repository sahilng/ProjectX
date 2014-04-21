function fillTable(json){
	var unique_id = 0;
	var apid = 1;
	var name = 2;
	var course_number = 3;
	var section_number = 4;
	var course_name = 5;
	var staff_id = 6;
	var staff_name = 7;
	var meeting_time = 8;
	var term = 9;
	var room = 10;
	
	var arrayLength = json.length;
	
	for(var i = 0; i < arrayLength; i++){
		var meetingTimes = json[i][meeting_time].match(/.{1,2}/g);
		for(var x = 0; x < meetingTimes.length; x++){
			console.log(x);
			document.getElementById(meetingTimes[x]).innerHTML = json[i][course_name];
			
		}
	}
	
}