function addRow() {
    var div = document.createElement('div');

    div.className = 'row';
    
	var list = document.getElementsByClassName('obj');
	
    for (var i = 0; i <= list.length; i++) {
    		
     	
    
		if(i <= 10){
    div.innerHTML = '<label for="obj" class="inline" ></label>\
	<input type="text" class="form-control inline obj" id="obj" name="obj'+i+'"  placeholder="Objective '+i+'" />\
	<button type="button" class="btn btn-info glyphicon glyphicon-minus inline" onclick="removeRow(this)"></button>';
   
     document.getElementById('content').appendChild(div);
	  
		 }else{
			 div.innerHTML = '';
			 document.getElementById('content').appendChild(div);
			 }
	 
	}
	
}


function removeRow(input) {
    document.getElementById('content').removeChild( input.parentNode );
}


function C_addRow() {
    var div = document.createElement('div');

    div.className = 'row';
    
	var list = document.getElementsByClassName('Certificate');
	
    for (var i = 0; i <= list.length; i++) {
    		
     	
    
		if(i <= 10){
    div.innerHTML = '<label for="Certificate" class="inline" ></label>\
	<input type="text" class="form-control inline Certificate" id="Certificate" name="Certificate'+i+'"  placeholder="Event name, Certificate name, Role, Date" />\
	<button type="button" class="btn btn-info glyphicon glyphicon-minus inline" onclick="C_removeRow(this)"></button>';
   
     document.getElementById('Certificates').appendChild(div);
	  
		 }else{
			 div.innerHTML = '';
			 document.getElementById('Certificate').appendChild(div);
			 }
	 
	}
	
}


function C_removeRow(input) {
    document.getElementById('Certificates').removeChild( input.parentNode );
}


function S_addRow() {
    var div = document.createElement('div');

    div.className = 'row';
    
	var list = document.getElementsByClassName('Seminar');
	
    for (var i = 0; i <= list.length; i++) {
    		
     	
    
		if(i <= 10){
    div.innerHTML = '<label for="Seminar" class="inline" ></label>\
	<input type="text" class="form-control inline Seminar" id="Seminar" name="Seminar'+i+'"  placeholder="Seminar name, Place, Date " />\
	<button type="button" class="btn btn-info glyphicon glyphicon-minus inline" onclick="S_removeRow(this)"></button>';
   
     document.getElementById('Seminars').appendChild(div);
	  
		 }else{
			 div.innerHTML = '';
			 document.getElementById('Seminars').appendChild(div);
			 }
	 
	}
	
}


function S_removeRow(input) {
    document.getElementById('Seminars').removeChild( input.parentNode );
}


function addSkill() {
    var div = document.createElement('div');

    div.className = 'row';
    
	var list = document.getElementsByClassName('skill');
	
    for (var i = 0; i <= list.length; i++) {
    		
     	
    
		if(i <= 10){
    div.innerHTML = '<label for="skill" class="inline" ></label>\
	<input type="text" class="form-control inline skill" id="skill" name="skill'+i+'"  placeholder="Skill '+i+'" />\
	<button type="button" class="btn btn-info glyphicon glyphicon-minus inline" onclick="removeSkill(this)"></button>';
   
     document.getElementById('skill').appendChild(div);
	  
		 }else{
			 div.innerHTML = '';
			 document.getElementById('skill').appendChild(div);
			 }
	 
	}
	
}


function removeSkill(input) {
    document.getElementById('skill').removeChild( input.parentNode );
}