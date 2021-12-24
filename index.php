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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' type='text/css' href='style.css'>    
</head>
<body>

<div class="h2"><b>İSTANBUL TİCARET ÜNİVERSİTESİ TERCİH ROBOTU</b></div>
<div class='text-secondary'>İstanbul Ticaret Üniversitesi Tercih Robotuna Hoşgeldiniz!</div>

<?php
            define('DB_HOST', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', 'me123');
            define('DB_NAME', 'test_tercih_robotu');


            try {
                $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            }catch (Exception $e){
                echo $e->getMessage() . "<br>";
                while($e = $e->getPrevious()) {
                    echo 'Previous exception: '.$e->getMessage() . "<br/>";
                }
            }
            ?>


<div class='container-fluid mt-5'>
    <form action="index.php" method='POST' id='form1'>
        <div class='row m-2'>
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
        
        <div class='row m-2'>
        <div class='col'>
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
            </div>
            <div class='row mt-2'>
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
                <div class='uni'><b>Üniversite Türleri:</b></div>
                <div>
                <?php 
                $sql = "SELECT DISTINCT statu FROM sayfa2";
                if ($result = mysqli_query($conn, $sql)) {
                    if(mysqli_num_rows($result) > 0) {
                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                        echo "<select name='uni_type[]' class='selectpicker' multiple data-live-search='true'>";
                        echo "<option selected disabled>Üniversite Türü Seçiniz.</option>";
                        while($row = mysqli_fetch_array($result)){    
                        echo "<option>".$row['statu']."</option>";
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
        <div class='row mt-2'>
            <div class='col d-flex justify-content-end'>
            <div class='w3-text-blue'><b>Search:</b></div>
                <input class='w3-input w3-border' type="text" name='selectedKeyword' value placeholder='Aramak istediğiniz değeri yazınız...'>
            </div>
        </div> 
    </form>
</div>

<button class='w3-button w3-round-xxlarge w3-blue w3-hover-grey' type="submit" form="form1" name='submit' value='Listele'>Listele</button>

<div class='container-fluid mt-5'>
    <table id='table1' class='table content-table table-sortable table-bordered table-striped'>
        <thead class='w3-blue'>
            <tr>
                <th>Program Kodu</th>
                <th>Üniversite</th>
                <th>Bölüm</th>
                <th>Puan Türü</th>
                <th>Burs</th>
                <th>Taban Puan 2020</th>
                <th>Taban Puan 2019</th>
                <th>Taban Sıralama 2020</th>
                <th>Taban Sıralama 2019</th>
                <th>Ekle</th>
            </tr>
        </thead>
        <tbody>
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
                    $departmentArray[] = $selected6;
                }
            }

            if (!empty($_POST['uni_type'])){
                $uniTypeArray = array();
                foreach($_POST['uni_type'] as $selected5){
                    $uniTypeArray[] = $selected5;
                }
            }

            if (!empty($uniArray) && !empty($facultyArray))
            {
                foreach ($uniArray as $u)
                {
                    foreach ($facultyArray as $f){
                    #echo $u;
                    $sql = "SELECT uni_name, department, program_code, point_type, coalesce(scholarship, 'Devlet') ,min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE uni_name='$u' AND faculty='$f'";       
                    if ($result = mysqli_query($conn, $sql))
                    {
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "</tr>".

                                "<td>".$row['program_code']."</td>".
                                "<td>".$row['uni_name']."</td>".
                                "<td>".$row['department']."</td>".
                                "<td>".$row['point_type']."</td>".
                                "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                                "<td>".$row['min_point_2020']."</td>".
                                "<td>".$row['min_point_2019']."</td>".
                                "<td>".$row['success_order_2020']."</td>".
                                "<td>".$row['success_order_2019']."</td>".
                                "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>" 

                                ."</tr>";
                            }
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }

                }
            }
            }
            else if (!empty($uniArray) && !empty($departmentArray))
            {
                foreach ($uniArray as $u)
                {
                    foreach ($departmentArray as $d){
                    $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE uni_name='$u' AND department='$d'";       
                    if ($result = mysqli_query($conn, $sql))
                    {
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "</tr>".

                                "<td>".$row['program_code']."</td>".
                                "<td>".$row['uni_name']."</td>".
                                "<td>".$row['department']."</td>".
                                "<td>".$row['point_type']."</td>".
                                "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                                "<td>".$row['min_point_2020']."</td>".
                                "<td>".$row['min_point_2019']."</td>".
                                "<td>".$row['success_order_2020']."</td>".
                                "<td>".$row['success_order_2019']."</td>".
                                "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                                ."</tr>";
                            }
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }

                }
            }
            }
            else if (!empty($_POST['uniName']))
            {
                if (!empty($uniArray))
                {
                    foreach ($uniArray as $u)
                    {
                        $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE uni_name='$u'";
                        if ($result = mysqli_query($conn, $sql))
                        {
                            if (mysqli_num_rows($result) > 0)
                        {
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "</tr>".

                            "<td>".$row['program_code']."</td>".
                            "<td>".$row['uni_name']."</td>".
                            "<td>".$row['department']."</td>".
                            "<td>".$row['point_type']."</td>".
                            "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                            "<td>".$row['min_point_2020']."</td>".
                            "<td>".$row['min_point_2019']."</td>".
                            "<td>".$row['success_order_2020']."</td>".
                            "<td>".$row['success_order_2019']."</td>".
                            "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                            ."</tr>";                        
                        }
                        mysqli_free_result($result);
                    }
                    else
                    {
                        echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                    }
                }
                else
                {
                    echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                }
            }
        }
        else if (!empty($_POST['facultyName']))
        {
            if (!empty($facultyArray))
            {
                foreach ($facultyArray as $f)
                {
                    $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE faculty='$f'";
                    if ($result = mysqli_query($conn, $sql))
                    {

                        if (mysqli_num_rows($result) > 0)
                        {

                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "</tr>".

                                "<td>".$row['program_code']."</td>".
                                "<td>".$row['uni_name']."</td>".
                                "<td>".$row['department']."</td>".
                                "<td>".$row['point_type']."</td>".
                                "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                                "<td>".$row['min_point_2020']."</td>".
                                "<td>".$row['min_point_2019']."</td>".
                                "<td>".$row['success_order_2020']."</td>".
                                "<td>".$row['success_order_2019']."</td>".
                                "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                                ."</tr>";   

                            }
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                }
            }
        }
        else if (!empty($_POST['department']))
            {
                if (!empty($departmentArray))
                {
                    foreach ($departmentArray as $d)
                    {
                        $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE department='$d'";
                        if ($result = mysqli_query($conn, $sql))
                        {
                            if (mysqli_num_rows($result) > 0)
                        {
                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "</tr>".

                            "<td>".$row['program_code']."</td>".
                            "<td>".$row['uni_name']."</td>".
                            "<td>".$row['department']."</td>".
                            "<td>".$row['point_type']."</td>".
                            "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                            "<td>".$row['min_point_2020']."</td>".
                            "<td>".$row['min_point_2019']."</td>".
                            "<td>".$row['success_order_2020']."</td>".
                            "<td>".$row['success_order_2019']."</td>".
                            "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"     

                            ."</tr>";                        
                        }
                        mysqli_free_result($result);
                    }
                    else
                    {
                        echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                    }
                }
                else
                {
                    echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                }
            }
        }
        else if (!empty($_POST['cities']))
        {
            if (!empty($cityArray))
            {
                foreach ($cityArray as $c)
                {
                    $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE city='$c'";
                    if($result = mysqli_query($conn, $sql))
                    {
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "</tr>".

                                "<td>".$row['program_code']."</td>".
                                "<td>".$row['uni_name']."</td>".
                                "<td>".$row['department']."</td>".
                                "<td>".$row['point_type']."</td>".
                                "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                                "<td>".$row['min_point_2020']."</td>".
                                "<td>".$row['min_point_2019']."</td>".
                                "<td>".$row['success_order_2020']."</td>".
                                "<td>".$row['success_order_2019']."</td>".
                                "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                                ."</tr>";   
                            }
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                }
            }
        }
        else if (!empty($_POST['type']))
        {
            if (!empty($typeArray))
            {
                foreach ($typeArray as $t)
                {
                    $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE point_type='$t'";
                    if ($result = mysqli_query($conn, $sql))
                    {
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "</tr>".

                                "<td>".$row['program_code']."</td>".
                                "<td>".$row['uni_name']."</td>".
                                "<td>".$row['department']."</td>".
                                "<td>".$row['point_type']."</td>".
                                "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                                "<td>".$row['min_point_2020']."</td>".
                                "<td>".$row['min_point_2019']."</td>".
                                "<td>".$row['success_order_2020']."</td>".
                                "<td>".$row['success_order_2019']."</td>".
                                "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                                ."</tr>";   
                            }
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                }
            }
        }
        else if (!empty($_POST['uni_type']))
        {
            if (!empty($uniTypeArray))
            {
                foreach ($uniTypeArray as $ut)
                {
                    $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE statu ='$ut'";
                    if ($result = mysqli_query($conn, $sql))
                    {
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_array($result))
                            {
                                echo "</tr>".

                                "<td>".$row['program_code']."</td>".
                                "<td>".$row['uni_name']."</td>".
                                "<td>".$row['department']."</td>".
                                "<td>".$row['point_type']."</td>".
                                "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                                "<td>".$row['min_point_2020']."</td>".
                                "<td>".$row['min_point_2019']."</td>".
                                "<td>".$row['success_order_2020']."</td>".
                                "<td>".$row['success_order_2019']."</td>".
                                "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                                ."</tr>";   
                            }
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not execute $sql" . mysqli_error($conn);
                    }
                }
            }
        }
        else if (!empty($_POST['selectedKeyword']))
        {
            $kwarg = $_POST['selectedKeyword'];
            $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE uni_name LIKE '%$kwarg%' or faculty LIKE '%$kwarg%' or department LIKE '%$kwarg%' or city LIKE '%$kwarg%'";
            if ($result = mysqli_query($conn, $sql))
            {
                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_array($result))
                    {
                        echo "</tr>".

                        "<td>".$row['program_code']."</td>".
                        "<td>".$row['uni_name']."</td>".
                        "<td>".$row['department']."</td>".
                        "<td>".$row['point_type']."</td>".
                        "<td>".$row["coalesce(scholarship, 'Devlet')"]."</td>".
                        "<td>".$row['min_point_2020']."</td>".
                        "<td>".$row['min_point_2019']."</td>".
                        "<td>".$row['success_order_2020']."</td>".
                        "<td>".$row['success_order_2019']."</td>".
                        "<td><button class='w3-button w3-large w3-circle w3-blue w3-hover-grey'>+</button></td>"      

                        ."</tr>";   
                    }
                    mysqli_free_result($result);
                }
                else
                {
                    echo "<script type='text/JavaScript'> alert('Something went wrong...); </script>";
                }
            }
            else
            {
                echo "ERROR: Could not execute $sql" . mysqli_error($conn);
            }
        }

        }
            ?>

        </tbody>
    </table>

</div>

<script src='script.js'></script>

</body>
</html>