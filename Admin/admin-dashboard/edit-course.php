<?php  
session_start();
require '../../connection/db_connect.php';
require 'admin-header.php';
require 'admin-sidebar.php';

if(isset($_GET['id'])){
    $userId = $_GET['id'];

    $query = "SELECT course_name, describtion, lecturer FROM course WHERE id = '$userId'";
    $result = mysqli_query($conn,$query);
    $userdata = mysqli_fetch_assoc($result);




}
if(isset($_POST['updateCourse'])){

    $course_name =  mysqli_real_escape_string($conn, $_POST['course']);
    $describtion = mysqli_real_escape_string($conn, $_POST['describtion']);
    $lecturer = mysqli_real_escape_string($conn, $_POST['lecturer']);

    $query = "UPDATE course SET `course_name`='$course_name', `describtion`='$describtion', `lecturer`='$lecturer' WHERE `id` =$userId";
    // $query = "UPDATE course SET `course_name`=?, `describtion`=?, `lecturer`=? WHERE `id` = ?";
    // $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, 'sssi', $course_name, $describtion, $lecturer, $userId);
    // mysqli_execute($stmt);
        mysqli_query($conn, $query);
    
    

}


?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><?php echo $_SESSION['role']; ?></li>
          <li class="breadcrumb-item active">Edit Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->

        <form action="" method="POST">
        <div class="col-lg-12">
          <div class="row">

             <!-- course Card -->
          <div class=" col-sm-12 col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title">Course</h5>
                    <input type="text" name="course" value="<?= $userdata['course_name'] ?>" class="form-control">
                  </div>

                </div>
              </div><!-- End course Card -->

              <!-- Course Description Card -->
              <div class="col-sm-12 col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">


                  <div class="card-body">
                    <h5 class="card-title">Course Description</h5>

                    <input type="text" name="describtion" value="<?= $userdata['describtion'] ?>" class="form-control">
                  </div>

                </div>
              </div>
              <!-- End Course Description Card -->

              <!-- Lecturer Card -->
              <div class="col-sm-12 col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">


                  <div class="card-body">
                    <h5 class="card-title">Lecturer</h5>

                    <input type="text" name="lecturer" value="<?= $userdata['lecturer'] ?>" class="form-control">
                  </div>

                </div>
              </div>
              <!-- End Lecturer Card -->
              
          </div>

         <div class="btn-cont d-flex">
         <button type="submit" name="updateCourse" class="btn btn-primary mx-auto col-lg-3 col-sm-4">Update Course</button>
         </div>
        </div>
        

        </form>
        
        <!-- End Left side columns -->




       

    

      </div>
    </section>

  </main>

  <?php  
  require 'admin-footer.php';