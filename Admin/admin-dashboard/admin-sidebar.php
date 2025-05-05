<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="admin.php">
      <i class="bi bi-grid"></i>
      <span>Register Courses</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="admin-side-course.php">
      <i class="bi bi-person"></i>
      <span>Courses</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="admin-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="students.php">
      <i class="bi bi-question-circle"></i>
      <span>Students</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="admin-main.php">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Login Page Nav -->


</ul>

</aside><!-- End Sidebar-->

// old
CREATE TABLE course-subscription (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL UNIQUE, 
    course-title VARCHAR(255) NOT NULL,
    lecture-name VARCHAR(255) DEFAULT 'default.jpg',
    date DATETIME,
    FOREIGN KEY (user_id,course-title,lecture-name), REFERENCES users(id), course(course_name), course(lecturer) ON DELETE CASCADE
);

// new
CREATE TABLE course_subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    subscription_date DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,

    UNIQUE (user_id, course_id) -- prevent duplicate subscriptions
);
