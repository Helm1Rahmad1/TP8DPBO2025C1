<?php include 'views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h2>Student List</h2>
  <a href="index.php?action=createStudent" class="btn btn-primary">Add New Student</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>NIM</th>
      <th>Phone</th>
      <th>Join Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['nim']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['join_date']}</td>
                <td>
                  <a href='index.php?action=editStudent&id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='index.php?action=deleteStudent&id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus ini?\")'>Delete</a>
                </td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='6' class='text-center'>No students found</td></tr>";
    }
    ?>
  </tbody>
</table>

<?php include 'views/layouts/footer.php'; ?>