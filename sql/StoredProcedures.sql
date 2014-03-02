DELIMITER $$

DROP PROCEDURE IF exists `salesSlipByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `salesSlipByCompany`(in nid int)
BEGIN

select ss.idsale_service AS "UniqueID", ss.date AS "Receipt Date", CONCAT(c.fName , " ", c.lName) AS "Customer Name",
	l.name AS "Store Name", s.serviceName AS "Name of Service", ss.hours AS "Hours Billed",
	(s.`price-hour` * ss.hours) AS "Total Price"
FROM sale_service ss, customer c, location l, service s, user_admin ua
WHERE ss.idcustomer = c.idcustomer AND c.iduser = ua.iduser AND l.idlocation = ss.idlocation 
	AND ss.idservice = s.idservice AND  ua.iduser = nid AND ss.active = 1; 

END$$

DROP PROCEDURE IF exists `prodSlipByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prodSlipByCompany`(in nid int)
BEGIN

select sp.idsale_product AS "UniqueID", sp.date AS "Receipt Date", CONCAT(c.fName , " ", c.lName) AS "Customer Name",
	l.name AS "Store Name", l.city AS "City", p.name AS "Name of Product", sp.amount AS "Number Sold",
	(p.`price` * sp.amount) AS "Total Price"
FROM sale_product sp, customer c, location l, product p, user_admin ua
WHERE sp.idcustomer = c.idcustomer AND c.iduser = ua.iduser AND l.idlocation = sp.idlocation 
	AND sp.idproduct = p.idproduct AND  ua.iduser = nid AND sp.active = 1; 

END$$


DROP PROCEDURE IF exists `custByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `custByCompany`(in nid int)
BEGIN
SELECT c.idcustomer AS "UniqueID", concat(c.fName, " ", c.lName) AS "Customer Name", c.address AS "Address",
	c.city AS "City", c.state AS "State", c.email AS "Email", c.phone AS "Phone"
FROM customer c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid  AND c.active = 1;

END$$


DROP PROCEDURE IF exists `invByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `invByCompany`(in nid int)
BEGIN
SELECT i.idinventory AS "UniqueID", p.name AS "Product", i.count AS "Count", l.name AS "Location Name", 
	l.address AS "Location Address", l.city AS "City"
FROM product p, inventory i, user_admin u, location l
WHERE p.idproduct = i.idproduct AND u.iduser = p.iduser AND i.active = 1
	AND i.idlocation = l.idlocation AND u.iduser = nid
;

END$$

DROP PROCEDURE IF exists `empByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `empByCompany`(in nid int)
BEGIN
SELECT e.idemployee AS "UniqueID", concat(e.fName, " ", e.lName) AS "Employee Name", e.address AS "Address",
	e.city AS "City", e.state AS "State", e.zip AS "Zip", e.phone AS "Phone", e.socialSecurity AS
	"Soc Number"
FROM employee e, user_admin u
WHERE e.iduser = u.iduser AND u.iduser = nid AND e.active;

END$$

DROP PROCEDURE IF exists `locByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `locByCompany`(in nid int)
BEGIN
SELECT l.idlocation AS "UniqueID", l.name AS "Location Name", l.address AS "Address", l.city AS "City",
	l.state AS "State", l.zip AS "Zip", l.phone AS "Phone"
FROM location l, user_admin u
WHERE l.iduser = u.iduser AND u.iduser = nid AND l.active = 1;

END$$

DROP PROCEDURE IF exists `prodByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `prodByCompany`(in nid int)
BEGIN
SELECT p.idproduct AS "UniqueID", p.name AS "Product Name", p.desc AS "Description", p.price AS "Price",
	p.ProdCode AS "Product Code"
FROM product p, user_admin u
WHERE p.iduser = u.iduser AND u.iduser = nid AND p.active = 1;

END$$

