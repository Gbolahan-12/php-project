<?php  
session_start();

  require '../../connection/db_connect.php';
  require 'admin-header.php';
  
  require 'admin-sidebar.php';


  $user_id = $_SESSION['user_id'];


  // Fetch profile info
$query = "SELECT * FROM profile WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$profile = mysqli_fetch_assoc($result);


?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item"><?php echo $_SESSION['role']; ?></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="uploads/<?=  htmlspecialchars($profile['profile_pic'] ?? 'default.png') ?>" width="100" class="rounded-circle">


            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->

              <h2>
                <?php echo ucfirst($_SESSION['username']); ?>
              </h2>
              <h3>Web Designer</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

        <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex align-items-center justify-content-evenly">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              
              <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?php echo ucfirst($_SESSION['username']);?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Profile Pics</div>
                  <div class="col-lg-9 col-md-8">
                     <!-- <img src="assets/img/profile-img.jpg" alt="Profile">  -->
                     <img src="uploads/<?=  htmlspecialchars($profile['profile_pic'] ?? 'default.png') ?>" width="100" class="rounded-circle">
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?php echo ucfirst($_SESSION['user_email']);?></div>
                </div>

              </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="admin-profile_process.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <!-- <img src="assets/img/profile-img.jpg" alt="Profile"> -->
                        <img src="uploads/<?=  htmlspecialchars($profile['profile_pic'] ?? 'default.png') ?>" width="100" class="rounded-circle">
                         <br>
                        <div class="pt-2">
                        <input type="file" name="profile_pic" class="btn btn-primary col-sm-4">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px"><?= htmlspecialchars($profile['about'] ?? '') ?></textarea>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name="update_profile" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                

                <div class="tab-pane fade pt-3" id="profile-change-password">




                  <!-- Change Password Form -->
                  <form action="change-pwd.php" method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPwd" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newPwd" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewPwd" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div> -->

                    <div class="text-center">
                      <button type="submit" name="changePwd" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <?php  
  require 'admin-footer.php';