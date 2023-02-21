-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2022 at 05:14 PM
-- Server version: 5.1.73-community
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gta`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `columnwise_Payroll`()
    NO SQL
BEGIN
SET @sql = NULL;
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'MAX(IF(head = ',char(39),
      head,char(39),
      ', amount, 0)) AS ',
      head
    )
  ) INTO @sql
FROM  v_payroll;
SET @sql = CONCAT('SELECT staff_code as Staff_code ,staff_name as Name ,Month as Month, ', @sql, ' FROM  v_payroll  GROUP BY Month');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `columnwise_Report`(IN `VAR_YEARID` INT)
    NO SQL
BEGIN
SET @sql = NULL;
SET @Sql2 = VAR_YEARID;
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'MAX(IF(Amt = ',char(39),
      Amt,char(39),
      ', PaidAmount, 0)) AS ',
      Amt
    )
  ) INTO @sql
FROM  v_feestatus where Year_Id = VAR_YEARID;
SET @sql = CONCAT('SELECT CLASSSEC as Class ,ADMISSION_ID as Adno,NAME as Name , ', @sql, ' FROM  v_feestatus WHERE Year_Id = ', @sql2, ' GROUP BY ADMISSION_ID order by CLASSSEC DESC');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `datewisereport`(IN `VARIN_FROMDATE` DATE, IN `VARIV_TODATE` DATE)
    NO SQL
SELECT T1.`ADMISSION_ID` AS ADMISSION_ID, T1.`NAME` , T1.`FATHER_NAME` , T1.`Gender` AS GENDER, T2.Standard AS STANDARD, T2.Section AS SECTION, T3.RECEIPT_ID, T3.RECEIPT_DATE, T5.feehead AS FEE_HEAD, T5.feetype AS FEE_TYPE, T4.Amount AS FEE_AMOUNT
FROM  `student_info1` T1
JOIN tbl_class T2
JOIN fee_receipt T3
JOIN fee_transanction T4
JOIN feeheads T5 ON T1.CLASS_ID = T2.CLASS_ID
AND T1.ADMISSION_ID = T3.ADMISSION_ID
AND T4.feeHead = T5.feeheadId
WHERE T3.RECEIPT_ID = T4.RECEIPT_ID
AND T3.RECEIPT_DATE
BETWEEN  VARIN_FROMDATE
AND  VARIV_TODATE
ORDER BY T1.NAME ASC , T3.RECEIPT_ID ASC$$

CREATE DEFINER=`root`@`%` PROCEDURE `delete_Staff`(IN `VARIN_SCODE` VARCHAR(10), IN `VARIN_YEARID` VARCHAR(2))
    NO SQL
BEGIN

UPDATE `staff_info` SET `status`='DEL' WHERE `staff_code` = VARIN_SCODE and `Year_Id` = VARIN_YEARID;

UPDATE `staff_class_map` SET `Status`='DEL' WHERE `staff_code` = VARIN_SCODE and `Year_Id` = VARIN_YEARID;

END$$

CREATE DEFINER=`root`@`%` PROCEDURE `examMarks`(IN `classId` VARCHAR(11), IN `exam_id` VARCHAR(50), IN `VAR_YEARID` INT(2))
BEGIN
SET @sql = NULL;
SET @Sql2 = VAR_YEARID;
SET @Sql3 = classId;
SET @Sql4 = exam_id;
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'MAX(IF(sub_id = ',char(39),
      sub_id,char(39),
      ', marks, 0)) AS ',
      sub_id
    )
  ) INTO @sql
FROM  exam_marks where Year_Id = VAR_YEARID AND CLASS_ID = classId AND exam_id = exam_id;
SET @sql = CONCAT('SELECT CLASSSEC as Class ,Admission_Id as Adno,name as Name ,exam_name as Exam, ', @sql, ',sum(marks) as Total FROM  exam_marks WHERE exam_id = ', @sql4, ' AND CLASS_ID = ', @sql3, ' GROUP BY Admission_Id, exam_id ORDER BY Total DESC');



PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `exam_Marks`(IN `ADNO` VARCHAR(20))
BEGIN
SET @sql = NULL;
SET @Sql2 = ADNO;
SELECT
 GROUP_CONCAT(DISTINCT
   CONCAT(
     'MAX(IF(TRIM(sub_id) = ''',
     sub_id,
     ''', marks, 0)) AS ',
     sub_id  
   ) 
 ) INTO @sql
FROM exam_marks where Admission_Id = @sql2;
SET @sql = CONCAT('SELECT exam_id  AS EXAM',IF(@sql IS NULL, '',CONCAT(',',@sql)), ' FROM exam_marks where Admission_Id ="', @sql2 ,'" GROUP BY exam_id' );
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `GetAllStudent`(OUT ADNO VARCHAR(20))
BEGIN

	SELECT `ADMISSION_ID` AS ADNO FROM `student_info1` WHERE `CLASS_ID` IN(SELECT `CLASS_ID` FROM `tbl_class` WHERE `feeGrpId` = '1' AND `Status` = 1);

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getClass`()
BEGIN
SELECT `CLASS_ID`,concat(Standard,"-",Section) as CLASS
FROM `tbl_class`;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getclasswisefeetotal`(IN `VARIN_CALSS_ID` INT(8))
    NO SQL
SELECT SUM( feeAmount ) AS TOT_AMOUNT
FROM  `feegroupmapping` 
WHERE FeeGrpID = ( 
SELECT feeGrpId
FROM  `tbl_class` 
WHERE CLASS_ID = VARIN_CALSS_ID )$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getfeeamountdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(30))
    NO SQL
SELECT fee.CLASS_ID, fee.feeheadId, fee.feehead, fee.feetype, date(fee.duedate) as duedate,
IFNULL(fee.feeamount, 0) as TOTAL_FEE, 
IFNULL(tran.TOT_AMOUNT, 0) as PAID_FEE, 
(fee.feeamount -  IFNULL( TOT_AMOUNT , 0)) as BALANCE
FROM v_fees fee   LEFT OUTER JOIN v_feestrans tran
ON fee.feeHeadId = tran.feeHeadId  AND
fee.CLASS_ID = tran.CLASS_ID 
AND
tran.Admission_Id =  VARIN_ADMISSION_ID
WHERE Fee.Class_ID  IN (SELECT Class_ID FROM student_info1 WHERE Admission_Id =  VARIN_ADMISSION_ID )$$

CREATE DEFINER=`root`@`%` PROCEDURE `getfeedashboard`(IN `VAR_YEARID` INT(11))
BEGIN

declare `VAR_DAILY`  ,  `VAR_WEEKLY` , `VAR_MONTHLY` ,  `VAR_YEARLY` DOUBLE;

SELECT SUM(Amount) INTO VAR_DAILY FROM fee_receipt T1, fee_transanction T2 WHERE T1.RECEIPT_ID = T2.RECEIPT_ID AND T1.STATUS = 0 AND T1.YEAR_ID = VAR_YEARID AND T1.RECEIPT_DATE = CURDATE() ;

SELECT SUM(Amount) INTO VAR_WEEKLY  FROM fee_receipt T1, fee_transanction T2 WHERE T1.RECEIPT_ID = T2.RECEIPT_ID AND T1.STATUS = 0 AND T1.YEAR_ID = VAR_YEARID AND WEEK(T1.RECEIPT_DATE) = WEEK(CURDATE());

SELECT SUM(Amount) INTO VAR_MONTHLY  FROM fee_receipt T1, fee_transanction T2 WHERE T1.RECEIPT_ID = T2.RECEIPT_ID AND T1.STATUS = 0 AND T1.YEAR_ID = VAR_YEARID AND MONTH(T1.RECEIPT_DATE) = MONTH(CURDATE());

SELECT SUM(Amount) INTO VAR_YEARLY FROM fee_receipt T1, fee_transanction T2 WHERE T1.RECEIPT_ID = T2.RECEIPT_ID AND T1.STATUS = 0 AND T1.YEAR_ID = VAR_YEARID AND YEAR(T1.RECEIPT_DATE) = YEAR(CURDATE());

if VAR_DAILY is null then

set VAR_DAILY =0;

end if;

if VAR_WEEKLY is null then

set VAR_WEEKLY =0;

end if;

if VAR_MONTHLY is null then

set VAR_MONTHLY =0;

end if;

if VAR_YEARLY is null then

set VAR_YEARLY =0;

end if;

select ROUND(VAR_DAILY,2) AS Daily, ROUND(VAR_WEEKLY,2) AS Weekly , ROUND(VAR_MONTHLY,2) AS Monthly, ROUND(VAR_YEARLY,2) AS Yearly;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getfeereport`()
    NO SQL
SELECT T1.`ADMISSION_ID` AS ADMISSION_NO, CONCAT( T3.Standard,  "-", T3.Section ) AS Class, T1.`NAME` , T1.`FATHER_NAME` , T1.`Gender` AS GENDER, T2.Balance_Amount AS BALANCE
FROM student_info1 T1
JOIN tbl_class T3
JOIN feestatus T2 ON T1.ADMISSION_ID = T2.Admission_Id
AND T1.CLASS_ID = T3.CLASS_ID$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getfeestructure`(IN `VARIN_FEEGROUPID` INT, IN `VARIN_TYPE` VARCHAR(3))
    NO SQL
if VARIN_TYPE like 'all' then 
SELECT T3.CLASS_ID, concat(T3.`Standard`,"-", T3.`Section`) AS Class , T3.feeGrpId, 
T1.FeeGrpMapId, T2.FeeHeadId, T2.feehead, T2.feetype, T1.feeAmount 
FROM 
feegroupmapping T1, 
feeheads T2, 
tbl_class T3 
WHERE 
T1.FeeHeadId = T2.feeheadId AND 
T3.feeGrpId = T1.FeeGrpID AND
T2.feeheadstatus = 1 ;
else 
SELECT T1.FeeGrpMapId, T2.FeeHeadId, T2.feehead, T2.feetype, T1.feeAmount FROM feegroupmapping T1, feeheads T2 WHERE T1.FeeHeadId = T2.feeheadId AND T2.feeheadstatus = 1 AND T1.FeeGrpID = VARIN_FEEGROUPID;
end if$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getfullstudentdetails`(IN `adno` VARCHAR(20))
    NO SQL
