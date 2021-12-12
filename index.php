<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <title>Istanbul Ticaret Universitesi Tercih Robotu</title>
</head>
<body>
<div class="h2"><b>ISTANBUL TICARET UNIVERSITESI TERCIH ROBOTU</b></div>
<div class='text-secondary'>Istanbul Ticaret Universitesi tercih robotuna hosgeldiniz!</div>
<div class='text-secondary'>Son guncelleme: 8/12/2021 <a class='badge badge-secondary' href="update.log">(Ne guncellendi ?)</a></div>

<div class='container'>
    <div class='container-fluid'>
        <form method='POST' action="">

        <div class='container-fluid'>
            <?php
            define('DB_HOST', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', 'root');
            define('DB_NAME', 'tercihrobotu');


            try {
                $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            }catch (Exception $e){
                echo $e->getMessage() . "<br>";
                while($e = $e->getPrevious()) {
                    echo 'Previous exception: '.$e->getMessage() . "<br/>";
                }
            }
            ?>
            <?php
                $sql = "SELECT uni_name FROM university";
                if ($result = mysqli_query($conn, $sql)) {
                    if(mysqli_num_rows($result) > 0) {
                        echo "<select name='uniName[]' class='selectpicker' multiple data-live-search='true'>";
                        echo "<option selected disabled>Universite Seciniz.</option>";
                        while($row = mysqli_fetch_array($result)){    
                            echo "<option>".$row['uni_name']."</option>";
                        }
                        echo '</select>';
                        mysqli_free_result($result);
                    }else {
                        echo "<script type='text/JavaScript'> alert('Something went wrong... There is no records); </script>";
                    }
                }else {
                    echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                }
                ?></div>
            <div class='container-fluid'>
            <?php
            
            $sql2 = "SELECT faculty_name FROM facultyName";
            if ($result = mysqli_query($conn, $sql2)) {
                if(mysqli_num_rows($result) > 0) {
                    
                    echo "<select name='facultyName[]' class='selectpicker' multiple data-live-search='true'>";
                    echo "<option selected disabled>Fakulte Seciniz.</option>";
                    while($row = mysqli_fetch_array($result)){    
                        echo "<option>".$row['faculty_name']."</option>";
                    }
                    echo '</select>';
                    mysqli_free_result($result);
                }else {
                    echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                }
            }else {
                echo "ERROR: Could not execute $sql2" . mysqli_error($conn);
            }
        ?></div>
   </div>
   
    <input type="submit" name='submit' value='Gonder'>
    <br>
    <?php

if(isset($_POST['submit'])){
        if(!empty($_POST['uniName'])) {

          $uniArray = array();
          foreach($_POST['uniName'] as $selected){
            $uniArray[] = $selected;
          }          
        } else {
          echo 'Please select the value.';
        }

    if(!empty($_POST['facultyName'])) {

    $facultyArray = array();
    foreach($_POST['facultyName'] as $selected2){
      $facultyArray[] = $selected2;
    } 
}        
     else {
        echo 'Please select the value.';
      }
}
 ?>
    </form>
</div>



</body>
</html>
