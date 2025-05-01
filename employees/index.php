<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employees | Company Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
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
    <?php include '../db.php'; ?>
    
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold"><i class="bi bi-people me-2"></i>Employees</h2>
        <p class="text-muted">Manage your company's employee records</p>
      </div>
      <a href="create.php" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>Add Employee
      </a>
    </div>
    
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th width="8%">ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Department</th>
              <th width="20%" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $sql = "SELECT e.*, d.name as department_name 
                  FROM employees e 
                  LEFT JOIN departments d ON e.department_id = d.id";
          $res = $conn->query($sql);
          
          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
              echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['department_name']}</td>
                  <td class='text-end'>
                      <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning me-1' data-bs-toggle='tooltip' title='Edit'>
                        <i class='bi bi-pencil'></i> Edit
                      </a>
                      <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger btn-delete' data-bs-toggle='tooltip' title='Delete'>
                        <i class='bi bi-trash'></i> Delete
                      </a>
                  </td>
              </tr>";
            }
          } else {
            echo "<tr><td colspan='5' class='text-center py-4'>No employees found. <a href='create.php'>Add one</a>!</td></tr>";
          }
          ?>
          </tbody>
        </table>
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
<script src="../assets/js/main.js"></script>
</body>
</html>
