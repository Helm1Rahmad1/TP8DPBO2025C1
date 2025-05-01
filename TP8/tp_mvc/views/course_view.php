<?php include 'views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2>Course List</h2>
  <a href="index.php?action=createCourse" class="btn btn-primary">Add New Course</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Course Code</th>
      <th>Course Name</th>
      <th>Credits</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['course_code']}</td>
                <td>{$row['course_name']}</td>
                <td>{$row['credits']}</td>
                <td>" . (strlen($row['description']) > 50 ? substr($row['description'], 0, 50) . '...' : $row['description']) . "</td>
                <td>
                  <a href='index.php?action=editCourse&id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='index.php?action=deleteCourse&id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='6' class='text-center'>No courses found</td></tr>";
    }
    ?>
  </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>