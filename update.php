<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($servername, $username, $password, $database);

$id=$_GET['id'];
$sql="SELECT* FROM crud WHERE id=$id";
$result=mysqli_query($conn, $sql);
while($res=mysqli_fetch_array($result)){
    $name=$res['name'];
    $email=$res['email'];
}

?>
<?php
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $sql="UPDATE crud SET name='$name', email='$email' WHERE id='$id'";
        $result=mysqli_query($conn, $sql);
        if($result){
            header("location:index.php");
        }
        else{
            echo "failed";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container my-4">
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="Name" value="<?php echo "$name" ?>" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" value="<?php echo "$email" ?>" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
            </div>
            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>