SELECT 
`student_info1`.`StId`, 
`student_info1`.`ADMISSION_ID`,
`student_info1`.`CLASSSEC`, 
`student_info1`.`NAME`,
`student_info1`.`FATHER_NAME`, 

`student_info1`.`contact`,
`student_info1`.`DOB`,
`student_info1`.`rollNumber`, 
`student_info1`.`Group`,
`student_info1`.`Gender`, 
`student_info1`.`IILanguage`,
`student_info1`.`Type`,
`stu_address`.`DoorNoStreet`,
`stu_address`.`Area`,
`stu_address`. `City`,
`stu_address`. `State`, 
`stu_address`.`Pincode`, 
`stu_address`.`ModeofTransport`,
`stu_others`.`EMISNumber`,
`stu_others`.`AadharCardNumber`,
`stu_others`.`IdentificationMarks1`,
`stu_others`.`IdentificationMarks2`,
`stu_others`.`AdmissionYear`,
`stu_others`.`AdmissionStandard`,
`stu_others`.`DOJ`,
`stu_others`.`Documents`, 
`stu_parents`.`FatherName`, 
`stu_parents`.`fatherQualification`, 
`stu_parents`.`fatherWork`, 
`stu_parents`.`fatherOccupation`, 
`stu_parents`.`fatherAnnualIncome`, 
`stu_parents`.`fatherOfficeAddress`, 
`stu_parents`.`fatherOfficePhone`, 
`stu_parents`.`fatherMobile`, 
`stu_parents`.`fatherEmail`, 
`stu_parents`.`PastPupil`, 
`stu_parents`.`passingYear`, 
`stu_parents`.`MotherName`, 
`stu_parents`.`motherQualification`, 
`stu_parents`.`motherWork`, 
`stu_parents`.`motherOccupation`, 
`stu_parents`.`motherAnnualIncome`, 
`stu_parents`.`motherOfficeAddress`, 
`stu_parents`.`motherOfficePhone`, 
`stu_parents`.`motherMobile`, 
`stu_parents`.`motherEmailAddress`,
`stu_medical`.`Height`,
`stu_medical`. `Weight`

FROM 
student_info1 LEFT JOIN 
tbl_class ON student_info1.CLASS_ID = tbl_class.CLASS_ID LEFT JOIN 
stu_address ON student_info1.ADMISSION_ID = stu_address.ADMISSION_ID LEFT JOIN 
stu_parents ON student_info1.ADMISSION_ID = stu_parents.ADMISSION_ID LEFT JOIN 
stu_medical ON student_info1.ADMISSION_ID = stu_medical.ADMISSION_ID LEFT JOIN 
stu_others ON student_info1.ADMISSION_ID = stu_others.ADMISSION_ID 
WHERE
student_info1.ADMISSION_ID = adno$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getstudentaddressdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20))
    NO SQL
BEGIN

SELECT `DoorNoStreet` , `Area` , `City` , `State` , `Pincode` , `ModeofTransport` FROM `stu_address` WHERE `ADMISSION_ID` = VARIN_ADMISSION_ID;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getstudentdetails`(IN `VAR_ADMISSION_ID` VARCHAR(20))
    NO SQL
BEGIN



SELECT `ADMISSION_ID` , `CLASS_ID` , `NAME` , `FATHER_NAME` ,`contact`, `DOB` , `rollNumber` ,`Group` , `Gender` , `IILanguage` , `Type` ,`photo` FROM `student_info1` WHERE `ADMISSION_ID`= VAR_ADMISSION_ID;



END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getstudentfinedetails`(IN `VARIN_ADMISSION_ID` INT(20))
    NO SQL
SELECT v_studentlist.`ADMISSION_ID`, concat(v_studentlist.`Standard`,"-",v_studentlist. `Section`) as class, v_studentlist.`NAME`, v_studentlist.`FATHER_NAME`,fee_fine.`AMOUNT`, fee_fine.`REMARKS`,fee_fine. `INSERT_DATE` AS  DATE  from v_studentlist Left join  fee_fine  ON v_studentlist.ADMISSION_ID = fee_fine.ADMISSION_ID WHERE
`fee_fine`.ADMISSION_ID = VARIN_ADMISSION_ID$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getstudentmedicaldetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20))
    NO SQL
BEGIN

SELECT `Height` , `Weight` FROM `stu_medical` WHERE `ADMISSION_ID` = VARIN_ADMISSION_ID;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getstudentothersdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20))
    NO SQL
BEGIN

