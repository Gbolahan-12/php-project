<?php  
session_start();
require '../../connection/db_connect.php';
require 'admin-header.php';
require 'admin-sidebar.php';

$query = "SELECT id, course_name, describtion, lecturer FROM course";
$result = mysqli_query($conn,$query);


?>

<main id="main" class="main">

    <div class="pagetitle">
      <div class="head d-flex align-center justify-content-between">
        
      <h1>Dashboard</h1>
      <a href="admin.php" class="btn btn-primary float-end">Back</a>
      </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><?php echo $_SESSION['role']; ?></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

       

            <div class="col-lg-12">
                <div class="row">

                <div class="d-flex flex-column justify-content-between gap-3">


                    <?php  
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $course_name = $row['course_name'];
                            $description = $row['describtion'];
                            $lecturer = $row['lecturer'];
                            
                            echo "<div class='card col-lg-12 col-md-6 col-sm-12'>";
                                // Output for each course
                                echo '<div class="card-body">';
                                
                                // Course Name
                                echo '<div style="font-weight: bold; font-size: 18px; margin-bottom: 10px;">Course: ' . htmlspecialchars($course_name) . '</div>';
                                
                                // Description
                                echo '<div style="margin-bottom: 10px;">Description: ' . htmlspecialchars($description) . '</div>';
                                
                                // Lecturer
                                echo '<div>Lecturer: ' . htmlspecialchars($lecturer) . '</div>';
                                
                                ?>
                                <a href="edit-course.php?id=<?= $id ?>" class="btn btn-success float-start">Edit</a>
                                <a href="delete-course.php?id=<?= $id ?>" class="btn btn-danger float-end" onclick="confirm('Are you sure to delete this course?');">Delete Course</a>
                                
                                
                                <?php
                                echo '</div>';
                                
                                
                            echo '</div>';
                            

                        }
                    } else {
                        echo "<p>No courses found!</p>";
                    }
                    ?>
                
                </div>

                
                </div>
            </div>
        
        




       

    

      </div>
    </section>

</main>

<?php  

require 'admin-footer.php';