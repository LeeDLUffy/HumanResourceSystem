<?php
include "../CONN//db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $campus_code= $_POST['ccode'];
  $department_code = $_POST['deptcode'];
  $owner_assigned = $_POST['ownerassigned'];
  $department_name = $_POST['deptname'];

  $sql = "UPDATE `depts` SET `ccode`='$campus_code',`deptcode`='$department_code',`ownerassigned`='$owner_assigned',`deptname`='$department_name' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">

    <!-- generic header link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- google icons such the search icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- the message and alarm box link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- drop down functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <!-- drop down menu -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom css -->
    <link rel="stylesheet" href="../AUTH/css/custom.css">

    <title>Departments </title>
</head>

<body>
    <section id="header">
        <div class="img-holder"><a href="#"><img src="../AUTH/img/download.JPEG" alt="" class="logo"></a></div>

        <div class="search-container">
            <div class="">
                <input type="search" id="form1" class="form-control" />
            </div>
            <button type="button" class=" search-btn">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="nav-holder-container">
            <ul class="nav-holder">
                <li> <a href="index.html">Extension</a></li>
                <li> <a href="shop.html">Department</a></li>
                <li> <a href="blog.html">Campus</a></li>
                <li> <a href="about.html">Administrators </a></li>
                <li> <a href="contact.html">Contact </a></li>
            </ul>
            <div id="admin-container" class="">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"> Admn <b
                        class="caret"></b></a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
                    <!-- <a href="#" class="dropdown-item"><i class="fa fa-calendar-o"></i> Calendar</a></a> -->
                    <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
                    <div class="dropdown-divider"></div>
                    <a href="../AUTH/login.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i>
                        Logout</a></a>
                </div>
            </div>
        </div>
    </section>
    >

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
          $sql = "SELECT * FROM `depts` WHERE id = $id LIMIT 1";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Campus Code:</label>
                        <input type="text" class="form-control" name="ccode" value="<?php echo $row['ccode'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Department Code:</label>
                        <input type="number" class="form-control" name="deptcode"
                            value="<?php echo $row['deptcode'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Owner Assigned:</label>
                    <input type="text" class="form-control" name="ownerassigned"
                        value="<?php echo $row['ownerassigned'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Department Name:</label>
                    <input type="text" class="form-control" name="deptname" value="<?php echo $row['deptname'] ?>">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>