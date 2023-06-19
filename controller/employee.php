<?php
	include_once('db_conn.php');
	$dbs = new database();
	$db=$dbs->connection();
	session_start();
	if(isset($_POST['submit']))
	{
		$data=$_POST;
		$editid = 0;
		if(isset($_GET['empedit']) && $_GET['empedit'] > 0){ 
			$editid = $_GET['empedit'];
		};
		$empid=$data['empid'];
		$img=$_FILES['pfimg']['name'];
		$gender=$data['gender'];
		$sname=$data['sname'];
		$oname=$data['oname'];
		$bdate=$data['bdate'];
		$idno = $data['idno'];
		$pnumber=$data['pnumber'];
		$marital=$data['marital'];
		$nhif = $data['nhif'];
        $nssf = $data['nssf'];
		$dptid = $data['dptid'];
		$acname = $data['acname'];
    	$acno = $data['acno'];
		$pfno = $data['pfno'];
		$cog = $data['cog'];
		$kname = $data['kname'];
    	$kno = $data['kno'];
    	$krltp = $data['krltp'];
		$address = $data['address'];
		$city=$data['city'];
		$joindate=$data['joindate'];
		$leavedate=$data['leavedate'];
		$status=$data['status'];
		$role=$data['role'];
		$email=$data['email'];
		$password=$data['password'];
		$position=$data['position'];
		$imagefilename = $data['imagefilename'];
		$ImageComplete=false;

		if($editid==0){
			$sql = mysqli_query($db,"select * from employee where Email='$email'");
		}
		else{
			$sql = mysqli_query($db,"select * from employee where Email='$email' and empid!=$editid");
		}
		
		if(mysqli_num_rows($sql) > 0)
		{
			header("location:../employeeadd.php?msg=Email address all ready existed!");exit;
		}
		else
		{
			if(!empty($_FILES['pfimg']['name']))
			{
				$name=$_FILES['pfimg']['name'];
				$temp=$_FILES['pfimg']['tmp_name'];
				$size=$_FILES['pfimg']['size'];
				$type=$_FILES['pfimg']['type'];
						
				if($type != "image/jpg" && $type != "image/png" && $type != "image/jpeg" && $type != "image/gif")
				{
					header("location:../employeeadd.php?msg=Invalid image !");exit;
				}
				else
				{
					if($size > 1000000)
					{
						header("location:../employeeadd.php?msg=File size upto 1MB required ! ");exit;
					}
					else
					{	
						$ImageComplete=true;
					}				
				}
			}
			else
			{
				$in = $_POST["imagefilename"];
				
				if(file_exists("../image/".$in))
				{
					$ImageComplete=true;
				}
				else
				{
					header("location:../employeeadd.php?msg=Pleaes Select Profile Image! ");exit;	
				}
			}	
		}

		if($ImageComplete)
		{
			$roleid = $_SESSION['User']['RoleId'];
			date_default_timezone_set("Asia/Kolkata");
			$datetime = date("Y-m-d h:i:s");

			if($editid==0)
			{
				if(!empty($_FILES['pfimg']['name']))
				{
					$name = rand(222,333333).$name;
					move_uploaded_file($temp,"../image/".$name);
				}
				else
				{
					$name = $_POST["imagefilename"];
				}
				mysqli_query($db,"insert into employee values(null,'$empid','$sname','$oname', '$idno', '$bdate','$gender','$nhif','$nssf','$pfno', '$acname', '$acno', '$cog', '$kname', '$krltp', '$kno', '$address','$city','$pnumber', '$dptid', '$email','$password', '$marital','$position','$roleid','$datetime',null,null,'$joindate','$leavedate',null,null,'$status','$role','$name')");

				header("location:../detailview.php?id=Successfull... ");exit;
			}
			else
			{
				if(!empty($_FILES['pfimg']['name']))
				{
					$name = rand(222,333333).$name;
					move_uploaded_file($temp,"../image/".$name);
				}
				else
				{
					$name = $_POST["imagefilename"];
				}
				mysqli_query($db,"update employee set EmployeeId='$empid',Surname='$sname',Othernames='$oname',`ID/ Passport NO`='$idno',Birthdate='$bdate',Gender='$gender',nhif='$nhif',nssf='$nssf',pfno='$pfno',`a/cname`='$acname',`a/cno`='$acno',cog='$cog',kname='$kname',krltp='$krltp',kno='$kno',Address='$address',CityId='$city',`Phone No`='$pnumber',Dptid='$dptid',Email='$email',Password='$password',MaritalStatus='$marital',PositionId='$position',ModifiedBy='$roleid',ModifiedDate='$datetime',JoinDate='$joindate',LeaveDate='$leavedate',StatusId='$status',RoleId='$role',ImageName='$name' where EmpId='$editid' ");

				header("location:../detailview.php?employeeid=$editid");exit;
			}
			/*"(EmpId,EmployeeId,FirstName,MiddleName,LastName,Birthdate,Gender,Address1,Address2,Address3,CityId,Mobile,Email,Password,AadharNumber,MaritalStatus,PositionId,CreatedBy,CreatedDate,ModifiedBy,ModifiedDate,JoinDate,LeaveDate,LastLogin,LastLogout,StatusId,RoleId,ImageName,MacAddress)";*/
		}
	}
?>