SELECT `EMISNumber` , `AadharCardNumber` , `IdentificationMarks1` , `IdentificationMarks2` , `AdmissionYear` , `AdmissionStandard` , `DOJ` , `Documents` FROM `stu_others` WHERE `ADMISSION_ID` = VARIN_ADMISSION_ID; 

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `getstudentparentsdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20))
    NO SQL
BEGIN

SELECT `FatherName` , `fatherQualification` , `fatherWork` , `fatherOccupation` , `fatherAnnualIncome` , `fatherOfficeAddress` , `fatherOfficePhone` , `fatherMobile` , `fatherEmail` , `PastPupil` , `passingYear` , `MotherName` , `motherQualification` , `motherWork` , `motherOccupation` , `motherAnnualIncome` , `motherOfficeAddress` , `motherOfficePhone` , `motherMobile` , `motherEmailAddress` FROM `stu_parents` WHERE `ADMISSION_ID` = VARIN_ADMISSION_ID; 

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `INSERT_ADMISSION_NO`(IN ADMISSION_NO VARCHAR(20))
BEGIN
 
	INSERT INTO `stu_address` (`ADMISSION_ID`) VALUES (ADMISSION_NO);
	INSERT INTO `stu_medical` (`ADMISSION_ID`) VALUES (ADMISSION_NO);
	INSERT INTO `stu_others` (`ADMISSION_ID`,  DOJ) VALUES (ADMISSION_NO, CURDATE());
	INSERT INTO `stu_parents` (`ADMISSION_ID`) VALUES (ADMISSION_NO);
	INSERT INTO `stu_prevschool` (`ADMISSION_ID`) VALUES (ADMISSION_NO);

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `INSERT_FEE_STATUS_DEFAULT`(IN `ADMISSION_NO` VARCHAR(20), IN `FEE_HEAD_ID` INT(10), IN `CLASS_ID` INT(10), IN `FeeGrpMapid` INT(10), IN `PAID_PERIOD` VARCHAR(10), IN `Paid_Type` INT(11), IN `TOT_AMOUNT` INT(10), IN `BALANCE_AMOUNT` INT(10), IN `YEAR_ID` INT(10), IN `start_date` DATE, IN `due_date` DATE)
BEGIN

 	INSERT INTO `feestatus` (`Admission_Id`, `Fee_Headid`,`classId`,`FeeGrpMapId`, `Paid_Period`,`Paid_Type`, `totAmount`,`Balance_Amount`, `Year_Id`,`start_date`,`due_date`) VALUES (ADMISSION_NO, FEE_HEAD_ID, CLASS_ID ,FeeGrpMapid,PAID_PERIOD,Paid_Type,TOT_AMOUNT, BALANCE_AMOUNT, YEAR_ID,start_date,due_date);
  
    
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `INSERT_RECEIPT`(IN ADMISSION_NO VARCHAR(30), IN CLASS_FEES_ID INT(10), IN RECEIPT_DATE DATE, IN FEE_MODE VARCHAR(30), IN FEE_REMARKS VARCHAR(100), IN YEAR_ID INT(10), OUT RECEIPT_ID int(10))
BEGIN

SET @ADMISSION_NO=ADMISSION_NO;
SET @CLASS_FEES_ID=CLASS_FEES_ID;
SET @RECEIPT_DATE=RECEIPT_DATE;
SET @FEE_MODE=FEE_MODE;
SET @FEE_REMARKS=FEE_REMARKS;
SET @YEAR_ID=YEAR_ID;
SET @RECEIPT_ID=LAST_INSERT_ID();

PREPARE STMT FROM
"INSERT INTO fee_receipt(ADMISSION_NO, CLASS_FEES_ID, RECEIPT_DATE, FEE_MODE, FEE_REMARKS, YEAR_ID) VALUES (?,?,?,?,?,?)";

EXECUTE STMT USING @ADMISSION_NO,@CLASS_FEES_ID,@RECEIPT_DATE,@FEE_MODE,@FEE_REMARK,@YEAR_ID; 

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `Insert_Staff`(IN `name` VARCHAR(50), IN `fatherName` VARCHAR(50), IN `dob` DATE, IN `gender` VARCHAR(50), IN `department` VARCHAR(50), IN `email` VARCHAR(50), IN `qualification` VARCHAR(50), IN `type` VARCHAR(50), IN `contact` VARCHAR(10), IN `Year_Id` INT(10))
BEGIN

    DECLARE abc INT(10);

    SELECT `SerialNumber` INTO abc FROM `tbl_serial_no` WHERE `SerialCode` = 'SD_1';
	
	INSERT INTO `staff_info` (`staff_code`,`staff_name`, `Sur_name`,`dob`,`gender`, `department`,`email`,`qualification`,`staff_type`,`contact`,`Year_Id`) 
	VALUES (abc,name,fatherName,dob,gender,department,email,qualification,type,contact,Year_Id);

    UPDATE `tbl_serial_no` SET `SerialNumber` = abc+1 WHERE `SerialCode` = 'SD_1';

	SELECT abc;

END$$

CREATE DEFINER=`root`@`%` PROCEDURE `insert_Staff_map`(IN `VARIN_SNAME` VARCHAR(50), IN `VARIN_CLASSID` INT(2), IN `VARIN_YEARID` VARCHAR(2))
    NO SQL
BEGIN

    DECLARE varclassid VARCHAR(100);
	DECLARE varClasssec VARCHAR(100);
	DECLARE varstaff_code VARCHAR(100);
	DECLARE varContact VARCHAR(100);
	DECLARE varFathername VARCHAR(100);

START TRANSACTION;

SELECT `CLASS_ID`,concat(Standard,"-",Section) into varclassid,varClasssec FROM `tbl_class` WHERE CLASS_ID = VARIN_CLASSID;

SELECT `staff_code`,`Sur_name`,`contact` INTO varstaff_code,varFathername,varContact  FROM `staff_info` WHERE `staff_name` = VARIN_SNAME and `Year_Id` = VARIN_YEARID;

INSERT INTO `staff_class_map`(`staff_code`, `class_Id`,`CLASSSEC`,`Contact`,`Staff_Name`,`Sur_name`,`Year_Id`) 
VALUES (varstaff_code,varclassid,varClasssec,varContact,VARIN_SNAME,varFathername,VARIN_YEARID);													
 

COMMIT;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `Insert_Student`(IN `classId` INT(10), IN `firstName` VARCHAR(50), IN `fatherName` VARCHAR(50), IN `contact` VARCHAR(10), IN `gender` VARCHAR(10),IN `sType` INT(2), IN `yearId` INT(2))
BEGIN
    
    DECLARE adnoPrefix VARCHAR(10);
    DECLARE adnoSuffix VARCHAR(10);
    DECLARE serialNumber VARCHAR(10);
    DECLARE admissionNo VARCHAR(30);
	DECLARE varCLASSSEC VARCHAR(100);
	DECLARE varStandard VARCHAR(100);
	DECLARE varSection VARCHAR(100);
    DECLARE fGrpMapId int(10);
	DECLARE fHeadId int(10);
    DECLARE start_date date;
    DECLARE due_date date;
    DECLARE fHead VARCHAR(30);
    DECLARE fType VARCHAR(30);
    DECLARE fInterval VARCHAR(30);
    DECLARE fAmount double(10, 2);
    DECLARE fInstalment double(10,5);
    DECLARE fPeriod VARCHAR(30);
    DECLARE fYearId VARCHAR(30);    
    DECLARE done INT DEFAULT 0;
    DECLARE fStartMonth VARCHAR(30);
    DECLARE fStartTerm VARCHAR(30);
    DECLARE adConfigVal VARCHAR(20);
      
	#DECLARE `_rollback` BOOL DEFAULT 0;
    #DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;    
    
    
    DECLARE CUR_FEE_ID CURSOR FOR SELECT  `FeeGrpMapId`,`FeeHeadId`, `feeAmount`,COALESCE(`start_date`,0) as `start_date`,COALESCE(`due_date`,0) as `due_date` FROM `feegroupmapping` WHERE `FeeGrpID` = sType and `Year_Id` = yearId;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
    /*
    DECLARE CUR_FEE_ID CURSOR FOR SELECT 

        `feeheads`.`feeheadId` AS `feeheadId`,
        `feegroupmapping`.`feeAmount` AS `feeamount`,
        (`feegroupmapping`.`feeAmount` / `feeheads`.`interval`) AS `instalment`
    FROM
        ((`feegroupmapping`
        LEFT JOIN `feeheads` ON ((`feegroupmapping`.`FeeHeadId` = `feeheads`.`feeheadId`)))
        LEFT JOIN `tbl_class` ON ((`feegroupmapping`.`FeeGrpID` = `tbl_class`.`feeGrpId`)))
	where tbl_class.CLASS_ID = classId;
    */
    
    SELECT T1.`AdnoPrefix`, T1.`AdnoSuffix`, T2.SerialNumber INTO adnoPrefix, adnoSuffix, serialNumber FROM `tbl_class` T1 LEFT JOIN `tbl_serial_no` T2 ON T2.SerialCode = T1.AdnoSuffix WHERE `CLASS_ID` = classId;
	
    SELECT `Config_Value` INTO adConfigVal FROM `configuration` WHERE Config_Code = 'ADM_NO_PRE_VALUE' AND Config_Type = 'CONST';
	 
    SELECT @admissionNo := concat(adnoPrefix, adConfigVal, serialNumber);
    
    #SELECT @admissionNo := concat(adnoPrefix, serialNumber);
    #SELECT @admissionNo;
    
    SELECT SUBSTRING_INDEX(`Description`, ',', 1) INTO fStartMonth FROM `feesettings` WHERE `Settings` = 'Monthly';
    SELECT SUBSTRING_INDEX(`Description`, ',', 1) INTO fStartTerm FROM `feesettings` WHERE `Settings` = 'Term';

    #SELECT fStartMonth, fStartTerm;
    
    
    
    /*SELECT @adnoSuffix := adnoSuffix;
    SELECT @adnoSuffix;*/
    
	UPDATE `tbl_serial_no` SET `SerialNumber` = serialNumber+1 WHERE `SerialCode` = adnoSuffix;
	SELECT `Standard`,`section`,  concat(`Standard`,'-',`section`) into varStandard,varSection,varCLASSSEC FROM tbl_class where CLASS_ID = classId;
	INSERT INTO `student_info1` (`ADMISSION_ID`, `CLASS_ID`,`CLASSSEC`, `NAME`, `FATHER_NAME`,`contact`, `Gender`) VALUES (@admissionNo, classId,varCLASSSEC, firstName, fatherName, contact, gender);
	INSERT INTO `stu_address` (`ADMISSION_ID`) VALUES (@admissionNo);
	INSERT INTO `stu_medical` (`ADMISSION_ID`) VALUES (@admissionNo);
	INSERT INTO `stu_others` (`ADMISSION_ID`,  DOJ) VALUES (@admissionNo, CURDATE());
	INSERT INTO `stu_parents` (`ADMISSION_ID`) VALUES (@admissionNo);
	INSERT INTO `stu_prevschool` (`ADMISSION_ID`) VALUES (@admissionNo); 
 	INSERT INTO `student_class_map`(`class_id`,`feeGrpId`, `Standard`,`Section`,`CLASSSEC`, `Admission_No`,`Year_Id`,`Status`) VALUES (classId,sType,varStandard,varSection,varCLASSSEC,@admissionNo,yearId,0);
	OPEN CUR_FEE_ID;

    
    get_fee: LOOP
    
    FETCH CUR_FEE_ID INTO  fGrpMapId,fHeadId,fAmount,start_date,due_date;
    #SELECT fHeadId, fAmount;
    
	IF done = 1 THEN
		LEAVE get_fee;
	END IF;
       
    INSERT INTO `feestatus` (`Admission_Id`, `Fee_Headid`, `classID`, `FeeGrpMapId`,`Paid_Type`,`totAmount`,`Balance_Amount`,`Year_Id`, `start_date`,`due_date`) VALUES (@admissionNo, fHeadId, classId, fGrpMapId ,sType, fAmount, fAmount, yearId,start_date,due_date);
    
    END LOOP get_fee;
    
    CLOSE CUR_FEE_ID;
    
    SELECT admissionNo;
    
    #IF `_rollback` THEN
    #    ROLLBACK;
    #ELSE
    #    COMMIT;
    #END IF;    
    
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `Insert_Student_sms`(IN `classId` INT(10), IN `firstName` VARCHAR(50), IN `fatherName` VARCHAR(50), IN `contact` VARCHAR(10), IN `dob` DATE, IN `gender` VARCHAR(10), IN `yearId` INT(2), IN `grpId` INT(5))
BEGIN
    
    DECLARE adnoPrefix VARCHAR(10);
    DECLARE adnoSuffix VARCHAR(10);
    DECLARE serialNumber VARCHAR(10);
    DECLARE admissionNo VARCHAR(30);
	DECLARE varCLASSSEC VARCHAR(100);
	DECLARE varStandard VARCHAR(100);
	DECLARE varSection VARCHAR(100);
    DECLARE fYearId VARCHAR(30);    
    DECLARE done INT DEFAULT 0;
    DECLARE fStartMonth VARCHAR(30);
    DECLARE fStartTerm VARCHAR(30);
    DECLARE adConfigVal VARCHAR(20);

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    
    SELECT T1.`AdnoPrefix`, T1.`AdnoSuffix`, T2.SerialNumber INTO adnoPrefix, adnoSuffix, serialNumber FROM `tbl_class` T1 LEFT JOIN `tbl_serial_no` T2 ON T2.SerialCode = T1.AdnoSuffix WHERE `CLASS_ID` = classId;
	
    SELECT `Config_Value` INTO adConfigVal FROM `configuration` WHERE Config_Code = 'ADM_NO_PRE_VALUE' AND Config_Type = 'CONST';
	 
    SELECT @admissionNo := concat(adnoPrefix, adConfigVal, serialNumber);
    

    SELECT SUBSTRING_INDEX(`Description`, ',', 1) INTO fStartMonth FROM `feesettings` WHERE `Settings` = 'Monthly';
    SELECT SUBSTRING_INDEX(`Description`, ',', 1) INTO fStartTerm FROM `feesettings` WHERE `Settings` = 'Term';

    
	UPDATE `tbl_serial_no` SET `SerialNumber` = serialNumber+1 WHERE `SerialCode` = adnoSuffix;
	SELECT `Standard`,`section`,  concat(`Standard`,'-',`section`) into varStandard,varSection,varCLASSSEC FROM tbl_class where CLASS_ID = classId;
	INSERT INTO `student_info1` (`ADMISSION_ID`, `CLASS_ID`,`CLASSSEC`, `NAME`, `FATHER_NAME`,`contact`, `DOB`, `Gender`) VALUES (@admissionNo, classId,varCLASSSEC, firstName, fatherName, contact, dob, gender);
	INSERT INTO `stu_address` (`ADMISSION_ID`) VALUES (@admissionNo);
	INSERT INTO `stu_medical` (`ADMISSION_ID`) VALUES (@admissionNo);
	INSERT INTO `stu_others` (`ADMISSION_ID`,  DOJ) VALUES (@admissionNo, CURDATE());
	INSERT INTO `stu_parents` (`ADMISSION_ID`) VALUES (@admissionNo);
	INSERT INTO `stu_prevschool` (`ADMISSION_ID`) VALUES (@admissionNo); 
 	INSERT INTO `student_class_map`(`class_id`,`feeGrpId`,`Standard`,`Section`,`CLASSSEC`, `Admission_No`,`Year_Id`,`promot`,`Status`) VALUES (classId,grpId,varStandard,varSection,varCLASSSEC,@admissionNo,yearId,1,0);

    
    SELECT admissionNo;
        
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ins_stu_gta`(IN `name` VARCHAR(50), IN `fname` VARCHAR(50), IN `contact` VARCHAR(50), IN `dob` DATE, IN `email` VARCHAR(50), IN `center` VARCHAR(50), IN `course` VARCHAR(50), IN `batch` VARCHAR(50), IN `gender` VARCHAR(10))
BEGIN


    DECLARE admissionNo VARCHAR(30);

	SELECT `SerialNumber` INTO admissionNo FROM `tbl_serial_no` WHERE `SerialCode` = 'AD_1';

	INSERT INTO `student_info`(`ADMISSION_ID`, `NAME`, `FATHER_NAME`, `contact`, `DOB`, `email`, `center`, `course`, `batch`, `gender`) VALUES (admissionNo, name, fname, contact, dob, email, center, course, batch, gender);
	INSERT INTO `stu_address` (`ADMISSION_ID`) VALUES (admissionNo);
	INSERT INTO `stu_medical` (`ADMISSION_ID`) VALUES (admissionNo);
	INSERT INTO `stu_others` (`ADMISSION_ID`,  DOJ) VALUES (admissionNo, CURDATE());
	INSERT INTO `stu_parents` (`ADMISSION_ID`) VALUES (admissionNo);

    UPDATE `tbl_serial_no` SET `SerialNumber` = admissionNo+1 WHERE `SerialCode` = 'AD_1';
    SELECT admissionNo;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `PROC_GET_MENU`(IN UserId VARCHAR(10))
