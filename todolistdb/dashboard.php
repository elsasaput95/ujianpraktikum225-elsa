<?php
require 'connection.php';

$query ="SELECT * FROM todos";
$results = mysqli_query($connect, $query);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List DB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <style>
    body {
      background-color: #f3f7fa; 
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: #E3F2FD;
    }

    .card {
      background-color: #ffffff;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      border-radius: 1rem;
    }

    .section-bg {
      background-color: #E8F5E9; 
      padding: 2rem;
      border-radius: 1rem;
    }
  </style>
    <div class="p-3 mb-4 text-right bg-primary-subtle text-primary-emphasis"><h5>Todo List</h5></div>
    <a class="mb-2 btn bg-info" href="tambah.php">Add Todo</a>

    <table class="table table-bordered table-soft-blue">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        
            <?php
             if (mysqli_num_rows($results) > 0){
                $no = 1;
                while ($show = mysqli_fetch_assoc($results)){
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$show[title]</td>
                        <td>$show[description]</td>
                        <td>
                            <a href='edit.php?id=$show[id]' class='btn btn-warning'>Edit</a>
                            <form action='hapus_proses.php' method='POST' class='d-inline'>
                                <input type='hidden' name='id' value='$show[id]' />
                                <button type='submit' class='btn btn-danger'>Hapus</button>
                            </form>
                        </td>
                    </tr>
                    ";
                    $no++;
                }
            }else{
                echo "<div class='text-danger'>Data Tidak Ada</div>";
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>