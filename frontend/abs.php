<?php
 include "include/header.php"; 
//id INTEGER NOT NULL AUTO_INCREMENT,
mysql_query("CREATE TEMPORARY TABLE imp( id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY, `sid` int,`nofadult` int,`nofchild` int, name varchar(20))");
  mysql_query("insert into imp (`sid`,`nofadult`,`nofchild`,name) values(14,2,3,'erew')");
  mysql_query("insert into imp (`sid`,`nofadult`,`nofchild`,name) values(15,4,5, 'qqravaj')");
  
  /*mysql_query("CREATE TEMPORARY TABLE imp(`id` int NOT NULL AUTO_INCREMENT, `sid` int,`nofadult` int,`nofchild` int,`stype` int,`droom` int,`troom` int,`d_price` varchar(20),`t_price` varchar(20),`c_date` varchar(50),`total_amt`)");
	
	mysql_query("insert into `imp` (`sid`,`nofadult`,`nofchild`,`stype`,`droom`,`troom`,`d_price`,`t_price`,`c_date`,`total_amt`) values('23','2','3','dsd','22','33','223','332','dfsdf','23234')");
  //mysql_query("insert into imp ('sid','nofadult','nofchild','stype','droom','troom','d_price','t_price,'c_date','total_amt') values('$id','','','$type','','','','','','$price')");
 */
  $sql=mysql_query("select * from imp");
  echo "no fo row=".mysql_num_rows($sql);

  
while($avc=mysql_fetch_array($sql))
{
	echo "</br>";
  echo "id=".$avc['id']." //sid=".$avc['sid']."//and Name=".$avc['name']."</br>";
}

?>