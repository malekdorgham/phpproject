<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Department | Company Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="/company-site/index.php">
      <i class="bi bi-building me-2"></i>Company Admin
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/company-site/departments/index.php">
            <i class="bi bi-diagram-3 me-1"></i>Departments
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/company-site/employees/index.php">
            <i class="bi bi-people me-1"></i>Employees
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <?php include '../db.php'; 
  
  $id = $_GET['id'];
  $result = $conn->query("SELECT * FROM departments WHERE id = $id");
  $department = $result->fetch_assoc();
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $sql = "UPDATE departments SET name = '$name' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-success mb-4" role="alert">
              <i class="bi bi-check-circle me-2"></i>Department updated successfully!
            </div>';
      $department['name'] = $name;
    } else {
      echo '<div class="alert alert-danger mb-4" role="alert">
              <i class="bi bi-exclamation-triangle me-2"></i>Error: ' . $conn->error . '
            </div>';
    }
  }
  ?>
  
  <div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Department</h2>
      <p class="text-muted">Update department information</p>
    </div>
    <a href="index.php" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left me-1"></i>Back to Departments
    </a>
  </div>
  
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-body p-4">
          <form action="" method="post" class="form-container">
            <div class="mb-3">
              <label for="name" class="form-label">Department Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $department['name']; ?>" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="index.php" class="btn btn-outline-secondary me-2">
                <i class="bi bi-x-circle me-1"></i>Cancel
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Update Department
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="mt-5 py-4 text-center text-muted">
  <div class="container">
    <p class="mb-1"> 2025 Company Admin Dashboard</p>
    <p class="small">A modern management solution</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
