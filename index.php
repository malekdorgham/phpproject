<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar-brand {
      font-weight: bold;
    }
    .card {
      border-radius: 12px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
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

<main>
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="display-4 fw-bold mb-3">Welcome to the Company Admin</h1>
      <p class="lead text-muted mb-4">Manage your company's departments and employees with ease</p>
    </div>

    <div class="row justify-content-center g-4">
      <div class="col-md-5 col-lg-4">
        <div class="card dashboard-card">
          <div class="card-icon">
            <i class="bi bi-diagram-3"></i>
          </div>
          <h4>Departments</h4>
          <p>Create, view, and manage all your company departments in one place.</p>
          <a href="departments/index.php" class="btn btn-outline-primary">
            <i class="bi bi-arrow-right-circle me-1"></i>Go to Departments
          </a>
        </div>
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="card dashboard-card">
          <div class="card-icon">
            <i class="bi bi-people"></i>
          </div>
          <h4>Employees</h4>
          <p>Efficiently manage employee records, roles, and department assignments.</p>
          <a href="employees/index.php" class="btn btn-outline-primary">
            <i class="bi bi-arrow-right-circle me-1"></i>Go to Employees
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="mt-5 py-4 text-center text-muted">
  <div class="container">
    <p class="mb-1"> 2025 Company Admin Dashboard</p>
    <p class="small">A modern management solution</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
