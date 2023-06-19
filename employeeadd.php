<?php include('topbar.php'); ?>
<?php 
  
  $CountryId = 0;
  $StateId = 0;
  $CityId = 0;

  include_once('controller/db_conn.php');
  $dbs = new database();
  $db=$dbs->connection();

//$cityn = mysqli_query($db,"select * from city ORDER BY Name");
  //$staten = mysqli_query($db,"select * from state  ORDER BY Name");
  $countryn = mysqli_query($db,"select * from country  ORDER BY Name");
  $gendern = mysqli_query($db,"select * from gender  ORDER BY Name");
  $departmentn = mysqli_query($db, "select * from department ORDER BY Name");
  $rolen = mysqli_query($db,"select * from role  ORDER BY Name");
  $statusn = mysqli_query($db,"select * from status  ORDER BY Name");
  $maritaln = mysqli_query($db,"select * from maritalstatus  ORDER BY Name");
  $positionn = mysqli_query($db,"select * from position  ORDER BY Name");

$result = "";
$id = "";
if (isset($_GET['msg'])) 
{
  $result = $_GET['msg'];
} 
else if (isset($_GET['id'])) 
{
  $id = $_GET['id'];
} 
else if (isset($_GET['empid'])) 
{
  $empid = $_GET['empid'];
    $editempid = mysqli_query($db,"SELECT e.*,ss.StateId,cc.CountryId FROM employee e join city c on e.CityId=c.CityId join state ss on c.StateId=ss.StateId join country cc on cc.CountryId=ss.CountryId where EmpId='$empid'");
    $editemp = mysqli_fetch_assoc($editempid);
    $CountryId = $editemp["CountryId"];
    $StateId = $editemp['StateId'];
    $CityId = $editemp['CityId'];
}  
?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="home.php">Home</a><i class="fa fa-angle-right"></i>Employee<i class="fa fa-angle-right"></i> Employee Add</li>
</ol>
<!--grid-->
 	<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form">
 	<!---->
   <form method="POST" action="controller/employee.php?empedit=<?php echo isset($_GET['empid']) ? $_GET['empid'] : ''; ?>" enctype="multipart/form-data">
        <?php 
          if($result)
          {
            echo '<h4 style="color: #FF0000;">'.$result.'</h4>';
          }
          else
          {
            echo '<h4 style="color: #008000;">'.$id.'</h4>'; 
          }
        ?>
        <div class="vali-form-group">
          <div class="col-md-4 control-label">
              <label class="control-label">Employee ID*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="empid" title="Employee ID" value="<?php echo(isset($editemp["EmployeeId"]))?$editemp["EmployeeId"]:""; ?>" class="form-control" placeholder="Employee ID" required="">
              </div>
            </div>


            <div class="col-md-4 control-label">
            <label class="control-label">Profile Image*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
              </span>
              <input type="file" name="pfimg" title="Profile Image" class="form-control" name="fileupload"  >
              </div>
            </div>
            

            <div class="col-md-4 control-label">
              <label class="control-label">Gender*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-male" aria-hidden="true"></i>
              </span>
              <select name="gender" title="Gender" required="" style="padding: 5px 5px; text-transform: capitalize;"">
                <option value="">-- Select Gender --</option>
                <?php while($rw = mysqli_fetch_assoc($gendern)){ ?> 
                <option value="<?php echo $rw["GenderId"]; ?>" <?php if(isset($editemp["Gender"]) && $editemp["Gender"]==$rw["GenderId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
            </div>
            <div class="clearfix"> </div>

         	<div class="vali-form-group">
           <div class="col-md-4 control-label">
              <label class="control-label">Surname*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="sname" title="Surname" value="<?php echo(isset($editemp["Surname"]))?$editemp["Surname"]:""; ?>" class="form-control" placeholder="First Name" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Other names*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="oname" title="Othernames" value="<?php echo(isset($editemp["Othernames"]))?$editemp["Othernames"]:""; ?>" class="form-control" placeholder="Othernames" required="">
              </div>
            </div>


            <div class="col-md-4 control-label">
              <label class="control-label">Birth Date*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="Birthdate" title="Birth Date" name="bdate" placeholder="Birth Date" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo(isset($editemp["Birthdate"]))?$editemp["Birthdate"]:""; ?>"  class="form-control" required="">
              </div>
            </div>
              <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
              <div class="col-md-4 control-label">
              <label class="control-label">ID/ Passport NO*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="idno" title="ID/ Passport NO" value="<?php echo(isset($editemp["ID/ Passport NO"]))?$editemp["ID/ Passport NO"]:""; ?>" class="form-control" placeholder="ID/ Passport NO" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Phone No*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="pnumber" title="Phone No" value="<?php echo(isset($editemp["Phone No"]))?$editemp["Phone No"]:""; ?>" class="form-control" placeholder="Phone No" min="10" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Marital Status*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <select name="marital" title="Marital" required="" style="text-transform: capitalize;">
                <option value="">-- Select Marital --</option>
                <?php while($rw = mysqli_fetch_assoc($maritaln)){ ?> 
                  <option value="<?php echo $rw["MaritalId"]; ?>" <?php if(isset($editemp["MaritalStatus"]) && $editemp["MaritalStatus"]==$rw["MaritalId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
          </div>
            <div class="clearfix"> </div>


            <div class="col-md-4 control-label">
              <label class="control-label">NHIF*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-hospital-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="nhif" title="NHIF" value="<?php echo(isset($editemp["nhif"]))?$editemp["nhif"]:""; ?>" class="form-control" placeholder="NHIF" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">NSSF*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-hospital-o" aria-hidden="true"></i>
              </span>
              <input type="text" name="nssf" title="NSSF" value="<?php echo(isset($editemp["nssf"]))?$editemp["nssf"]:""; ?>" class="form-control" placeholder="NSSF" required="">
              </div>
            </div>
            
            
            <div class="col-md-4 control-label">
            <label class="control-label">Department ID*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-building" aria-hidden="true"></i>
              </span>
              <select name="dptid" title="Department ID" required="" style="padding: 5px 5px; text-transform: capitalize;"">
                <option value="">-- Select Department --</option>
                <?php while($rw = mysqli_fetch_assoc($departmentn)){ ?> 
                <option value="<?php echo $rw["departmentid"]; ?>" <?php if(isset($editemp["department"]) && $editemp["department"]==$rw["department"]){ echo "Selected"; }?>> <?php echo $rw["name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
              <div class="clearfix"> </div>

            <div class="col-md-6 control-label">
              <label class="control-label">Account Name</label>
              <div class="input-group"> 
              <span class="input-group-addon">
              <i class="fa fa-university" aria-hidden="true"></i>
              </span>            
              <input type="text" name="acname" title="A/CName" value="<?php echo(isset($editemp["a/cname"]))?$editemp["a/cname"]:""; ?>" class="form-control" placeholder="Acount Name">
              </div>
            </div>
            

            <div class="col-md-6 control-label">
              <label class="control-label">Account No</label>
              <div class="input-group"> 
              <span class="input-group-addon">
              <i class="fa fa-university" aria-hidden="true"></i>
              </span>            
              <input type="text" name="acno" title="A/CNo" value="<?php echo(isset($editemp["a/cno"]))?$editemp["a/cno"]:""; ?>" class="form-control" placeholder="Acount No">
              </div>
            </div>
            <div class="clearfix"> </div>
            
            
            <div class="col-md-6 control-label">
            <label class="control-label">PFNo*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
                  <i class="fa fa-dollar" aria-hidden="true"></i>
              </span>
              <input type="text" name="pfno" title="PFNO" value="<?php echo(isset($editemp["pfno"]))?$editemp["pfno"]:""; ?>" class="form-control" placeholder="PFNO" required="">
              </div>
            </div>


            <div class="col-md-6 control-label">
              <label class="control-label">Certificate of Good Conduct*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-certificate" aria-hidden="true"></i>
              </span>
              <input type="text" name="cog" title="Certificate of Good Conduct" value="<?php echo(isset($editemp["cog"]))?$editemp["cog"]:""; ?>" class="form-control" placeholder="Certificate of Good Conduct Ref No." required="">
              </div>
            </div>
            <div class="clearfix"> </div>
            

            <div class="col-md-12 control-label">
            <label class="control-label">Next of Kin Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="kname" title="Kin Name" value="<?php echo(isset($editemp["kname"]))?$editemp["kname"]:""; ?>" class="form-control" placeholder="Next of Kin Name" required="">
              </div>
            </div>
            <div class="clearfix"> </div>


            <div class="col-md-12 control-label">
            <label class="control-label">Next of Kin No*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="kno" title="Kin No" value="<?php echo(isset($editemp["kno"]))?$editemp["kno"]:""; ?>" class="form-control" placeholder="Next of Kin No" min="10" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
              </div>
            </div>
            <div class="clearfix"> </div>


            <div class="col-md-12 control-label">
            <label class="control-label">Next of Kin Relationship*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-users" aria-hidden="true"></i>
              </span>
              <input type="text" name="krltp" title="Kin Relationship" value="<?php echo(isset($editemp["krltp"]))?$editemp["krltp"]:""; ?>" class="form-control" placeholder="Next of Kin Relationship" required="">
              </div>
            </div>
            <div class="clearfix"> </div>


            <div class="col-md-12 control-label">
              <label class="control-label">Address*</label>
              <div class="input-group">   
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>          
              <input type="text" name="address" title="Address" value="<?php echo(isset($editemp["Address"]))?$editemp["Address"]:""; ?>" class="form-control" placeholder="Address Line " required="">
              </div>
            </div>
            <div class="clearfix"> </div>


            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Country*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-globe" aria-hidden="true"></i>
              </span>
              <select name="country" id="contryid" title="Country" required="" onchange="contrychange()" style="text-transform: capitalize;">
                <option value="">-- Select Country --</option>
                <?php while($rw = mysqli_fetch_assoc($countryn)){ ?> 
                  <option value="<?php echo $rw["CountryId"]; ?>" <?php if(isset($editemp["CountryId"]) && $editemp["CountryId"]==$rw["CountryId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">County*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="state" id="stateid" title="State" onchange="statechange()" required="" style="text-transform: capitalize;">
                <option value="">-- Select County --</option>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">City*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-building" aria-hidden="true"></i>
              </span>
              <select name="city" id="cityid" title="City" required="" style="text-transform: capitalize;">
                <option value="">-- Select City --</option> 
              </select>
              </div>
            </div>
              <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Join Date*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="JoinDate" title="Join Date" name="joindate" placeholder="Join Date" value="<?php echo(isset($editemp["JoinDate"]))?$editemp["JoinDate"]:""; ?>" class="form-control" required="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Leave Date</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="LeaveDate" title="Leave Date" name="leavedate" placeholder="Leave Date" value="<?php echo(isset($editemp["LeaveDate"]))?$editemp["LeaveDate"]:""; ?>" class="form-control" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Status</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-toggle-on" aria-hidden="true"></i>
              </span>
              <select name="status" title="Status" required="" style="text-transform: capitalize;">
                <option value="">-- Select Status --</option>
                <?php while($rw = mysqli_fetch_assoc($statusn)){ ?> 
                  <option value="<?php echo $rw["StatusId"]; ?>" <?php if(isset($editemp["StatusId"]) && $editemp["StatusId"]==$rw["StatusId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Role*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <select name="role" required="" title="Role" style="text-transform: capitalize;"  >
                <option value="">-- Select Role --</option>
                <?php while($rw = mysqli_fetch_assoc($rolen)){ ?> 
                  <option value="<?php echo $rw["RoleId"]; ?>" <?php if(isset($editemp["RoleId"]) && $editemp["RoleId"]==$rw["RoleId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Position*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-language" aria-hidden="true"></i>
              </span>
              <select name="position" title="Position" style="text-transform: capitalize;" required="">
                <option value="">-- Select Position --</option>
                <?php while($rw = mysqli_fetch_assoc($positionn)){ ?> 
                  <option value="<?php echo $rw["PositinId"]; ?>" <?php if(isset($editemp["PositionId"]) && $editemp["PositionId"]==$rw["PositinId"]){ echo "Selected"; }?>> <?php echo $rw["Name"]; ?> </option>
                <?php } ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Email*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
              <input type="email" name="email" title="Email" value="<?php echo(isset($editemp["Email"]))?$editemp["Email"]:""; ?>" class="form-control" placeholder="Email Address" required="">
              </div>
            </div>
            
            <div class="col-md-3 control-label">
              <label class="control-label">Password*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" id="Psw" title="Password" value="<?php echo(isset($editemp["Password"]))?$editemp["Password"]:""; ?>" name="password" placeholder="Password " class="form-control" required="">
              <span class="input-group-addon">
              <a><i class='fa fa-eye' aria-hidden='false' onclick="passwordeyes()"></i></a>
              </span>
              </div>              
            </div>
          
              <div class="clearfix"> </div>
          </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <input type="text" name="imagefilename" hidden="" value="<?php echo(isset($editemp['ImageName']))?$editemp['ImageName']:''; ?>">
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
</div>
<script>
function passwordeyes() {
    var x = document.getElementById("Psw").type;
    if(x=="password")
      document.getElementById("Psw").type="text";
    else
      document.getElementById("Psw").type="password";
}

</script>
<script>
var OneStepBack;
function nmac(val,e){
  if(e.keyCode!=8)
  {
    if(val.length==2)
      document.getElementById("mac").value = val+"-";
    if(val.length==5)
      document.getElementById("mac").value = val+"-";
    if(val.length==8)
      document.getElementById("mac").value = val+"-";
      if(val.length==11)
      document.getElementById("mac").value = val+"-";
      if(val.length==14)
      {
        document.getElementById("mac").value = val+"-";   
      }
  }
}

function nmac1(val,e){
if(e.keyCode==32){
return false;
}

  if(e.keyCode!=8){

    if(val.length==2)
      document.getElementById("mac").value = val+"-";
    if(val.length==5)
      document.getElementById("mac").value = val+"-";
    if(val.length==8)
      document.getElementById("mac").value = val+"-";
      if(val.length==11)
      document.getElementById("mac").value = val+"-";
      if(val.length==14){
      document.getElementById("mac").value = val+"-";   
    }

    if(val.length==17){
        return false;
    }
  } 
}
</script>
<script>
  contrychange();
  function contrychange()
  {
    var selectedstateid = "<?php echo $StateId; ?>";
    var selectedstateid = parseInt(selectedstateid);

    var selectedcountry = $('#contryid').val();
    $.get("controller/getstatecity.php?Type=s&ci="+selectedcountry+"&ss="+selectedstateid,function(data,status){
        $("#stateid").html(data);
    });
    statechange(selectedstateid);
  }
  function statechange(si)
  {

    var selectedstate = $('#stateid').val();
    if(si!=undefined)
      selectedstate=si;

    var selectedcityid = "<?php echo $CityId; ?>";
    selectedcityid = parseInt(selectedcityid);
    
    $.get("controller/getstatecity.php?Type=c&si="+selectedstate+"&sc="+selectedcityid,function(data,status){
      $("#cityid").html(data);
    });
  }
</script>
<script>
  
  var birthdate = $('#Birthdate').val();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yy = today.getFullYear();
    var tdate = yy+"/"+mm+"/"+dd;

$('#Birthdate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  maxDate: tdate // and tommorow is maximum date calendar
});

$('#JoinDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  //maxDate: tdate // and tommorow is maximum date calendar
});

$('#LeaveDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  //maxDate: tdate // and tommorow is maximum date calendar
});

</script>
<?php include('navbar.php'); ?>