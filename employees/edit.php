<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Employee | Company Admin</title>
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
  $result = $conn->query("SELECT * FROM employees WHERE id = $id");
  $employee = $result->fetch_assoc();
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department_id = $_POST['department_id'];
    
    $sql = "UPDATE employees SET name = '$name', email = '$email', department_id = '$department_id' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-success mb-4" role="alert">
              <i class="bi bi-check-circle me-2"></i>Employee updated successfully!
            </div>';
      $employee['name'] = $name;
      $employee['email'] = $email;
      $employee['department_id'] = $department_id;
    } else {
      echo '<div class="alert alert-danger mb-4" role="alert">
              <i class="bi bi-exclamation-triangle me-2"></i>Error: ' . $conn->error . '
            </div>';
    }
  }
  
  $departments = $conn->query("SELECT * FROM departments");
  ?>
  
  <div class="page-header d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold"><i class="bi bi-pencil-square me-2"></i>Edit Employee</h2>
      <p class="text-muted">Update employee information</p>
    </div>
    <a href="index.php" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left me-1"></i>Back to Employees
    </a>
  </div>
  

            
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['email'] ?? ''; ?>" required>
              <div class="form-text">Enter the employee's work email address</div>
            </div>
            
            <div class="mb-4">
              <label for="department_id" class="form-label">Department</label>
              <select class="form-select" id="department_id" name="department_id">
                <option value="">-- Select Department --</option>
                <?php while($dept = $departments->fetch_assoc()): ?>
                  <option value="<?php echo $dept['id']; ?>" <?php echo ($dept['id'] == $employee['department_id']) ? 'selected' : ''; ?>>
                    <?php echo $dept['name']; ?>
                  </option>
                <?php endwhile; ?>
              </select>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="index.php" class="btn btn-outline-secondary me-2">
                <i class="bi bi-x-circle me-1"></i>Cancel
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i>Update Employee
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
