DROP TABLE IF EXIST Employee;
DROP TABLE IF EXIST Company;
DROP TABLE IF EXIST Company;
DROP TABLE IF EXIST Wage;
DROP TABLE IF EXIST Hours;
DROP TABLE IF EXIST Job;
DROP TABLE IF EXIST NonProfit;
DROP TABLE IF EXIST NonProfitAccount;

CREATE TABLE Employee (
	email VARCHAR(45) UNIQUE NOT NULL,
	name VARCHAR(45) NOT NULL,
	password VARCHAR(30) NOT NULL,
	phoneNumber INT NOT NULL,
	job VARCHAR(100) NOT NULL,
	address VARCHAR(100) NULL,
	PRIMARY KEY (email),
	FOREIGN KEY (jobID) REFERENCES Job(jobID)
);

CREATE TABLE Company(
	companyID INT NOT NULL AUTO_INCREMENT,
	parentCompany VARCHAR(100) NULL,
	address VARCHAR(100) NOT NULL,
	PRIMARY KEY(companyID)
);

CREATE TABLE Wage(
	wageID INT NOT NULL AUTO_INCREMENT,
	payCheck INT NOT NULL,
	startDate DATE NOT NULL,
	endDate DATE NOT NULL,
	payDate DATE NOT NULL,
	PRIMARY KEY(wageID),
	FOREIGN KEY(jobID), REFERENCES Job(jobID)
);

CREATE TABLE Hours(
	hourID INT NOT NULL AUTO_INCREMENT,
	hourlyPay INT NOT NULL,
	hoursWorked INT NOT NULL
	startDate DATE NOT NULL,
	endDate DATE NOT NULL,
	PRIMARY KEY(hourID),
	FOREIGN KEY(jobID), REFERENCE Job(jobID)
);

CREATE TABLE Job(
	jobID INT NOT NULL AUTO_INCREMENT,
	jobTitle VARCHAR(100) NOT NULL,
	PRIMARY KEY(jobID),
	FOREIGN KEY(email), REFERENCES Employee(email),
	FOREIGN KEY(companyID) REFERENCES Company(companyID),
	FOREIGN KEY(wageID) REFERENCES Wage(wageID)
);

CREATE TABLE NonProfit(
	nonProfitName VARCHAR(45) UNIQUE NOT NULL,
	nonProfitEmail VARCHAR(45) NOT NULL,
	nonProfitNumber INT(20) NOT NULL,
	PRIMARY KEY (nonProfitName)
);

CREATE TABLE NonProfitAccount(
	userID INT NOT NULL AUTO_INCREMENT,
	nonProfitPassword VARCHAR(30) NOT NULL,
	PRIMARY KEY (userID)
);
