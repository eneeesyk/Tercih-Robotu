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
    <link rel='stylesheet' href='style.css'/>
    
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


<div class='container-fluid m-5'>
    <form action="index.php" method='POST'>
        <div class='row'>
            <div class='col'>
                <div class='uni'><b>Üniversiteler:</b></div>
                <div>
                    <?php
                        $sql = "SELECT DISTINCT uni_name FROM sayfa2";
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
                    $sql2 = "SELECT DISTINCT faculty FROM sayfa2";
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
        <div class='col ml-3'>
                <div class=''><b>Şehirler:</b></div>
                <div>
                <?php
                    $sql = "SELECT DISTINCT city FROM sayfa2";
                    if ($result = mysqli_query($conn, $sql)) {
                        if(mysqli_num_rows($result) > 0) {
                            echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                            echo "<select name='cities[]' class='selectpicker' multiple data-live-search='true'>";
                            echo "<option selected disabled>Şehir Seçiniz.</option>";
                            while($row = mysqli_fetch_array($result)){    
                                echo "<option>".$row['city']."</option>";
                            }
                            echo '</select>';
                            echo '</div>';
                            mysqli_free_result($result);
                        }else {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }else {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                    ?>
                </div>
            </div>
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
                $sql = "SELECT DISTINCT department FROM sayfa2";
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
            <div class='col'>
                <div class='uni'><b>Universite Turleri:</b></div>
                <div>
                <?php 
                        $uni_type = array('Devlet', 'Vakif', 'KKTC', 'Yurtdisi');
                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                        echo "<select name='uni_type[]' class='selectpicker' multiple data-live-search='true'>";
                        echo "<option selected disabled>Universite Turu.</option>";
                        foreach($uni_type as $key => $value){
                            echo '<option>'.$value.'</option>';
                        }
                        echo '</div>';
                        echo '</select>';
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
     
                }

                if(!empty($_POST['facultyName'])) {
                    $facultyArray = array();
                    foreach($_POST['facultyName'] as $selected2){
                        $facultyArray[] = $selected2;
                    }
                }

                if (!empty($_POST['cities'])){
                    $cityArray = array();
                    foreach($_POST['cities'] as $selected3){
                        $cityArray[] = $selected3;
                    }
                }
                
                if (!empty($_POST['type'])){
                    $typeArray = array();
                    foreach($_POST['type'] as $selected4){
                        $typeArray[] = $selected4;
                    }
                }

                if (!empty($_POST['department'])){
                    $departmentArray = array();
                    foreach($_POST['department'] as $selected6){
                        $department[] = $selected6;
                    }
                }

                if (!empty($_POST['uni_type'])){
                    $uniTypeArray = array();
                    foreach($_POST['uni_type'] as $selected5){
                        $uniTypeArray[] = $selected5;
                    }
                }
                

            }
        ?>
        </div>

<div class='container-fluid mt-5'>
    <table>
        <tbody>
            <tr>
                <th width="10%">Program Kodu</th>
                <th width="16%" >Üniversite</th>
                <th width="16%" >Bölüm</th>
                <th width="8%" >Puan Türü</th>
                <th width="10%" >Taban Puan 2020</th>
                <th width="10%" >Taban Puan 2019</th>
                <th width="10%" >Taban Sıralama 2020</th>
                <th width="10%" >Taban Sıralama 2019</th>
                <th width="10%">Ekle</th>
            </tr>

            <?php 

                //database içindeki min_point(2020) şeklinde tutulan veriler değiştirilmiştir. 
                $sql = "SELECT uni_name, department, program_code, point_type, min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2";
                
                if ($result = mysqli_query($conn, $sql)) {

                    if(mysqli_num_rows($result) > 0) {
                        
                        while($row = mysqli_fetch_array($result)){    
                            
                            echo "</tr>".

                            "<td>".$row['program_code']."</td>".
                            "<td>".$row['uni_name']."</td>".
                            "<td>".$row['department']."</td>".
                            "<td>".$row['point_type']."</td>".
                            "<td>".$row['min_point_2020']."</td>".
                            "<td>".$row['min_point_2019']."</td>".
                            "<td>".$row['success_order_2020']."</td>".
                            "<td>".$row['success_order_2019']."</td>"     

                            ."</tr>";
                            

                        }
                        
                        mysqli_free_result($result);
                    }else {
                        echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                    }
                }else {
                    echo "ERROR: Could not execute $sql2" . mysqli_error($conn);
                }

  
            ?>

        </tbody>
    </table>

</div>

</body>
</html>