DROP PROCEDURE IF exists `serByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `serByCompany`(in nid int)
BEGIN
SELECT p.idservice AS "UniqueID", p.serviceName AS "Service Name", p.desc AS "Description", 
	p.`price-hour` AS "Hourly Price"
FROM service p, user_admin u
WHERE p.iduser = u.iduser AND u.iduser = nid AND p.active = 1;

END$$

DROP PROCEDURE IF exists `serSchedByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `serSchedByCompany`(in nid int)
BEGIN
SELECT ss.idservice_schedule AS "UniqueID", ss.date AS "Date", ss.time AS "Time", s.serviceName AS "Service", c.lName AS "Customer Last Name",
	c.address AS "Address", c.city AS "City", c.state AS "State"
FROM service_schedule ss, user_admin u, service s, customer c
WHERE u.iduser = nid AND s.idservice = ss.idservice AND u.iduser = ss.iduser AND ss.idcustomer 
	= c.idcustomer AND ss.active = 1
ORDER BY ss.date;

END$$


--


DROP PROCEDURE IF exists `addingCust` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addingCust`(in nid int)
BEGIN
SELECT c.fName AS "First Name", c.lName AS "Last Name", c.address AS "Address",
	c.city AS "City", c.state AS "State", c.zip AS "Zip", c.email AS "Email", c.phone AS "Phone"
FROM customer c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

DROP PROCEDURE IF exists `getCustFields` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCustFields`(in nid int)
BEGIN
SELECT c.fName, c.lName, c.address,	c.city, c.state, c.zip, c.email, c.phone
FROM customer c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$


--


DROP PROCEDURE IF exists `addingEmp` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addingEmp`(in nid int)
BEGIN
SELECT c.fName AS "First Name", c.lName AS "Last Name", c.address AS "Address",
	c.city AS "City", c.state AS "State", c.zip AS "Zip", c.socialSecurity AS "Social Security",
	c.phone AS "Phone"
FROM employee c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

DROP PROCEDURE IF exists `getEmpFields` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEmpFields`(in nid int)
BEGIN
SELECT c.fName, c.lName, c.address,	c.city, c.state, c.zip, c.socialSecurity, c.phone
FROM employee c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

--

DROP PROCEDURE IF exists `addingLoc` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addingLoc`(in nid int)
BEGIN
SELECT c.name AS "Name", c.address AS "Address",
	c.city AS "City", c.state AS "State", c.zip AS "Zip", c.phone AS "Phone"
FROM location c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

DROP PROCEDURE IF exists `getLocFields` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLocFields`(in nid int)
BEGIN
SELECT c.name, c.address,	c.city, c.state, c.zip, c.phone
FROM location c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$



--

DROP PROCEDURE IF exists `addingProd` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addingProd`(in nid int)
BEGIN
SELECT c.name AS "Name", c.desc AS "Description",
	c.price AS "Price", c.ProdCode AS "Product Code"
FROM product c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

DROP PROCEDURE IF exists `getProdFields` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProdFields`(in nid int)
BEGIN
SELECT c.name, c.desc,	c.price, c.ProdCode
FROM product c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

--

DROP PROCEDURE IF exists `addingServ` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addingServ`(in nid int)
BEGIN
SELECT c.serviceName AS "Service Name", c.desc AS "Description",
	c.`price-hour` AS "Hourly Rate"
FROM service c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

DROP PROCEDURE IF exists `getServFields` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getServFields`(in nid int)
BEGIN
SELECT c.serviceName, c.desc,	c.`price-hour`
FROM service c, user_admin u
WHERE c.iduser = u.iduser AND u.iduser = nid;

END$$

--

-- DROP PROCEDURE IF exists `getServFields` $$


--
DROP PROCEDURE IF exists `getInvByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getInvByCompany`(in nid int, in editadd int)
BEGIN
IF editadd = 1 THEN
	SELECT p.name, p.idproduct
	FROM product p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid;	
ELSE 
	SELECT p.name, p.idproduct
	FROM product p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid AND p.active = 1;
