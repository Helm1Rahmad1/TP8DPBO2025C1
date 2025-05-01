<?php include 'views/layouts/header.php'; ?>

<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h3 class="text-center">Create Enrollment</h3>
    </div>
    <div class="card-body">
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="student_id" class="form-label">Student</label>
          <select name="student_id" id="student_id" class="form-select" required>
            <option value="">Select Student</option>
            <?php
            while ($student = $students->fetch_assoc()) {
              echo "<option value='{$student['id']}'>{$student['name']} ({$student['nim']})</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="course_id" class="form-label">Course</label>
          <select name="course_id" id="course_id" class="form-select" required>
            <option value="">Select Course</option>
            <?php
            while ($course = $courses->fetch_assoc()) {
              echo "<option value='{$course['id']}'>{$course['course_name']} ({$course['course_code']})</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="enrollment_date" class="form-label">Enrollment Date</label>
          <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="grade" class="form-label">Grade</label>
          <select name="grade" id="grade" class="form-select">
            <option value="">Not Graded Yet</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
          </select>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Create Enrollment</button>
          <a href="index.php?action=enrollments" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'views/layouts/footer.php'; ?>