
function modalshow(){
var modal = document.getElementById('loginmodal');
var btn = document.getElementById("GetStarted");
var span = document.getElementsByClassName("close")[0];

modal.style.display = "block";	

span.onclick = function() {
modal.style.display = "none";	
}

window.onclick = function(event){
	if(event.target == modal){
		modal.style.display = "none";
		}
	}
}