END IF;
END$$
--
DROP PROCEDURE IF exists `gettingLocByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `gettingLocByCompany`(in nid int, in editadd int)
BEGIN
IF editadd = 1 THEN
	SELECT p.address, p.idlocation
	FROM location p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid;
ELSE 
	SELECT p.address, p.idlocation
	FROM location p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid AND p.active = 1;
END IF;
END$$
--
DROP PROCEDURE IF exists `gettingCustByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `gettingCustByCompany`(in nid int, in editadd int)
BEGIN
IF editadd = 1 THEN
	SELECT distinct p.fName, p.lName, p.idcustomer
	FROM customer p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid;
ELSE
	SELECT distinct p.fName, p.lName, p.idcustomer
	FROM customer p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid;
END IF;
END$$

--
DROP PROCEDURE IF exists `getServByCompany` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getServByCompany`(in nid int, in editadd int)
BEGIN
-- SELECT p.serviceName, p.idservice
-- FROM service p, user_admin u
IF editadd = 1 THEN
	SELECT p.serviceName, p.idservice
	FROM service p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid;
ELSE
	SELECT p.serviceName, p.idservice
	FROM service p, user_admin u
	WHERE u.iduser = p.iduser AND u.iduser = nid AND p.active = 1;
END IF;
END$$


--

DROP PROCEDURE IF exists `findTablesUsed` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `findTablesUsed`(in nid int)
BEGIN
SELECT *
FROM tablesused t
WHERE t.iduser = nid;

END$$

-- 

DROP PROCEDURE IF exists `encryptSerRowId` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `encryptSerRowId`(in nid varchar(100))
BEGIN

select s.idservice
FROM service s
where sha1(s.idservice)  = nid; -- "c1dfd96eea8cc2b62785275bca38ac261256e278"

END$$


-- 

DROP PROCEDURE IF exists `getCustTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getCustTableRow`(in nid int, in rid int)
BEGIN



SELECT * 
FROM datadesigner.customer
WHERE idcustomer = rid AND iduser = nid;

END$$

-- 

DROP PROCEDURE IF exists `getUserAdminId` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserAdminId`(in nid varchar(100))
BEGIN

SELECT iduser
FROM user_admin
WHERE email = nid;

END$$
--


DROP PROCEDURE IF exists `getEmpTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEmpTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.employee
WHERE idemployee = rid AND iduser = nid;

END$$

--

DROP PROCEDURE IF exists `getLocTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLocTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.location
WHERE idlocation = rid AND iduser = nid;

END$$

-- 

DROP PROCEDURE IF exists `getProdTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProdTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.product
WHERE idproduct = rid AND iduser = nid;

END$$


-- 

DROP PROCEDURE IF exists `getServTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getServTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.service
WHERE idservice = rid AND iduser = nid;

END$$

-- 

DROP PROCEDURE IF exists `getServSchedTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getServSchedTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.service_schedule
WHERE idservice_schedule = rid AND iduser = nid;

END$$


-- 

DROP PROCEDURE IF exists `insertIntoEmployee` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIntoEmployee`(
	in fn varchar(45),
	in ln varchar(45),
	in ph varchar(45),
	in addr varchar(45),
	in cty varchar(45),
	in st varchar(45),
	in zp varchar(45),
	in soc varchar(45),
	in idu int(11)
)
BEGIN
INSERT INTO `employee` (fName, lName, phone, address, city, state, zip, 
	socialSecurity, iduser) 
VALUES (fn, ln, ph, addr, cty, st, zp, soc, idu);
END$$

--

DROP PROCEDURE IF exists `getProdSalesTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProdSalesTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.sale_product
WHERE idsale_product = rid AND iduser = nid;

END$$

--


DROP PROCEDURE IF exists `getEditInvTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEditInvTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.inventory i, user_admin u
WHERE i.idinventory = rid; -- AND i.iduser = nid;