BEGIN
	Select * from (SELECT UM.* FROM um_user_menu_access AS UMA, um_menu AS UM
	WHERE UMA.UserId = UserId  AND UM.MenuId = UMA.MenuId 
	UNION DISTINCT
	SELECT UM.* FROM `um_user_group_mapping` AS UGM, um_group_menu_access AS GMA, um_menu AS UM 
    WHERE UGM.`UserId` = UserId AND GMA.`GroupId` = UGM.`GroupId` AND UM.MenuId = GMA.MenuId 
    ) UM ORDER BY UM.SequenceNumber;
    
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `smscount`()
BEGIN

SELECT sum(case when status != 'DEL' then  msglen else 0 end) as Total, sum(case when status = '' then msglen else 0 end ) as pending , sum(case when status = 'Status=0,success' then msglen else 0 end ) as success ,  sum(case when status != 'Status=0,success' and status != 'DEL' and status !='' then msglen else 0 end ) as failed  FROM  `final` WHERE  DATE(`SMSdate`) = DATE(NOW());

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `sms_broadcast`(IN `VARIN_TYPE` VARCHAR(50), IN `VARIN_DB` VARCHAR(50))
    NO SQL
BEGIN

UPDATE final set  `broadcastTime` = NOW() , `staus_info` = 1  where `type` = VARIN_TYPE;

UPDATE `main`.`smsmonitor` SET `monitor`= 1 WHERE `smsdbname` = VARIN_DB;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `sms_broadcast1`(IN `VARIN_TYPE` VARCHAR(50))
    NO SQL
BEGIN

UPDATE final set  `broadcastTime` = NOW() , `staus_info` = 1  where `type` = VARIN_TYPE;

/*UPDATE `main`.`smsmonitor` SET `monitor`= 1 WHERE `smsdbname` = 'demosch';*/

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `sms_groupfinal`(IN `VARIN_ID` VARCHAR(15), IN `VARIN_YEARID` INT(11), IN `VARIN_MSGTYPE` VARCHAR(255))
    NO SQL
BEGIN

if VARIN_MSGTYPE ='HOMEWORK' then 

