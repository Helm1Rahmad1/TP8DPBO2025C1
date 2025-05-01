<?php include 'views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2>Enrollment List</h2>
  <a href="index.php?action=createEnrollment" class="btn btn-primary">Add New Enrollment</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Student</th>
      <th>Course</th>
      <th>Enrollment Date</th>
      <th>Grade</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['student_name']}</td>
                <td>{$row['course_name']}</td>
                <td>{$row['enrollment_date']}</td>
                <td>{$row['grade']}</td>
                <td>
                  <a href='index.php?action=editEnrollment&id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='index.php?action=deleteEnrollment&id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ini\")'>Delete</a>
                </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='6' class='text-center'>No enrollments found</td></tr>";
    }
    ?>
  </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>