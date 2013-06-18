
$(function ()  
		{ 
			$("#aboutPopover").popover();  
	});  


var show = false;

function NavTreeShowHide()
{
	if(show == true)
	{
		document.getElementById("NavTreeHideShow").innerHTML = "Hide Navigation Tree";
		show = false;
	}
	else
	{
		document.getElementById("NavTreeHideShow").innerHTML = "Show Navigation Tree";
		show = true;
	}
}
