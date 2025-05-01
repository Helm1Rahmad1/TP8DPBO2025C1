<?php include 'views/layouts/header.php'; ?>

<div class="col-lg-6 m-auto">
  <div class="card">
    <div class="card-header bg-warning text-white">
      <h3 class="text-center">Update Student</h3>
    </div>
    <div class="card-body">
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" value="<?php echo $studentData['name']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $studentData['nim']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $studentData['phone']; ?>" required>
        </div>

        <div class="mb-3">
          <label for="join_date" class="form-label">Join Date</label>
          <input type="date" name="join_date" id="join_date" class="form-control" value="<?php echo $studentData['join_date']; ?>" required>
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Update Student</button>
          <a href="index.php?action=students" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'views/layouts/footer.php'; ?>