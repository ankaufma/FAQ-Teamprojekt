function sendFormular()
{
	
	
	alert("Jetzt sind wir im Senden der Mail");
	
	
	mail('gipiras@htwg-konstanz.de', 'Mein Betreff', 'Testmail');
	m = new SendMail();
	m.To = 'gipiras@htwg-konstanz.de';
	m.From = 'Contact';
	m.Body = 'bla bla bla';
	m.send();

	if(m.errorCode() != 0)
	{ write('Fehler aufgetreten: '+m.errorMessage()); }
	else
	{ write('Die Mail wurde erfolgreich versandt.'); }
}