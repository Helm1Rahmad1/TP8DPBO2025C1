<?php include 'views/layouts/header.php'; ?>

<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header bg-warning text-white">
      <h3 class="text-center">Update Enrollment</h3>
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
              $selected = ($student['id'] == $enrollmentData['student_id']) ? 'selected' : '';
              echo "<option value='{$student['id']}' $selected>{$student['name']} ({$student['nim']})</option>";
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
              $selected = ($course['id'] == $enrollmentData['course_id']) ? 'selected' : '';
              echo "<option value='{$course['id']}' $selected>{$course['course_name']} ({$course['course_code']})</option>";
            }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="enrollment_date" class="form-label">Enrollment Date</label>
          <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" value="<?php echo $enrollmentData['enrollment_date']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="grade" class="form-label">Grade</label>
          <select name="grade" id="grade" class="form-select">
            <option value="" <?php echo empty($enrollmentData['grade']) ? 'selected' : ''; ?>>Not Graded Yet</option>
            <option value="A" <?php echo ($enrollmentData['grade'] == 'A') ? 'selected' : ''; ?>>A</option>
            <option value="B" <?php echo ($enrollmentData['grade'] == 'B') ? 'selected' : ''; ?>>B</option>
            <option value="C" <?php echo ($enrollmentData['grade'] == 'C') ? 'selected' : ''; ?>>C</option>
            <option value="D" <?php echo ($enrollmentData['grade'] == 'D') ? 'selected' : ''; ?>>D</option>
            <option value="E" <?php echo ($enrollmentData['grade'] == 'E') ? 'selected' : ''; ?>>E</option>
            <option value="F" <?php echo ($enrollmentData['grade'] == 'F') ? 'selected' : ''; ?>>F</option>
          </select>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Update Enrollment</button>
          <a href="index.php?action=enrollments" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'views/layouts/footer.php'; ?>