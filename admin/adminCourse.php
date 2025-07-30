<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Course Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f3f4f6;
      display: flex;
    }

    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: white;
      height: 100vh;
      position: fixed;
      display: flex;
      flex-direction: column;
      padding-top: 20px;
    }

    .sidebar a {
      text-decoration: none;
      color: white;
      padding: 15px 20px;
      display: block;
      transition: background-color 0.3s ease;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      width: 100%;
    }

    .add-course-btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .add-course-btn:hover {
      background-color: #0056b3;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
      z-index: 1;
    }

    .modal-content {
      background-color: white;
      padding: 25px;
      width: 380px;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      position: relative;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      font-weight: bold;
      margin-bottom: 5px;
      color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group textarea,
    .form-group input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
    }

    .courses-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .course-card {
      background-color: white;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .course-card img {
      width: 100%;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="admin_panel.php">Dashboard</a>
    <a href="adminCourse.php">Courses</a>
    <a href="#settings">Settings</a>
    <a href="logout.php">Logout</a>

  </div>

  <!-- Modal for Adding Course -->
  <div class="content">
    <button class="add-course-btn" onclick="openModal()">Add Course</button>
    <div class="modal" id="courseModal">
      <div class="modal-content">
        <button class="close-button" onclick="closeModal()">&times;</button>
        <h2>Add/Edit Course</h2>
        <form id="courseForm" enctype="multipart/form-data">
          <div class="form-group">
            <label for="modal_course_heading">Course Heading</label>
            <input type="text" id="modal_course_heading" name="course_heading" required>
          </div>
          <div class="form-group">
            <label for="modal_course_rate">Course Rate (INR)</label>
            <input type="number" id="modal_course_rate" name="course_rate" required>
          </div>
          <div class="form-group">
            <label for="modal_about_course">About Course</label>
            <textarea id="modal_about_course" name="about_course" required></textarea>
          </div>
          <div class="form-group">
            <label for="modal_course_duration">Course Duration (weeks)</label>
            <input type="text" id="modal_course_duration" name="course_duration" required>
          </div>
          <div class="form-group">
            <label for="modal_course_photo">Course Photo</label>
            <input type="file" id="modal_course_photo" name="course_photo" accept="image/*">
          </div>
          <button type="button" class="add-course-btn" onclick="addCourse()">Submit</button>
        </form>
      </div>
    </div>

    <!-- Display Courses Grid -->
    <div class="courses-grid" id="coursesGrid">
      <!-- Dynamic courses will be injected here -->
    </div>
  </div>

  <script>
    // Open and close modal
    function openModal() {
      document.getElementById("courseModal").style.display = "flex";
    }

    function closeModal() {
      document.getElementById("courseModal").style.display = "none";
    }

    // Add Course via Fetch
    function addCourse() {
      const form = document.getElementById("courseForm");
      const formData = new FormData(form);

      fetch('insert_course.php', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            displayCourses(); // Reload courses after adding a new one
            closeModal();
            form.reset();
          } else {
            alert("Error: " + data.message);
          }
        })
        .catch(error => console.error("Error:", error));
    }

    // Function to display all courses from the database
    function displayCourses() {
      fetch('fetch_courses.php') // This file will fetch courses from the database
        .then(response => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then(data => {
          const coursesGrid = document.getElementById("coursesGrid");
          coursesGrid.innerHTML = ''; // Clear existing courses

          // Check if courses are present
          if (data.courses && data.courses.length > 0) {
            data.courses.forEach(course => {
              const courseCard = document.createElement("div");
              courseCard.classList.add("course-card");
              courseCard.innerHTML = `
                <img src="${course.course_photo}" alt="${course.course_heading}">
                <h3>${course.course_heading}</h3>
                <p>Rate: ₹${course.course_rate}</p>
               <!-- <p>About: ${course.about_course}</p> -->
                <p>Duration: ${course.course_duration} weeks</p>
                <button onclick="editCourse(${course.id})">Edit</button>
                <button onclick="deleteCourse(${course.id})">Delete</button>
              `;
              coursesGrid.appendChild(courseCard);
            });
          } else {
            coursesGrid.innerHTML = "<p>No courses available</p>";
          }
        })
        .catch(error => {
          console.error("Error fetching courses:", error);
          document.getElementById("coursesGrid");
        //   document.getElementById("coursesGrid").innerHTML = "<p>Error loading courses</p>";
        });
    }

    // Function to handle course deletion
    function deleteCourse(courseId) {
      if (confirm("Are you sure you want to delete this course?")) {
        fetch('delete_course.php', {
          method: 'POST',
          body: JSON.stringify({ id: courseId }),
          headers: { 'Content-Type': 'application/json' }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            displayCourses(); // Reload courses after deletion
          } else {
            alert("Error deleting course");
          }
        })
        .catch(error => console.error("Error deleting course:", error));
      }
    }

    // Function to handle course editing
    function editCourse(courseId) {
      // Open modal and pre-fill data for editing (you'll need to fetch course data here)
      fetch('get_course.php', {
        method: 'POST',
        body: JSON.stringify({ id: courseId }),
        headers: { 'Content-Type': 'application/json' }
      })
      .then(response => response.json())
      .then(course => {
        // Fill the modal with course data for editing
        document.getElementById("modal_course_heading").value = course.course_heading;
        document.getElementById("modal_course_rate").value = course.course_rate;
        document.getElementById("modal_about_course").value = course.about_course;
        document.getElementById("modal_course_duration").value = course.course_duration;
        document.getElementById("modal_course_photo").value = ''; // Keep the photo input empty for re-upload
        openModal();
      })
      .catch(error => console.error("Error fetching course data:", error));
    }

    // Initial fetch to display courses when page loads
    window.onload = displayCourses;
  </script>
</body>
</html>
