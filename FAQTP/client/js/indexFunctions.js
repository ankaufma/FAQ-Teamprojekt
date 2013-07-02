
$(function ()  
		{ 
			$("#aboutPopover").popover();  
	});  


var showNavTree = false;
function NavTreeShowHide()
{	
	
	if(showNavTree == true)
	{
		document.getElementById("NavTreeHideShow").innerHTML = "Hide Navigation Tree";
		showNavTree = false;
	}
	else
	{
		document.getElementById("NavTreeHideShow").innerHTML = "Show Navigation Tree";
		showNavTree = true;
	}
}

var showAnswers = false;
function BtnAnswerShowHide(id) {
	
	console.log(id);
	
	if(showAnswers == true) {
		document.getElementById(id).innerHTML="Show Answers";
		showAnswers = false;
	}
	
	else{
		document.getElementById(id).innerHTML="Hide Answers";
		showAnswers = true;
	}
	
}

var showComments = false;
function BtnCommentsHideShow(id) {
	
	console.log(id);
	
	if(showComments == true) {
		document.getElementById(id).innerHTML="Show Comments";
		showComments = false;
	}
	else{
		document.getElementById(id).innerHTML="Hide Comments";
		showComments = true;
	}
	
	
}
