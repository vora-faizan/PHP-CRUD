<?php
$insert = false;
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Soory we fail to connect: " . mysqli_connect_errno());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];

  $sql = "INSERT INTO `crud` (`name`, `email`) VALUES ('$name', '$email')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $insert = true;
  } else {
    echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <title>CRUD</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">PHP CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Entry has been inserted successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>
  <div class="container my-4">
    <h2>Add a user</h2>
    <form action="Index1.php" method="POST">
      <div class="form-group">
        <label for="name">Name</label>
        <input required type="Name" class="form-control" id="name" name="name" placeholder="Enter Name">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <div class="container">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">E-Mail</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        $sno1 = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $sno1 = $sno1 + 1;
          echo "<tr>
            <th scope='row'>" . $sno1 . "</th>
            <td>" . $row['id'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>
            <a href='update.php?id=$row[id]'><button class='btn btn-sm btn-success'>Edit</button></a>
            <a href='delete.php?id=$row[id]'><button class='btn btn-danger btn-sm'>Delete</button></a>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
</body>

</html>