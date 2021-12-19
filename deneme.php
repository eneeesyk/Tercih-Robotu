<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Istanbul Ticaret Universitesi Tercih Robotu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    
</head>
<body>

<div class="h2"><b>ISTANBUL TICARET UNIVERSITESI TERCIH ROBOTU</b></div>
<div class='text-secondary'>Istanbul Ticaret Universitesi tercih robotuna hosgeldiniz!</div>

<?php
            define('DB_HOST', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', 'root');
            define('DB_NAME', 'tercih_test');


            try {
                $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            }catch (Exception $e){
                echo $e->getMessage() . "<br>";
                while($e = $e->getPrevious()) {
                    echo 'Previous exception: '.$e->getMessage() . "<br/>";
                }
            }
            ?>


<div class='container-fluid'>
    <form action="deneme.php" method='POST'>
        <div class='row'>
            <div class='col'>
                <div class='uni'><b>Üniversiteler:</b></div>
                <div>
                    <?php
                        $sql = "SELECT uni_name FROM sayfa2";
                        if ($result = mysqli_query($conn, $sql)) {
                            if(mysqli_num_rows($result) > 0) {
                                echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                echo "<select name='uniName[]' class='selectpicker' multiple data-live-search='true'>";
                                echo "<option selected disabled>Üniversite Seçiniz.</option>";
                                while($row = mysqli_fetch_array($result)){    
                                echo "<option>".$row['uni_name']."</option>";
                                }
                                echo '</select>';
                                echo '</div>';
                                mysqli_free_result($result);
                            }else {
                                echo "<script type='text/JavaScript'> alert('Something went wrong... There is no records); </script>";
                            }
                        }else {
                            echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                        }
                    ?>
                </div>
            </div>
            <div class='col'>
                <div class='uni'><b>Fakülteler:</b></div>
                <div>
                <?php        
                    $sql2 = "SELECT faculty FROM sayfa2";
                    if ($result = mysqli_query($conn, $sql2)) {
                        if(mysqli_num_rows($result) > 0) {
                            echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                            echo "<select name='facultyName[]' class='selectpicker' multiple data-live-search='true'>";
                            echo "<option selected disabled>Fakülte Seçiniz.</option>";
                            while($row = mysqli_fetch_array($result)){    
                                echo "<option>".$row['faculty']."</option>";
                            }
                            echo '</select>';
                            echo '</div>';
                            mysqli_free_result($result);
                        }else {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }else {
                        echo "ERROR: Could not execute $sql2" . mysqli_error($conn);
                    }
                ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
                <div class='uni'><b>Puan Türü:</b></div>
                <div>
                <?php
                        $type = array('SAY', 'EA', 'DİL', 'SÖZ');  
                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                        echo "<select name='type[]' class='selectpicker' multiple data-live-search='true'>";
                        echo "<option selected disabled>Puan Türü Seçiniz.</option>";
                        foreach($type as $key => $value){
                            echo '<option>'.$value.'</option>';
                        }
                        echo '</div>';
                        echo '</select>';
                    ?>
                </div>
            </div>
            <div class='col'>
                <div class='uni'><b>Bölümler:</b></div>
                <div>
                <?php
                $sql = "SELECT department FROM sayfa2";
                if ($result = mysqli_query($conn, $sql)) {
                    if(mysqli_num_rows($result) > 0) {
                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                        echo "<select name='department[]' class='selectpicker' multiple data-live-search='true'>";
                        echo "<option selected disabled>Bölüm Seçiniz.</option>";

                        while($row = mysqli_fetch_array($result)){    
                        echo "<option>".$row['department']."</option>";
                        }
                        echo '</select>';
                        echo '</div>';
                        mysqli_free_result($result);
                    }else {
                        echo "<script type='text/JavaScript'> alert('Something went wrong... There is no records); </script>";
                    }
                }else {
                    echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                }
                    ?>  
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
            <input type="text" name='selectedKeyword' value placeholder='Aramak istedignizi yaziniz'>
            </div>
        </div> 
        <input type="submit" name='submit' value='Gonder'> 
    </form>
</div>

<br>
        <div class='container-fluid'>
        <?php
            if(isset($_POST['submit'])){
                if(!empty($_POST['uniName'])) {
                    $uniArray = array();
                    foreach($_POST['uniName'] as $selected){
                        $uniArray[] = $selected;
                    }
                    print_r($uniArray); 
                    echo '<br> <hr>';          
                }

                if(!empty($_POST['facultyName'])) {
                    $facultyArray = array();
                    foreach($_POST['facultyName'] as $selected2){
                        $facultyArray[] = $selected2;
                    }
                    print_r($facultyArray);
                    echo '<br> <hr>';
                }

                if (!empty($_POST['cities'])){
                    $cityArray = array();
                    foreach($_POST['cities'] as $selected3){
                        $cityArray[] = $selected3;
                    }
                    print_r($cityArray);
                    echo '<br> <hr>';
                }
                
                if (!empty($_POST['type'])){
                    $typeArray = array();
                    foreach($_POST['type'] as $selected4){
                        $typeArray[] = $selected4;
                    }
                    print_r($typeArray);
                    echo '<br> <hr>';
                }

                if (!empty($_POST['department'])){
                    $departmentArray = array();
                    foreach($_POST['department'] as $selected6){
                        $department[] = $selected6;
                    }
                    print_r($department);
                    echo '<br> <hr>';
                }

                if (!empty($_POST['uni_type'])){
                    $uniTypeArray = array();
                    foreach($_POST['uni_type'] as $selected5){
                        $uniTypeArray[] = $selected5;
                    }
                    print_r($uniTypeArray);
                    echo '<br> <hr>';
                }
                

            }
        ?>
        </div>

</body>
</html>