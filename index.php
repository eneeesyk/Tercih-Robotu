<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    
    <!-- Font Awasome -->
    <script src="https://kit.fontawesome.com/e28b1dbbf7.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src='https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js'></script>
<!-- alertJavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!--alert CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<style>
    .ajs-message { color: white;  background-color: #d9edf7;  border-color: #31708f;}
</style>
    <title>
        İstanbul Ticaret Üniversitesi Tercih Platformu
    </title>
</head>
<body>
    <script>

    function setCookie(name,value,days) {
        var expires = "";
        //alert(value);
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {   
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    function checkLocation(){
        if (getCookie('lastVisited') == null){
            return "tercih_listem.php";
        }else{
            return getCookie('lastVisited');
        }
    }
    </script>
    <script>

    $(document).ready(function(){
        var arr = new Array();
    $('button.test').click(function(){
        var clickBtnValue = $(this).attr("id");
        arr.push(clickBtnValue);
        var ajaxurl = 'tercih_listem.php';
        data =  {'id': arr};
        //alert(arr);
        
        $.get("tercih_listem.php?id=" + arr, function(response){
            //alert(response);
            //setCookie('lastVisited','tercih_listem.php?id=' + arr,7);
            if (getCookie("lastVisited") == null) {
                alert("sea");
                setCookie('lastVisited','tercih_listem.php?id=' + arr,7);
            } else {
                setCookie('lastVisited', getCookie('lastVisited') + "," + arr, 7);
            }
           
        });
        
    });
     $('#btnSendMail').click(function(){
        var clickBtnValue = $(this).attr("id");
        var fname = document.getElementById("fname").value
        var user_email = document.getElementById("email").value
        var ajaxurl = 'tercih_listem.php',
        data =  {'action': clickBtnValue, "id": arr, "fname": fname, "email": user_email};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            //alert("action performed successfully");
        });
    });
    
});
    </script>
    <?php include 'dbh.php'; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar-brand mb-0 h1">
                <img class="d-inline-block align-top " style='width: 253px; height: 122px;' src="images/İstanbul_Ticaret_Üniversitesi_Logo.png" alt="Logo">
            </a>
            
            <button
            type='button'
            data-bs-toggle='collapse'
            data-bs-target='#navbarNav'
            aria-controls='navbarNav'
            aria-expanded='false'
            aria-label='Toggle navigation'
            class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id='navbarNav'>
                <ul class="navbar-nav mx-auto">
                    <li class="navbar-item active">
                        <a href="index.php" class="nav-link active px-3">
                            <i class="fas fa-lg fa-home"></i> <span style="margin-left:7px;"> TERCİH PLATFORMU </span>
                        </a>
                    </li>
                    <li class="navbar-item active">
                        <a href="javascript:document.location = checkLocation();" class="nav-link px-3">
                        <i class="fas fa-lg fa-list-ul"></i> <span style="margin-left:7px;"> TERCİH LİSTEM </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>   

    <section class="colored-section" id="brand">
        <div class="container-fluid bg-light">
            <h3 class="first-h1 text-dark"> İSTANBUL TİCARET ÜNİVERSİTESİ 2022 YKS TERCİH PLATFORMU HİZMETİNİZDEDİR</h3>
        </div>
    </section>

        <div style='max-width: 1400px; margin: 0 auto; padding: 20px;'>
            <form action="index.php" method='POST' id='form1'>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Üniversite:</div>
                            <?php
                                $sql = "SELECT DISTINCT uni_name FROM sayfa2";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if(mysqli_num_rows($result) > 0) {
                                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                        echo "<select name='uniName[]' class='selectpicker ' multiple data-live-search='true'>";
                                        echo "<option selected disabled>Seçiniz.</option>";
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
                        <div class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Fakülte:</div>
                            <?php
                                $sql2 = "SELECT DISTINCT faculty FROM sayfa2";
                                if ($result = mysqli_query($conn, $sql2)) {
                                    if(mysqli_num_rows($result) > 0) {
                                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                        echo "<select name='facultyName[]' class='selectpicker' multiple data-live-search='true'>";
                                        echo "<option selected disabled>Seçiniz.</option>";
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
                        <div class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Şehir:</div>
                            <?php
                                $sql = "SELECT DISTINCT city FROM sayfa2";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if(mysqli_num_rows($result) > 0) {
                                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                        echo "<select name='cities[]' class='selectpicker' multiple data-live-search='true'>";
                                        echo "<option selected disabled>Seçiniz.</option>";
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
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Puan Türü:</div>
                            <?php
                                $sql = "SELECT DISTINCT point_type FROM sayfa2";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if(mysqli_num_rows($result) > 0) {
                                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                        echo "<select name='type[]' class='selectpicker' multiple data-live-search='true'>";
                                        echo "<option selected disabled>Seçiniz.</option>";
                                        while($row = mysqli_fetch_array($result)){    
                                            echo "<option>".$row['point_type']."</option>";
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
                        <div class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Bölüm:</div>
                            <?php
                                $sql = "SELECT DISTINCT department FROM sayfa2";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if(mysqli_num_rows($result) > 0) {
                                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                        echo "<select name='department[]' class='selectpicker' multiple data-live-search='true'>";
                                        echo "<option selected disabled>Seçiniz.</option>";
                
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
                        <div class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Tür:</div>
                            <?php
                                $sql = "SELECT DISTINCT statu FROM sayfa2";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if(mysqli_num_rows($result) > 0) {
                                        echo '<div class="btn-group bootstrap-select show-tick ng-pristine ng-untouched ng-valid ng-empty">';
                                        echo "<select name='uni_type[]' class='selectpicker' multiple data-live-search='true'>";
                                        echo "<option selected disabled>Seçiniz.</option>";
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
                    <div class='row'>
                        <div class="col-sm-12 p-3">
                            <div class="input-group mb-3 mt-3">
                                <input type="text" class="form-control" name='selectedKeyword' placeholder="Aramak için yazınız..." aria-label="Searchbar input" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark" id="addList" type="submit" form="form1" name='submit'>LİSTELE</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 p-3">
                            <button class="btn btn-outline-danger" onclick="clearSelected();">FİLTRELERİ TEMİZLE</button>
                        </div>
                        <div class="col p-3">
                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="İstanbul Ticaret Üniversitesi ile yaptığım listeme bakın! " data-via="ticaretedutr" data-hashtags="tercihlistesi" data-lang="tr" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <div class="col p-3">
                            <div class="fb-share-button" data-href="https://ticaret.edu.tr/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fticaret.edu.tr%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Paylaş</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>

        <div style="width: 3000px;" class='container mt-5 table-responsive'>
            <table style='font-family:"Courier New", Courier, monospace; font-size:70%;' id='myTable' class='table content-table table-sortable table-bordered table-striped'>
                <thead class='bg-dark text-light'>
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
                <tbody id='myTableBody'>
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
                                            "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"    

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
                                            "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"  
     
    

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
                                        "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"

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
                                            "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   

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
                                        "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   

     

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
                                            "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   

           

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
                                            "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   
 
           

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
                                            "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   
     
 

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
                                    "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   

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
                    else if (!empty($_POST['placement-bottom']) && !empty($_POST['placement-top']))
                    {
                        $placementTop = $_POST['placement-top'];
                        $placementBottom = $_POST['placement-bottom'];
                        $sql = "SELECT uni_name, department, program_code, point_type,coalesce(scholarship, 'Devlet'), min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE success_order_2020 BETWEEN '$placementBottom' AND '$placementTop'";
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
                                    "<td><button class= 'test' style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-plus-solid.svg'></button></td>"   
    


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


    
  <footer class="bg-light" id="footer">
    <div class="container-fluid footer">
      <a href="https://www.facebook.com/ticaretedutr/"><i class="social-icon fab fa-lg fa-facebook-f"></i> </a>
      <a href="https://www.instagram.com/ticaretedutr/"><i class="social-icon fab fa-lg fa-instagram"></i> </a> 
      <a href="https://twitter.com/ticaretedutr?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="social-icon fab fa-lg fa-twitter"></i> </a>
      <a href="https://ticaret.edu.tr/"><i class="social-icon fas fa-lg fa-link"></i> </a> 
      <p>© Copyright 2022 İstanbul Ticaret Üniversitesi</p>
    </div>
  </footer>


<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
</script>
<script src='scripts/script.js'></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="vfbBzDJ8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>