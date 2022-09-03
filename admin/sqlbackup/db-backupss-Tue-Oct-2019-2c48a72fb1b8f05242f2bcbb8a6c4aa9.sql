DROP TABLE course;

CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `ccode` varchar(255) NOT NULL,
  `credithours` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `tyear` varchar(255) NOT NULL,
  `prirequest` varchar(255) NOT NULL,
  `admission` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ccode` (`ccode`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO course VALUES("32","sfa","adas","3","first","Informatics ","computer science","1","","RE");



DROP TABLE department;

CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(255) NOT NULL,
  `facultyname` varchar(255) NOT NULL,
  `snamedep` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departmentname` (`departmentname`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;




DROP TABLE dropedcourse;

CREATE TABLE `dropedcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) NOT NULL,
  `Coursecode` varchar(255) NOT NULL,
  `ayear` varchar(255) NOT NULL,
  `Cyear` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `faculityname` varchar(255) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE exempted;

CREATE TABLE `exempted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) NOT NULL,
  `Coursecode` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `Cyear` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `ayear` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE faculty;

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facultyname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;




DROP TABLE grade;

CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Agrade` varchar(255) NOT NULL,
  `Ngrade` float NOT NULL,
  `courseid` varchar(255) NOT NULL,
  `Acyear` varchar(255) NOT NULL,
  `SID` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `classyear` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18068 DEFAULT CHARSET=latin1;




DROP TABLE student;

CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `DBdate` varchar(255) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Contactno` varchar(255) NOT NULL,
  `Typeofenrollment` varchar(255) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Civilstatus` varchar(255) NOT NULL,
  `Gradianname` varchar(255) NOT NULL,
  `Gardiancontact` varchar(255) NOT NULL,
  `req1` int(11) NOT NULL,
  `req2` int(11) NOT NULL,
  `req3` int(11) NOT NULL,
  `req4` int(11) NOT NULL,
  `req5` int(11) NOT NULL,
  `tenthgraderesult` varchar(255) NOT NULL,
  `twelivethgraderesult` varchar(255) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `sex` char(5) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `scurrentyear` int(11) NOT NULL,
  `scurrentsemester` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sid` (`sid`),
  UNIQUE KEY `sid_2` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=latin1;




DROP TABLE takencourses;

CREATE TABLE `takencourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(255) NOT NULL,
  `Coursecode` varchar(255) NOT NULL,
  `Semester` varchar(255) NOT NULL,
  `Cyear` varchar(255) NOT NULL,
  `faculityname` varchar(255) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `ayear` varchar(255) NOT NULL,
  `exempted` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;




DROP TABLE user;

CREATE TABLE `user` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Rname` varchar(255) NOT NULL,
  `Role` varchar(100) NOT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","Nahom","30eea35a0d3a7d5d5bee4d1ac6cc36d96ffb1598","Nahom","admin");
INSERT INTO user VALUES("3","Nahom","1f5d553792681cecf34bd6f685927ac9133c897b","Nahoma","admin");



DROP TABLE year;

CREATE TABLE `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO year VALUES("1","2011");
INSERT INTO year VALUES("2","2012");
INSERT INTO year VALUES("3","2019");
INSERT INTO year VALUES("4","2020");
INSERT INTO year VALUES("5","2050");