END$$

--

DROP PROCEDURE IF exists `getServSchedTableRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getServSchedTableRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.service_schedule
WHERE idservice_schedule = rid AND iduser = nid;

END$$

--

DROP PROCEDURE IF exists `getServSalesSaleRow` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getServSalesSaleRow`(in nid int, in rid int)
BEGIN

SELECT * 
FROM datadesigner.sale_service
WHERE idsale_service = rid AND iduser = nid;

END$$

--

DROP PROCEDURE IF exists `updateInventoryTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateInventoryTable`(in idprod int, in idloc int, in count int, 
	in id int)
BEGIN

UPDATE inventory
SET idproduct=idprod, count=count, idlocation=idloc
WHERE idinventory = id
;

END$$

--

DROP PROCEDURE IF exists `updateProdSalesTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProdSalesTable`(in idprod int, in idloc int, in amount int, 
	in idcust int, in dte varchar(30), in id int)
BEGIN

UPDATE sale_product
SET idproduct=idprod, amount=amount, idlocation=idloc, idcustomer=idcust, date=dte
WHERE idsale_product = id
;

END$$

--

DROP PROCEDURE IF exists `updateServTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateServTable`(in price varchar(45), 
	in descr varchar(45), in `name` varchar(45), in id int)
BEGIN

UPDATE service
SET `price-hour`=price, `desc`=descr, serviceName=`name`
WHERE idservice = id
;

END$$

--

--

DROP PROCEDURE IF exists `updateServSalesTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateServSalesTable`(in dte varchar(30), in idloc int, in idserv int, 
	in idcust int, in hours varchar(45), in id int)
BEGIN

UPDATE sale_service
SET idservice=idserv, hours=hours, idlocation=idloc, idcustomer=idcust, date=dte
WHERE idsale_service = id
;

END$$

--

DROP PROCEDURE IF exists `updateServSchedTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateServSchedTable`(in dte varchar(30), in tme varchar(30), in idserv int, 
	in idcust int, in id int)
BEGIN

UPDATE service_schedule
SET idservice=idserv, time=tme, idcustomer=idcust, date=dte
WHERE idservice_schedule = id
;

END$$

-- 

DROP PROCEDURE IF exists `updateProdTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateProdTable`(in price varchar(45), 
	in descr varchar(45), in prodcode varchar(45), in `name` varchar(45), in id int)
BEGIN

UPDATE product
SET `price`=price, `desc`=descr, name=`name`, ProdCode = prodcode
WHERE idproduct = id
;

END$$

--

-- 

DROP PROCEDURE IF exists `updateLocTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateLocTable`(in nme varchar(45), 
	in addr varchar(45), in st varchar(45), in zp varchar(45), in phne varchar(45), 
	in cty varchar(45), in id int)
BEGIN

UPDATE location
SET name=nme, address=addr, state=st, zip = zp, phone=phne, city = cty
WHERE idlocation = id
;

END$$

 -- 
DROP PROCEDURE IF exists `updateEmpTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEmpTable`(in fnme varchar(45), in lnme varchar(45), 
	in addr varchar(45), in st varchar(45), in zp varchar(45), in ss varchar(45), in phne varchar(45), 
	in cty varchar(45), in id int)
BEGIN

UPDATE employee
SET fName=fnme, lName=lnme, address=addr, state=st, zip = zp, socialSecurity=ss, phone=phne, city = cty
WHERE idemployee = id
;

END$$

--

DROP PROCEDURE IF exists `updateCustTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCustTable`(in fnme varchar(45), in lnme varchar(45), 
	in addr varchar(45), in st varchar(45), in zp varchar(45), in phne varchar(45), 
	in cty varchar(45), in eml varchar(45), in id int)
BEGIN

UPDATE customer
SET fName=fnme, lName=lnme, address=addr, state=st, zip = zp, phone=phne, city = cty, email=eml
WHERE idcustomer = id
;

