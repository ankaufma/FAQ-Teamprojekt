function sendFormular()
{

	var texteingabe = document.ContactFormular.textfeld.value;

	m = new SendMail();
	m.To = '<empfaengerName>@<domain>.<end>';
	m.From = '<absenderName>@<domain>.<end>';
	m.Subject = 'FAQ Manager - Contact Message';
	m.Body = texteingabe;
	m.send();

	if(m.errorCode() != 0)
	{ write('Transaction failed: ' + m.errorMessage()); }
	else
	{ write('The mail was sent correctly.'); }
}