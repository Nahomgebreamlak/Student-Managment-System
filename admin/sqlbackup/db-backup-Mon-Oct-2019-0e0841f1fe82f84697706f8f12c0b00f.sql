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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=376 DEFAULT CHARSET=latin1;

INSERT INTO course VALUES("1","Introduction to software engineering","CSSE241","3","first","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("2","Basic Writing Skills","Flen201","3","first","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("3","Programming Fundamentals I","CSSE111","4","first","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("4","Calculus","MATH151","3","first","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("5","Hardware Basics and Troubleshooting","CSSE165","4","first","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("6","Object Oriented Programming using Java ","CSSE114","4","second","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("7","Programming Fundamentals II","CSSE112","4","second","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("8","Computer Networks","CSSE162","4","second","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("9","Civics and Ethical Education","CEED201","3","second","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("10","Discrete Mathematics & Combinatory","MATH281","3","second","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("11","Webpage Design and Development ","CSSE233","3","second","Engineering","Software Engineering","1","","RE");
INSERT INTO course VALUES("12","Data Structures and Algorithms analysis","CSSE225","4","first","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("13","Spoken and Written Communication","Flen202","3","first","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("14","Database Design and Development","CSSE231","4","first","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("15","Entrepreneurship","MGMT331","3","first","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("16","Computer Architecture and Organization","CSSE262","3","first","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("17","Advanced Java programming","CSSE212","4","second","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("18","Numerical Analysis","Math284","3","second","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("19","Rapid Application Development","CSSE214","3","second","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("20","Digital Logic Design","EENG282","3","second","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("21","Probability and Statistics","STAT271","3","second","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("22","Project-I","CSSE282","3","second","Engineering","Software Engineering","2","","RE");
INSERT INTO course VALUES("23","Object-oriented Software Engineering","CSSE341","3","first","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("24","Introduction to Formal Languages & Automata","CSSE353","3","first","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("25","Advanced Webpage design & Development ","CSSE335","4","first","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("26","Principles of Operating systems","CSSE365","3","first","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("27","User Interface Design","CSSE314","3","first","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("28","Introduction to logic","GeED104","3","first","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("29","Introduction to Complexity Theory","CSSE354","3","second","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("30","Artificial Intelligence","CSSE378","3","second","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("31","Information & Computer Security","CSSE366","4","second","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("32","Software Project Management","CSSE342","3","second","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("33","Project-II","CSSE382","3","second","Engineering","Software Engineering","3","","RE");
INSERT INTO course VALUES("34","Client Server Computing","CSSE435","3","first","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("35","Software Testing","CSSE443","3","first","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("36","Advanced Programming in Java","CSSE455","4","first","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("37","Service Oriented Architecture","CSSE473","3","first","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("38","Extreme Programming","CSSE415","4","first","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("39","Embedded Systems","CSSE412","3","second","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("40","Software Quality Assurance","CSSE444","3","second","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("41","Mobile Programming","CSSE456","5","second","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("42","Real time systems","CSSE434","3","second","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("43","Research Methods","MGMT401","3","second","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("44","Senior Project","CSSE484","3","second","Engineering","Software Engineering","4","","RE");
INSERT INTO course VALUES("90","Principles of Accounting- I","ACFN 2011","4","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("91","Basic Writing Skills","ENLA 2241","3","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("92","Introduction to Management  ","MGMT 2101","3","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("93","Micro Economics- I","ECON2111","3","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("94","Mathematics for Accounting and Finance","ACFN 2021","3","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("95","Fundamentals of Information Systems","COMP 2211","3","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("96","Principles of Accounting- II","ACFN 2012","4","first","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("97"," Statistics for Accounting and Finance","ACFN 2022","3","second","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("98","Civics and Ethical Education","CVET 2222","3","second","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("99","Micro Economics- II","ECON 2112","3","second","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("100","Principles of Marketing","MGMT 2122","3","second","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("101","General Psychology ","GPSY 2232","3","second","Business & Economics","Accounting and Finance","1","","RE");
INSERT INTO course VALUES("102","Financial Accounting- I","ACFN 3011","4","first","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("103","Cost and Management Accounting- I ","ACFN 3021","3","first","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("104","Risk Management and Insurance ","ACFN 3071","3","first","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("105","Financial Market and Institutions ","ACFN 3041","3","first","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("106","Financial Management- I","ACFN 3031","3","first","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("107","Business Communication and Administration","MGMT212","3","first","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("108","Financial Accounting- II","ACFN 3012","4","second","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("109","Cost and Management Accounting- II ","ACFN 3022","3","second","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("110","Financial Management- II","ACFN 3032","3","second","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("111","Government & NFP Accounting","ACFN 3052","3","second","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("112","Business Law","BLAW4151","3","second","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("113","Research Methods in accounting and Finance ","ACFN 3082","3","second","Business & Economics","Accounting and Finance","2","","RE");
INSERT INTO course VALUES("114","Auditing Principles and Practice- I","ACFN 4011","3","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("115","Advanced Accounting ","ACFN 4031","4","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("116","Accounting Information system ","ACFN 4041","2","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("117","Public Finance and Taxation","ACFN 4021","3","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("118","Entrepreneurship and Small Business Management","MGMT3131","2","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("119","Banking Practice and Principles ","ACFN 3062","2","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("120","Project Analysis and Management   ","ACFN 4052","3","first","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("121","Auditing Principles and Practice-II","ACFN 4012","3","second","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("122","Operations Management","MGMT 4141","3","second","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("123","Computerized Accounting","ACFN 4042","2","second","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("124","Investment Analysis and Management","ACFN 4072","3","second","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("125","Senior project in Accounting and Finance ","ACFN4082","3","second","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("126","Strategic Management","MGMT 4152","3","second","Business & Economics","Accounting and Finance","3","","RE");
INSERT INTO course VALUES("128","Introduction to Management  ","MGMT","3","first","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("129","Micro Economics- I","ECON231","3","first","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("164","Introduction to Management Information Systems","MGIS101","3","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("165","Principles of Accounting I","ACCT101","3","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("168","Micro Economics ","ECON111","3","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("169","Introduction to Management","MGMT111","3","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("171","Principles of Accounting II","ACCT102","3","second","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("172","Mathematics for Management ","MGMT221","3","second","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("175","Environmental Studies","GeED103","3","second","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("176","Human Resources Management","MGMT225","3","first","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("177","System Analysis and Design","MGIS227","3","first","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("178","Statistics for Management ","MGMT223","3","first","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("179","Decision Support Systems","MGIS332","3","second","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("180","Risk Management and Insurance","MGMT264","3","second","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("181","Data Structures and Algorithms analysis","CSSE226","3","second","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("182","E-commerce","MGIS224","3","second","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("183","Webpage Design and Development","CSSE236","3","second","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("184","Operations  Research","MGMT341","3","first","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("185","Introduction to Information Storage & Retrieval","MGIS333","3","first","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("187","Organizational and Societal Behavior","MGMT351 ","3","first","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("188","Business Law","BUSL313","3","first","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("189","Strategic Management","MGMT362 ","3","second","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("190","Information Systems Project Management","MGIS344","3","second","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("191","Principles of Marketing ","MGMT342","3","second","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("192","Entrepreneur and Small Business Management","MGMT326","3","second","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("193","Final Project","MGIS398","3","second","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("206","Statistics for Management ","MGMT323","3","first","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("209","Organizational and Societal Behavior","MGMT352 ","3","second","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("211","System Analysis and Design","MGIS222","3","second","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("212","Risk Management and Insurance","MGMT361","3","second","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("213","Business Law","BUSL311","3","summer","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("217","Webpage Design and Development","CSSE234","3","first","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("219","Materials Management","MGMT431","3","first","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("220","Principles of Accounting- I","ACFN 2011","4","first","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("221","Basic Writing Skills","ENLA 2241","3","first","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("222","Principles of Accounting- II","ACFN 2012","4","second","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("223","Micro Economics- II","ECON 2112","3","second","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("224","Mathematics for Accounting and Finance","ACFN 2021","3","second","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("225","Civics and Ethical Education","CVET 2222","3","second","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("226","Principles of Marketing","MGMT 2122","3","summer","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("227","Fundamentals of Information Systems","COMP 2211","3","summer","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("228","Statistics for Accounting and Finance","ACFN 2022","3","summer","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("229","General  psychology","COMP 2211","3","summer","Business & Economics","Accounting and Finance","1","","EX");
INSERT INTO course VALUES("230","Financial Accounting- I","ACFN 3011","4","first","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("231","Cost and Management Accounting- I ","ACFN 3021","3","first","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("232","Financial Management- I","ACFN 3031","3","first","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("233","Business Communication","MGMT212","3","first","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("234","Financial Accounting- II","ACFN 3012","4","second","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("235","Cost and Management Accounting- II ","ACFN 3022","3","second","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("236","Financial Management- II","ACFN 3032","3","second","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("237","Risk Management and Insurance ","ACFN 3071","3","second","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("238","Financial Market and Institutions ","ACFN 3041","3","summer","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("239","Business Law","BLAW4151","3","summer","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("240","Government & NFP Accounting","ACFN 3052","3","summer","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("241","Research Methods in accounting and Finance ","ACFN 3082","3","summer","Business & Economics","Accounting and Finance","2","","EX");
INSERT INTO course VALUES("242","Auditing Principles and Practice- I","ACFN 4011","3","first","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("243","Advanced Accounting ","ACFN 4031","4","first","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("244","Project Analysis and Management   ","ACFN 4052","3","first","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("245","Public Finance and Taxation","ACFN 4021","3","first","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("246","Auditing Principles and Practice-II","ACFN 4012","3","second","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("247","Computerized Accounting","ACFN 4042","2","second","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("248","Banking Practice and Principles ","ACFN 3062","2","second","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("249","Accounting Information system ","ACFN 4041","2","second","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("250","Strategic Management","MGMT 4152","3","second","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("251","Investment Analysis and Management","ACFN 4072","3","summer","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("252","Senior project in Accounting and Finance ","ACFN4082","3","summer","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("253","Entrepreneurship and Small Business Management","MGMT3131","2","summer","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("254","Operations Management","MGMT 4141","3","summer","Business & Economics","Accounting and Finance","3","","EX");
INSERT INTO course VALUES("255","Sophomore English","FLEN201","3","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("256","Programming Fundamentals ","CSSE111","4","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("257","Civic and Ethical Education","CEED201","3","second","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("258","Object Oriented Programming using Java ","CSSE214","3","first","Engineering","Management Information ","2","","RE");
INSERT INTO course VALUES("259","Materials Management","MGMT331","3","first","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("260","Introduction to Management Information Systems","MGIS101","3","first","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("261","Principles of Accounting I","ACCT101","3","first","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("262","Hardware Basics and Troubleshooting","CSSE165","4","first","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("263","Introduction to Management","MGMT111","3","first","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("264","Sophomore English","FLEN201","3","second","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("265","Programming Fundamentals ","CSSE111","4","second","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("266","Computer Networks","CSSE162","3","second","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("267","Mathematics for Management ","MGMT221","3","summer","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("268","Micro Economics ","ECON111","3","summer","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("269","Civic and Ethical Education","CEED201","3","summer","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("270","Object Oriented Programming using Java ","CSSE214","4","summer","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("271","Introduction to logic	","GeED104","3","first","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("272","Human Resources Management","MGMT221","3","first","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("273","Data Structures and Algorithms analysis","CSSE226","3","first","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("274","Database Design and Development","CSSE231","3","second","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("275","Principles of Operating Systems ","CSSE365","3","summer","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("276","Environmental Studies","GeED103","3","summer","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("277","Principles of Marketing ","MGMT341","3","summer","Engineering","Management Information ","2","","EX");
INSERT INTO course VALUES("278","Rapid Application Development","CSSE214","3","first","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("279","E-commerce","MGIS224","3","first","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("280","Information & Computer Security","CSSE366","3","second","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("281","Decision Support Systems","MGIS332","3","second","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("282","Entrepreneur and Small Business Management","MGMT326","3","second","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("283","Introduction to Information Storage & Retrieval","MGIS333","3","second","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("284","Information Systems Project Management","MGIS344","3","summer","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("285","Operations  Research","MGMT341","3","summer","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("286","Strategic Management","MGMT362","3","summer","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("287","Final Project","MGIS398","3","summer","Engineering","Management Information ","3","","EX");
INSERT INTO course VALUES("288","Introduction to software engineering","CSSE241","3","first","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("289","Calculus","MATH151","4","first","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("290","Basic Writing Skills","Flen201","3","second","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("291","Programming Fundamentals I","CSSE111","4","second","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("292","Discrete Mathematics & Combinatory","Math 281","3","second","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("293","Object Oriented Programming using Java ","CSSE114","4","summer","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("294","Programming Fundamentals II","CSSE112","4","summer","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("295","Civics and Ethical Education","CEED 201","3","summer","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("296","Webpage Design and Development ","CSSE233","3","first","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("297","Computer Architecture and Organization","CSSE262","3","first","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("298","Data Structures and Algorithms analysis","CSSE225","4","first","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("299","Entrepreneurship","MGMT331","3","first","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("300","Digital Logic Design","EENG282","3","second","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("301","Advanced Java programming","CSSE212","3","second","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("302","Spoken and Written Communication","Flen202","3","second","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("303","Numerical Analysis","Math284","3","summer","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("304","Probability and Statistics","STAT271","3","summer","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("305","Object-oriented Software Engineering","CSSE341","3","summer","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("306","Advanced Webpage design & Development ","CSSE335","3","first","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("307","Project-I","CSSE282","3","first","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("308","Introduction to logic","GeED104","3","first","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("309","Introduction to Formal Languages & Automata","CSSE353","3","second","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("310","Introduction to Complexity Theory","CSSE354","3","second","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("311","Artificial Intelligence","CSSE378","3","second","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("312","user  interface design ","CSSE314","3","second","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("313","Embedded Systems","CSSE412","3","summer","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("314","Software Project Management","CSSE342","3","summer","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("315","Project-II","CSSE382","3","first","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("316","Hardware Basics and Troubleshooting","CSSE165","4","first","Engineering","Software Engineering","1","","EX");
INSERT INTO course VALUES("317","Database Design and Development","CSSE231","4","second","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("318","Rapid Application Development","CSSE214","3","summer","Engineering","Software Engineering","2","","EX");
INSERT INTO course VALUES("319","Principles of Operating systems","CSSE365","3","first","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("320","Information & Computer Security","CSSE366","4","summer","Engineering","Software Engineering","3","","EX");
INSERT INTO course VALUES("321","Software Project Management","CSSE342","3","first","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("322","Client Server Computing","CSSE435","3","first","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("323","Service Oriented Architecture","CSSE473","3","first","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("324","Advanced Programming in Java","CSSE455","4","second","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("325","Software Testing","CSSE443","3","second","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("326","Software Quality Assurance","CSSE444","3","second","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("327","Research Methods","MGMT401","3","second","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("328","Extreme Programming","CSSE415","4","summer","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("329","Mobile Programming","CSSE456","3","summer","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("330","Real time systems","CSSE434","3","summer","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("331","Senior Project","CSSE484","3","summer","Engineering","Software Engineering","4","","EX");
INSERT INTO course VALUES("332","Principles of Accounting- I","ACFN 2011","4","first","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("333","Introduction to Management  ","MGMT","3","first","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("334","Micro Economics- I","ECON231","3","first","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("335","Basic Writing Skills","ENLA 2241","3","first","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("336","Principles of Accounting- II","ACFN 2012","4","second","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("337","Micro Economics- II","ECON 2112","3","second","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("338","Mathematics for Accounting and Finance","ACFN 2021","3","second","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("339","Civics and Ethical Education","CVET 2222","3","second","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("340","Principles of Marketing","MGMT 2122","3","summer","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("341","Fundamentals of Information Systems","COMP 2211","3","summer","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("342","Statistics for Accounting and Finance","ACFN 2022","3","summer","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("343","General  psychology","COMP 2211","3","summer","Business & Economics","Accounting and Finance","1","","WE");
INSERT INTO course VALUES("344","Financial Accounting- I","ACFN 3011","4","first","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("345","Cost and Management Accounting- I ","ACFN 3021","3","first","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("346","Financial Management- I","ACFN 3031","3","first","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("347","Business Communication","MGMT212","3","first","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("348","Financial Accounting- II","ACFN 3012","4","second","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("349","Cost and Management Accounting- II ","ACFN 3022","3","second","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("350","Financial Management- II","ACFN 3032","3","second","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("351","Risk Management and Insurance ","ACFN 3071","3","second","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("352","Financial Market and Institutions ","ACFN 3041","3","summer","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("353","Business Law","BLAW4151","3","summer","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("354","Government & NFP Accounting","ACFN 3052","3","summer","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("355","Research Methods in accounting and Finance ","ACFN 3082","3","summer","Business & Economics","Accounting and Finance","2","","WE");
INSERT INTO course VALUES("356","Auditing Principles and Practice- I","ACFN 4011","3","first","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("357","Advanced Accounting ","ACFN 4031","4","first","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("358","Project Analysis and Management   ","ACFN 4052","3","first","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("359","Public Finance and Taxation","ACFN 4021","3","first","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("360","Auditing Principles and Practice-II","ACFN 4012","3","second","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("361","Computerized Accounting","ACFN 4042","2","second","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("362","Banking Practice and Principles ","ACFN 3062","2","second","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("363","Accounting Information system ","ACFN 4041","2","second","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("364","Strategic Management","MGMT 4152","3","second","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("365","Investment Analysis and Management","ACFN 4072","3","summer","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("366","Senior project in Accounting and Finance ","ACFN4082","3","summer","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("367","Entrepreneurship and Small Business Management","MGMT3131","2","summer","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("368","Operations Management","MGMT 4141","3","summer","Business & Economics","Accounting and Finance","3","","WE");
INSERT INTO course VALUES("369","Hardware Basics and Troubleshooting","CSSE165","4","first","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("370","Computer Networks","CSSE162","3","second","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("371","Introduction to logic","GeED104","3","second","Engineering","Management Information ","1","","RE");
INSERT INTO course VALUES("372","Principles of Operating Systems ","CSSE365","3","first","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("373","Information & Computer Security","CSSE366","3","second","Engineering","Management Information ","3","","RE");
INSERT INTO course VALUES("374","Principles of Accounting II","ACCT102","3","second","Engineering","Management Information ","1","","EX");
INSERT INTO course VALUES("375","Statistics for Accounting and Finance","ACFN 2022","3","second","Business & Economics","Accounting and Finance","1","","RE");



DROP TABLE department;

CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(255) NOT NULL,
  `facultyname` varchar(255) NOT NULL,
  `snamedep` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departmentname` (`departmentname`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO department VALUES("1","Software Engineering","Engineering","SOF");
INSERT INTO department VALUES("2","Management Information ","Engineering","MAN");
INSERT INTO department VALUES("3","Accounting and Finance","Business","ACC");



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO faculty VALUES("1","Engineering");
INSERT INTO faculty VALUES("2","Business & Economics");



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE section;

CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO section VALUES("2","A");
INSERT INTO section VALUES("3","B");
INSERT INTO section VALUES("4","C");



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
  `section` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sid` (`sid`),
  UNIQUE KEY `sid_2` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO year VALUES("1","2009");
INSERT INTO year VALUES("2","2010");