set @sql = CONCAT("insert into final (CLASS_ID,ADNO , CLASSSEC, STUDENTNAME, Message, mobile_number, SMSdate,`is_scheduled`, `type` ,msglen) 
select v_sms.CLASS_ID, v_sms.ADMISSION_ID as ADNO,
v_sms.CLASSSEC ,
v_sms.NAME as STUDENTNAME,
GROUP_CONCAT(sms_group.message) ,
v_sms.contact as mobile_number , 
if(sms_group.is_scheduled = 1 , sms_group.scheduled_on , NOW()) ,
sms_group.`is_scheduled`, 
sms_group.`type` ,
CEIL(LENGTH(GROUP_CONCAT(sms_group.message))/160)

from sms_group  join v_sms on(sms_group.Group_name = v_sms.CLASSSEC AND v_sms.Year_Id = ", VARIN_YEARID ,")  
where sms_group.type = 'HOMEWORK'  
AND sms_group.status = 'DRAFT'
AND sms_group.template_id = '0'
group by sms_group.Group_name , v_sms.ADMISSION_ID");

PREPARE STMT from @sql ;
EXECUTE STMT;

set @sql2 = CONCAT("UPDATE  sms_group SET status = 'SEND' ,  updatetime = NOW()  WHERE status= 'DRAFT' AND date(insDate) = date(now()) AND Group_name IN (select Group_name from (select  * from sms_group) as t1 where ID in (",VARIN_ID,"))");

PREPARE STMT2 from @sql2 ;
EXECUTE STMT2;

else

set @sql4 = CONCAT("insert into final(CLASS_ID,ADNO , CLASSSEC, STUDENTNAME, Message, mobile_number, SMSdate,`is_scheduled`,`type` ,msglen) 
select v_sms.CLASS_ID, v_sms.ADMISSION_ID as ADNO ,
v_sms.CLASSSEC ,
v_sms.NAME as STUDENTNAME, 
sms_group.message ,
v_sms.contact as mobile_number, 
if(sms_group.is_scheduled = 1 , sms_group.scheduled_on , NOW()) ,
 sms_group.`is_scheduled`,
 sms_group.`type`,
CEIL(LENGTH(sms_group.message)/160) from sms_group 
join v_sms on(sms_group.Group_name = v_sms.CLASSSEC AND v_sms.Year_Id = ", VARIN_YEARID ,") where sms_group.status = 'DRAFT'
AND sms_group.template_id = '0' AND sms_group.ID in (", VARIN_ID ,")");

PREPARE STMT4 from @sql4 ;
EXECUTE STMT4;

set @sql3 = CONCAT("UPDATE `sms_group` SET `status` = 'SEND' ,  updatetime = NOW()  WHERE `ID` IN (",VARIN_ID,")");

PREPARE STMT3 from @sql3 ;
EXECUTE STMT3;

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sms_otherfinal`(IN `VARIN_ID` INT(11))
BEGIN

set @sql1 = CONCAT("UPDATE `sms_group` SET `status` = 'SEND',`updatetime` = NOW()  WHERE `ID` IN (",VARIN_ID,")");

PREPARE STMT1 from @sql1 ;
EXECUTE STMT1;
 
set @sql4 = CONCAT("insert into final(ADNO , CLASSSEC, STUDENTNAME, Message, mobile_number, SMSdate,`is_scheduled`,`type`,msglen) 
select group_info.ADMISSION_ID ,group_info.CLASSSEC ,group_info.NAME, sms_group.message ,group_info.contact, 
if(sms_group.is_scheduled = 1 , sms_group.scheduled_on , NOW()) ,sms_group.`is_scheduled`, sms_group.`type`,
CEIL(LENGTH(sms_group.message)/160) from sms_group 
join group_info on(sms_group.Group_name = group_info.CLASSSEC and group_info.stuStatus = 1) where sms_group.status = 'SEND'
AND sms_group.ID in (", VARIN_ID ,")");

PREPARE STMT4 from @sql4;
EXECUTE STMT4;

END$$

CREATE DEFINER=`root`@`%` PROCEDURE `sms_othergroupfinal`(IN `VARIN_ID` VARCHAR(15))
    NO SQL
BEGIN

set @sql1 = CONCAT("UPDATE `sms_group` SET `status` = 'SEND',`updatetime` = NOW()  WHERE `ID` IN (",VARIN_ID,")");

PREPARE STMT1 from @sql1 ;
EXECUTE STMT1;
 
set @sql4 = CONCAT("insert into final(ADNO , CLASSSEC, STUDENTNAME, Message, mobile_number, SMSdate,`is_scheduled`,`type`,msglen) 
select master.ADNO ,master.CLASSSEC ,master.STUDENTNAME, sms_group.message ,master.mobile_number, 
if(sms_group.is_scheduled = 1 , sms_group.scheduled_on , NOW()) ,sms_group.`is_scheduled`, sms_group.`type`,
CEIL(LENGTH(sms_group.message)/160) from sms_group 
join master on(sms_group.Group_name = master.CLASSSEC) where sms_group.status = 'SEND'
AND sms_group.ID in (", VARIN_ID ,")");

PREPARE STMT4 from @sql4;
EXECUTE STMT4;

END$$

CREATE DEFINER=`root`@`%` PROCEDURE `sms_otherpersonalfinal`(IN `VARIN_ID` VARCHAR(255))
    NO SQL
BEGIN
set @sql = CONCAT("UPDATE  `sms_personal` SET `status` = 'SEND' ,  updatetime = NOW()  WHERE `ID` IN (",VARIN_ID,")");
PREPARE STMT from @sql ;
EXECUTE STMT;
 
set @sql1 = CONCAT("insert into final(ADNO , CLASSSEC, STUDENTNAME, Message, mobile_number, SMSdate,`is_scheduled`, `type`, msglen) 
select master.ADNO,master.CLASSSEC ,master.STUDENTNAME,if(sms_personal.template_id = 0,sms_personal.message,
(select message from template where sno  = sms_personal.template_id )) , master.mobile_number , 
if(sms_personal.is_scheduled = 1 , sms_personal.scheduled_on , NOW()) ,sms_personal.`is_scheduled`, sms_personal.`type` ,if( sms_personal.template_id = 0,
CEIL(LENGTH(sms_personal.message)/160),(select CEIL(LENGTH(message)/160) from template where sno  = sms_personal.template_id )) from sms_personal join master on(sms_personal.Admission_No = master.ADNO) 
where sms_personal.status = 'SEND' AND  sms_personal.ID in (", VARIN_ID ,")");
PREPARE STMT1 from @sql1 ;
EXECUTE STMT1;
update final set Message = REPLACE(Message , '(!student!)' , STUDENTNAME)  where `status` ='' ;
update final set Message = REPLACE(Message , '(!date!)' , SMSdate)  where `status` ='' ;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `sms_personalfinal`(IN `VARIN_ID` VARCHAR(255))
    NO SQL
BEGIN
set @sql = CONCAT("UPDATE  `sms_personal` SET `status` = 'SEND' ,  updatetime = NOW()  WHERE `ID` IN (",VARIN_ID,")");
PREPARE STMT from @sql ;
EXECUTE STMT;
 
set @sql1 = CONCAT("insert into final(CLASS_ID,ADNO, CLASSSEC, STUDENTNAME, Message, mobile_number, SMSdate,`is_scheduled`, `type`, msglen) 
select sms_personal.CLASS_ID,v_sms.Admission_ID as ADNO,v_sms.CLASSSEC ,v_sms.NAME as STUDENTNAME,sms_personal.message as Message, v_sms.contact as mobile_number , 
if(sms_personal.is_scheduled = 1 , sms_personal.scheduled_on , NOW()) ,sms_personal.`is_scheduled`, sms_personal.`type`,
CEIL(LENGTH(sms_personal.message)/160) as msglen from sms_personal join v_sms on(sms_personal.Admission_No = v_sms.Admission_ID and 
v_sms.CLASS_ID = sms_personal.CLASS_ID) 
where sms_personal.status = 'SEND' AND  sms_personal.ID in (", VARIN_ID ,")");


PREPARE STMT1 from @sql1 ;
EXECUTE STMT1;
update final set Message = REPLACE(Message , '(!student!)' , STUDENTNAME)  where `status` ='' ;
update final set Message = REPLACE(Message , '(!date!)' , SMSdate)  where `status` ='' ;

END$$

CREATE DEFINER=`root`@`%` PROCEDURE `sno`(IN `sid` VARCHAR(50))
BEGIN
 #DECLARE serialNumber VARCHAR(10);
   # DECLARE staffcode VARCHAR(10);
    
    SELECT `SerialNumber` FROM `tbl_serial_no` where `SerialCode` = sid;
	
    #SELECT @staffcode := serialNumber;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `student_count`(IN `VAR_YEARID` INT)
BEGIN

SELECT COUNT( * )  as Total
FROM  `v_studentlist` 
JOIN tbl_class ON ( tbl_class.CLASS_ID = v_studentlist.`CLASS_ID` ) where `v_studentlist`.`Year_Id` = VAR_YEARID;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `student_fee_structure`(IN `VAR_YEARID` INT(2))
    NO SQL
BEGIN
SET @sql = NULL;
SET @Sql2 = VAR_YEARID;

SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'MAX(IF(feeheads = ''',
      feeheads,
      ''', feeamount, 0)) AS ',
    feeheads
    )
  ) INTO @sql
FROM  v_fees where Year_Id = VAR_YEARID;

SET @sql = CONCAT('SELECT feeGroupName ,', @sql, ' FROM  v_fees where Year_Id = ',@Sql2,'  GROUP BY GroupId');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `stu_list`(IN `VAR_YEARID` INT(2))
BEGIN
SET @sql = NULL;
SET @Sql2 = VAR_YEARID;
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'MAX(IF(Standard = ',char(39),
      Standard,char(39),
      ', countstu, 0)) AS ',
      Standard
    )
  ) INTO @sql
FROM  v_countstu where Year_Id = VAR_YEARID;

SET @sql = CONCAT('SELECT Section, ', @sql, ',SUM(`countstu`) as Total FROM  v_countstu where Year_Id = ',@Sql2,'  GROUP BY Section');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updatefeeamountdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20))
    NO SQL
SELECT fee.CLASS_ID, fee.feeheadId, fee.feehead, fee.feetype,
IFNULL(fee.feeamount, 0) as TOTAL_FEE, 
IFNULL(tran.TOT_AMOUNT, 0) as PAID_FEE, (fee.feeamount -  IFNULL( TOT_AMOUNT , 0)) as BALANCE
FROM v_fees fee   LEFT OUTER JOIN v_feestrans tran
ON fee.feeHeadId = tran.feeHeadId  AND fee.CLASS_ID = tran.CLASS_ID 
AND tran.Admission_Id =  VARIN_ADMISSION_ID
WHERE Fee.Class_ID  IN (SELECT Class_ID FROM student_info1 WHERE Admission_Id =  VARIN_ADMISSION_ID )$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `Updatefullstudentdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20), IN `VARIN_CLASS_ID` VARCHAR(20), IN `VARIN_NAME` VARCHAR(50), IN `VARIN_FATHER_NAME` VARCHAR(50), IN `VARIN_CONTACT` VARCHAR(10),IN `VARIN_DOB` DATE, IN `VARIN_rollNumber` INT(4), IN `VARIN_Group` VARCHAR(20), IN `VARIN_Gender` VARCHAR(6), IN `VARIN_IILanguage` VARCHAR(20), IN `VARIN_Type` VARCHAR(50), IN `VARIN_photo` VARCHAR(256))
    NO SQL
BEGIN

START TRANSACTION;



Update student_info1 set CLASS_ID = VARIN_CLASS_ID ,  NAME = VARIN_NAME , FATHER_NAME  = VARIN_FATHER_NAME , contact  = VARIN_CONTACT , DOB = VARIN_DOB , rollNumber = VARIN_rollNumber 

,`Group` = VARIN_Group , Gender  = VARIN_Gender , IILanguage = VARIN_IILanguage , Type = VARIN_Type , photo = VARIN_photo where ADMISSION_ID = VARIN_ADMISSION_ID;



COMMIT;

