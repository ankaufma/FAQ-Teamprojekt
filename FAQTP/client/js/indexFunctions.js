
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
function BtnAnswerShowHide() {
	
	if(showAnswers == true) {
		document.getElementById("BtnAnswerHideShow").innerHTML="Show Answers";
		showAnswers = false;
	}
	else{
		document.getElementById("BtnAnswerHideShow").innerHTML="Hide Answers";
		showAnswers = true;
	}
	
}

var showComments = false;
function BtnCommentsHideShow() {
	
	if(showComments == true) {
		document.getElementById("BtnCommentsHideShow").innerHTML="Show Comments";
		showComments = false;
	}
	else{
		document.getElementById("BtnCommentsHideShow").innerHTML="Hide Comments";
		showComments = true;
	}
	
	
}
