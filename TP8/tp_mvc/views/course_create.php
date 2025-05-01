<?php include 'views/layouts/header.php'; ?>

<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h3 class="text-center">Create Course</h3>
    </div>
    <div class="card-body">
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="course_code" class="form-label">Course Code</label>
          <input type="text" name="course_code" id="course_code" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="course_name" class="form-label">Course Name</label>
          <input type="text" name="course_name" id="course_name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="credits" class="form-label">Credits</label>
          <input type="number" name="credits" id="credits" class="form-control" min="1" max="6" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Create Course</button>
          <a href="index.php?action=courses" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'views/layouts/footer.php'; ?>