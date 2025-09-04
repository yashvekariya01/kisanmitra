<?php
include("db.php");

if(isset($_POST['add_member'])){
    $name = $_POST['name'];
    $role = $_POST['role'];
    $contact = $_POST['contact'];
    $joined = date("Y-m-d H:i:s"); 

    $stmt = $conn->prepare("INSERT INTO apmc_members (name, role, contact, joined) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $role, $contact, $joined);

    if($stmt->execute()){
        header("Location: apmc.php"); 
        exit;
    } else {
        echo "<script>alert('Error: Unable to add member');</script>";
    }
    $stmt->close();
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM apmc_members WHERE id=$id");
    header("Location: apmc.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>APMC Members</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card p-4 shadow rounded-4">
    <h2 class="text-success">🌾 APMC Members</h2>
    <hr>

    <form method="POST" class="row g-3 mb-4">
      <div class="col-md-4">
        <input type="text" name="name" class="form-control" placeholder="Member Name" required>
      </div>
      <div class="col-md-3">
        <select name="role" class="form-select" required>
          <option value="">Select Role</option>
          <option value="Farmer">Farmer</option>
          <option value="Company">Company</option>
          <option value="Chairman">Chairman</option>
          <option value="Member">Member</option>
        </select>
      </div>
      <div class="col-md-3">
        <input type="text" name="contact" class="form-control" placeholder="Contact Info">
      </div>
      <div class="col-md-2">
        <button type="submit" name="add_member" class="btn btn-success w-100">➕ Add</button>
      </div>
    </form>

    <table class="table table-bordered table-striped">
      <thead class="table-success">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Role</th>
          <th>Contact</th>
          <th>Joined</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT * FROM apmc_members ORDER BY id DESC");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['role']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['joined']}</td>
                        <td>
                          <a href='apmc.php?delete={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center text-muted'>No members added yet</td></tr>";
        }
        ?>
      </tbody>
    </table>

    <a href="index.php" class="btn btn-danger mt-3">⬅ Back</a>
  </div>
</div>

</body>
</html>
