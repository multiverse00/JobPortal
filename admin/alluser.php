<?php
require_once("../db.php");
$search = isset($_GET['search']) ? ($_GET['search']) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>All Users</title>
</head>

<body>
<header class="main-header" style="background-color: #EBEAFF;">


<nav class="navbar navbar-expand-lg navbar-light" style="margin-left: 40px;">
    <a class="navbar-brand" href="#">Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-right: 40px;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
           
            
        </ul>
    </div>
</nav>

</header>
    <section style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Welcome <b>Admin</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav flex-column">
                                <li><a class="btn" href="catagory.html">Dashboard</a></li>
                                <li><a class="btn" href="allcategory.php">Catagory</a></li>
                                <li><a class="btn" href="alljobs.php">Active Jobs</a></li>
                                <li><a class="btn" href="alluser.php"> Users</a>
                                </li>
                                <li class="active"><a class="btn" href="allcompany.php">Companies</a>
                                </li>
                                <li class="active"><a class="btn" href="allfeedback.php">Feedback</a></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 ">

                    <h3>Users</h3>
                    <div class="row margin-top-20">
                    <div class="d-flex mb-4">
                            <form  action="" method="GET" class="w-50 d-flex ms-auto">
                                <input type="text" name="search" class="form-control me-2" placeholder="Name" value="<?php echo ($search); ?>">
                                <button type="submit" class="btn btn-success">Search</button>
                            </form>
                        </div>
                        <div>
                            <div class="box-body table-responsive no-padding">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                       <th>Id</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Skills</th>
                                        <th>Experience</th>
                                        <th>Address</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM job_seeker";
                                        if (!empty($search)) {
                                            $sql .= " WHERE first_name LIKE '%$search%'";
                                        }
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                         <td><?php echo $row['job_seeker_id']; ?></td> 
                                          <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                          <td><?php echo $row['email']; ?></td>
                                          <td><?php echo $row['phoneNumber']; ?></td>
                                          <td><?php echo $row['skills']; ?></td>
                                          <td><?php echo $row['experience']; ?></td>
                                          <td><?php echo $row['address']; ?></td>
                                         <td><a class = "btn btn-danger" href="deleteUser.php?id=<?php echo $row['job_seeker_id']; ?>" onclick="return confirm('Are you sure you want to delete this user');">Delete</a></td>
                                         </tr>  
                                          <?php
                                          }
                                        }
                                          ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<script src="../bootstrap.bundle.min.js"></script>
</body>

</html>