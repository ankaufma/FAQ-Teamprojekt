INSERT INTO User (username, email, firstname, lastname, password, userrole) VALUES 
	('ankaufma', 'ankaufma@htwg-konstanz.de', 'Andreas', 'Kaufmann', 'Test', 'Admin');
INSERT INTO User (username, email, firstname, lastname, password, userrole) VALUES 
	('gipiras', 'gipiras@htwg-konstanz.de', 'Gian-Luca', 'Piras', 'Test', 'User');
INSERT INTO User (username, email, firstname, lastname, password, userrole) VALUES 
	('thwinter', 'thwinter@htwg-konstanz.de', 'Thomas', 'Winter', 'Test', 'User');
INSERT INTO User (username, email, firstname, lastname, password, userrole) VALUES 
	('hacifci', 'hacifci@htwg-konstanz.de', 'Hasan', 'Civci', 'Test', 'User');

INSERT INTO Answer (Answer, User) VALUES 
	('Das ist die beste Antowrt überhaupt...', (SELECT userid from user where username='ankaufma'));
INSERT INTO Answer (Answer, User) VALUES 
	('Ok, die hier ist auch gut', (SELECT userid from user where username='ankaufma'));
INSERT INTO Answer (Answer, User) VALUES 
	('Gibt es eine Möglichkeit ohne Trigger zu überprüfen, ob die Antwort von einem User mit der Userrole "Admin" kommt?', (SELECT userid from user where username='ankaufma'));

INSERT INTO Comment (Comment, User, Answer) VALUES 
	('Schreib doch selber was rein...!', (SELECT userid from user where username='ankaufma'), (SELECT min(answerid) from Answer));
INSERT INTO Comment (Comment, User, Answer) VALUES 
	('Schreib doch selber was rein...!', (SELECT userid from user where username='ankaufma'), (SELECT max(answerid) from Answer));
INSERT INTO Comment (Comment, User, Answer) VALUES 
	('Hallo Welt...!', (SELECT userid from user where username='ankaufma'), (SELECT max(answerid) from Answer));

INSERT INTO Question (question, language, PublicityState, user) values 
	('Gibt es eine Möglichkeit ohne Trigger zu überprüfen, ob die Antwort von einem User mit der Userrole Admin kommt?', 'German', 'public', (SELECT userid from user where username='ankaufma'));
INSERT INTO Question (question, language, PublicityState, user) values 
	('Wie jetzt häää??', 'English', 'public', (SELECT userid from user where username='gipiras'));
	
INSERT INTO Category (CategoryName) values 
	('Programmiersprachen');
INSERT INTO Category (CategoryName, PreCategory) values 
	('Java', 1);
INSERT INTO Category (CategoryName, PreCategory) values 
	('C##', 1);
INSERT INTO Category (CategoryName, PreCategory) values 
	('C#', 1);
INSERT INTO Category (CategoryName, PreCategory) values 
	('PHP', 1);
INSERT INTO Category (CategoryName, PreCategory) values 
	('DeineJavaKategorie1', 2);
INSERT INTO Category (CategoryName, PreCategory) values 
	('DeineJavaKategorie2', 2);
	
INSERT INTO CatQuestion VALUES ((SELECT max(CategoryID) from Category), (Select min(questionid) from question));
INSERT INTO CatQuestion VALUES ((SELECT max(CategoryID) from Category), (Select max(questionid) from question));

INSERT INTO Rating (Rating, User, Answer) Values (8, (Select max(userid) from user), (select max(answerid) from answer));
INSERT INTO Rating (Rating, User, Answer) Values (9, (Select min(userid) from user), (select min(answerid) from answer));

INSERT INTO QuestionAnswer VALUES ((select min(questionid) from question), (select max(answerid) from answer), 'jaja, die gehören auch iwie zusammen');