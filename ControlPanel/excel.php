<html>
<head>

</head>
<body alink="#00FF66" link="#00CC00">

<?php



/*Function for displaying all the Aluminis Data in XLS Format*/

function listOfAluminis()
	{
    include("conn.php");
    include("excelwriter.class.php");
	unlink('alumini/aluminis.xls');
	$excel=new ExcelWriter("alumini/aluminis.xls");
	if($excel==false)	
	echo $excel->error;
	
	$myArr=array("Name","Department","Year Of Passing","Currently Working In","Mobile No","Email Id");
	$excel->writeLine($myArr);
	
	$qry=mysqli_query($conn,"SELECT c.alumininame,c.aluminideptname, c.aluminiyearofpassing, c.aluminicurrentlyworkingin, c.aluminimobileno, c.aluminiemailId
							  FROM tbl_alumini AS c") or die("Query Not Executed");
		if($qry!=false)
		{
			$i=1;
			while($res=mysqli_fetch_array($qry))
			{
				$myArr=array($res['alumininame'],$res['aluminideptname'],$res['aluminiyearofpassing'],$res['aluminicurrentlyworkingin'],$res['aluminimobileno'],$res['aluminiemailId']);
		        $excel->writeLine($myArr);
				$i++;
			}
		}
	}
/*Function for displaying all the Faculties Data in XLS Format*/

function listOfFaculties()
	{
    include("conn.php");
    include("excelwriter.class.php");  
	unlink('alumini/faculties.xls');
	$excel=new ExcelWriter("alumini/faculties.xls");
	if($excel==false)	
	echo $excel->error;
	
	$myArr=array("Type","Name","Designation","Qualification","Years Of Experience");
	$excel->writeLine($myArr);
	
	$qry=mysqli_query($conn,"SELECT c.type,c.name, c.designation, c.qualification, c.experience
							  FROM tbl_faculty AS c order by id asc") or die("Query Not Executed");
		if($qry!=false)
		{
			$i=1;
			while($res=mysqli_fetch_array($qry))
			{
				$myArr=array($res['type'],$res['name'],$res['designation'],$res['qualification'],$res['experience']);
		        $excel->writeLine($myArr);
				$i++;
			}
		}
	}
?>
</body>
</html>