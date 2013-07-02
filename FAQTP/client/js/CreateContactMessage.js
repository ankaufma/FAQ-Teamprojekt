function sendFormular()
{
	
	
	alert("Jetzt sind wir im Senden der Mail");
	
	
	
	m = new SendMail();
	m.To = 'thwinter@htwg-konstanz.de';
	m.From = 'Contact';
	m.Body = 'bla bla bla';
	m.send();

	if(m.errorCode() != 0)
	{ write('Fehler aufgetreten: '+m.errorMessage()); }
	else
	{ write('Die Mail wurde erfolgreich versandt.'); }
}