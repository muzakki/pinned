<?php
/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the forum can
work correctly.
******************************************************/

//We log to the DataBase
mysql_connect('localhost', 'root', '');
mysql_select_db('pinned');

//Username of the Administrator
//$admin='ayecartoon';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Forum Home Page
//$url_home = 'index.php';

//Design Name
//$design = 'default';


/******************************************************
----------------------Initialization-------------------
******************************************************/
include('init.php');
?>