END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updategroupmemberdetails`(IN `VARIN_CLASSSEC` VARCHAR(11), IN `VARIN_ADNO` VARCHAR(11), IN `VARIN_STUDENTNAME` VARCHAR(50), IN `VARIN_FATHER_NAME` VARCHAR(50), IN `VARIN_CONTACT` VARCHAR(10), IN `VARIN_DOB` DATE, IN `VARIN_GENDER` VARCHAR(11))
    NO SQL
BEGIN
START TRANSACTION;


Update `group_info` set CLASSSEC = VARIN_CLASSSEC ,
 
ADMISSION_ID = VARIN_ADNO , 

NAME = VARIN_STUDENTNAME , 

FATHER_NAME = VARIN_FATHER_NAME , 

contact = VARIN_CONTACT , 

DOB = VARIN_DOB , 

Gender  = VARIN_GENDER  where ADMISSION_ID = VARIN_ADNO;




COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `updatestaffdetails`(IN `VARIN_SNO` VARCHAR(11),
IN `VARIN_NAME` VARCHAR(501),  
IN `VARIN_FATHER_NAME` VARCHAR(50),
IN `VARIN_MOBILENO` VARCHAR(20), 
IN `VARIN_DOB` DATE,
IN `VARIN_GENDER` VARCHAR(20),
IN `VARIN_DEPART` VARCHAR(50),
IN `VARIN_EMAIL` VARCHAR(50), 
IN `VARIN_QULI` VARCHAR(50), 
IN `VARIN_TYPE` VARCHAR(50),  
IN `VARIN_YEARID` VARCHAR(2))
    NO SQL
BEGIN


START TRANSACTION;

UPDATE `staff_info` SET 
`Staff_Name`=VARIN_NAME,
`Sur_name`=VARIN_FATHER_NAME,
`contact`=VARIN_MOBILENO,
`dob`=VARIN_DOB,
`gender`=VARIN_GENDER,
`department`=VARIN_DEPART,
`email`=VARIN_EMAIL,
`qualification`=VARIN_QULI,
`staff_type`=VARIN_TYPE where `staff_code` = VARIN_SNO AND `Year_Id` = VARIN_YEARID;

COMMIT;


END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updatestudentaddressdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20), IN `VARIN_DoorNoStreet` VARCHAR(62), IN `VARIN_Area` VARCHAR(30), IN `VARIN_City` VARCHAR(14), IN `VARIN_State` VARCHAR(10), IN `VARIN_Pincode` VARCHAR(10), IN `VARIN_ModeofTransport` VARCHAR(10))
    NO SQL
BEGIN
START TRANSACTION;


update stu_address set DoorNoStreet = VARIN_DoorNoStreet , Area = VARIN_Area , City = VARIN_City , State = VARIN_State , Pincode = VARIN_Pincode , ModeofTransport = VARIN_ModeofTransport where ADMISSION_ID = VARIN_ADMISSION_ID;


COMMIT;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `updatestudentdetails`(IN `VARIN_CLASSSEC` VARCHAR(11), IN `VARIN_CLASSID` INT(2), IN `VARIN_ADNO` VARCHAR(11), IN `VARIN_STUDENTNAME` VARCHAR(50), IN `VARIN_FATHER_NAME` VARCHAR(50), IN `VARIN_MOBILENO` VARCHAR(20), IN `VARIN_DOB` DATE, IN `VARIN_GENDER` VARCHAR(6), IN `VARIN_YEARID` VARCHAR(2))
    NO SQL
BEGIN

    DECLARE varclassid VARCHAR(100);
	DECLARE varStandard VARCHAR(100);
	DECLARE varSection VARCHAR(100);

START TRANSACTION;

SELECT `CLASS_ID`,`Standard`,`Section` into varclassid,varStandard,varSection FROM `tbl_class` WHERE CLASS_ID = VARIN_CLASSID;

Update `student_info1` set CLASSSEC = VARIN_CLASSSEC , NAME = VARIN_STUDENTNAME , FATHER_NAME = VARIN_FATHER_NAME , 

contact = VARIN_MOBILENO , DOB  = VARIN_DOB, Gender = VARIN_GENDER  where ADMISSION_ID = VARIN_ADNO;

Update `student_class_map` set class_id = varclassid ,Standard = varStandard, Section = varSection,

CLASSSEC = VARIN_CLASSSEC where Admission_No = VARIN_ADNO;

COMMIT;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updatestudentidcarddetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20), 
IN `VARIN_NAME` VARCHAR(50), 
IN `VARIN_CLASS_ID` INT(8), 
IN `VARIN_CLASSSEC` VARCHAR(20), 
IN `VARIN_FATHER_NAME` VARCHAR(50), 
IN `VARIN_contact` VARCHAR(10), 
IN `VARIN_DOB` DATE, 
IN `VARIN_Gender` VARCHAR(6), 
IN `VARIN_BloodGroup` VARCHAR(6), 
IN `VARIN_photo` VARCHAR(256), 
IN `VARIN_EMISNumber` VARCHAR(20), 
IN `VARIN_DoorNoStreet` VARCHAR(62), 
IN `VARIN_Area` VARCHAR(30), 
IN `VARIN_City` VARCHAR(14), 
IN `VARIN_Pincode` VARCHAR(10))
    NO SQL
BEGIN
START TRANSACTION;

Update student_info1 set NAME = VARIN_NAME , 
CLASS_ID = VARIN_CLASS_ID , 
CLASSSEC = VARIN_CLASSSEC , 
FATHER_NAME  = VARIN_FATHER_NAME , 
contact = VARIN_contact , 
DOB = VARIN_DOB , 
Gender  = VARIN_Gender , 
BloodGroup  = VARIN_BloodGroup , 
photo = VARIN_photo  where ADMISSION_ID = VARIN_ADMISSION_ID;
Update stu_others set  EMISNumber = VARIN_EMISNumber  where ADMISSION_ID = VARIN_ADMISSION_ID;
update stu_address set DoorNoStreet = VARIN_DoorNoStreet , 
Area = VARIN_Area , 
City = VARIN_City , 
Pincode = VARIN_Pincode  where ADMISSION_ID = VARIN_ADMISSION_ID;



COMMIT;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updatestudentmedical`(IN `VARIN_ADMISSION_ID` VARCHAR(20), IN `VARIN_Height` VARCHAR(10), IN `VARIN_Weight` VARCHAR(10))
    NO SQL
BEGIN
START TRANSACTION;

update stu_medical set Height = VARIN_Height , Weight = VARIN_Weight where ADMISSION_ID = VARIN_ADMISSION_ID;

COMMIT;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updatestudentothersdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20), IN `VARIN_EMISNumber` VARCHAR(20), IN `VARIN_AadharCardNumber` VARCHAR(20), IN `VARIN_IdentificationMarks1` VARCHAR(50), IN `VARIN_IdentificationMarks2` VARCHAR(50), IN `VARIN_AdmissionYear` VARCHAR(10), IN `VARIN_AdmissionStandard` VARCHAR(10), IN `VARIN_DOJ` DATE, IN `VARIN_Documents` VARCHAR(50))
    NO SQL
BEGIN
START TRANSACTION;


update stu_others set EMISNumber = VARIN_EMISNumber , AadharCardNumber = VARIN_AadharCardNumber , IdentificationMarks1 = VARIN_IdentificationMarks1 , IdentificationMarks2 = VARIN_IdentificationMarks2 , AdmissionYear = VARIN_AdmissionYear , AdmissionStandard = VARIN_AdmissionStandard , DOJ = VARIN_DOJ , Documents = VARIN_Documents where ADMISSION_ID = VARIN_ADMISSION_ID;


COMMIT;
END$$

CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `updatestudentparentsdetails`(IN `VARIN_ADMISSION_ID` VARCHAR(20), IN `VARIN_FatherName` VARCHAR(50), IN `VARIN_fatherQualification` VARCHAR(10), IN `VARIN_fatherWork` VARCHAR(10), IN `VARIN_fatherOccupation` VARCHAR(50), IN `VARIN_fatherAnnualIncome` VARCHAR(10), IN `VARIN_fatherOfficeAddress` VARCHAR(50), IN `VARIN_fatherOfficePhone` VARCHAR(10), IN `VARIN_fatherMobile` VARCHAR(10), IN `VARIN_fatherEmail` VARCHAR(255), IN `VARIN_PastPupil` VARCHAR(10), IN `VARIN_passingYear` VARCHAR(10), IN `VARIN_MotherName` VARCHAR(50), IN `VARIN_motherQualification` VARCHAR(10), IN `VARIN_motherWork` VARCHAR(10), IN `VARIN_motherAnnualIncome` VARCHAR(10), IN `VARIN_motherOfficeAddress` VARCHAR(50), IN `VARIN_motherOccupation` VARCHAR(50), IN `VARIN_motherOfficePhone` VARCHAR(10), IN `VARIN_motherMobile` VARCHAR(10), IN `VARIN_motherEmailAddress` VARCHAR(255))
    NO SQL
BEGIN
START TRANSACTION;


update stu_parents set 
FatherName = VARIN_FatherName , 
fatherQualification = VARIN_fatherQualification , 
fatherWork = VARIN_fatherWork , 
fatherOccupation  = VARIN_fatherOccupation  , 
fatherAnnualIncome = VARIN_fatherAnnualIncome , 
fatherOfficeAddress = VARIN_fatherOfficeAddress ,
fatherOfficePhone = VARIN_fatherOfficePhone ,
fatherMobile = VARIN_fatherMobile , 
fatherEmail = VARIN_fatherEmail ,
PastPupil = VARIN_PastPupil , 
passingYear = VARIN_passingYear , 
MotherName = VARIN_MotherName , 
motherQualification = VARIN_motherQualification , 
motherWork = VARIN_motherWork ,
motherOccupation = VARIN_motherOccupation ,
motherAnnualIncome = VARIN_motherAnnualIncome , 
motherOfficeAddress = VARIN_motherOfficeAddress ,
motherOfficePhone = VARIN_motherOfficePhone ,
motherMobile = VARIN_motherMobile ,
motherEmailAddress = VARIN_motherEmailAddress 
where ADMISSION_ID = VARIN_ADMISSION_ID; 


COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `img_lib`
--

CREATE TABLE IF NOT EXISTS `img_lib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(100) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `img_name` (`img_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `img_lib`
--

