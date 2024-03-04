<?php
require_once('db.inc.php');
//https://www.php.net/manual/en/book.pdo.php
//https://dev.mysql.com/doc/refman/5.7/en/sql-statements.html
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Data Objects (PDO)</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <header>
    <h1>PHP Data Objects (PDO)<h1>
  </header>
  <main>
    <p>If you see this then the database connected.</p>
    <?php
    // //retrieve and display data
    // //without passing in parameters
    // $basicSQL = "SELECT * FROM movies";
    // $recordset = $conn->query($basicSQL);
    // while($row = $recordset->fetch() ){ echo "row<br/>"; }
    


    //passing in parameters using the prepare() and execute() method
    // use with WHERE clause, ? means the value of $movie_title
    $strSQL= "SELECT * FROM movies WHERE movie_title = ?"; 
    // $strSQL= "SELECT * FROM movies"; 
    $movie_title = "Pinocchio";

    $prepared = $conn->prepare($strSQL);
    $prepared->execute(array($movie_title));
    
    //check for number of rows
    if($prepared->rowCount() > 0){
      // $prepared->setFetchMode(PDO::FETCH_NUM);
      // $prepared->setFetchMode(PDO::FETCH_BOTH);
      $prepared->setFetchMode(PDO::FETCH_ASSOC);
      echo "<table>";
        echo "<tr>";
          echo "<th>Movie Id</th>";
          echo "<th>Year</th>";
          echo "<th>Title</th>";
          echo "<th>Genre</th>";
          echo "<th>Starring</th>";
          echo "<th>Director</th>";
        echo "</tr>";
      
      //loop through rows in recordset
      while($row = $prepared->fetch() ){ 
        echo "<tr>";
         echo "<td>" . $row['movie_id'] . "</td>";
         echo "<td>" . $row['year'] . "</td>";
         echo "<td>" . $row['movie_title'] . "</td>";
         echo "<td> Genre_id: " . $row['genre_id'] . "</td>";
         echo "<td>" . $row['starring'] . "</td>";
         echo "<td>" . $row['director'] . "</td>";
        echo "</tr>"; 
      }
      echo "</table>";
    }else{
      echo '<p>No movies found that match that director.</p>';
    }
    



    // //Using named parameters
    // $namedSQL= "SELECT user_id, email, first_name, last_name  
    //     FROM users 
    //     WHERE user_name=:un OR email LIKE :em"; 
    // $user = "bob";
    // $em = "%@gmail.com";
    
    // $named = $conn->prepare($namedSQL);
    // $named->execute(array(':em'=>$em,':un'=>$user));
    



    //  BIND COLUMN

    // if($named->rowCount() > 0){
    //   // $named->setFetchMode(PDO::FETCH_ASSOC);
    //   $named->bindColumn(1, $id);
    //   $named->bindColumn(2, $e);
    //   $named->bindColumn(3, $f);
    //   $named->bindColumn(4, $l);
      
      
    //   echo "<table>";
    //   //loop through rows in recordset
    //   while($row = $named->fetch() ){ 
    //     echo "<tr>";
    //     //  echo "<td>" . $row['user_id'] . "</td>";
    //      echo "<td>" . $id . "</td>";
    //     //  echo "<td>" . $row['email'] . "</td>";
    //      echo "<td>" . $e . "</td>";
    //     //  echo "<td>" . $row['first_name'] . "</td>";
    //      echo "<td>" . $f . "</td>";
    //     //  echo "<td>" . $row['last_name'] . "</td>";
    //      echo "<td>" . $l . "</td>";
    //     echo "</tr>"; 
    //   }
    //   echo "</table>";
    // }else{
    //   echo '<p>No users found that match your value.</p>';
    // }
    
      


    ?>
    <!-- <p><a href="#">Save Data</a></p>
    <p><a href="#">Master - Detail</a></p> -->
  </main>
</body>
</html>
<?php
$conn = null;
?>