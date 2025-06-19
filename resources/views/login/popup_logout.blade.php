<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Logout Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .btn-logout {
      background-color: #dc3545;
      color: white;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 16px;
      border: none;
    }
    .btn-logout:hover {
      background-color: #bb2d3b;
    }
    .modal-header {
      border-bottom: none;
    }
    .modal-footer {
      border-top: none;
    }
    .modal-body p {
      margin-bottom: 0;
      font-size: 15px;
    }
    .modal-icon {
      font-size: 40px;
      color: #dc3545;
    }
  </style>
</head>
<body>

  <!-- Tombol Logout -->
  <button class="btn-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">
    Logout
  </button>

  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-3">
        <div class="modal-header justify-content-center border-0">
          <div class="modal-icon">
            <i class="bi bi-power"></i>
          </div>
        </div>
        <div class="modal-body">
          <h5 class="mb-3">Logout Account</h5>
          <p>Are you sure you want to logout? Once you logout, you need to login again. Are you OK?</p>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="logout()">Yes, Logout!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Logout Function -->
  <script>
    function logout() {
      // Arahkan ke login.html setelah logout
      window.location.href = "login.html";
    }
  </script>

  <!-- Icon Bootstrap (Opsional) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</body>
</html>
