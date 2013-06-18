$(function ()  
		{ 
			$("#aboutPopover").popover();  
		});  


function hideShowNavTree() {
	
	if(document.getElementByID("NavTreeHide")style.visibility == 'hidden') {
		document.getElementByID("NavTreeHide")style.visibility == 'show';
		document.getElementByID("NavTreeShow")style.visibility == 'hidden';
	}
	else {
		document.getElementByID("NavTreeHide")style.visibility == 'hidden';
		document.getElementByID("NavTreeShow")style.visibility == 'show';
	}
		
	
}