INSERT INTO `img_lib` (`id`, `img_name`, `img_path`, `status`) VALUES
(1, 'nature', 'www.web.in/nature.jpg', 0),
(2, 'School', 'testing', 0),
(3, 'Welcome', 'chairman.jpg', 0),
(4, 'Rama', 'MaheshRamasubramaniam.jfif', 0),
(15, 'natureqq', 'DSC_5666.jpg', 0),
(18, 'Namachi', 'amrath.jpg', 0),
(19, 'eq2s.jpg', 'eq2s.jpg', 0),
(20, 'quest 3', 'q3eb.jpg', 0),
(21, '3rd question', 'q3eb.jpg', 0),
(22, 'jk1', 'butter.jpg', 0),
(23, 'jk2', 'duck.jpg', 0),
(24, 'jk3', 'butter.jpg', 0),
(25, 'jk4', 'tree.jpg', 0),
(26, 'testimg', 'chairman.jpg', 0),
(27, 'process', 'AdProcess.tiff', 0),
(28, 'iseg', 'IESEG.jpeg', 0),
(29, 'VAS', 'VAS.jpg', 0),
(30, 'namachi1', 'Untitled-1.jpg', 0),
(31, 'namachi2', 'Aspire-Logo.png', 0),
(32, 'q22apr', 'test.jpg', 0),
(33, 'exptest', 'e22.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL,
  `question` text NOT NULL,
  `que_image` varchar(101) NOT NULL,
  `level` varchar(11) NOT NULL,
  `topic` varchar(150) NOT NULL,
  `options` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `explanation` text NOT NULL,
  `ans_image` varchar(101) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`id`, `type`, `question`, `que_image`, `level`, `topic`, `options`, `answer`, `explanation`, `ans_image`, `insDate`, `status`) VALUES
