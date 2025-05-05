<?php  

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Register</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><?php echo $_SESSION['role']; ?></li>
          <li class="breadcrumb-item active">Register Courses</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->

        <form action="register-course.php" method="POST">
        <div class="col-lg-12">
          <div class="row">

             <!-- course Card -->
          <div class=" col-sm-12 col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                  <div class="card-body">
                    <h5 class="card-title">Course</h5>
                    <input type="text" name="course" class="form-control">
                  </div>

                </div>
              </div><!-- End course Card -->

              <!-- Course Description Card -->
              <div class="col-sm-12 col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">


                  <div class="card-body">
                    <h5 class="card-title">Course Description</h5>

                    <input type="text" name="describtion" class="form-control">
                  </div>

                </div>
              </div>
              <!-- End Course Description Card -->

              <!-- Lecturer Card -->
              <div class="col-sm-12 col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">


                  <div class="card-body">
                    <h5 class="card-title">Lecturer</h5>

                    <input type="text" name="lecturer" class="form-control">
                  </div>

                </div>
              </div>
              <!-- End Lecturer Card -->
              
          </div>

         <div class="btn-cont d-flex">
         <button type="submit" name="registerCourse" class="btn btn-primary mx-auto col-lg-3 col-sm-4">Register</button>
         </div>
        </div>
        

        </form>
        
        <!-- End Left side columns -->




       

    

      </div>
    </section>

  </main>