

CREATE TABLE `configuration` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO configuration VALUES("1","salestock","Show only Products having Stock in Sales Billing","1");
INSERT INTO configuration VALUES("2","purchasereturnstock","Show only Products having Stock in Purchase Return","1");
INSERT INTO configuration VALUES("3","showstockinsale","Show Stock available in Sales Billing","1");
INSERT INTO configuration VALUES("4","salebillfooter","Show Footer content in Sales Billing Print","&nbsp;");
INSERT INTO configuration VALUES("5","salebillfooterright","Show Footer content in Rightside of Sales Billing Print","For M/s. Yashoda Garden	 <br><br>( Competent Person )");
INSERT INTO configuration VALUES("6","SALEBILLFORMAT","","RABI");
INSERT INTO configuration VALUES("7","ADJUST SRETURN IN LEDGER","","NO");
INSERT INTO configuration VALUES("8","salebillfooter_notused","Show Footer content in Sales Billing Print","<b>Bank: Union Bank of India. <br>
A/c. No.: 302001010033381<br>
IFSC Code: UBIN0530204<br>
Branch: Main Branch , Choudhury Bazar, Cuttack</b>
");
INSERT INTO configuration VALUES("9","AUTOBACKUP","AUTOBACKUP","1");
INSERT INTO configuration VALUES("10","last_backup_date","","2023-02-23");



CREATE TABLE `info` (
  `id_info` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL COMMENT 'address1',
  `phone` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `lst` varchar(50) NOT NULL,
  `cst` varchar(50) NOT NULL,
  `panno` varchar(35) NOT NULL,
  `tanno` varchar(35) NOT NULL,
  `email` text NOT NULL,
  `membercode` varchar(50) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `flicence` varchar(40) NOT NULL,
  `dlicence` varchar(40) NOT NULL,
  `gstdate` date DEFAULT NULL,
  `tin` varchar(50) NOT NULL,
  `start_date` date NOT NULL COMMENT 'start date',
  `end_date` date NOT NULL COMMENT 'end date',
  `status` int(11) NOT NULL,
  `adhar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO info VALUES("1","yashoda22","Mata Rani","SRIKRISHNA VIHAR, 42 Mouza, Jhinkiria, CUTTACK-754112","9658999915/16","Subrat Kumar Dutta","Cuttack","Odisha","India","","","","","gardenyashoda@gmail.com","","21ABHFM2399G1Z9","","","2022-06-01","","2022-04-01","2023-03-31","0","");



CREATE TABLE `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_module`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO module VALUES("1","roomcategory","0","","0","2021-04-24 22:28:52","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("2","room","0","","0","2021-04-24 22:28:59","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("3","mode","0","","0","2021-04-24 22:29:55","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("4","bill","0","","0","2021-04-24 22:30:11","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("5","corporate","0","","0","2021-04-24 22:30:30","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("6","taxmaster","0","","0","2021-04-24 22:31:03","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("26","accounts","0","","0","2022-09-07 21:04:05","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("27","group","0","","0","2022-09-07 21:04:05","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("28","head","0","","0","2022-09-07 21:04:30","0","0000-00-00 00:00:00");
INSERT INTO module VALUES("29","voucher","0","","0","2022-09-07 21:04:30","0","0000-00-00 00:00:00");



CREATE TABLE `module_map` (
  `id_module_map` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_module_map`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `permission` (
  `id_permission` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_permission`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT 'template name',
  `values` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_approve` tinyint(1) DEFAULT 0,
  `random` varchar(32) NOT NULL,
  `status` varchar(100) NOT NULL,
  `login_status` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(30) NOT NULL,
  `password_date` date DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","admin","74812dc69ce1480150f8aebed59c3d0b","Administrator","admin@smsys.com","0","","0","1","1","0","2022-12-10 22:42:39","1","2020-11-19 02:12:38","","");
INSERT INTO user VALUES("5","Executive 1","a9eb8bd58a6fc8a041779309bf4fc329","Executive 1","","0","","","1","0","1","2022-07-28 10:40:38","1","0000-00-00 00:00:00","49.37.45.162","");
INSERT INTO user VALUES("6","Executive 2","feadceb3ecc99b9a78148e6a3917ea0c","Executive 2","","0","","","1","0","1","2022-07-28 07:25:38","1","0000-00-00 00:00:00","49.37.45.162","");
INSERT INTO user VALUES("7","mohan","52de2402aadc16c7f1969830cc0e10b5","","","1","","0","1","1","0","2023-02-23 21:19:21","1","2020-11-19 02:12:38","","");



CREATE TABLE `yashoda22__agreement` (
  `id_agreement` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`id_agreement`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO yashoda22__agreement VALUES("1","<p class="MsoNormal" style="text-align: center;"><font size="6"><b>M/S YASHODA GARDEN</b></font></p><p class="MsoNormal" style="text-align: center;"><font size="3"><b>SRIKRISHNA VIHAR, 42MOUZA, CUTTACK</b></font></p><p class="MsoNormal" style="text-align: center;"><font size="3">==============================================================================</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Name :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Address :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3"><br></font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Function Date :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Reference No. :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Final Amount :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Advance Amount :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Floor :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">Mode of Cooking :</font></p><p class="MsoNormal" style="text-align: left;"><font size="3">No. of People :</font></p><p class="MsoNormal" style="text-align: left;"><span style="font-size: medium; text-align: center;">==============================================================================</span><font size="3"><br></font></p><p class="MsoNormal"><span style="font-size: medium;"><b>Terms and Conditions :-</b></span><br></p><ul><li style="text-align: justify;">

For booking of Mandap or Banquets Hall / Rooms an advance
payment of 30% has to be made depending on the availability of the Mandap on
that particular date. Balance and final payment is to be made by the
client/party at least 10 days prior to the function.</li><li style="text-align: justify;">In case of cancellation of booking, no request for refund of
booking amount will be entertained withsoever.</li><li style="text-align: justify;">For operating high decibel sound systems and bursting of
crackers all the necessary permission / license has to be obtained by the
party/client from the concerned local authorities/district administration. We
shall not permit use of high decibel sound system beyond permissible limits and
time.</li><li style="text-align: justify;">Any other statutory license / permission as required under
the law shall have to be obtained by the client from the concerned authorities.</li><li style="text-align: justify;">The client/party has to make a security as fixed by the Mandap
Management before the function. Any major damages caused to the Mandap and its
assets by the client/party or their guests will have to be borne by the
client/party.</li><li style="text-align: justify;">Strictly follow the Government guidelines at the time of
function.</li></ul><p class="MsoNormal" style="text-align: center;"><font size="6"><span style="font-weight: bolder;">M/S YASHODA GARDEN</span></font></p><p class="MsoNormal" style="text-align: center;"><font size="3"><span style="font-weight: bolder;">SRIKRISHNA VIHAR, 42MOUZA, CUTTACK</span></font></p><p class="MsoNormal" style="text-align: center;"><font size="3">==============================================================================</font><span style="font-size: medium; text-align: left;">&nbsp;:-</span></p><span style="font-size: medium;"><b>Facilities :-</b></span><div><font size="3">The following facilities&nbsp;will be provided on behalf of the Mandap.<br></font><br><ul><li style="text-align: justify;">Ac Banquet Hall of 500 Sqft (AC Service will be 5 hours during Program)</li><li style="text-align: justify;">Ac Rooms for Bride and Groom / 2 AC Rooms.</li><li style="text-align: justify;">Bedi space for ritual ceremony.</li><li style="text-align: justify;">Cushion chairs-50, Plastic chairts-50 and Round tables-5</li><li style="text-align: justify;">Backup Electricity.</li><li style="text-align: justify;">Security Personnel</li><li style="text-align: justify;">Fire fighting Systems</li><li style="text-align: justify;">CC TV Cameras</li><li style="text-align: justify;">Parking space of about 15000 Sqft</li><li style="text-align: justify;">Large Kitchen</li><li style="text-align: justify;">Open area</li><li style="text-align: justify;">5KW Power Supply</li></ul><div style="text-align: justify;"><br></div><div style="text-align: justify;">Note: In-house Decorator, outside decorator not allowed.</div>









</div>","1","::1","1","2022-06-30 12:49:13","1","2022-06-30 00:00:00");



CREATE TABLE `yashoda22__area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` text NOT NULL,
  `id_represent` int(11) NOT NULL,
  `id_zone` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__area VALUES("1","","All Areas","","34","1","0","117.203.221.222","1","2017-07-10 12:16:42","1","0000-00-00 00:00:00");



CREATE TABLE `yashoda22__banquet` (
  `id_banquet` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `roomnumber` varchar(30) NOT NULL,
  `kot` varchar(30) NOT NULL,
  `bill` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `proof` varchar(60) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `persons` int(11) NOT NULL,
  `rate` decimal(12,2) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `disc` double(12,2) NOT NULL,
  `discamt` double(12,2) NOT NULL,
  `goodsvalue` decimal(16,2) NOT NULL,
  `id_taxmaster` int(11) NOT NULL,
  `tax_per` double(12,2) NOT NULL,
  `gstamount` decimal(12,2) NOT NULL,
  `subtotal` double(16,2) NOT NULL,
  `mrno` varchar(20) NOT NULL,
  `mrdate` date NOT NULL,
  `mramount` double(12,2) NOT NULL,
  `round` double(12,2) NOT NULL,
  `total` decimal(16,2) NOT NULL,
  `remark` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `cancel_date` date DEFAULT NULL,
  `cancel_by` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_banquet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `yashoda22__book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `journal` tinyint(1) DEFAULT NULL,
  `id_head` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `yashoda22__corporate` (
  `id_corporate` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`id_corporate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `yashoda22__food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `no` text CHARACTER SET latin1 NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `remark` text CHARACTER SET latin1 NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(40) CHARACTER SET latin1 NOT NULL,
  `goodsvalue` decimal(15,2) NOT NULL,
  `id_taxmaster` int(11) NOT NULL,
  `gstper` decimal(8,2) NOT NULL,
  `gstamount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `yashoda22__group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gcode` varchar(4) DEFAULT NULL,
  `basic` tinyint(1) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__group VALUES("1","0001","CAPITAL ACCOUNT","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("2","0002","RESERVES AND SURPLUS","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("4","0004","CURRENT LIABILITIES","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("5","0005","SUSPENSE ACCOUNT","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("6","0006","FIXED ASSETS","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("7","0007","INVESTMENTS","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("8","0008","CURRENT ASSETS","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("9","0009","LOANS AND ADVANCES","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("10","0010","MISCELLANEOUS EXPENDITURE","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("11","0011","REVENUE","","1","0","0","","0","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("12","0015","SECURED LOANS","0003","1","3","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("13","0016","UNSECURED LOANS","0003","1","3","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("14","0017","BANK OVERDRAFT","0004","1","4","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("15","0018","DUTIES & TAXES","0004","1","4","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("16","0019","PROVISIONS","0004","1","4","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("17","0020","SUNDRY CREDITORS","0004","1","4","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("18","0021","SUNDRY DEBTORS","0008","1","8","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("19","0022","STOCK-IN-HAND","0008","1","8","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("20","0023","BANK ACCOUNTS","0008","1","8","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("21","0024","IMPREST CASH","0008","1","8","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("23","0026","ADVANCE","0009","1","9","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("24","0027","SECURITY DEPOSIT","0009","1","9","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("25","0028","SALES ACCOUNTS","0011","1","11","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("26","0029","PURCHASE ACCOUNTS","0011","1","11","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("27","0030","EXPENSES (DIRECT)","0011","1","11","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("28","0031","EXPENSES (INDIRECT)","0011","1","11","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("29","0032","OTHER INCOME","0011","1","11","0","","0","2015-12-17 10:35:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("53","","EMPLOYEE","","0","27","0","103.76.208.133","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("54","","DEPOSIT ACCOUNT","","0","24","0","103.76.208.133","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("55","","GST","","","15","0","103.76.208.133","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("56","","IGST","","","55","0","103.76.208.133","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("57","","SGST","","","55","0","49.37.45.250","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("58","","CGST","","","55","0","49.37.45.250","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("59","","TDS","","","15","0","202.168.86.16","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__group VALUES("60","","Transportation on Sales","","","28","0","27.122.61.94","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00");



CREATE TABLE `yashoda22__head` (
  `id_head` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `creditor` smallint(6) DEFAULT NULL,
  `debtor` smallint(6) DEFAULT NULL,
  `gcode` varchar(4) DEFAULT NULL,
  `id_group` int(11) NOT NULL,
  `opening_balance` double(16,2) DEFAULT NULL,
  `otype` varchar(1) DEFAULT NULL,
  `closing_balance` float(16,2) DEFAULT NULL,
  `address1` varchar(60) DEFAULT NULL,
  `contact_person` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `address2` varchar(60) DEFAULT NULL,
  `address3` varchar(60) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `credit_limit` float(16,2) DEFAULT NULL,
  `credit_days` float(16,2) DEFAULT NULL,
  `area` varchar(2) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `ost_no` varchar(60) DEFAULT NULL,
  `ost_date` date DEFAULT NULL,
  `cst_no` varchar(60) DEFAULT NULL,
  `cst_date` date DEFAULT NULL,
  `transport` varchar(20) DEFAULT NULL,
  `id_transport` int(11) NOT NULL,
  `banker` varchar(20) DEFAULT NULL,
  `station` varchar(20) DEFAULT NULL,
  `dlicence` varchar(20) DEFAULT NULL,
  `flicence` varchar(40) NOT NULL,
  `narration` text DEFAULT NULL,
  `billtrack` tinyint(1) DEFAULT NULL,
  `local` tinyint(1) DEFAULT NULL,
  `basic` tinyint(1) DEFAULT NULL,
  `consider` tinyint(1) DEFAULT NULL,
  `folio` float(7,2) DEFAULT NULL,
  `datebal` float(16,4) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  `scheme` varchar(1) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `vattype` varchar(4) DEFAULT NULL,
  `vatno` varchar(11) DEFAULT NULL,
  `panno` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) DEFAULT NULL,
  `adhar` varchar(30) DEFAULT NULL,
  `dealer` int(11) DEFAULT NULL COMMENT '0-Distributor/Retailer, 1-Super-Distributor',
  `prev_opening_balance` decimal(16,2) DEFAULT NULL,
  `acno` varchar(45) DEFAULT NULL,
  `acifsc` varchar(30) DEFAULT NULL,
  `acname` varchar(45) DEFAULT NULL,
  `actype` varchar(30) DEFAULT NULL,
  `id_represent` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `sotype` varchar(1) DEFAULT NULL,
  `sopening_balance` double(16,2) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `tanno` varchar(20) DEFAULT NULL,
  `tcsper` decimal(9,3) DEFAULT NULL,
  `tcs` int(11) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `statecode` varchar(2) DEFAULT NULL,
  `partyuser` varchar(20) DEFAULT NULL,
  `partypass` varchar(20) DEFAULT NULL,
  `id_so` int(11) DEFAULT NULL,
  `thisyear_target` int(11) DEFAULT NULL,
  `lastyear_target` int(11) DEFAULT NULL,
  `distance` varchar(10) DEFAULT NULL,
  `rcmper` decimal(9,3) DEFAULT NULL,
  `rcm` int(11) DEFAULT NULL,
  `approve` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_head`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__head VALUES("1","0001","SALES","0","0","0011","25","0.00","1","0.00","","","","","","","","","0.00","0.00","","0","","0000-00-00","","0000-00-00","","0","","","","","","0","0","1","0","0.00","9701.0000","0.00","","","","Tin","","","0","","0","2015-12-17 21:05:01","0","0000-00-00 00:00:00","0","","0","0.00","","","","","","0000-00-00","0000-00-00","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("2","0002","PURCHASES","0","0","0011","26","0.00","0","0.00","","","","","","","","","0.00","0.00","","0","","0000-00-00","","0000-00-00","","0","","","","","","0","0","1","0","0.00","1969.0000","0.00","","","","Tin","","","0","","0","2015-12-17 21:05:01","0","0000-00-00 00:00:00","0","","0","0.00","","","","","","0000-00-00","0000-00-00","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("3","0003","CASH","0","0","0008","8","0.00","0","0.00","","","","","","","","","0.00","0.00","","0","","0000-00-00","","0000-00-00","","0","","","","","","0","0","1","1","0.00","1969.0000","0.00","","","","Tin","","","0","","0","2016-04-28 21:26:54","0","0000-00-00 00:00:00","0","","0","0.00","","","","","","0000-00-00","0000-00-00","0","0.00","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("4","0004","STOCK","0","0","0008","8","0.00","0","0.00","","","","","","","","","0.00","0.00","","0","","0000-00-00","","0000-00-00","","0","","","","","","0","0","1","0","0.00","2015.0000","0.00","","","","","","","0","","0","2015-12-17 21:05:01","0","0000-00-00 00:00:00","0","","0","0.00","","","","","","","","","","","","","","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("5","0005","PROFIT & LOSS ACCOUNT","0","0","0002","2","0.00","0","0.00","","","","","","","","","0.00","0.00","","0","","0000-00-00","","0000-00-00","","0","","","","","","0","0","1","0","0.00","2015.0000","0.00","","","","","","","0","","0","2015-12-17 21:05:01","0","0000-00-00 00:00:00","0","","0","0.00","","","","","","","","","","","","","","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("6","0006","SUNDRIES","0","0","0010","10","0.00","0","0.00","","","","","","","","","0.00","0.00","","0","","0000-00-00","","0000-00-00","","0","","","","","","0","0","1","0","0.00","2015.0000","0.00","","","","Tin","","","0","","0","2015-12-17 21:05:01","0","0000-00-00 00:00:00","0","","0","0.00","","","","","","","","","","","","","","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("7","","Booking Account","","","","29","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.137.156","1","2022-09-26 05:06:05","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("8","","YASHODA GARDEN","1","","","20","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.137.156","1","2022-09-26 05:07:21","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("9","","Lipsa Panda","","1","","23","0.00","0","","","","","9437304016","","Auroundaya Market","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.146.202","1","2022-09-26 05:28:41","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("10","","SALARY","1","","","53","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.136.4","1","2022-09-27 12:08:56","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("11","","YASHODA GARDEN CA 33381","1","1","","20","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.136.4","1","2022-09-27 12:09:48","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("12","","loan account 9044","1","1","","12","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.248.21","1","2022-09-29 04:56:08","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("13","","Loan account 0085","1","1","","12","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.248.21","1","2022-09-29 04:56:41","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("14","","loan account 0028","1","1","","12","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.248.21","1","2022-09-29 04:57:23","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("15","","loan account 0098","1","1","","12","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.248.21","1","2022-09-29 04:57:55","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("16","","Electric Rent","1","1","","23","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.248.21","1","2022-09-29 05:01:48","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");
INSERT INTO yashoda22__head VALUES("17","","GST","","","","15","0.00","0","","","","","","","","","","","","","0","","","","","","0","","","","","","","","","","","","","","","","","","","0","157.41.250.132","1","2022-10-10 11:18:34","1","0000-00-00 00:00:00","","","","","","","","","","","","","","","","0.000","0","","","","","","","","","","","0");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yashoda22__ledger` AS select 'V' AS `type`,`yashoda22__voucher`.`id_voucher` AS `id`,`yashoda22__voucher`.`no` AS `refno`,`yashoda22__voucher`.`date` AS `date`,`yashoda22__voucher`.`id_head_credit` AS `chead`,`yashoda22__voucher`.`id_head_debit` AS `dhead`,`yashoda22__voucher`.`total` AS `total`,`yashoda22__voucher`.`memo` AS `memo` from `yashoda22__voucher` union all select 'V' AS `type`,`yashoda22__mr`.`id` AS `id`,`yashoda22__mr`.`no` AS `refno`,`yashoda22__mr`.`date` AS `date`,3 AS `chead`,7 AS `dhead`,`yashoda22__mr`.`amount` AS `total`,'Money Receipt' AS `memo` from `yashoda22__mr` where `yashoda22__mr`.`type` = 1 and `yashoda22__mr`.`cancel_date` is null union all select 'H' AS `type`,`yashoda22__head`.`id_head` AS `id`,'' AS `refno`,'' AS `date`,if(`yashoda22__head`.`otype` = 'D' or `yashoda22__head`.`otype` = '0',0,`yashoda22__head`.`id_head`) AS `chead`,if(`yashoda22__head`.`otype` = 'D' or `yashoda22__head`.`otype` = '0',`yashoda22__head`.`id_head`,0) AS `dhead`,`yashoda22__head`.`opening_balance` AS `total`,'' AS `memo` from `yashoda22__head`;

INSERT INTO yashoda22__ledger VALUES("V","1","1","2022-04-14","11","7","30000.00","Marriage on 03.07.2022 of Silpa Nanda");
INSERT INTO yashoda22__ledger VALUES("V","2","2","2022-04-18","11","7","20000.00","Marriage on 04.12.2022 of Lisilina Mohapatra");
INSERT INTO yashoda22__ledger VALUES("V","3","3","2022-04-19","11","7","50000.00","Marriage on 20.04.2022 of Deepak Bastia");
INSERT INTO yashoda22__ledger VALUES("V","4","4","2022-04-22","11","7","20000.00","Marriage on 10.06.2022 of Lakhmidhara Dhala");
INSERT INTO yashoda22__ledger VALUES("V","5","5","2022-04-23","11","7","20000.00","Marriage on 08.07.2022 of Partha Beura");
INSERT INTO yashoda22__ledger VALUES("V","6","6","2022-04-30","2","11","43000.00","Laptop Purchase from Nigam Computer");
INSERT INTO yashoda22__ledger VALUES("V","7","7","2022-04-30","11","7","50000.00","Marriage on 01.05.2022 of Jyoti Prakash Behera");
INSERT INTO yashoda22__ledger VALUES("V","8","8","2022-04-30","14","11","10916.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","9","9","2022-04-30","12","11","28968.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","10","10","2022-04-30","13","11","41943.00","LOAN
");
INSERT INTO yashoda22__ledger VALUES("V","11","11","2022-05-05","11","7","50000.00","Marriage on 27.04.2022 of Hadibandhu Mohanty");
INSERT INTO yashoda22__ledger VALUES("V","12","12","2022-05-10","11","7","40000.00","Marriage on 25.01.2023 of Nihar Ranjan Nayak");
INSERT INTO yashoda22__ledger VALUES("V","13","13","2022-05-12","10","11","30000.00","Office Expenses");
INSERT INTO yashoda22__ledger VALUES("V","14","14","2022-05-25","11","7","40000.00","Marriage on 11.12.2022 of Padmanabha Sahoo");
INSERT INTO yashoda22__ledger VALUES("V","15","15","2022-05-28","16","11","80000.00","Electry Bills");
INSERT INTO yashoda22__ledger VALUES("V","16","16","2022-05-30","7","11","20000.00","Return Booking Of Lisilina Mohapatra");
INSERT INTO yashoda22__ledger VALUES("V","17","17","2022-05-30","2","11","14515.18","AMC of LIFT");
INSERT INTO yashoda22__ledger VALUES("V","18","18","2022-05-31","11","7","50000.00","Marriage on 27.05.2022 of Trailokyanath Kanungo");
INSERT INTO yashoda22__ledger VALUES("V","19","19","2022-05-31","11","7","60000.00","Marriage on 01.06.2022 of Sukant Kumar Patra");
INSERT INTO yashoda22__ledger VALUES("V","20","20","2022-05-31","14","11","11280.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","21","21","2022-05-31","12","11","29934.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","22","22","2022-05-31","13","11","43341.00","Laon");
INSERT INTO yashoda22__ledger VALUES("V","23","23","2022-06-01","11","7","10000.00","Marriage on 23.11.2022 of Pabir Kumar Swain");
INSERT INTO yashoda22__ledger VALUES("V","24","24","2022-06-08","11","5","885000.00","Loan Disbursement of loan Account 0098");
INSERT INTO yashoda22__ledger VALUES("V","25","25","2022-06-08","10","11","20000.00","Slary of Subrat Kumar Dutta");
INSERT INTO yashoda22__ledger VALUES("V","26","26","2022-06-09","2","11","9450.00","DG Repairing Material from Srinivas Sales & Service");
INSERT INTO yashoda22__ledger VALUES("V","27","27","2022-06-10","11","7","50000.00","Marriage on 10.06.2022 of Laxmidhara Dhala");
INSERT INTO yashoda22__ledger VALUES("V","28","28","2022-06-10","11","7","40000.00","Marriage on 29.01.2023 of Dr. Sambhav Mishra");
INSERT INTO yashoda22__ledger VALUES("V","29","29","2022-06-10","11","7","40000.00","Marriage on date 22/02/2023 of Prativa Manjari Bhatta");
INSERT INTO yashoda22__ledger VALUES("V","30","30","2022-06-14","11","7","30000.00","Marriage on date 02/12/2022 of Brundabana Swain");
INSERT INTO yashoda22__ledger VALUES("V","31","31","2022-06-18","17","11","16780.00","GST of May Month");
INSERT INTO yashoda22__ledger VALUES("V","32","32","2022-06-21","2","11","25660.00","Purchase of Tiles from Ceramic Sales");
INSERT INTO yashoda22__ledger VALUES("V","33","33","2022-06-29","16","11","70432.00","Electry Bill");
INSERT INTO yashoda22__ledger VALUES("V","34","34","2022-06-29","11","7","30000.00","Marriage on 15/01/2023 of Arunima Mohanty");
INSERT INTO yashoda22__ledger VALUES("V","35","35","2022-06-30","14","11","10916.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","36","36","2022-06-30","12","11","28968.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","37","37","2022-06-30","13","11","41943.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","38","38","2022-06-30","15","11","3841.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","39","39","2022-07-03","11","7","50000.00","Marriage on 03/07/2022 of Silpa Nanda");
INSERT INTO yashoda22__ledger VALUES("V","40","40","2022-07-03","10","11","20000.00","Salary of Subrat Kumar Dutta");
INSERT INTO yashoda22__ledger VALUES("V","41","41","2022-07-04","10","11","12000.00","Salary Of Pintu Behera");
INSERT INTO yashoda22__ledger VALUES("V","42","42","2022-07-04","2","11","10000.00","Software purchase from Mohan");
INSERT INTO yashoda22__ledger VALUES("V","43","43","2022-07-05","2","11","15000.00","Software purchase from mohan");
INSERT INTO yashoda22__ledger VALUES("V","44","44","2022-07-18","17","11","13728.00","GST");
INSERT INTO yashoda22__ledger VALUES("V","45","45","2022-07-27","12","11","18162.00","Loan
");
INSERT INTO yashoda22__ledger VALUES("V","46","46","2022-07-27","13","11","39147.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","47","47","2022-07-28","2","11","36307.00","Purchase Sanitary Item From Gayatri Sales & Supply");
INSERT INTO yashoda22__ledger VALUES("V","48","48","2022-07-28","16","11","63977.00","Electric Bill
");
INSERT INTO yashoda22__ledger VALUES("V","49","49","2022-07-31","14","11","11280.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","50","50","2022-07-31","12","11","38109.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","51","51","2022-07-31","13","11","4195.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","52","52","2022-07-31","15","11","5412.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","53","53","2022-08-02","10","11","8000.00","Salary Of Rajesh");
INSERT INTO yashoda22__ledger VALUES("V","54","54","2022-08-02","10","11","3500.00","Salary Of Pintu Behera
");
INSERT INTO yashoda22__ledger VALUES("V","55","55","2022-08-02","10","11","20000.00","Salary of Subrat Kumar Dutta");
INSERT INTO yashoda22__ledger VALUES("V","56","56","2022-08-10","11","7","40000.00","Booking of Snehasish Panda");
INSERT INTO yashoda22__ledger VALUES("V","57","57","2022-08-16","17","11","9752.00","GST");
INSERT INTO yashoda22__ledger VALUES("V","58","58","2022-08-31","16","11","50532.00","Electric Bill");
INSERT INTO yashoda22__ledger VALUES("V","59","59","2022-08-31","14","11","11280.00","Loan
");
INSERT INTO yashoda22__ledger VALUES("V","60","60","2022-08-31","12","11","30094.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","61","61","2022-08-31","13","11","43341.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","62","62","2022-08-31","15","11","5412.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","64","64","2022-09-02","10","11","13500.00","Salary of Pintu Behera");
INSERT INTO yashoda22__ledger VALUES("V","65","65","2022-09-02","10","11","8000.00","Salary Of Rajesh");
INSERT INTO yashoda22__ledger VALUES("V","66","66","2022-09-02","10","11","20000.00","Salary of Subrat Kumar Dutta");
INSERT INTO yashoda22__ledger VALUES("V","67","67","2022-09-05","10","11","8000.00","Salary of Santosh Barik");
INSERT INTO yashoda22__ledger VALUES("V","68","68","2022-09-09","10","11","25000.00","Salary of Madhav");
INSERT INTO yashoda22__ledger VALUES("V","69","69","2022-09-26","2","11","12209.00","Purchase of Colours from Gudumama Enterprisers");
INSERT INTO yashoda22__ledger VALUES("V","70","70","2022-09-30","16","11","34155.00","Electric Bill");
INSERT INTO yashoda22__ledger VALUES("V","71","71","2022-09-30","14","11","10916.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","72","72","2022-09-30","12","11","29123.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","73","73","2022-09-30","13","11","41943.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","74","74","2022-09-30","15","11","6048.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","75","75","2022-10-01","10","11","12000.00","Salary of Pintu Behera");
INSERT INTO yashoda22__ledger VALUES("V","76","76","2022-10-01","10","11","12000.00","Salary of Rajesh");
INSERT INTO yashoda22__ledger VALUES("V","77","77","2022-10-01","10","11","20000.00","Salary of Subrat Kumar Dutta");
INSERT INTO yashoda22__ledger VALUES("V","78","78","2022-10-01","10","11","6000.00","Salary of Santosh Barik");
INSERT INTO yashoda22__ledger VALUES("V","79","79","2022-10-13","6","11","8312.00","Yashoda Garden Tax ");
INSERT INTO yashoda22__ledger VALUES("V","80","80","2022-10-13","11","7","20000.00","Reception of Prabira Kumar Swain on 23/11/2022 G");
INSERT INTO yashoda22__ledger VALUES("V","81","81","2022-10-20","6","11","18000.00","Second Legal Opinion fees of property to Advocate
");
INSERT INTO yashoda22__ledger VALUES("V","82","82","2022-10-21","10","11","9000.00","Sanosh Oct-22 Salary");
INSERT INTO yashoda22__ledger VALUES("V","83","83","2022-10-27","6","11","16300.00","Legal Opnion Fees to  Jajati Kesari Swain");
INSERT INTO yashoda22__ledger VALUES("V","84","84","2022-10-27","6","11","5200.00","Advocate fees Supplementary Report jajati Keshari ");
INSERT INTO yashoda22__ledger VALUES("V","85","85","2022-10-31","14","11","11280.00","Loan ");
INSERT INTO yashoda22__ledger VALUES("V","86","86","2022-10-31","12","11","30944.00","loan");
INSERT INTO yashoda22__ledger VALUES("V","87","87","2022-10-31","13","11","43341.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","88","88","2022-10-31","15","11","5637.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","89","89","2022-11-01","16","11","33226.00","Electry Bill");
INSERT INTO yashoda22__ledger VALUES("V","90","90","2022-11-02","2","11","9418.00","Colour Purchase from Gudumama Enterprises");
INSERT INTO yashoda22__ledger VALUES("V","91","91","2022-11-02","10","11","20000.00","Subrat Oct Salary");
INSERT INTO yashoda22__ledger VALUES("V","92","92","2022-11-02","10","11","11500.00","Pintu Oct Salary");
INSERT INTO yashoda22__ledger VALUES("V","93","93","2022-11-02","10","11","10000.00","Rajesh Oct Salary");
INSERT INTO yashoda22__ledger VALUES("V","94","94","2022-11-11","2","11","21240.00","Srinivasa Sales & Service Pvt Ltd");
INSERT INTO yashoda22__ledger VALUES("V","95","95","2022-11-11","2","11","10584.00","Shreeram enterprises");
INSERT INTO yashoda22__ledger VALUES("V","96","96","2022-11-20","11","7","15000.00","Subhashree Panda Booking for Marriage on 24.02.2023 Ground Floor");
INSERT INTO yashoda22__ledger VALUES("V","97","97","2022-11-22","11","7","15000.00","Subhashree Panda Booking For Marriage on 24.02.2023 Ground Floor");
INSERT INTO yashoda22__ledger VALUES("V","98","98","2022-11-27","11","7","40000.00","Reception of Jaganath Parida on 3rd Feb 2023 G");
INSERT INTO yashoda22__ledger VALUES("V","99","99","2022-11-28","11","7","50000.00","Marriage of Gobindo Chandra Mohanty on  30/11/2022 1st");
INSERT INTO yashoda22__ledger VALUES("V","100","100","2022-11-29","11","7","30000.00","Marriage of Gobindo Chandra Mohanty on  30/11/2022 1st");
INSERT INTO yashoda22__ledger VALUES("V","101","101","2022-11-29","10","11","10000.00","Salary of Rajesh");
INSERT INTO yashoda22__ledger VALUES("V","102","102","2022-11-30","16","11","34062.00","Electric Bill");
INSERT INTO yashoda22__ledger VALUES("V","103","103","2022-11-30","14","11","10916.00","loan account 0028");
INSERT INTO yashoda22__ledger VALUES("V","104","104","2022-11-30","12","11","29123.00","loan account 9044");
INSERT INTO yashoda22__ledger VALUES("V","105","105","2022-11-30","13","11","5455.00","loan account 0085");
INSERT INTO yashoda22__ledger VALUES("V","106","106","2022-11-30","15","11","41943.00","loan account 0098");
INSERT INTO yashoda22__ledger VALUES("V","107","107","2022-11-30","11","7","100000.00","Marriage of Anirudh Nayak on 27/11/2022 G");
INSERT INTO yashoda22__ledger VALUES("V","108","108","2022-12-02","10","11","12000.00","Santosh Salary");
INSERT INTO yashoda22__ledger VALUES("V","109","109","2022-12-02","10","11","12000.00","Pintu Salary");
INSERT INTO yashoda22__ledger VALUES("V","110","110","2022-12-02","10","11","20000.00","Subrat Salary");
INSERT INTO yashoda22__ledger VALUES("V","111","111","2022-12-05","13","11","2655.00","Loan Account 0085");
INSERT INTO yashoda22__ledger VALUES("V","112","112","2022-12-07","10","11","10000.00","Rajesh Advance");
INSERT INTO yashoda22__ledger VALUES("V","113","113","2022-12-07","10","11","62000.00","New Car Purchase for Company");
INSERT INTO yashoda22__ledger VALUES("V","114","114","2022-12-07","11","7","50000.00","Marriage of Jayanti Sahooo on 4/12/2022 1st");
INSERT INTO yashoda22__ledger VALUES("V","115","115","2022-12-17","17","11","71694.00","Nov-22 GST Amount");
INSERT INTO yashoda22__ledger VALUES("V","116","116","2022-12-17","11","7","50000.00","Marriage of Nabakishore sahoo on 18.12.2022 Ground floor");
INSERT INTO yashoda22__ledger VALUES("V","117","117","2022-12-17","11","7","20000.00","Marriage of Pradipta swain on 10.03.2023 Ground floor");
INSERT INTO yashoda22__ledger VALUES("V","118","118","2022-12-22","11","7","50000.00","Reception of Udayabir mohanty on 23.12.2022 First floor");
INSERT INTO yashoda22__ledger VALUES("V","119","119","2022-12-24","2","11","200000.00","Kaizen Eng. privet limited  or goods lift");
INSERT INTO yashoda22__ledger VALUES("V","120","120","2022-12-26","11","7","20000.00","Madhuchanda priyadarshini Booking for Marriage on 26.12.2022 Ground floor");
INSERT INTO yashoda22__ledger VALUES("V","121","121","2022-12-27","11","3","200000.00","Cash Deposit");
INSERT INTO yashoda22__ledger VALUES("V","122","122","2022-12-27","10","11","13000.00","Santosh Salary");
INSERT INTO yashoda22__ledger VALUES("V","123","123","2022-12-27","11","7","20000.00","Reception of Meenaketan Mohapatra on 17/03/2023 1st Floor");
INSERT INTO yashoda22__ledger VALUES("V","124","124","2022-12-31","14","11","11280.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","125","125","2022-12-31","12","11","31230.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","126","126","2022-12-31","13","11","43341.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","127","127","2022-12-31","15","11","5637.00","Loan");
INSERT INTO yashoda22__ledger VALUES("V","128","128","2023-01-02","10","11","14000.00","Salary of Pintu");
INSERT INTO yashoda22__ledger VALUES("V","129","129","2023-01-02","10","11","30000.00","Subrat Salary");
INSERT INTO yashoda22__ledger VALUES("V","130","130","2023-01-02","10","11","8000.00","Rajesh Salary");
INSERT INTO yashoda22__ledger VALUES("V","131","131","2023-01-02","10","11","10000.00","Nibrat Salary");
INSERT INTO yashoda22__ledger VALUES("V","132","132","2023-01-04","11","7","20000.00","Marriage of Shriharsa Mishra on 7/6/23 1st Floor");
INSERT INTO yashoda22__ledger VALUES("V","133","133","2023-01-19","11","7","40000.00","Marriage of Bijay Kumar Maharana on 17/01/2023 Ground Floor");
INSERT INTO yashoda22__ledger VALUES("V","134","134","2023-01-19","11","7","30000.00","Marriage of Salin Routray on 23/06/2023 1st Floor");
INSERT INTO yashoda22__ledger VALUES("V","135","135","2023-01-20","17","11","73618.00","GST ");
INSERT INTO yashoda22__ledger VALUES("V","136","136","2023-01-30","11","3","200000.00","Cash Deposit of Customer");
INSERT INTO yashoda22__ledger VALUES("V","137","137","2023-01-30","2","11","95000.00","Goods Lift Payment");
INSERT INTO yashoda22__ledger VALUES("V","138","138","2023-01-30","16","11","108479.00","Electry Bill Payment of Nov & Dec 2022");
INSERT INTO yashoda22__ledger VALUES("V","139","139","2023-01-31","11","7","40000.00","Marriage of Nalini Prava Sahoo on 2701/2023 1st Floor");
INSERT INTO yashoda22__ledger VALUES("V","140","140","2023-01-31","14","11","11280.00","LOAN");
INSERT INTO yashoda22__ledger VALUES("V","141","141","2023-01-31","12","11","33296.00","LOAN");
INSERT INTO yashoda22__ledger VALUES("V","142","142","2023-01-31","13","11","46886.00","LOAN");
INSERT INTO yashoda22__ledger VALUES("V","143","143","2023-01-31","15","11","5637.00","LOAN");
INSERT INTO yashoda22__ledger VALUES("V","3","3","2022-04-01","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","4","4","2022-04-01","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","5","5","2022-04-01","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","6","6","2022-04-02","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","7","7","2022-04-12","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","9","9","2022-04-15","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","12","12","2022-04-20","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","13","13","2022-04-20","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","14","14","2022-04-22","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","15","15","2022-04-23","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","17","17","2022-04-25","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","23","23","2022-05-30","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","24","24","2022-05-30","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","26","26","2022-06-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","28","28","2022-06-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","29","29","2022-06-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","30","30","2022-06-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","31","31","2022-06-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","32","32","2022-06-03","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","33","33","2022-06-04","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","34","34","2022-06-06","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","35","35","2022-06-07","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","37","37","2022-06-08","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","38","38","2022-06-09","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","42","42","2022-06-14","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","43","43","2022-06-15","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","44","44","2022-06-15","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","45","45","2022-06-17","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","46","46","2022-06-18","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","47","47","2022-06-19","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","48","48","2022-06-22","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","50","50","2022-06-29","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","52","52","2022-07-03","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","53","53","2022-07-04","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","54","54","2022-07-04","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","55","55","2022-07-10","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","56","56","2022-07-11","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","57","57","2022-07-24","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","58","58","2022-07-27","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","59","59","2022-07-27","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","60","60","2022-07-27","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","61","61","2022-08-02","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","63","63","2022-08-16","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","64","64","2022-09-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","66","66","2022-10-14","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","67","67","2022-10-18","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","68","68","2022-10-18","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","69","69","2022-10-18","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","70","70","2022-10-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","72","72","2022-10-25","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","73","73","2022-11-01","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","74","74","2022-11-04","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","77","77","2022-11-11","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","78","78","2022-11-23","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","79","79","2022-11-25","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","80","80","2022-11-25","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","82","82","2022-11-29","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","83","83","2022-11-30","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","86","86","2022-12-12","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","87","87","2022-12-13","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","88","88","2022-12-14","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","89","89","2022-12-02","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","90","90","2022-12-04","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","92","92","2022-12-07","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","93","93","2022-12-09","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","94","94","2022-12-09","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","96","96","2022-12-14","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","97","97","2022-12-15","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","98","98","2022-12-18","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","99","99","2022-12-18","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","103","103","2022-12-27","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","105","105","2023-01-06","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","106","106","2023-01-07","3","7","10000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","107","107","2023-01-15","3","7","30000.01","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","108","108","2023-01-16","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","111","111","2023-01-25","3","7","30000.01","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","112","112","2023-01-27","3","7","29999.99","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","113","113","2023-01-28","3","7","30000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("V","114","114","2023-01-29","3","7","20000.00","Money Receipt");
INSERT INTO yashoda22__ledger VALUES("H","1","","","1","0","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","2","","","0","2","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","3","","","0","3","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","4","","","0","4","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","5","","","0","5","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","6","","","0","6","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","7","","","0","7","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","8","","","0","8","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","9","","","0","9","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","10","","","0","10","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","11","","","0","11","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","12","","","0","12","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","13","","","0","13","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","14","","","0","14","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","15","","","0","15","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","16","","","0","16","0.00","");
INSERT INTO yashoda22__ledger VALUES("H","17","","","0","17","0.00","");



CREATE TABLE `yashoda22__log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(1) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `previous` text DEFAULT NULL,
  `current` text DEFAULT NULL,
  `change` text DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO yashoda22__log VALUES("1","B","2023-02-22 08:16:05","{"id_reservation":"79","name":"Madhuchanda Priyadarshini","type":"Offline","email":"","country":"India","phone":null,"id_roomtype":null,"id_rooms":null,"meal":null,"cin":null,"cout":null,"nodays":null,"verification":"","cancel_by":"7","cancel_date":"2023-02-22","status":"0","ip":"","id_create":"1","create_date":"2023-02-22 08:15:27","id_modify":"0","modify_date":"0000-00-00 00:00:00","id_corporate":"0","no":"79","est_depature_date":"2022-12-12","time":"","ano":null,"mobile":"9439861520","dob":null,"oname":null,"address":"Nuapada","city":"Cuttack","district":"Cuttack","state":"Odisha","fax":null,"id_proof":"","purpose":"Marriage","destination":null,"faddress":null,"person":"800","adult":null,"child":null,"daysstay":"1","depature_date":null,"refer":null,"booking_no":null,"arrivedfrom":null,"depature_time":null,"roomnumber":"1,101,102","rent":null,"extra":null,"food":null,"foodpersons":null,"total":"40000.01","roomcategory":null,"discount":"0.00","amount":null,"less":null,"rentday":null,"withtax":null,"company":"","gstin":"","advancecash":null,"card":null,"bank":null,"remarks":"","food_type":null,"gst":null,"gstamt":"6101.70","billinst":null,"json":"[{\"name\":\"1\",\"tax_per\":\"18\",\"price\":\"28898.31\",\"discount\":\"0\",\"gstamt\":\"5201.70\",\"total\":\"34100.01\"},{\"name\":\"101\",\"tax_per\":\"18\",\"price\":\"2500\",\"discount\":\"0\",\"gstamt\":\"450.00\",\"total\":\"2950.00\"},{\"name\":\"102\",\"tax_per\":\"18\",\"price\":\"2500\",\"discount\":\"0\",\"gstamt\":\"450.00\",\"total\":\"2950.00\"}]","grcno":"79","date":"2023-12-10","est_depature_time":"","billno":null,"cancel_reason":"fsdfsdafsdf","actual_amount":"40000.00","advance_amount":"20000.00","id_proof_upload":"uploads\/26122022_1244_"}","{"cancel_by":"7","cancel_date":"2023-02-22","cancel_reason":"fsdfsdafsdf"}","cancel_by,cancel_date,cancel_reason");
INSERT INTO yashoda22__log VALUES("2","V","2023-02-23 21:31:11","{"date":"2023-01-31","id_head_debit":"11","id_head_credit":"15","total":"5637.00","ref1":"Cheque","memo":"LOAN","id_create":"1","no":"143"}","{"date":"2023-01-31","id_head_debit":"11","id_head_credit":"15","total":"5637.00","ref1":"Cheque....","memo":"LOAN","id_create":"7","no":"143"}","ref1,id_create");
INSERT INTO yashoda22__log VALUES("3","V","2023-02-23 21:36:27","{"date":"2022-09-01","id_head_debit":"11","id_head_credit":"2","total":"59045.00","ref1":"CQ","memo":"Purchase Of Tiles from Ceramic Tiles","id_create":"1","no":"63"}","[]","date,id_head_debit,id_head_credit,total,ref1,memo,id_create,no");



CREATE TABLE `yashoda22__mr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `mrtype` varchar(1) NOT NULL DEFAULT 'R',
  `no` text NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `remark` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(40) NOT NULL,
  `upitype` varchar(50) DEFAULT NULL,
  `paidto` varchar(50) DEFAULT NULL,
  `cancel_by` int(11) DEFAULT NULL,
  `cancel_date` date DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `approve` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__mr VALUES("1","2022-02-04","R","1","29","3","40000.00","Marriage of Pulin Kumar Mohanty on 20/11/2022 G ","1","2022-10-12 10:44:23","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("2","2022-03-16","R","2","28","3","40000.00","Marriage of Pranita Das on 29/11/2022 G ","1","2022-10-12 10:46:25","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("3","2022-04-01","R","3","2","1","30000.00","Marriage of Ashok Kumar panda on 22/04/2022 G ","1","2022-10-12 10:48:04","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("4","2022-04-01","R","4","3","1","30000.00","Marriage of Prabhu Prasanna Behera on 23/04/2022 G ","1","2022-10-12 10:49:11","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("5","2022-04-01","R","5","9","1","20000.00","Thread Ceremony of Sudhira Panda on 04/05/2022 1st","1","2022-10-12 10:50:43","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("6","2022-04-02","R","6","4","1","30000.00","Reception of Sanjeev Mohanty on 24/04/2022 G ","1","2022-10-12 10:53:07","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("7","2022-04-12","R","7","7","1","30000.00","Marriage of Bibhuti Bhusama Mohapatra on 03/05/2022 G","1","2022-10-12 11:02:14","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("8","2022-04-14","R","8","63","3","30000.00","Engagement of Silpa Nanda on 17/04/2022 1st","1","2022-10-12 11:03:31","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("9","2022-04-15","R","9","8","1","30000.00","Marriage of Soumya Ranjan behera on 04/05/2022 G","1","2022-10-12 11:04:33","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("10","2022-04-18","R","10","64","3","20000.00","Marriage of Lisilina Mohapatra on 04/12/2022 1st","1","2022-10-12 11:05:57","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("11","2022-04-19","R","11","1","3","50000.00","Marriage of Aseem Bastia on 20/04/2022 G","1","2022-10-12 11:07:06","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("12","2022-04-20","R","12","11","1","30000.00","Reception of Atmadev Panda on 13/05/2022 1st","1","2022-10-12 11:08:28","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("13","2022-04-20","R","13","10","1","30000.00","Marriage of Sushil Kumar Mishra on 13/05/2022 G","1","2022-10-12 11:10:00","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("14","2022-04-22","R","14","13","1","30000.00","Reception of Alok Kumar Ghosh on 22/05/2022 G","1","2022-10-12 11:11:00","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("15","2022-04-23","R","15","12","1","30000.00","Reception of Rakesh Kumar Sahoo on 18/05/2022 G","1","2022-10-12 11:12:39","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("16","2022-04-24","R","16","24","3","20000.00","Marriage of Partha Beura on 08/07/2022 G","1","2022-10-12 11:13:58","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("17","2022-04-25","R","17","14","1","30000.00","reception of Laxmidhara Pasayat on 25/05/2022 G","1","2022-10-12 11:15:04","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("18","2022-04-27","R","18","5","3","50000.00","Marriage of Hadibandhu Mohanty on 27/04/2022 G","1","2022-10-12 11:16:53","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("19","2022-04-30","R","19","6","3","50000.00","Reception of Jyoti Prakash Behera on 01/05/2022 G","1","2022-10-12 11:18:56","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("20","2022-05-10","R","20","51","3","40000.00","Reception of Nihar Ranjan Nayak on 25/01/2023 G","1","2022-10-12 11:20:52","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("21","2022-05-25","R","21","39","3","40000.00","Reception of Padmanava Sahoo on 11/12/2022 G","1","2022-10-12 11:22:15","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("22","2022-05-27","R","22","15","3","50000.00","Reception of Trailokyanath Kanungo on 27/05/2022 G","1","2022-10-12 11:23:18","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("23","2022-05-30","R","23","40","1","10000.00","Marriage of Nabakishore Sahoo on 14/12/2022 G","1","2022-10-12 11:25:53","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("24","2022-05-30","R","24","34","1","10000.00","Marriage of Rajkishore on 25/11/2022 G","1","2022-10-12 11:26:57","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("25","2022-05-31","R","25","16","3","50000.00","Reception of Sukant Kumar Patra on 01/06/2022 G","1","2022-10-12 11:28:15","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("26","2022-06-01","R","26","33","1","10000.00","Marriage of Biranchi Narayana Sahoo on 11/11/2022 G & 1st","1","2022-10-12 11:29:39","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("27","2022-06-01","R","27","35","3","10000.00","Reception of Prabira Kumar Swain on 23/11/2022 G","1","2022-10-12 11:30:59","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("28","2022-06-01","R","28","31","1","10000.00","Marriage of Anirudha Nayak on 27/11/2022 G & 1st","1","2022-10-12 11:32:55","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("29","2022-06-01","R","29","27","1","10000.00","Marriage of Kishore Kumar Tripathy on 30/11/2022 G","1","2022-10-12 11:34:02","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("30","2022-06-01","R","30","30","1","10000.00","Marriage of Gobindo Chandra Mohanty on 30/11/2022 1st","1","2022-10-12 11:35:09","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("31","2022-06-01","R","31","37","1","10000.00","Reception of Bijay Kumar Mohanty on 04/12/2022 G","1","2022-10-12 11:37:13","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("32","2022-06-03","R","32","17","1","20000.00","Reception of Pravat Biswal on 03/06/2022 G","1","2022-10-12 11:38:12","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("33","2022-06-04","R","33","21","1","20000.00","Marriage of Bhabagrahi Das on 03/07/2022 1st","1","2022-10-12 11:39:26","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("34","2022-06-06","R","34","22","1","20000.00","Marriage of Keshav Chandra Dalai on 06/07/2022 G","1","2022-10-12 11:40:29","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("35","2022-06-07","R","35","32","1","10000.00","Marriage of Pratap Kumar pattnaik on 29/11/2022 1st","1","2022-10-12 11:42:41","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("36","2022-06-08","R","36","41","3","30000.00","Marriage of Brundawan Swain on 02/12/2022 G & 1st","1","2022-10-12 11:43:45","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("37","2022-06-08","R","37","42","1","10000.00","Marriage of Saroj Kumar Panda on 09/12/2022 G","1","2022-10-12 11:45:32","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("38","2022-06-09","R","38","23","1","20000.00","Marriage of Kartika Chandra Debata on 06/07/2022 1st","1","2022-10-12 11:46:30","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("39","2022-06-10","R","39","52","3","40000.00","Reception of Dr. Sambhav Mishra on 29/01/2022 1st","1","2022-10-12 11:47:51","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("40","2022-06-10","R","40","18","3","50000.00","Reception of Laxmidhara Dhala on 10/06/2022 1st","1","2022-10-12 11:49:36","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("41","2022-06-10","R","41","58","3","40000.00","Marriage of Prativa Manjari Bhata on 22/02/2023 G & 1st","1","2022-10-12 11:50:52","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("42","2022-06-14","R","42","43","1","10000.00","Reception of Prasanjit Khatua on 18/12/2022 1st","1","2022-10-12 11:52:02","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("43","2022-06-15","R","43","53","1","10000.00","Reception of Rashmi Samal on 18/01/2023 G","1","2022-10-12 11:53:06","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("44","2022-06-15","R","44","25","1","20000.00","Reception of Baidyanath Behera on 08/07/2022 1st ","1","2022-10-12 11:54:43","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("45","2022-06-17","R","45","38","1","10000.00","Reception of Duryadhana Patra on 07/12/2022 G ","1","2022-10-12 11:55:48","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("46","2022-06-18","R","46","59","1","10000.00","Reception of Satish Mohapatra on 01/02/2023 1st ","1","2022-10-12 11:56:50","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("47","2022-06-19","R","47","26","1","20000.00","Reception of Srikanta Mohanty on 15/07/2022 G ","1","2022-10-12 12:00:11","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("48","2022-06-22","R","48","19","1","20000.00","Reception of Subash Barik on 22/06/2022 G","1","2022-10-12 12:01:11","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("49","2022-06-24","R","49","54","3","30000.00","Marriage of Arunima Mohanty on 15/01/2023 1st ","1","2022-10-12 12:03:10","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("50","2022-06-29","R","50","44","1","10000.00","Reception of Udayabir Mohanty on 11/12/2022 1st","1","2022-10-12 12:04:20","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("51","2022-07-03","R","51","20","3","50000.00","Marriage of Silpa Nanda on 03/07/2022 G","1","2022-10-12 12:05:50","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("52","2022-07-03","R","52","45","1","10000.00","Marriage of Jayanti Sahoo on 4/12/2022 1st","1","2022-10-12 12:06:38","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("53","2022-07-04","R","53","36","1","10000.00","Reception of Anil Verma on 25/11/2022 1st ","1","2022-10-12 12:07:35","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("54","2022-07-04","R","54","55","1","10000.00","Reception of B.P. Acharya on 29/01/2023 1st ","1","2022-10-12 12:08:31","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("55","2022-07-10","R","55","61","1","10000.00","Reception of B.S. Tripathy on 12/02/2023 G ","1","2022-10-12 12:11:59","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("56","2022-07-11","R","56","46","1","10000.00","Marriage of Suresh Chandra Pati on 14/12/2022 1st ","1","2022-10-12 12:20:36","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("57","2022-07-24","R","57","56","1","10000.00","Marriage of Bijay Kumar Maharana on 17/01/2023 G","1","2022-10-12 12:21:51","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("58","2022-07-27","R","58","49","1","10000.00","Reception of Sai Sarthak Dash on 03/12/2022 G ","1","2022-10-12 12:22:37","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("59","2022-07-27","R","59","48","1","10000.00","Marriage of Kiran Parija on 09/12/2022 G","1","2022-10-12 12:23:22","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("60","2022-07-27","R","60","47","1","10000.00","Reception of Anand Sethi on 18/12/2022 G","1","2022-10-12 12:24:22","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("61","2022-08-02","R","61","50","1","10000.00","Reception of Bijay Kumar Dash on 21/12/2022 G","1","2022-10-12 12:25:49","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("62","2022-08-10","R","62","57","3","40000.00","Reception of Snehasish Panda on 22/01/2023 G","1","2022-10-12 12:27:25","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("63","2022-08-16","R","63","60","1","10000.00","Reception of Aseem Bastia on 26/02/2023 G","1","2022-10-12 12:28:17","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("64","2022-09-01","R","64","62","1","10000.00","Thread Ceremony of Debasish Pati on 27/01/2023 G","1","2022-10-12 12:29:07","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("65","2022-05-31","R","65","16","3","10000.00","Reception of Sukanta Kumar Patra on 01/06/2022 G ","1","2022-10-12 12:45:07","157.41.249.149","","","","","","0");
INSERT INTO yashoda22__mr VALUES("66","2022-10-14","R","66","65","1","10000.00","Marriage of Saumyashree Acharya on 15/01/2023 G","1","2022-10-14 16:49:08","157.41.251.112","","","","","","0");
INSERT INTO yashoda22__mr VALUES("67","2022-10-18","R","67","66","1","10000.00","Reception of Ankit parida on 23.11.2022. 1st floor","1","2022-10-19 15:46:29","223.231.217.46","","","","","","0");
INSERT INTO yashoda22__mr VALUES("68","2022-10-18","R","68","67","1","10000.00","Marriage of Deepak Kumar Sahoo on 15.02.2023 Ground Floor","1","2022-10-19 15:48:44","223.231.217.46","","","","","","0");
INSERT INTO yashoda22__mr VALUES("69","2022-10-18","R","69","68","1","10000.00","Marriage of Sasmita Sahoo on 10.02.2023 First Floor","1","2022-10-19 15:49:51","223.231.217.46","","","","","","0");
INSERT INTO yashoda22__mr VALUES("70","2022-10-01","R","70","69","1","10000.00","Reception of Sunil Kumar Guin Sahoo on 03.02.2023 First Floor","1","2022-10-19 15:51:19","223.231.217.46","","","","","","0");
INSERT INTO yashoda22__mr VALUES("71","2022-10-19","R","71","35","3","20000.00","Reception of Prabira Kumar Swain on 23/11/2022 G","1","2022-10-19 16:00:49","223.231.217.46","","","","","","0");
INSERT INTO yashoda22__mr VALUES("72","2022-10-25","R","72","70","1","10000.00","Upendranath Tripathy Booking For Reception on 1.02.2023 Ground Floor","1","2022-10-25 14:40:10","223.176.101.207","","","","","","0");
INSERT INTO yashoda22__mr VALUES("73","2022-11-01","R","73","71","1","10000.00","Ashok Pattnayak Booking For Marriage on 24.02.2023 First Floor .","1","2022-11-01 10:42:48","223.187.204.211","","","","","","0");
INSERT INTO yashoda22__mr VALUES("74","2022-11-04","R","74","72","1","10000.00","Marriage of Nalini Prava Sahoo on 27/01/2023 1st Floor","1","2022-11-04 18:02:09","157.41.250.27","","","","","","0");
INSERT INTO yashoda22__mr VALUES("75","2022-11-20","R","75","73","3","15000.00","Subhashree Panda Booking for Marriage on 24.02.2023 Ground Floor","1","2022-11-22 11:31:54","223.176.65.128","","","","","","0");
INSERT INTO yashoda22__mr VALUES("76","2022-11-22","R","76","73","3","15000.00","Subhashree Panda Booking for Marriage on 24.02.2023 Ground Floor","1","2022-11-22 11:33:06","223.176.65.128","","","","","","0");
INSERT INTO yashoda22__mr VALUES("77","2022-11-11","R","77","33","1","20000.00","Marriage of Biranchi Narayana Sahoo on 11/11/2022 G","1","2022-12-09 19:56:46","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("78","2022-11-23","R","78","66","1","20000.00","Reception of ankit parida on 23.11.2022 1st floor","1","2022-12-09 20:04:03","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("79","2022-11-25","R","79","34","1","20000.00","Marriage of Rajkishore on 25.11.2022 ground floor","1","2022-12-09 20:05:58","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("80","2022-11-25","R","80","36","1","20000.00","Anil Barma Booking for Reception  on 25.11.2022 1 st floor","1","2022-12-09 20:07:55","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("81","2022-12-27","R","81","31","3","90000.00","Anirudha Booking for Marriage on 27.12.2022  Ground and First","1","2022-12-09 20:11:59","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("82","2022-11-29","R","82","32","1","20000.00","Pratap booking for marraige on 29.11.2022 first floor","1","2022-12-09 20:15:10","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("83","2022-11-30","R","83","27","1","20000.00","Marriage of Kishore kumar tripathy on 30.11.2022 Ground floor","1","2022-12-09 20:18:14","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("84","2022-11-30","R","84","30","3","70000.00","Gobinda Booking for Marriage on 30.11.2022  First Floor ","1","2022-12-09 20:23:01","157.41.132.83","","","","","","0");
INSERT INTO yashoda22__mr VALUES("85","2022-11-30","R","85","74","3","40000.00","Reception of Jaganath Parida on 3rd Feb 2023 G","1","2022-12-15 16:37:52","157.41.251.13","","","","","","0");
INSERT INTO yashoda22__mr VALUES("86","2022-12-12","R","86","75","1","10000.00","Marriage of Pradipta Swain on 10th March 2023 G","1","2022-12-15 16:39:14","157.41.251.13","","","","","","0");
INSERT INTO yashoda22__mr VALUES("87","2022-12-13","R","87","76","1","10000.00","Marriage of Bikram Keshari Bastia on 24th Feb 2023 G","1","2022-12-15 16:40:25","157.41.251.13","","","","","","0");
INSERT INTO yashoda22__mr VALUES("88","2022-12-14","R","88","77","1","10000.00","Marriage of P.K.Padhihari on 17th May 2023 G
","1","2022-12-15 16:43:38","157.41.251.13","","","","","","0");
INSERT INTO yashoda22__mr VALUES("89","2022-12-02","R","89","41","1","10000.00","Brundabana swain Booking for Marriage on 02.12.2022 Ground Floor","1","2022-12-26 13:26:29","223.231.217.36","","","","","","0");
INSERT INTO yashoda22__mr VALUES("90","2022-12-04","R","90","37","1","20000.00","Bijaya kumar Mohanty Booking for Reception on 04.12.2022 Ground Floor","1","2022-12-26 13:29:11","223.231.217.36","","","","","","0");
INSERT INTO yashoda22__mr VALUES("91","2022-12-04","R","91","45","3","50000.00","Jayanti Sahoo Booking for Marriage on 04.12.2022 First Floor","1","2022-12-26 13:31:11","223.231.217.36","","","","","","0");
INSERT INTO yashoda22__mr VALUES("92","2022-12-07","R","92","38","1","20000.00","Duryadhana Patra Booking for Reception on 07.12.2022 Ground Floor","1","2022-12-26 13:51:15","223.231.217.36","","","","","","0");
INSERT INTO yashoda22__mr VALUES("93","2022-12-09","R","93","42","1","20000.00"," Saroj kumar booking for Marriage on 09.12.2022 Ground floor ","1","2022-12-30 15:59:35","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("94","2022-12-09","R","94","48","1","20000.00","Kiran kumar Booking for Marriage on 09.12.2022 First floor","1","2022-12-30 16:00:58","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("95","2022-12-14","R","95","40","3","50000.00","Nabakishore sahoo Booking for Marriage on 14.12.2022 Ground floor","1","2022-12-30 16:02:36","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("96","2022-12-14","R","96","46","1","20000.00","Suresh chandra Booking for Marriage on 14.12.2022 First Floor","1","2022-12-30 16:32:19","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("97","2022-12-15","R","97","78","1","10000.00","Bijaya kumar Booking for Marriage on 15.12.2022 Ground floor","1","2022-12-30 16:35:09","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("98","2022-12-18","R","98","43","1","20000.00","Prasanjit khatua booking for Raeception on 18.12.2022 First floor","1","2022-12-30 16:37:18","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("99","2022-12-18","R","99","47","1","20000.00","Anand sethi Booking for Reception on 18.12.2022 Ground floor","1","2022-12-30 16:39:00","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("100","2022-12-22","R","100","79","3","20000.00","Madhuchanda Booking for Marriage on 10.12.2023 Ground floor","1","2022-12-30 16:41:34","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("101","2022-12-23","R","101","44","3","50000.00","Udayabir mohanty bookig for Reception on 23.12.2022 First floor","1","2022-12-30 16:43:05","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("102","2022-12-27","R","102","80","3","20000.00","Minaketan Mohapatra bookig for Reception on 17.03.2023 First floor","1","2022-12-30 16:49:00","223.231.233.42","","","","","","0");
INSERT INTO yashoda22__mr VALUES("103","2022-12-27","R","103","81","1","10000.00","Reception of Sitesh babu on 21/12/2022 Ground floor","1","2023-01-06 17:38:43","157.41.226.35","","","","","","0");
INSERT INTO yashoda22__mr VALUES("104","2023-01-06","R","104","82","3","20000.00","Marriage of Shrharsa Mishra on 7/6/23 1st floor","1","2023-01-06 17:45:38","157.41.226.35","","","","","","0");
INSERT INTO yashoda22__mr VALUES("105","2023-01-06","R","105","83","1","10000.00","Marriage of Brahmananda Biswal on date 25/1/2023 1st Fllor","1","2023-01-13 12:58:51","157.41.254.255","","","","","","0");
INSERT INTO yashoda22__mr VALUES("106","2023-01-07","R","106","84","1","10000.00","Marriage of Tophan Kumar Jena on 21/05/23 Ground Floor","1","2023-01-17 12:08:11","157.41.253.206","","","","","","0");
INSERT INTO yashoda22__mr VALUES("107","2023-01-15","R","107","78","1","30000.01","Marriage of Bijay Kumar Mohanty on 15/1/2023 Ground Floor","1","2023-01-17 12:21:56","157.41.253.206","","","","","","0");
INSERT INTO yashoda22__mr VALUES("108","2023-01-16","R","108","53","1","20000.00","Reception of Rashmi Samal on 18/01/2023 Ground Floor","1","2023-01-17 12:23:38","157.41.253.206","","","","","","0");
INSERT INTO yashoda22__mr VALUES("109","2023-01-17","R","109","56","3","40000.00","Bijaya kumar Maharana Booking for Marriage on 17.01.2023  Ground Floor","1","2023-01-31 17:30:14","157.41.253.243","","","","","","0");
INSERT INTO yashoda22__mr VALUES("110","2023-01-19","R","110","85","3","30000.00","Salini Routray Booking for Marriage on 23.06.2023 First Floor","1","2023-01-31 17:40:26","157.41.253.243","","","","","","0");
INSERT INTO yashoda22__mr VALUES("111","2023-01-25","R","111","83","1","30000.01","Bramhananda Biswal Bookig For Marrige on 25.01.2023 First Floor","1","2023-01-31 17:43:21","157.41.253.243","","","","","","0");
INSERT INTO yashoda22__mr VALUES("112","2023-01-27","R","112","62","1","29999.99","Debasish Pati Booking For Reception on 27.01.2023 Ground Floor","1","2023-01-31 18:03:46","157.41.253.243","","","","","","0");
INSERT INTO yashoda22__mr VALUES("113","2023-01-28","R","113","65","1","30000.00","Saumya shree Acharya Booking for Marriage on 28.01.2023 Ground Floor","1","2023-02-01 12:24:50","157.41.224.78","","","","","","0");
INSERT INTO yashoda22__mr VALUES("114","2023-01-29","R","114","55","1","20000.00","Balabhadra Acharya Booking for Reception on 29.01.2023 Ground Floor","1","2023-02-01 12:31:15","157.41.224.78","","","","","","0");
INSERT INTO yashoda22__mr VALUES("115","2023-01-31","R","115","72","3","40000.00","Nalini Prava Sahoo Booking for Marriage on 27.01.2023 First floor","1","2023-02-01 12:33:43","157.41.224.78","","","","","","0");
INSERT INTO yashoda22__mr VALUES("116","2023-01-31","R","116","86","3","40000.00","Reception of Abhisek Das on 12/03/2023 Ground Floor","1","2023-02-01 13:08:49","157.41.224.78","","","","","","0");
INSERT INTO yashoda22__mr VALUES("117","2023-01-31","R","117","87","3","40000.00","Reception of Prasanna Kumar Nayak on 24/05/2023 1st Floor","1","2023-02-01 13:11:36","157.41.224.78","","","","","","0");



CREATE TABLE `yashoda22__other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `no` text CHARACTER SET latin1 NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `goodsvalue` decimal(15,2) NOT NULL,
  `id_taxmaster` int(11) NOT NULL,
  `gstper` decimal(8,2) NOT NULL,
  `gstamount` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `remark` text CHARACTER SET latin1 NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(40) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `yashoda22__partner` (
  `id_partner` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`id_partner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `yashoda22__reservation` (
  `id_reservation` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `id_roomtype` int(11) DEFAULT NULL,
  `id_rooms` int(11) DEFAULT NULL,
  `meal` varchar(15) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL,
  `verification` text NOT NULL,
  `cancel_by` int(11) NOT NULL,
  `cancel_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  `id_corporate` int(11) NOT NULL,
  `no` varchar(30) DEFAULT NULL,
  `est_depature_date` date DEFAULT NULL,
  `time` varchar(15) DEFAULT NULL,
  `ano` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `oname` varchar(60) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `fax` text DEFAULT NULL,
  `id_proof` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `faddress` text DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `daysstay` text DEFAULT NULL,
  `depature_date` date DEFAULT NULL,
  `refer` text DEFAULT NULL,
  `booking_no` text DEFAULT NULL,
  `arrivedfrom` text DEFAULT NULL,
  `depature_time` text DEFAULT NULL,
  `roomnumber` text DEFAULT NULL,
  `rent` int(11) DEFAULT NULL,
  `extra` decimal(15,2) DEFAULT NULL,
  `food` decimal(15,2) DEFAULT NULL,
  `foodpersons` int(11) DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `roomcategory` text DEFAULT NULL,
  `discount` decimal(15,2) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `less` decimal(15,2) DEFAULT NULL,
  `rentday` decimal(15,2) DEFAULT NULL,
  `withtax` decimal(15,2) DEFAULT NULL,
  `company` text DEFAULT NULL,
  `gstin` text DEFAULT NULL,
  `advancecash` text DEFAULT NULL,
  `card` text DEFAULT NULL,
  `bank` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `food_type` varchar(20) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `gstamt` decimal(15,2) DEFAULT NULL,
  `billinst` text DEFAULT NULL,
  `json` text DEFAULT NULL,
  `grcno` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `est_depature_time` varchar(10) NOT NULL,
  `billno` int(11) DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `actual_amount` decimal(15,2) NOT NULL,
  `advance_amount` decimal(15,2) NOT NULL,
  `id_proof_upload` varchar(200) DEFAULT NULL,
  `approve` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__reservation VALUES("1","Aseem Bastia","Offline","","india","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:32:51","1","2022-10-11 00:00:00","0","1","2022-04-19","","","8249370105","","","Nuabazar","Cuttack","ctc","odisha","","","Marriage","","","800","","","1","","","","","","1,101,102","","","","","50000.00","","0.00","","","","","","","","","","","","","0.00","1, 101,102","[{"name":"1","tax_per":"0.00","price":"45000","discount":"","gstamt":"0.00","total":"45000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","1","2022-04-20","","","","50000.00","50000.00","uploads/05082022_1153_","0");
INSERT INTO yashoda22__reservation VALUES("2","Ashok Kumar Panda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:34:29","1","2022-10-11 00:00:00","0","2","2022-04-01","","","9658739528","","","Bhagatpur ","CTC","CTC","Odisha","","","Marriage","","","500","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"0","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"}]","2","2022-04-22","","","","30000.00","30000.00","uploads/16082022_1248_","0");
INSERT INTO yashoda22__reservation VALUES("3","Prabhu Prasana behera","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:35:44","1","2022-10-11 00:00:00","0","3","2022-04-01","","","9078387647","","","Gosala","Cuttack","Cuttack","Odisha","","","Reception","","","1500","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","3","2022-04-23","","","","30000.00","30000.00","uploads/18082022_1141_","0");
INSERT INTO yashoda22__reservation VALUES("4","Sanjeeb Mohanty","Offline","","","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:30:58","1","2022-10-11 00:00:00","0","4","2022-04-02","","","7788013100","","","Khannagar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","4","2022-04-24","","","","30000.00","30000.00","uploads/18082022_1149_","0");
INSERT INTO yashoda22__reservation VALUES("5","Hadibandhu Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-12 11:17:14","1","2022-10-12 00:00:00","0","5","2022-04-27","","","9437268405","","","Sikharpur","Cuttack","Cuttack","Odisha","","","Marriage","","","1500","","","1","","","","","","1,101,102","","","","","50000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"45000","discount":"","gstamt":"0.00","total":"45000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","5","2022-04-27","","","","50000.00","50000.00","uploads/18082022_1156_","0");
INSERT INTO yashoda22__reservation VALUES("6","Jyoti prakash Behera","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 18:20:09","1","2022-10-11 00:00:00","0","6","2022-04-30","","","9040227763","","","Ranihat","Cuttack","Cuttack","Odisha","","","Reception","","","1200","","","1","","","","","","1,101,102","","","","","50000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"45000","discount":"","gstamt":"0.00","total":"45000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","6","2022-05-01","","","","50000.00","50000.00","uploads/18082022_1201_","0");
INSERT INTO yashoda22__reservation VALUES("7","Bibhuti Bhusan Mohapatra","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-12 11:00:48","1","2022-10-12 00:00:00","0","7","2022-04-12","","","8368516432","","","B.K Road","Cuttack","Cuttack","Odisha","","","Marriage","","","800","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","7","2022-05-03","","","","30000.00","30000.00","uploads/18082022_1206_","0");
INSERT INTO yashoda22__reservation VALUES("8","Soumya Ranjan Behera","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:26:30","1","2022-10-11 00:00:00","0","8","2022-04-15","","","7978008552","","","42 mouza","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"0","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"}]","8","2022-05-04","","","","30000.00","30000.00","uploads/18082022_1214_","0");
INSERT INTO yashoda22__reservation VALUES("9","Sudhir Panda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:39:01","1","2022-10-11 00:00:00","0","9","2022-04-01","","","7978952346","","","Srikrishna Bihar","Cuttack","Cuttack","Odisha","","","Thread ceremony","","","800","","","1","","","","","","2,201,202","","","","","20000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"2","tax_per":"0.00","price":"20000","discount":"","gstamt":"0.00","total":"20000.00"},{"name":"201","tax_per":"0.00","price":"0","discount":"","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"0.00","price":"0","discount":"","gstamt":"0","total":"0.00"}]","9","2022-05-04","","","","20000.00","20000.00","uploads/18082022_1222_","0");
INSERT INTO yashoda22__reservation VALUES("10","Susil Kumar Mishra","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:24:07","1","2022-10-11 00:00:00","0","10","2022-04-20","","","9437044160","","","Palamandap","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","10","2022-05-13","","","","30000.00","30000.00","uploads/18082022_1227_","0");
INSERT INTO yashoda22__reservation VALUES("11","Atmadev Panda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:25:10","1","2022-10-11 00:00:00","0","11","2022-04-20","","","9738065067","","","Gosala","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"2","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"201","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"202","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","11","2022-05-13","","","","30000.00","30000.00","uploads/18082022_1234_","0");
INSERT INTO yashoda22__reservation VALUES("12","Rakesh Kumar Sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:21:58","1","2022-10-11 00:00:00","0","12","2022-04-23","","","9861430840","","","Biswanath Sweets","Cuttack","Cuttack","Odisha","","","Reception","","","1100","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","12","2022-05-18","","","","30000.00","30000.00","uploads/18082022_1248_","0");
INSERT INTO yashoda22__reservation VALUES("13","Alok Kumar Ghosh","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:23:03","1","2022-10-11 00:00:00","0","13","2022-04-22","","","8598873916","","","Chatra Bazar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","13","2022-05-22","","","","30000.00","30000.00","uploads/18082022_1255_","0");
INSERT INTO yashoda22__reservation VALUES("14","Laxmidhar Pasayat","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 17:36:30","1","2022-10-11 00:00:00","0","14","2022-04-25","","","9938313472","","","Nuapada","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"25000","discount":"0","gstamt":"0.00","total":"25000.00"},{"name":"101","tax_per":"0","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","14","2022-05-25","","","","30000.00","30000.00","uploads/18082022_1303_","0");
INSERT INTO yashoda22__reservation VALUES("15","Trailokyanath Kanungoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 18:24:30","1","2022-10-11 00:00:00","0","15","2022-05-27","","","9437310420","","","Raja bagicha","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","50000.00","","0.00","","","","","","","","","","","","","7627.12","","[{"name":"1","tax_per":"18.00","price":"37372.88","discount":"","gstamt":"6727.12","total":"44100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","15","2022-05-27","","","","50000.00","50000.00","uploads/18082022_1316_","0");
INSERT INTO yashoda22__reservation VALUES("16","Sukanta Kumar Patra","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:01:42","1","2022-10-11 00:00:00","0","16","2022-05-31","","","9437607112","","","Nuapada","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","60000.00","","0.00","","","","","","","","","","","","","9152.54","","[{"name":"1","tax_per":"18.00","price":"45847.46","discount":"","gstamt":"8252.54","total":"54100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","16","2022-06-01","","","","60000.00","60000.00","uploads/19082022_1054_","0");
INSERT INTO yashoda22__reservation VALUES("17","Pravat Biswal","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:00:10","1","2022-10-11 00:00:00","0","17","2022-06-03","","","1111111111","","","Mahanadi Bihar","Cuttack","Cuttack","Odisha","","","Reception","","","2000","","","1","","","","","","1,101,102","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"1","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"101","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"102","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","17","2022-06-03","","","","20000.00","20000.00","uploads/19082022_1100_","0");
INSERT INTO yashoda22__reservation VALUES("18","Lakhmidhar Dhala","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:56:59","1","2022-10-11 00:00:00","0","18","2022-06-10","","","9040378085","","","OTS","Cuttack","Cuttack","Odisha","","","Reception","","","900","","","1","","","","","","2,201,202","","","","","50000.00","","0.00","","","","","","","","","","","","","7627.12","","[{"name":"2","tax_per":"18.00","price":"37372.88","discount":"0","gstamt":"6727.12","total":"44100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","18","2022-06-10","","","","50000.00","50000.00","uploads/19082022_1105_","0");
INSERT INTO yashoda22__reservation VALUES("19","Subash Chandra Barik","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:55:03","1","2022-10-11 00:00:00","0","19","2022-06-22","","","9583250309","","","Kalupada","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"1","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"101","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"102","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","19","2022-06-22","","","","20000.00","20000.00","uploads/19082022_1111_","0");
INSERT INTO yashoda22__reservation VALUES("20","Silpa Nanda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-12 10:35:10","1","2022-10-12 00:00:00","0","20","2022-06-03","","","9040987370","","","Auroundaya Market","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","50000.00","","0.00","","","","","","","","","","","","","7627.12","","[{"name":"1","tax_per":"18.00","price":"37372.88","discount":"","gstamt":"6727.12","total":"44100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","20","2022-07-03","","","","50000.00","50000.00","uploads/19082022_1117_","0");
INSERT INTO yashoda22__reservation VALUES("21","Bhabagrahi Das","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:17:58","1","2022-10-11 00:00:00","0","21","2022-06-04","","","9438569499","","","Kalyan Nagar","Cuttack","Cuttack","Odisha","","","Marriage","","","800","","","1","","","","","","2,201,202","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"2","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"201","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","21","2022-07-03","","","","20000.00","20000.00","uploads/19082022_1121_","0");
INSERT INTO yashoda22__reservation VALUES("22","Keshab Chandra Dalai","Online","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:17:13","1","2022-10-11 00:00:00","0","22","2022-06-06","","","9338341291","","","Sikharpur","Cuttack","Cuttack","Odisha","","","Reception","","","1400","","","1","","","","","","1,101,102","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"1","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"101","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"102","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","22","2022-07-06","","","","20000.00","20000.00","uploads/19082022_1127_","0");
INSERT INTO yashoda22__reservation VALUES("23","Kartik Chandra Debata","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:10:36","1","2022-10-11 00:00:00","0","23","2022-06-09","","","9437595904","","","Jhinkiria","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","2,201,202","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"2","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"201","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","23","2022-07-06","","","","20000.00","20000.00","uploads/19082022_1131_","0");
INSERT INTO yashoda22__reservation VALUES("24","Partha Beura","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 18:22:15","1","2022-10-11 00:00:00","0","24","2022-04-24","","","7008634801","","","Shankarpur","Cuttack","Cuttack","Odisha","","","Marriage","","","1400","","","1","","","","","","1,101,102","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"1","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"101","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"102","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","24","2022-07-08","","","","20000.00","20000.00","uploads/19082022_1135_","0");
INSERT INTO yashoda22__reservation VALUES("25","Bidyanath Behera","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:07:27","1","2022-10-11 00:00:00","0","25","2022-06-15","","","9337888898","","","Choudwar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","2,201,202","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"2","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"201","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","25","2022-07-08","","","","20000.00","20000.00","uploads/19082022_1139_","0");
INSERT INTO yashoda22__reservation VALUES("26","Srikanta Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:04:10","1","2022-10-11 00:00:00","0","26","2022-06-19","","","9438566991","","","Balisahi","Cuttack","Cuttack","Odisha","","","Reception","","","1300","","","1","","","","","","1,101,102","","","","","20000.00","","0.00","","","","","","","","","","","","","3050.85","","[{"name":"1","tax_per":"18.00","price":"16949.15","discount":"","gstamt":"3050.85","total":"20000.00"},{"name":"101","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"},{"name":"102","tax_per":"0.00","price":"00","discount":"","gstamt":"0","total":"0.00"}]","26","2022-07-15","","","","20000.00","20000.00","uploads/19082022_1143_","0");
INSERT INTO yashoda22__reservation VALUES("27","Kishore Kumar Tripathy","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:45:07","1","2022-10-11 00:00:00","0","27","2022-06-01","","","9776343717","","","Kajidhia","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","27","2022-11-30","","","","30000.00","10000.00","uploads/22082022_1133_","0");
INSERT INTO yashoda22__reservation VALUES("28","Pranita Das","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:41:16","1","2022-10-11 00:00:00","0","28","2022-03-16","","","9437960816","","","Mahanadi Bihar","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","40000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"35000","discount":"0","gstamt":"0.00","total":"35000.00"},{"name":"101","tax_per":"0","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"}]","28","2022-11-29","","","","40000.00","40000.00","uploads/22082022_1138_","0");
INSERT INTO yashoda22__reservation VALUES("29","Pulin Kumar Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:46:32","1","2022-10-11 00:00:00","0","29","2022-02-04","","","9078525202","","","Badambadi","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","40000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"00","price":"35000","discount":"","gstamt":"0.00","total":"35000.00"},{"name":"101","tax_per":"00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","29","2022-11-20","","","","40000.00","40000.00","uploads/22082022_1145_","0");
INSERT INTO yashoda22__reservation VALUES("30","Gobindo Chandra Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-09 20:20:47","1","2022-12-09 00:00:00","0","30","2022-06-01","","","9937194020","","","Rajendra Nagar","Cuttack","Cuttack","Odisha","","","Marriage","","","900","","","1","","","","","","2,201,202","","","","","80000.00","","0.00","","","","","","","","","","","","","12203.39","","[{"name":"2","tax_per":"18.00","price":"62796.61","discount":"","gstamt":"11303.39","total":"74100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","30","2022-11-30","","","","80000.00","10000.00","uploads/22082022_1158_","0");
INSERT INTO yashoda22__reservation VALUES("31","Anirudha Nayak","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-09 20:09:44","1","2022-12-09 00:00:00","0","31","2022-06-01","","","7978921532","","","Utkal Packaging","Cuttack","Cuttack","Odisha","","","Marriage","","","1500","","","1","","","","","","1,2,101,102,201,202","","","","","100000.02","","0.00","","","","","","","","","","","","","15254.24","","[{"name":"1","tax_per":"18.00","price":"37372.89","discount":"","gstamt":"6727.12","total":"44100.01"},{"name":"2","tax_per":"18.00","price":"37372.89","discount":"","gstamt":"6727.12","total":"44100.01"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","31","2022-11-27","","","","80000.00","20000.00","uploads/22082022_1207_","0");
INSERT INTO yashoda22__reservation VALUES("32","Pratap Kumar Pattnaik","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:16:15","1","2022-10-11 00:00:00","0","32","2022-06-07","","","9337274394","","","Choudwar","Cuttack","Cuttack","Odisha","","","Marriage","","","900","","","1","","","","","","2,201,202","","","","","29999.99","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.72","discount":"","gstamt":"3676.27","total":"24099.99"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","32","2022-11-29","","","","30000.00","10000.00","uploads/22082022_1211_","0");
INSERT INTO yashoda22__reservation VALUES("33","Biranchi Narayan Sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-09 19:55:05","1","2022-12-09 00:00:00","0","33","2022-06-01","","","9437032737","","","Khannagar","Cuttack","Cuttack","Odisha","","","Marriage","","","2000","","","1","","","","","","1,2,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"2","tax_per":"18.00","price":"0","discount":"","gstamt":"0","total":"0.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"201","tax_per":"18.00","price":"0","discount":"","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"18.00","price":"0","discount":"","gstamt":"0","total":"0.00"}]","33","2022-11-11","","","","60000.00","10000.00","uploads/22082022_1221_","0");
INSERT INTO yashoda22__reservation VALUES("34","Rajkishore","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:49:20","1","2022-10-11 00:00:00","0","34","2022-05-30","","","9437135630","","","Chauliaganj","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","34","2022-11-25","","","","30000.00","10000.00","uploads/22082022_1233_","0");
INSERT INTO yashoda22__reservation VALUES("35","Prabir Kumar Swain","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-09 20:01:36","1","2022-12-09 00:00:00","0","35","2022-06-01","","","9861044488","","","Mahanadi Bihar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","35","2022-11-23","","","","40000.00","10000.00","uploads/22082022_1238_","0");
INSERT INTO yashoda22__reservation VALUES("36","Anil Kumar Verma","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:42:43","1","2022-10-11 00:00:00","0","36","2022-07-04","","","9412216653","","","Badambadi","Cuttack","Cuttack","Odisha","","","Marriage","","","900","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","36","2022-11-25","","","","30000.00","10000.00","uploads/22082022_1243_","0");
INSERT INTO yashoda22__reservation VALUES("37","Bijaya Kumar Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:34:45","1","2022-10-11 00:00:00","0","37","2022-06-01","","","9937364282","","","Nayabazar","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","37","2022-12-04","","","","30000.00","10000.00","uploads/22082022_1253_","0");
INSERT INTO yashoda22__reservation VALUES("38","Duryadhana Patra","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:48:26","1","2022-10-11 00:00:00","0","38","2022-06-17","","","9437073564","","","Dargapatana","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","38","2022-12-07","","","","30000.00","10000.00","uploads/22082022_1257_","0");
INSERT INTO yashoda22__reservation VALUES("39","Padmanabha Sahu","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:53:24","1","2022-10-11 00:00:00","0","39","2022-05-25","","","7899803325","","","CDA","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","40000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"35000","discount":"","gstamt":"0.00","total":"35000.00"},{"name":"101","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0.00","price":"2500","discount":"","gstamt":"0.00","total":"2500.00"}]","39","2022-12-11","","","","40000.00","40000.00","uploads/22082022_1308_","0");
INSERT INTO yashoda22__reservation VALUES("40","Nabakishore Sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-26 13:11:57","1","2022-12-26 00:00:00","0","40","2022-05-30","","","9437058220","","","CTC Saraswati collage","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","60000.00","","0.00","","","","","","","","","","","","","9152.54","","[{"name":"1","tax_per":"18.00","price":"45847.46","discount":"0","gstamt":"8252.54","total":"54100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","40","2022-12-14","","","","30000.00","10000.00","uploads/22082022_1335_","0");
INSERT INTO yashoda22__reservation VALUES("41","Brundawan Swain","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-26 13:02:32","1","2022-12-26 00:00:00","0","41","2022-06-08","","","7606005771","","","Bakhrabad","Cuttack","Cuttack","Odisha","","","Marriage","","","2000","","","1","","","","","","1,2,101,102,201,202","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18","price":"23898.31","discount":"","gstamt":"4301.70","total":"28200.01"},{"name":"2","tax_per":"","price":"","discount":"","gstamt":"0","total":"0.00"},{"name":"101","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"201","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","41","2022-12-02","","","","40000.00","30000.00","uploads/22082022_1338_","0");
INSERT INTO yashoda22__reservation VALUES("42","Saroj Kumar Panda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:15:13","1","2022-10-11 00:00:00","0","42","2022-06-08","","","9437020126","","","Prafessorpada","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","42","2022-12-09","","","","30000.00","10000.00","uploads/22082022_1342_","0");
INSERT INTO yashoda22__reservation VALUES("43","Prasajeet Khatua","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:45:40","1","2022-10-11 00:00:00","0","43","2022-06-14","","","7008058285","","","Gosala road","Cuttack","Cuttack","Odisha","","","Reception","","","900","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","43","2022-12-18","","","","30000.00","10000.00","uploads/22082022_1346_","0");
INSERT INTO yashoda22__reservation VALUES("44","Udaybir Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-26 13:14:20","1","2022-12-26 00:00:00","0","44","2022-06-29","","","7504400686","","","Mahanadi Bihar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","2,201,202","","","","","60000.00","","0.00","","","","","","","","","","","","","9152.54","","[{"name":"2","tax_per":"18.00","price":"45847.46","discount":"0","gstamt":"8252.54","total":"54100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","44","2022-12-11","","","","30000.00","10000.00","uploads/22082022_1513_","0");
INSERT INTO yashoda22__reservation VALUES("45","Jayanti Sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-26 13:11:01","1","2022-12-26 00:00:00","0","45","2022-07-03","","","9937444481","","","","Cuttack","Cuttack","Odisha","","","Marriage","","","900","","","1","","","","","","2,201,202","","","","","60000.00","","0.00","","","","","","","","","","","","","9152.54","","[{"name":"2","tax_per":"18.00","price":"45847.46","discount":"0","gstamt":"8252.54","total":"54100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","45","2022-12-04","","","","50000.00","10000.00","uploads/22082022_1517_","0");
INSERT INTO yashoda22__reservation VALUES("46","Suresh Chandra Pati","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:42:11","1","2022-10-11 00:00:00","0","46","2022-07-11","","","9861532044","","","Shankarpur","Cuttack","Cuttack","Odisha","","","Marriage","","","800","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","46","2022-12-14","","","","30000.00","10000.00","uploads/22082022_1520_","0");
INSERT INTO yashoda22__reservation VALUES("47","Anand Sethi","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:45:35","1","2022-10-11 00:00:00","0","47","2022-07-27","","","7008107446","","","Bidyadharapur","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","47","2022-12-18","","","","30000.00","10000.00","uploads/22082022_1524_","0");
INSERT INTO yashoda22__reservation VALUES("48","Kiran Kumar Parija","Online","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 11:45:50","1","2022-10-11 00:00:00","0","48","2022-07-27","","","9337727246","","","Gosala road","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","48","2022-12-09","","","","30000.00","10000.00","uploads/22082022_1556_","0");
INSERT INTO yashoda22__reservation VALUES("49","Sai Sarthak Dash","Offline","","India","","","","","","","","","1","2022-12-26","0","","5","2022-12-26 13:04:18","1","2022-10-11 00:00:00","0","49","2022-07-27","","","7978461237","","","Kalyan Nagar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","49","2022-12-03","","","Marriage cancel","30000.00","10000.00","uploads/22082022_1559_","0");
INSERT INTO yashoda22__reservation VALUES("50","Bijya Kumar Das","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-12-15 15:48:58","1","2022-12-15 00:00:00","0","50","2022-08-02","","","9937460743","","","Balisahi","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","50","2023-02-19","","","","30000.00","10000.00","uploads/22082022_1602_","0");
INSERT INTO yashoda22__reservation VALUES("51","Nihar Ranjan Nayak","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:59:02","1","2022-10-11 00:00:00","0","51","2022-05-10","","","9861010936","","","Kalyan Nagar","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","40000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"1","tax_per":"0.00","price":"35000","discount":"0","gstamt":"0.00","total":"35000.00"},{"name":"101","tax_per":"0","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"},{"name":"102","tax_per":"0","price":"2500","discount":"0","gstamt":"0.00","total":"2500.00"}]","51","2023-01-25","","","","40000.00","40000.00","uploads/22082022_1607_","0");
INSERT INTO yashoda22__reservation VALUES("52","Sambham Mishra","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:07:35","1","2022-10-11 00:00:00","0","52","2022-06-10","","","7008538606","","","Shankarpur","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","2,201,202","","","","","39999.99","","0.00","","","","","","","","","","","","","6101.69","","[{"name":"2","tax_per":"18.00","price":"28898.30","discount":"","gstamt":"5201.69","total":"34099.99"},{"name":"201","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","52","2023-01-29","","","","40000.00","40000.00","uploads/22082022_1634_","0");
INSERT INTO yashoda22__reservation VALUES("53","Rashmi Samal","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:45:26","1","2022-10-11 00:00:00","0","53","2022-06-15","","","9338823129","","","Nuapada","Cuttack","Cuttack","Odisha","","","Reception","","","1200","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","53","2023-01-18","","","","30000.00","10000.00","uploads/22082022_1636_","0");
INSERT INTO yashoda22__reservation VALUES("54","Arunima Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:44:58","1","2022-10-11 00:00:00","0","54","2022-06-24","","","9437925779","","","Gopalpur","Cuttack","Cuttack","Odisha","","","Marriage","","","1000","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","54","2023-01-15","","","","30000.00","30000.00","uploads/22082022_1640_","0");
INSERT INTO yashoda22__reservation VALUES("55","Balabhadra Acharya","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:43:35","1","2022-10-11 00:00:00","0","55","2022-07-04","","","8328827655","","","Srikrishna Bihar","Cuttack","Cuttack","Odisha","","","Reception","","","1200","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","55","2023-01-29","","","","30000.00","10000.00","uploads/22082022_1644_","0");
INSERT INTO yashoda22__reservation VALUES("56","Bijya Kumar Maharana","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2023-01-31 17:26:10","1","2023-01-31 00:00:00","0","56","2022-07-24","","","7978065205","","","Netaji Nagar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","0","0","1","","","","","","1,101,102","","","","","50000.00","","0.00","","","","","","","","","","","","","7627.12","","[{"name":"1","tax_per":"18.00","price":"37372.88","discount":"","gstamt":"6727.12","total":"44100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","56","2023-01-17","","","","50000.00","10000.00","uploads/22082022_1647_","0");
INSERT INTO yashoda22__reservation VALUES("57","Snehasish Panda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:22:13","1","2022-10-11 00:00:00","0","57","2022-08-10","","","9778720715","","","Rajendra Nagar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","39999.99","","0.00","","","","","","","","","","","","","6101.69","","[{"name":"1","tax_per":"18.00","price":"28898.30","discount":"","gstamt":"5201.69","total":"34099.99"},{"name":"101","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","57","2023-01-22","","","","40000.00","40000.00","uploads/22082022_1650_","0");
INSERT INTO yashoda22__reservation VALUES("58","Prativa Manjari Bhatta","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:09:47","1","2022-10-11 00:00:00","0","58","2022-06-10","","","9776337574","","","Nuapada","Cuttack","Cuttack","Odisha","","","Marriage","","","2000","","","1","","","","","","1,2,101,102,201,202","","","","","79999.98","","0.00","","","","","","","","","","","","","12203.38","","[{"name":"1","tax_per":"18.00","price":"28898.30","discount":"","gstamt":"5201.69","total":"34099.99"},{"name":"2","tax_per":"18","price":"28898.30","discount":"","gstamt":"5201.69","total":"34099.99"},{"name":"101","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"201","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","58","2023-02-22","","","","80000.00","40000.00","uploads/22082022_1653_","0");
INSERT INTO yashoda22__reservation VALUES("59","Satish Mohapatra","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-12 10:24:39","1","2022-10-12 00:00:00","0","59","2022-06-18","","","7978072352","","","Mahanadi Bihar","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.732","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","59","2023-02-01","","","","30000.00","10000.00","uploads/22082022_1656_","0");
INSERT INTO yashoda22__reservation VALUES("60","Aseem bastia","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 17:12:22","1","2022-10-11 00:00:00","0","60","2022-08-16","","","7008794461","","","Bidyadharapur","Cuttack","Cuttack","Odisha","","","Reception","","","1200","","","1","","","","","","1,101,102","","","","","39999.99","","0.00","","","","","","","","","","","","","6101.69","","[{"name":"1","tax_per":"18.00","price":"28898.30","discount":"","gstamt":"5201.69","total":"34099.99"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","60","2023-02-26","","","","40000.00","10000.00","uploads/22082022_1700_","0");
INSERT INTO yashoda22__reservation VALUES("61","B.S Tripathy","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 12:42:26","1","2022-10-11 00:00:00","0","61","2022-07-10","","","9437062882","","","Jhanjiri Mangala","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","61","2023-02-12","","","","30000.00","10000.00","uploads/22082022_1704_","0");
INSERT INTO yashoda22__reservation VALUES("62","Debasish Pati","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-11 13:23:09","1","2022-10-11 00:00:00","0","62","2022-09-01","","","9937044212","","","Rajendra Nagar","Cuttack","Cuttack","Odisha","","","Thread ceremony","","","1200","","","1","","","","","","1,101,102","","","","","39999.99","","0.00","","","","","","","","","","","","","6101.69","","[{"name":"1","tax_per":"18.00","price":"28898.30","discount":"","gstamt":"5201.69","total":"34099.99"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","62","2023-01-27","","","","40000.00","10000.00","uploads/07092022_1153_","0");
INSERT INTO yashoda22__reservation VALUES("63","Silpa Nanda","Offline","","India","","","","","","","","","0","0000-00-00","0","","5","2022-10-12 10:39:57","1","2022-10-12 00:00:00","0","63","2022-06-14","","","9040987370","","","Auroundaya Market","Cuttack","Cuttack","Odisha","","","Engagement","","","900","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"2","tax_per":"0.00","price":"30000","discount":"0","gstamt":"0.00","total":"30000.00"},{"name":"201","tax_per":"0","price":"0","discount":"0","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"0","price":"0","discount":"0","gstamt":"0","total":"0.00"}]","63","2022-04-17","","","","30000.00","30000.00","uploads/07092022_1204_","0");
INSERT INTO yashoda22__reservation VALUES("64","Lisilina Mohapatra","Offline","","India","","","","","","","","","1","2022-10-12","0","","1","2022-10-12 12:30:39","0","0000-00-00 00:00:00","0","64","2022-04-18","","","9439827394","","","Darghapatna","Cuttack","CTC","Odisha","","","Marriage","","","500","","","1","","","","","","2,201,202","","","","","20000.00","","0.00","","","","","","","","","","","","","0.00","","[{"name":"2","tax_per":"0.00","price":"20000","discount":"","gstamt":"0.00","total":"20000.00"},{"name":"201","tax_per":"0.00","price":"0","discount":"","gstamt":"0","total":"0.00"},{"name":"202","tax_per":"0.00","price":"0","discount":"","gstamt":"0","total":"0.00"}]","64","2022-12-04","","","Marriage Cancel and payment Return on date 30/05/2022 of Rs. 20000/-","20000.00","20000.00","uploads/12102022_1057_","0");
INSERT INTO yashoda22__reservation VALUES("65","Saumya Shree Acharya","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-02-01 12:28:41","1","2023-02-01 00:00:00","0","65","2022-10-14","","","7008193171","","","Brahamapur, 42 Mouza","Cuttack","CTC","Odisha","","","Marriage","","","1000","0","0","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","65","2023-01-28","","","","40000.00","10000.00","uploads/14102022_1648_","0");
INSERT INTO yashoda22__reservation VALUES("66","Ankit Parida","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-10-19 14:09:43","1","2022-10-19 00:00:00","0","66","2022-10-18","","","7008097941","","","Nuapada","CTC","CTC","Odisha","","","Reception","","","1000","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","66","2022-11-23","","","","30000.00","10000.00","uploads/19102022_1355_","0");
INSERT INTO yashoda22__reservation VALUES("67","Deepak Kumar sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-10-19 14:10:36","1","2022-10-19 00:00:00","0","67","2022-10-18","","","8917368123","","","Khanagar","CTC","CTC","Odisha","","","Marriage","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","67","2023-02-15","","","","30000.00","10000.00","uploads/19102022_1357_","0");
INSERT INTO yashoda22__reservation VALUES("68","Sasmita Sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-10-19 14:11:11","1","2022-10-19 00:00:00","0","68","2022-10-18","","","7381854872","","","Nuapada","CTC","CTC","Odisha","","","Marriage","","","700","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","68","2023-02-10","","","","30000.00","10000.00","uploads/19102022_1402_","0");
INSERT INTO yashoda22__reservation VALUES("69","Sunil Kumar Guin","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-10-19 14:11:40","1","2022-10-19 00:00:00","0","69","2022-10-19","","","9853730503","","","Shrikrishna Vihar","CTC","CTC","Odisha","","","Reception","","","500","","","1","","","","","","2,201,202","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"2","tax_per":"18.00","price":"20423.73","discount":"","gstamt":"3676.27","total":"24100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","69","2023-02-03","","","","30000.00","10000.00","uploads/19102022_1404_","0");
INSERT INTO yashoda22__reservation VALUES("70","Upendranath Tripathy","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-10-25 00:00:00","0","0000-00-00 00:00:00","0","70","2022-10-25","","","6371159053","","","Aitalanga","Cuttack","Cuttack","Odisha","","","Reception","","","1000","","","1","","","","","","1,101,102","","","","","30000.00","","0.00","","","","","","","","","","","","","4576.27","","[{"name":"1","tax_per":"18","price":"20423.73","discount":"0","gstamt":"3676.27","total":"24100.00"},{"name":"101","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","70","2023-02-01","","","","30000.00","10000.00","uploads/25102022_1437_","0");
INSERT INTO yashoda22__reservation VALUES("71","Ashok Pattnayak","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-11-01 00:00:00","0","0000-00-00 00:00:00","0","71","2022-11-01","","","9337116273","","","Badambadi","Cuttack","Cuttack","Odisha","","","Marriage","","","800","","","1","","","","","","2,201,202,203,204,301,303","","","","","50000.00","","0.00","","","","","","","","","","","","","7627.12","","[{"name":"2","tax_per":"18","price":"27372.88","discount":"0","gstamt":"4927.12","total":"32300.00"},{"name":"201","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"203","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"204","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"301","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"303","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","71","2023-02-24","","","","50000.00","10000.00","uploads/01112022_1040_","0");
INSERT INTO yashoda22__reservation VALUES("72","Nalini Prava Sahoo","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-01-31 18:05:58","1","2023-01-31 00:00:00","0","72","2022-11-04","","","9938910588","","","Chauliganj","CTC","CTC","Odisha","","","Marriage","","","500","0","0","1","","","","","","2,201,202","","","","","50000.00","","0.00","","","","","","","","","","","","","7627.12","","[{"name":"2","tax_per":"18.00","price":"37372.88","discount":"0","gstamt":"6727.12","total":"44100.00"},{"name":"201","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","72","2023-01-27","","","","50000.00","10000.00","uploads/04112022_1801_","0");
INSERT INTO yashoda22__reservation VALUES("73","Subhashree Panda","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-15 15:52:05","1","2022-12-15 00:00:00","0","73","2022-11-20","","","8917438869","","","Kalyan Nagar","Cuttack","Cuttack","Odisha","","","Marriage","","","600","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","73","2023-02-10","","","","40000.00","30000.00","uploads/22112022_1123_","0");
INSERT INTO yashoda22__reservation VALUES("74","Jaganath Parida","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-15 00:00:00","0","0000-00-00 00:00:00","0","74","2022-11-30","","","9439166639","","","Khanagar","Cuttack","CTC","Odisha","","","Reception","","","2000","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18.00%","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00%","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","74","2023-02-03","","","","40000.00","40000.00","uploads/15122022_1600_","0");
INSERT INTO yashoda22__reservation VALUES("75","Pradipta Swain","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-15 00:00:00","0","0000-00-00 00:00:00","0","75","2022-12-12","","","9439874760","","","Tinigharia","CTC","CTC","Odisha","","","Marriage","","","800","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","75","2023-03-10","","","","40000.00","20000.00","uploads/15122022_1620_","0");
INSERT INTO yashoda22__reservation VALUES("76","Bikram Keshari Bastia","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-15 00:00:00","0","0000-00-00 00:00:00","0","76","2022-12-13","","","7504423975","","","Sartola","CTC","CTC","Odisha","","","Marriage","","","2000","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","76","2023-02-24","","","","40000.00","10000.00","uploads/15122022_1622_","0");
INSERT INTO yashoda22__reservation VALUES("77","P.K.Padhihari","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-15 00:00:00","0","0000-00-00 00:00:00","0","77","2022-12-14","","","9599730794","","","Nua","CTC","CTC","o","","","Marriage","","","500","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","77","2023-05-17","","","","40000.00","10000.00","uploads/15122022_1624_","0");
INSERT INTO yashoda22__reservation VALUES("78","Bijaya kumar Mohanty","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-26 00:00:00","0","0000-00-00 00:00:00","0","78","2022-12-18","","","9861114744","","","Nuapada","Cuttack","Cuttack","Odisha","","","Marriage","","","900","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","78","2023-01-15","","","","40000.00","10000.00","uploads/26122022_1241_","0");
INSERT INTO yashoda22__reservation VALUES("79","Madhuchanda Priyadarshini","Offline","","India","","","","","","","","","7","2023-02-22","0","","1","2023-02-22 08:15:27","0","0000-00-00 00:00:00","0","79","2022-12-12","","","9439861520","","","Nuapada","Cuttack","Cuttack","Odisha","","","Marriage","","","800","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","79","2023-12-10","","","fsdfsdafsdf","40000.00","20000.00","uploads/26122022_1244_","0");
INSERT INTO yashoda22__reservation VALUES("80","Minaketan Mohapatra","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2022-12-30 00:00:00","0","0000-00-00 00:00:00","0","80","2022-12-27","","","9777166133","","","Dadhibaban pur","Cuttack","Cuttack","Odisha","","","Reception","","","600","","","1","","","","","","2,201,202","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"2","tax_per":"18","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"201","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","80","2023-03-17","","","","40000.00","20000.00","uploads/30122022_1647_","0");
INSERT INTO yashoda22__reservation VALUES("81","Sitesh","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-01-06 17:37:20","1","2023-01-06 00:00:00","0","81","2022-12-21","","","7381080000","","","Jagatpur","CTC","CTC","Odisha","","","Reception","","","50","","","1","","","","","","1,101,102","","","","","10000.00","","0.00","","","","","","","","","","","","","1525.42","","[{"name":"1","tax_per":"18.00","price":"8474.58","discount":"","gstamt":"1525.42","total":"10000.00"},{"name":"101","tax_per":"0.00","price":"0","discount":"","gstamt":"0","total":"0.00"},{"name":"102","tax_per":"0.00","price":"0","discount":"","gstamt":"0","total":"0.00"}]","81","2022-12-21","","","","10000.00","10000.00","uploads/06012023_1735_","0");
INSERT INTO yashoda22__reservation VALUES("82","Shriharsa Mishra","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-01-06 00:00:00","0","0000-00-00 00:00:00","0","82","2023-01-04","","","8895280002","","","Nuabazar","CTC","CTC","Odisha","","","Marriage","","","300","","","1","","","","","","2,201,202","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"2","tax_per":"18.00","price":"28898.305","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"201","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","82","2023-06-07","","","","40000.00","20000.00","uploads/06012023_1744_","0");
INSERT INTO yashoda22__reservation VALUES("83","Brahmananda Biswal","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-01-13 12:57:51","1","2023-01-13 00:00:00","0","83","2023-01-06","","","9940844787","","","Darghapatna","Cuttack","CTC","Odisha","","","Marriage","","","500","","","1","","","","","","2,201,202","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"2","tax_per":"18.00","price":"28898.31","discount":"","gstamt":"5201.70","total":"34100.01"},{"name":"201","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","83","2023-01-25","","","","40000.00","10000.00","uploads/13012023_1256_","0");
INSERT INTO yashoda22__reservation VALUES("84","Dr. Tophan Kumar Jena","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-01-17 12:07:16","1","2023-01-17 00:00:00","0","84","2023-01-07","","","7978943652","","","Shikharpur ","ctc","ctc","odisha","","","Marriage","","","500","","","1","","","","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.31","discount":"","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18.00","price":"2500","discount":"","gstamt":"450.00","total":"2950.00"}]","84","2023-05-21","","","","40000.00","10000.00","uploads/17012023_1206_","0");
INSERT INTO yashoda22__reservation VALUES("85","Salini Routray","Offline","","","","","","","","","","","0","0000-00-00","0","","1","2023-01-31 00:00:00","0","0000-00-00 00:00:00","0","85","2023-01-19","","","7750061791","","","cuttack","cuttack","cuttack","ODISHA","","","Marriage","","","800","700","100","1","","Relatives","YG23032","","","2,201,202","","","","","39999.99","","0.00","","","","","","","","","","","","","6101.69","","[{"name":"2","tax_per":"18","price":"28898.30","discount":"0","gstamt":"5201.69","total":"34099.99"},{"name":"201","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","85","2023-06-23","","","","40000.00","30000.00","uploads/31012023_1738_","0");
INSERT INTO yashoda22__reservation VALUES("86","Abhisek Das","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-02-01 00:00:00","0","0000-00-00 00:00:00","0","86","2023-01-31","","","7008191254","","","","CUTTACK","Cuttack","ODISHA","","","Reception","","","800","750","50","1","","Friend","YG23033","","","1,101,102","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"1","tax_per":"18.00","price":"28898.305","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"101","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"102","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","86","2023-03-12","","","","40000.00","40000.00","uploads/01022023_1307_","0");
INSERT INTO yashoda22__reservation VALUES("87","Prasanna Kumar Nayak","Offline","","India","","","","","","","","","0","0000-00-00","0","","1","2023-02-01 00:00:00","0","0000-00-00 00:00:00","0","87","2023-01-31","","","9437650565","","","Netaji Nagar","ctc","ctc","odisha","","","Reception","","","500","470","30","1","","Family","YG23034","","","2,201,202","","","","","40000.01","","0.00","","","","","","","","","","","","","6101.70","","[{"name":"2","tax_per":"18.00","price":"28898.31","discount":"0","gstamt":"5201.70","total":"34100.01"},{"name":"201","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"},{"name":"202","tax_per":"18","price":"2500","discount":"0","gstamt":"450.00","total":"2950.00"}]","87","2023-05-24","","","","40000.00","40000.00","uploads/01022023_1310_","0");



CREATE TABLE `yashoda22__rooms` (
  `id_rooms` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `id_roomtype` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available , 1= Unvailables',
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`id_rooms`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO yashoda22__rooms VALUES("1","1","1","0","","0","2022-06-25 12:17:54","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("2","2","1","0","","0","2022-06-25 12:17:57","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("3","101","2","0","","0","2022-06-25 12:18:08","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("4","102","2","0","","0","2022-06-25 12:18:08","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("5","201","2","0","","0","2022-06-25 12:18:08","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("6","202","2","0","","0","2022-06-25 12:18:08","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("7","203","2","0","","0","2022-06-18 11:04:53","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("8","204","2","0","","0","2022-06-18 11:04:56","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("9","301","2","0","","0","2022-06-18 11:04:08","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("10","302","2","0","","0","2022-06-18 11:05:00","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__rooms VALUES("11","303","2","0","","0","2022-06-25 12:16:11","0","0000-00-00 00:00:00");



CREATE TABLE `yashoda22__roomtype` (
  `id_roomtype` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `id_taxmaster` int(11) NOT NULL,
  `image` varchar(60) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` datetime NOT NULL,
  PRIMARY KEY (`id_roomtype`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__roomtype VALUES("1","Banquet","Single","0","1","1600480260_4.jpg","0","","0","2022-08-05 06:41:36","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__roomtype VALUES("2","Room with AC","Single","0","1","1600480680_2.jpg","0","","0","2022-08-05 06:41:38","0","0000-00-00 00:00:00");



CREATE TABLE `yashoda22__taxmaster` (
  `id_taxmaster` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `tax_per` decimal(6,2) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_taxmaster`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__taxmaster VALUES("1","Paid","0.00","","0","","0","2021-07-15 12:06:01","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__taxmaster VALUES("2","GST 5%","5.00","","0","","0","2021-04-25 02:55:07","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__taxmaster VALUES("3","GST 12%","12.00","","0","","0","2021-04-25 02:55:14","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__taxmaster VALUES("4","GST 18%","18.00","","0","","0","2021-04-25 02:55:22","0","0000-00-00 00:00:00");
INSERT INTO yashoda22__taxmaster VALUES("5","GST 28%","28.00","","1","","0","2021-04-25 03:41:26","0","0000-00-00 00:00:00");



CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yashoda22__tb` AS select `yashoda22__ledger`.`dhead` AS `id_head`,round(sum(`yashoda22__ledger`.`total`),2) AS `debit`,0 AS `credit` from `yashoda22__ledger` group by 1 union all select `yashoda22__ledger`.`chead` AS `id_head`,0 AS `debit`,round(sum(`yashoda22__ledger`.`total`),2) AS `credit` from `yashoda22__ledger` group by 1;

INSERT INTO yashoda22__tb VALUES("0","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("2","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("3","400000.00","0.00");
INSERT INTO yashoda22__tb VALUES("4","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("5","885000.00","0.00");
INSERT INTO yashoda22__tb VALUES("6","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("7","2630000.01","0.00");
INSERT INTO yashoda22__tb VALUES("8","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("9","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("10","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("11","2636523.18","0.00");
INSERT INTO yashoda22__tb VALUES("12","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("13","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("14","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("15","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("16","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("17","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("0","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("1","0.00","0.00");
INSERT INTO yashoda22__tb VALUES("2","0.00","502383.18");
INSERT INTO yashoda22__tb VALUES("3","0.00","1300000.01");
INSERT INTO yashoda22__tb VALUES("6","0.00","47812.00");
INSERT INTO yashoda22__tb VALUES("7","0.00","20000.00");
INSERT INTO yashoda22__tb VALUES("10","0.00","489500.00");
INSERT INTO yashoda22__tb VALUES("11","0.00","2615000.00");
INSERT INTO yashoda22__tb VALUES("12","0.00","327951.00");
INSERT INTO yashoda22__tb VALUES("13","0.00","397531.00");
INSERT INTO yashoda22__tb VALUES("14","0.00","111344.00");
INSERT INTO yashoda22__tb VALUES("15","0.00","79567.00");
INSERT INTO yashoda22__tb VALUES("16","0.00","474863.00");
INSERT INTO yashoda22__tb VALUES("17","0.00","185572.00");



CREATE TABLE `yashoda22__voucher` (
  `id_voucher` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `total` decimal(16,2) NOT NULL,
  `memo` text NOT NULL,
  `id_head_debit` int(11) NOT NULL,
  `id_head_credit` int(11) NOT NULL,
  `id_no_debit` int(11) DEFAULT NULL,
  `id_no_credit` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dhead` varchar(4) NOT NULL,
  `chead` varchar(4) NOT NULL,
  `ref1` varchar(40) DEFAULT NULL,
  `ref2` varchar(40) DEFAULT NULL,
  `dbill` varchar(10) NOT NULL,
  `cbill` varchar(10) NOT NULL,
  `reconcile` varchar(1) NOT NULL,
  `original_no` varchar(11) DEFAULT NULL,
  `reconciledate` datetime DEFAULT NULL,
  `approve` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_voucher`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

INSERT INTO yashoda22__voucher VALUES("1","2022-04-14","0","1","30000.00","Marriage on 03.07.2022 of Silpa Nanda","7","11","","","0","157.41.137.156","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("2","2022-04-18","0","2","20000.00","Marriage on 04.12.2022 of Lisilina Mohapatra","7","11","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("3","2022-04-19","0","3","50000.00","Marriage on 20.04.2022 of Deepak Bastia","7","11","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("4","2022-04-22","0","4","20000.00","Marriage on 10.06.2022 of Lakhmidhara Dhala","7","11","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("5","2022-04-23","0","5","20000.00","Marriage on 08.07.2022 of Partha Beura","7","11","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("6","2022-04-30","0","6","43000.00","Laptop Purchase from Nigam Computer","11","2","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("7","2022-04-30","0","7","50000.00","Marriage on 01.05.2022 of Jyoti Prakash Behera","7","11","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("8","2022-04-30","0","8","10916.00","Loan","11","14","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("9","2022-04-30","0","9","28968.00","Loan","11","12","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("10","2022-04-30","0","10","41943.00","LOAN
","11","13","","","0","157.41.248.251","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("11","2022-05-05","0","11","50000.00","Marriage on 27.04.2022 of Hadibandhu Mohanty","7","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("12","2022-05-10","0","12","40000.00","Marriage on 25.01.2023 of Nihar Ranjan Nayak","7","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("13","2022-05-12","0","13","30000.00","Office Expenses","11","10","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("14","2022-05-25","0","14","40000.00","Marriage on 11.12.2022 of Padmanabha Sahoo","7","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("15","2022-05-28","0","15","80000.00","Electry Bills","11","16","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("16","2022-05-30","0","16","20000.00","Return Booking Of Lisilina Mohapatra","11","7","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("17","2022-05-30","0","17","14515.18","AMC of LIFT","11","2","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("18","2022-05-31","0","18","50000.00","Marriage on 27.05.2022 of Trailokyanath Kanungo","7","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("19","2022-05-31","0","19","60000.00","Marriage on 01.06.2022 of Sukant Kumar Patra","7","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("20","2022-05-31","0","20","11280.00","Loan","11","14","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("21","2022-05-31","0","21","29934.00","Loan","11","12","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("22","2022-05-31","0","22","43341.00","Laon","11","13","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("23","2022-06-01","0","23","10000.00","Marriage on 23.11.2022 of Pabir Kumar Swain","7","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","1");
INSERT INTO yashoda22__voucher VALUES("24","2022-06-08","0","24","885000.00","Loan Disbursement of loan Account 0098","5","11","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("25","2022-06-08","0","25","20000.00","Slary of Subrat Kumar Dutta","11","10","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("26","2022-06-09","0","26","9450.00","DG Repairing Material from Srinivas Sales & Service","11","2","","","0","157.41.248.130","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("27","2022-06-10","0","27","50000.00","Marriage on 10.06.2022 of Laxmidhara Dhala","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("28","2022-06-10","0","28","40000.00","Marriage on 29.01.2023 of Dr. Sambhav Mishra","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("29","2022-06-10","0","29","40000.00","Marriage on date 22/02/2023 of Prativa Manjari Bhatta","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("30","2022-06-14","0","30","30000.00","Marriage on date 02/12/2022 of Brundabana Swain","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("31","2022-06-18","0","31","16780.00","GST of May Month","11","17","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("32","2022-06-21","0","32","25660.00","Purchase of Tiles from Ceramic Sales","11","2","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("33","2022-06-29","0","33","70432.00","Electry Bill","11","16","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("34","2022-06-29","0","34","30000.00","Marriage on 15/01/2023 of Arunima Mohanty","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("35","2022-06-30","0","35","10916.00","Loan","11","14","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("36","2022-06-30","0","36","28968.00","Loan","11","12","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("37","2022-06-30","0","37","41943.00","Loan","11","13","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("38","2022-06-30","0","38","3841.00","Loan","11","15","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("39","2022-07-03","0","39","50000.00","Marriage on 03/07/2022 of Silpa Nanda","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("40","2022-07-03","0","40","20000.00","Salary of Subrat Kumar Dutta","11","10","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("41","2022-07-04","0","41","12000.00","Salary Of Pintu Behera","11","10","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("42","2022-07-04","0","42","10000.00","Software purchase from Mohan","11","2","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("43","2022-07-05","0","43","15000.00","Software purchase from mohan","11","2","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("44","2022-07-18","0","44","13728.00","GST","11","17","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("45","2022-07-27","0","45","18162.00","Loan
","11","12","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("46","2022-07-27","0","46","39147.00","Loan","11","13","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("47","2022-07-28","0","47","36307.00","Purchase Sanitary Item From Gayatri Sales & Supply","11","2","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("48","2022-07-28","0","48","63977.00","Electric Bill
","11","16","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("49","2022-07-31","0","49","11280.00","Loan","11","14","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("50","2022-07-31","0","50","38109.00","Loan","11","12","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("51","2022-07-31","0","51","4195.00","Loan","11","13","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("52","2022-07-31","0","52","5412.00","Loan","11","15","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("53","2022-08-02","0","53","8000.00","Salary Of Rajesh","11","10","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("54","2022-08-02","0","54","3500.00","Salary Of Pintu Behera
","11","10","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("55","2022-08-02","0","55","20000.00","Salary of Subrat Kumar Dutta","11","10","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("56","2022-08-10","0","56","40000.00","Booking of Snehasish Panda","7","11","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("57","2022-08-16","0","57","9752.00","GST","11","17","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("58","2022-08-31","0","58","50532.00","Electric Bill","11","16","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("59","2022-08-31","0","59","11280.00","Loan
","11","14","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("60","2022-08-31","0","60","30094.00","Loan","11","12","","","0","157.41.250.132","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("61","2022-08-31","0","61","43341.00","Loan","11","13","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("62","2022-08-31","0","62","5412.00","Loan","11","15","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("64","2022-09-02","0","64","13500.00","Salary of Pintu Behera","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("65","2022-09-02","0","65","8000.00","Salary Of Rajesh","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("66","2022-09-02","0","66","20000.00","Salary of Subrat Kumar Dutta","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("67","2022-09-05","0","67","8000.00","Salary of Santosh Barik","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("68","2022-09-09","0","68","25000.00","Salary of Madhav","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("69","2022-09-26","0","69","12209.00","Purchase of Colours from Gudumama Enterprisers","11","2","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("70","2022-09-30","0","70","34155.00","Electric Bill","11","16","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("71","2022-09-30","0","71","10916.00","Loan","11","14","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("72","2022-09-30","0","72","29123.00","Loan","11","12","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("73","2022-09-30","0","73","41943.00","Loan","11","13","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("74","2022-09-30","0","74","6048.00","Loan","11","15","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("75","2022-10-01","0","75","12000.00","Salary of Pintu Behera","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("76","2022-10-01","0","76","12000.00","Salary of Rajesh","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("77","2022-10-01","0","77","20000.00","Salary of Subrat Kumar Dutta","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("78","2022-10-01","0","78","6000.00","Salary of Santosh Barik","11","10","","","0","223.176.114.129","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("79","2022-10-13","0","79","8312.00","Yashoda Garden Tax ","11","6","","","0","157.41.171.165","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("80","2022-10-13","0","80","20000.00","Reception of Prabira Kumar Swain on 23/11/2022 G","7","11","","","0","223.231.217.46","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("81","2022-10-20","0","81","18000.00","Second Legal Opinion fees of property to Advocate
","11","6","","","0","157.41.229.145","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("82","2022-10-21","0","82","9000.00","Sanosh Oct-22 Salary","11","10","","","0","157.41.229.145","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("83","2022-10-27","0","83","16300.00","Legal Opnion Fees to  Jajati Kesari Swain","11","6","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("84","2022-10-27","0","84","5200.00","Advocate fees Supplementary Report jajati Keshari ","11","6","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("85","2022-10-31","0","85","11280.00","Loan ","11","14","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("86","2022-10-31","0","86","30944.00","loan","11","12","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("87","2022-10-31","0","87","43341.00","Loan","11","13","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("88","2022-10-31","0","88","5637.00","Loan","11","15","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("89","2022-11-01","0","89","33226.00","Electry Bill","11","16","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("90","2022-11-02","0","90","9418.00","Colour Purchase from Gudumama Enterprises","11","2","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Bank","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("91","2022-11-02","0","91","20000.00","Subrat Oct Salary","11","10","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("92","2022-11-02","0","92","11500.00","Pintu Oct Salary","11","10","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("93","2022-11-02","0","93","10000.00","Rajesh Oct Salary","11","10","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("94","2022-11-11","0","94","21240.00","Srinivasa Sales & Service Pvt Ltd","11","2","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("95","2022-11-11","0","95","10584.00","Shreeram enterprises","11","2","","","0","157.41.250.99","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("96","2022-11-20","0","96","15000.00","Subhashree Panda Booking for Marriage on 24.02.2023 Ground Floor","7","11","","","0","223.176.65.128","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("97","2022-11-22","0","97","15000.00","Subhashree Panda Booking For Marriage on 24.02.2023 Ground Floor","7","11","","","0","223.176.65.128","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("98","2022-11-27","0","98","40000.00","Reception of Jaganath Parida on 3rd Feb 2023 G","7","11","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("99","2022-11-28","0","99","50000.00","Marriage of Gobindo Chandra Mohanty on  30/11/2022 1st","7","11","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("100","2022-11-29","0","100","30000.00","Marriage of Gobindo Chandra Mohanty on  30/11/2022 1st","7","11","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("101","2022-11-29","0","101","10000.00","Salary of Rajesh","11","10","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("102","2022-11-30","0","102","34062.00","Electric Bill","11","16","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("103","2022-11-30","0","103","10916.00","loan account 0028","11","14","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("104","2022-11-30","0","104","29123.00","loan account 9044","11","12","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("105","2022-11-30","0","105","5455.00","loan account 0085","11","13","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("106","2022-11-30","0","106","41943.00","loan account 0098","11","15","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("107","2022-11-30","0","107","100000.00","Marriage of Anirudh Nayak on 27/11/2022 G","7","11","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("108","2022-12-02","0","108","12000.00","Santosh Salary","11","10","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("109","2022-12-02","0","109","12000.00","Pintu Salary","11","10","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("110","2022-12-02","0","110","20000.00","Subrat Salary","11","10","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("111","2022-12-05","0","111","2655.00","Loan Account 0085","11","13","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("112","2022-12-07","0","112","10000.00","Rajesh Advance","11","10","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("113","2022-12-07","0","113","62000.00","New Car Purchase for Company","11","10","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("114","2022-12-07","0","114","50000.00","Marriage of Jayanti Sahooo on 4/12/2022 1st","7","11","","","0","157.41.248.22","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("115","2022-12-17","0","115","71694.00","Nov-22 GST Amount","11","17","","","0","157.41.228.167","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("116","2022-12-17","0","116","50000.00","Marriage of Nabakishore sahoo on 18.12.2022 Ground floor","7","11","","","0","223.231.233.42","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("117","2022-12-17","0","117","20000.00","Marriage of Pradipta swain on 10.03.2023 Ground floor","7","11","","","0","223.231.233.42","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("118","2022-12-22","0","118","50000.00","Reception of Udayabir mohanty on 23.12.2022 First floor","7","11","","","0","223.231.233.42","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("119","2022-12-24","0","119","200000.00","Kaizen Eng. privet limited  or goods lift","11","2","","","0","223.231.233.42","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("120","2022-12-26","0","120","20000.00","Madhuchanda priyadarshini Booking for Marriage on 26.12.2022 Ground floor","7","11","","","0","223.231.233.42","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("121","2022-12-27","0","121","200000.00","Cash Deposit","3","11","","","0","157.41.197.101","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cash","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("122","2022-12-27","0","122","13000.00","Santosh Salary","11","10","","","0","157.41.197.101","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("123","2022-12-27","0","123","20000.00","Reception of Meenaketan Mohapatra on 17/03/2023 1st Floor","7","11","","","0","157.41.197.101","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("124","2022-12-31","0","124","11280.00","Loan","11","14","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("125","2022-12-31","0","125","31230.00","Loan","11","12","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("126","2022-12-31","0","126","43341.00","Loan","11","13","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("127","2022-12-31","0","127","5637.00","Loan","11","15","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("128","2023-01-02","0","128","14000.00","Salary of Pintu","11","10","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("129","2023-01-02","0","129","30000.00","Subrat Salary","11","10","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("130","2023-01-02","0","130","8000.00","Rajesh Salary","11","10","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("131","2023-01-02","0","131","10000.00","Nibrat Salary","11","10","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("132","2023-01-04","0","132","20000.00","Marriage of Shriharsa Mishra on 7/6/23 1st Floor","7","11","","","0","157.41.226.35","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","CQ","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("133","2023-01-19","0","133","40000.00","Marriage of Bijay Kumar Maharana on 17/01/2023 Ground Floor","7","11","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("134","2023-01-19","0","134","30000.00","Marriage of Salin Routray on 23/06/2023 1st Floor","7","11","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("135","2023-01-20","0","135","73618.00","GST ","11","17","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("136","2023-01-30","0","136","200000.00","Cash Deposit of Customer","3","11","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cash","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("137","2023-01-30","0","137","95000.00","Goods Lift Payment","11","2","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("138","2023-01-30","0","138","108479.00","Electry Bill Payment of Nov & Dec 2022","11","16","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("139","2023-01-31","0","139","40000.00","Marriage of Nalini Prava Sahoo on 2701/2023 1st Floor","7","11","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("140","2023-01-31","0","140","11280.00","LOAN","11","14","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("141","2023-01-31","0","141","33296.00","LOAN","11","12","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("142","2023-01-31","0","142","46886.00","LOAN","11","13","","","0","157.41.224.78","1","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque","","","","","","","0");
INSERT INTO yashoda22__voucher VALUES("143","2023-01-31","0","143","5637.00","LOAN","11","15","","","0","157.41.224.78","7","0000-00-00 00:00:00","0","0000-00-00 00:00:00","","","Cheque....","","","","","","","0");



CREATE TABLE `yashoda22__voucher_details` (
  `id_voucher_details` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `no` varchar(11) NOT NULL,
  `total` decimal(16,2) NOT NULL,
  `id_head_debit` int(11) NOT NULL,
  `id_head_credit` int(11) NOT NULL,
  `id_voucher` int(11) NOT NULL,
  `id_sale` int(11) NOT NULL,
  `amt` decimal(16,2) NOT NULL,
  `billno` varchar(20) NOT NULL,
  `memo` text NOT NULL,
  `ip` varchar(30) NOT NULL,
  `id_create` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modify` int(11) NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ref1` varchar(40) DEFAULT NULL,
  `ref2` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_voucher_details`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