(19, 'FID', 'welcome  (!DSC_5666.jpg!) test?', 'chairman.jpg', 'Normal', 'English', 'A', 'B', 'Some text for answer', 'MaheshRamasubramaniam.jfif', '2022-03-25 10:20:13', 1),
(20, 'MCQ', 'What is the capital of Tamil Nadu What is the capital of Tamil Nadu', 'eq2s.jpg', 'Normal', '', 'Chennai,Pondy,Madurai,CBE', 'B', 'Some text for answer', 'eq2s.jpg', '2022-03-26 11:30:11', 1),
(21, 'MCQ', 'Test (!eq2s.jpg!) Test newbbnbnbbb.,mm.,nm,.n,.mn.,mn', 'eq2s.jpg', 'Normal', '', 'A', 'B', 'Some text for answer', 'eq2s.jpg', '2022-03-26 11:28:50', 1),
(22, 'MCQ', 'What is the capital of India?', 'chairman.jpg', 'Normal', 'English', 'Delhi', 'Delhi', 'Some text for answer', '', '2022-03-26 11:28:02', 1),
(23, 'MCQ', 'What is the capital of India?', 'chairman.jpg', 'Normal', 'English', 'Delhi', 'Delhi', 'Some text for answer', '', '2022-03-26 11:44:05', 1),
(24, 'MCQ', 'sample 3 svnvklfv fvfd dffdb df bdbfd bdb sample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdbsample 3 svnvklfv fvfd dffdb df bdbfd bdb', 'q3eb.jpg', 'Very Hard', 'Maths', 'A" dell, B: HP, C: MI TV, D: BOAT TV', 'D: BOAT TV', 'BOAT TV good', 'eq2s.jpg', '2022-03-26 12:14:41', 0),
(25, 'MCQ', 'whar is the area  of square with si jk1whar is the area  of square with si jk1whar is the area  of square with si jk1whar is the area  of square with si jk1whar is the area  of square with si jk1', 'duck.jpg', 'Normal', 'Maths', '2a, 3a, 2a', 'a2', 'areasformula', 'butter.jpg', '2022-03-26 13:08:08', 1),
(26, 'MCQ', 'Namachi test Namachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi testNamachi test', 'chairman.jpg', 'Normal', 'English', 'A: dfgdfg, B: dfg, C: dfgfdg, D:dfgdfss', 'a', 'bad namachi', 'tree.jpg', '2022-03-26 13:08:39', 0),
(27, 'MCQ', 'dsjfbdsjkvb', 'eq2s.jpg', 'Normal', '', 'A', 'A', 'Some text for answer', 'eq2s.jpg', '2022-03-26 10:58:10', 1),
(28, 'MCQ', 'kjbfksdfb', 'eq2s.jpg', 'Normal', 'Maths', 'A', 'Parentalert', 'Some text for answer', 'eq2s.jpg', '2022-03-26 10:57:05', 1),
(29, 'MCQ', 'TestingTestingTestingTestingTestingwelcome', 'DSC_5666.jpg', 'Hard', 'Maths', 'A,B,C,D', 'D', 'Some text for answer', 'q3eb.jpg', '2022-03-26 11:52:40', 1),
(30, 'MCQ', 'Which is the topp bschool in france?', 'IESEG.jpeg', 'Normal', 'English', 'Audencia, ISEG, EMnOrm, Skema', 'ISEG', 'Best B School', 'VAS.jpg', '2022-03-28 10:29:29', 1),
(31, 'MCQ', 'Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1 Namachi 1', 'Untitled-1.jpg', 'Very Hard', 'Maths', 'nama1, nama4, nama5, nama2', 'nama5', 'ok ok namachi', 'Aspire-Logo.png', '2022-03-30 08:00:38', 0),
(32, 'MCQ', '22 april 22  22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22 22 april 22', 'chairman.jpg', 'Normal', 'English', 'apple, red, blue, flower', 'blue', 'flower is good', 'DSC_5666.jpg', '2022-04-22 06:33:13', 0),
(33, 'MCQ', 'ff', 'chairman.jpg', 'Normal', 'English', 'd', 'd', 'fdg', '', '2022-05-19 08:04:20', 0),
(34, 'MCQ', 'ff', 'chairman.jpg', 'Normal', 'English', 'd', 'd', 'fdg', '', '2022-05-19 08:04:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionpapper`
--

CREATE TABLE IF NOT EXISTS `questionpapper` (
  `qpid` int(11) NOT NULL AUTO_INCREMENT,
  `quspapper_name` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`qpid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questionpapper`
--

INSERT INTO `questionpapper` (`qpid`, `quspapper_name`, `faculty_id`, `status`) VALUES
(1, 'Test', 1, 0),
(2, 'june-22', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_papper_map`
--

CREATE TABLE IF NOT EXISTS `question_papper_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apids` int(11) NOT NULL,
  `qpname` varchar(100) NOT NULL,
  `fid` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `question` text NOT NULL,
  `que_image` varchar(101) NOT NULL,
  `level` varchar(11) NOT NULL,
  `topic` varchar(150) NOT NULL,
  `options` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `explanation` text NOT NULL,
  `ans_image` varchar(101) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `question_papper_map`
--

INSERT INTO `question_papper_map` (`id`, `apids`, `qpname`, `fid`, `type`, `question`, `que_image`, `level`, `topic`, `options`, `answer`, `explanation`, `ans_image`, `insDate`, `status`) VALUES
(1, 1, 'Test', 1, 'FID', 'welcome  (!DSC_5666.jpg!) test?', 'chairman.jpg', 'Normal', 'English', 'A', 'B', 'Some text for answer', 'MaheshRamasubramaniam.jfif', '2022-04-02 10:06:36', 0),
(2, 1, 'Test', 1, 'MCQ', 'What is the capital of Tamil Nadu What is the capital of Tamil Nadu', 'eq2s.jpg', 'Normal', '', 'Chennai,Pondy,Madurai,CBE', 'B', 'Some text for answer', 'eq2s.jpg', '2022-04-02 10:06:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_class_map`
--

CREATE TABLE IF NOT EXISTS `staff_class_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_code` varchar(20) NOT NULL,
  `class_Id` int(11) NOT NULL,
  `CLASSSEC` varchar(20) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `Sur_name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Year_Id` int(11) NOT NULL,
  `Status` varchar(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE IF NOT EXISTS `staff_info` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(50) DEFAULT NULL,
  `Sur_name` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `contact1` varchar(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `doj` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(320) NOT NULL,
  `aadhar` varchar(16) NOT NULL,
  `aadharImage` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `reportingto` varchar(50) NOT NULL,
  `centre` varchar(5) NOT NULL,
  `staff_type` varchar(50) NOT NULL,
  `status` varchar(10) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`sid`, `staff_name`, `Sur_name`, `contact`, `contact1`, `dob`, `doj`, `gender`, `job_type`, `Designation`, `email`, `address`, `aadhar`, `aadharImage`, `photo`, `qualification`, `reportingto`, `centre`, `staff_type`, `status`) VALUES
(1, 'praburajan', 'Praburajan', '0971065866', '09710658669', '0000-00-00', '0000-00-00', '', '', '', 'epraburajan@gmail.co', 'Mettu Street', '', '', '', '', '', 'OMR', '', '1'),
(2, 'Manikandan', 'Praburajan', '0971065866', '9965617544', '2022-02-18', '2022-02-20', 'Male', 'Full Time', 'Mettu Street', 'epraburajan@gmail.co', 'Mettu Street', '12345', 'aadharImage', 'photo', 'swedw', 'sss', 'KDM', 'Faculty', '0'),
(3, 'Raja', 'Praburajan', '9965617544', '09710658669', '2022-02-09', '2022-02-09', 'Male', 'Full Time', 'Mettu Street', 'epraburajan@gmail.co', 'Mettu Street', '12345', 'aadharImage', 'photo', 'swedw', 'sss', 'KDM', '', '0'),
(4, 'Kannan', 'Praburajan', '0971065866', '09710658669', '2022-02-09', '2022-02-09', 'Male', 'Full Time', 'Mettu Street', 'epraburajan@gmail.co', 'Mettu Street', '12345', 'aadharImage', 'photo', 'swedw', 'sss', 'KDM', '', '0'),
(5, 'rajaram', 'siva', '9789807376', '9789807376', '2022-02-05', '2022-02-05', 'Male', 'Full Time', 'mgr', 'thenamachi@gmail.com', '1 Saradha Nagar Extn, Virugambakkam', '898989898989', 'aadharImage', 'photo', 'BE', 'ak', 'KDM', '', '1'),
(6, 'abc', 'xzy', '121', 'refgedfg', '2022-04-02', '2022-04-15', 'Female', 'Full Time', 'dsvsv', 'svsnvl@kk.com', 'sdvdsvsd', '234', 'aadharImage', 'photo', 'cdcd', 'vsvsv', 'OMR', 'Counsellor', '0'),
(7, 'dvdfvd', '', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', 'aadharImage', 'photo', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_enquiry`
--

CREATE TABLE IF NOT EXISTS `student_enquiry` (
  `StId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `institution` varchar(150) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `student_mobile` varchar(10) DEFAULT NULL,
  `parent_mobile` varchar(11) NOT NULL,
  `enquiry_date` date NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(100) NOT NULL,
  `program` varchar(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `prefered_country` varchar(50) NOT NULL,
  `counsellor_id` varchar(20) NOT NULL,
  `counsellor_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `remarks` text NOT NULL,
  `sel_list` enum('Follow Up','Enrolled','Closed') DEFAULT NULL,
  `centre` varchar(25) NOT NULL,
  `Updated_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_enquiry`
--

INSERT INTO `student_enquiry` (`StId`, `name`, `parent_name`, `institution`, `qualification`, `student_mobile`, `parent_mobile`, `enquiry_date`, `dob`, `course`, `program`, `source`, `email`, `gender`, `prefered_country`, `counsellor_id`, `counsellor_name`, `address`, `remarks`, `sel_list`, `centre`, `Updated_DateTime`, `status`) VALUES
(1, 'dell hp', 'ho', 'sdcsc', 'scsdcsc', '7777777777', '8888888888', '2022-04-08', '2022-04-23', '3', '1', 'Google', 'xvx@fgg.vom', 'Male', 'Mauritius', '123', 'gfgfngfnfg', 'gbfgf', 'fdbdfbdb', NULL, '1', '2022-04-21 12:15:50', 1),
(2, 'namachi', 'namachi', 'mgr', 'MBA', '9999999999', '8888888888', '2022-04-01', '2022-04-29', '3', '2', 'Database', 'bvdvd@dffdfd.com', 'Male', 'France', 'vfvfdv', 'vdfvfdv', 'dvddv', 'vfdvfd', NULL, '1', '2022-04-23 06:41:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll`
--

CREATE TABLE IF NOT EXISTS `student_enroll` (
  `enrollId` int(11) NOT NULL AUTO_INCREMENT,
  `StId` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `institution` varchar(150) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `student_mobile` varchar(10) DEFAULT NULL,
  `parent_mobile` int(10) NOT NULL,
  `enquiry_date` date NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(100) NOT NULL,
  `program` varchar(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `prefered_country` varchar(50) NOT NULL,
  `counsellor_id` varchar(20) NOT NULL,
  `counsellor_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `remarks` text NOT NULL,
  `centre` varchar(25) NOT NULL,
  `batch` int(5) NOT NULL,
  `promocode` varchar(25) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `Updated_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`enrollId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_enroll`
--

INSERT INTO `student_enroll` (`enrollId`, `StId`, `name`, `parent_name`, `institution`, `qualification`, `student_mobile`, `parent_mobile`, `enquiry_date`, `dob`, `course`, `program`, `source`, `email`, `gender`, `prefered_country`, `counsellor_id`, `counsellor_name`, `address`, `remarks`, `centre`, `batch`, `promocode`, `photo`, `Updated_DateTime`, `status`) VALUES
(1, 1, 'dell hp gohjh', 'ho', 'sdcsc', 'scsdcsc', '7777777777', 2147483647, '0000-00-00', '2022-04-23', '3', '1', 'Justdial', '1', 'Male', 'Mauritius', '123', 'gfgfngfnfg', 'gbfgf', 'fdbdfbdb', '1', 1, '', 'HI', '2022-05-19 07:01:08', 0),
(4, 2, 'namachi', 'namachi', 'mgr', 'MBA', '9999999999', 2147483647, '0000-00-00', '0000-00-00', '3', '2', 'Database', 'bvdvd@dffdfd.com', 'Male', 'France', 'vfvfdv', 'vdfvfdv', 'dvddv', 'vfdvfd', '1', 1, 'GRE001', 'HI', '2022-04-23 06:41:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollbkp`
--

CREATE TABLE IF NOT EXISTS `student_enrollbkp` (
  `eId` int(10) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(5) NOT NULL,
  `course_id` int(11) NOT NULL,
  `program_id` varchar(11) NOT NULL,
  `batch` int(2) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `promo_code` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `stuStatus` varchar(10) DEFAULT '1',
  PRIMARY KEY (`eId`),
  UNIQUE KEY `ADMISSION_ID` (`enquiry_id`),
  KEY `batch` (`batch`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student_enrollbkp`
--

INSERT INTO `student_enrollbkp` (`eId`, `enquiry_id`, `course_id`, `program_id`, `batch`, `start_date`, `end_date`, `promo_code`, `photo`, `stuStatus`) VALUES
(1, 2, 1, 'Online', 1, '0000-00-00', '0000-00-00', 'GRE001', 'HI', '1'),
(2, 3, 1, 'Online', 1, '0000-00-00', '0000-00-00', 'GRE001', 'HI', '1'),
(3, 12, 1, 'Institution', 1, '0000-00-00', '0000-00-00', 'GRE001', 'HI', '1'),
(4, 11, 1, 'Class Room', 1, '0000-00-00', '0000-00-00', 'GRE001', 'HI', '1'),
(5, 13, 1, 'Class Room', 1, '0000-00-00', '0000-00-00', 'GRE001', 'HI', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE IF NOT EXISTS `tbl_batch` (
  `b_id` int(10) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `timing` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`b_id`, `batch_name`, `program_id`, `emp_id`, `center_id`, `start_date`, `end_date`, `timing`, `days`, `status`) VALUES
(1, 'First Batch', 2, 2, 1, '2022-01-03', '2022-01-01', '100 Hours', 'Weekdays', 0),
(2, 'Second Batch', 2, 1, 2, '2022-02-04', '2022-02-02', '150 Hours', 'Weekdays', 0),
(3, 'Third Batch', 1, 1, 2, '2022-02-16', '2022-02-23', '100 Hours', 'Weekdays', 0),
(4, 'MBA', 1, 1, 2, '2022-03-11', '2022-04-16', '100 Hours', 'Weekdays', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_center`
--

CREATE TABLE IF NOT EXISTS `tbl_center` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `center` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_center`
--

INSERT INTO `tbl_center` (`cid`, `center`, `status`) VALUES
(1, 'KDM', 0),
(2, 'OMR', 0),
(3, 'All', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `c_id` int(4) NOT NULL AUTO_INCREMENT,
  `course` varchar(30) CHARACTER SET latin1 NOT NULL,
  `program` varchar(50) CHARACTER SET latin1 NOT NULL,
  `duration` int(4) NOT NULL,
  `amount` int(11) NOT NULL,
  `center` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`c_id`, `course`, `program`, `duration`, `amount`, `center`, `status`) VALUES
(1, 'AAAA', 'Online', 150, 5000, 'OMR', 1),
(2, 'IELTS', 'Institutional', 0, 0, '', 1),
(3, 'IELTS', 'Online', 150, 2000, 'KDM', 0),
(4, 'BE', 'Class Room', 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE IF NOT EXISTS `tbl_exam` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `examCode` varchar(25) NOT NULL,
  `ques_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ques_no` (`ques_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow_up`
--

CREATE TABLE IF NOT EXISTS `tbl_follow_up` (
  `fId` int(2) NOT NULL AUTO_INCREMENT,
  `follow_up` varchar(15) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`fId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE IF NOT EXISTS `tbl_program` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`pid`, `program_name`, `status`) VALUES
(1, 'Online', '0'),
(2, 'Class Room', '0'),
(3, 'Self Prep', '0'),
(4, 'Institutional', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE IF NOT EXISTS `tbl_promo` (
  `proid` int(10) NOT NULL AUTO_INCREMENT,
  `promo_name` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`proid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_promo`
--

INSERT INTO `tbl_promo` (`proid`, `promo_name`, `status`) VALUES
(1, 'AE011', '0'),
(2, 'BE011', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serial_no`
--

CREATE TABLE IF NOT EXISTS `tbl_serial_no` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SerialCode` varchar(10) NOT NULL,
  `prefix` varchar(11) NOT NULL,
  `suffix` varchar(11) NOT NULL,
  `SerialNumber` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `Updated_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `SerialCode` (`SerialCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_serial_no`
--

INSERT INTO `tbl_serial_no` (`Id`, `SerialCode`, `prefix`, `suffix`, `SerialNumber`, `status`, `Updated_DateTime`) VALUES
(1, 'AD_1', '', '', 3, 0, '2021-10-21 10:28:14'),
(2, 'SD_1', '', '', 1, 0, '2021-10-21 05:49:48'),
(3, 'ED_1', '', '', 3, 0, '2022-01-21 09:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timings`
--

CREATE TABLE IF NOT EXISTS `tbl_timings` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `timing` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_timings`
--

INSERT INTO `tbl_timings` (`tid`, `timing`, `status`) VALUES
(1, '6.00 Am to 7.00 Am ', '0'),
(2, '150 Hours', '0'),
(3, '200 Hours', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_enrollbkp`
--
ALTER TABLE `student_enrollbkp`
  ADD CONSTRAINT `student_enrollbkp_ibfk_1` FOREIGN KEY (`batch`) REFERENCES `tbl_batch` (`b_id`);

--
-- Constraints for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD CONSTRAINT `tbl_exam_ibfk_1` FOREIGN KEY (`ques_no`) REFERENCES `questionbank` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