END$$

--

-- INSERT INTO people (name, date, height, age) VALUES ( "Jim", "2006-02-02 15:35:00", 1.27, 45 ) 

DROP PROCEDURE IF exists `addInvTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addInvTable`(in idprod int, in idloc int, in count int)
BEGIN

INSERT INTO inventory
(idproduct, idlocation, count)
VALUES
(idprod, idloc, count)
;

END$$
-- 

DROP PROCEDURE IF exists `addProdTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addProdTable`(in nme varchar(45), 
	in descr varchar(45), in iduser int, in price varchar(45),  in prodcode varchar(45))
BEGIN

INSERT INTO product
(`name`, `desc`, `price`, `iduser`, `ProdCode`)
VALUES
(nme, descr, price, iduser, prodcode)
;

END$$
-- 

-- 

DROP PROCEDURE IF exists `addCustTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addCustTable`(in fnme varchar(45), in lnme varchar(45),
	in iduser int, in addy varchar(45), in city varchar(45), in state varchar(45), in zip varchar(45),
	in email varchar(45), in phone varchar(45))
BEGIN

INSERT INTO customer
(`fName`, `lname`,`iduser`, `address`, `city`,`state`, `zip`,`email`, `phone`)
VALUES
(fnme, lnme, iduser, addy, city, state, zip, email, phone)
;

END$$
-- 

-- 

DROP PROCEDURE IF exists `addProdSalesTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addProdSalesTable`(in idloc int, in idprod int,
	in idcust int, in amount int, in dte varchar(30), in id int)
BEGIN

INSERT INTO sale_product
(`idlocation`, `idproduct`,`idcustomer`, `amount`, `date`, `iduser`)
VALUES
(idloc, idprod, idcust, amount, dte, id)
;

END$$
-- 
DROP PROCEDURE IF exists `addEmpTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addEmpTable`(in fnme varchar(45), in lnme varchar(45),
	in iduser int, in addy varchar(45), in city varchar(45), in state varchar(45), in zip varchar(45),
	in ss varchar(45), in phone varchar(45))
BEGIN

INSERT INTO employee
(`fName`, `lname`,`iduser`, `address`, `city`,`state`, `zip`,`socialSecurity`, `phone`)
VALUES
(fnme, lnme, iduser, addy, city, state, zip, ss, phone)
;

END$$
-- 
DROP PROCEDURE IF exists `addLocTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addLocTable`(in nme varchar(45),
	in iduser int, in addy varchar(45), in city varchar(45), in state varchar(45), in zip varchar(45),
    in phone varchar(45))
BEGIN

INSERT INTO location
(`name`,`iduser`, `address`, `city`,`state`, `zip`, `phone`)
VALUES
(nme, iduser, addy, city, state, zip, phone)
;

END$$
-- 

DROP PROCEDURE IF exists `addServTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addServTable`(in snme varchar(45), 
	in descr varchar(45), in iduser int, in pricehr varchar(45))
BEGIN

INSERT INTO service
(`serviceName`, `desc`, `price-hour`, `iduser`)
VALUES
(snme, descr, pricehr, iduser)
;

END$$
-- 

DROP PROCEDURE IF exists `addServSchedTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addServSchedTable`(in iduser int, 
	in idser int, in idcus int, in tme varchar(45), in dte varchar(45))
BEGIN

INSERT INTO service_schedule
(`iduser`, `idservice`, `idcustomer`, `time`, `date`)
VALUES
(iduser, idser, idcus, tme, dte)
;

END$$

-- 

DROP PROCEDURE IF exists `addServSalesTable` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addServSalesTable`(in idloc int, in idserv int,
	in idcust int, in hours varchar(45), in dte varchar(45), in id int)
BEGIN

INSERT INTO sale_service
(`idlocation`, `idservice`, `idcustomer`, `hours`, `date`, `iduser`)
VALUES
(idloc, idserv, idcust, hours, dte, id)
;

END$$