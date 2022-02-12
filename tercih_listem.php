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
        İstanbul Ticaret Üniversitesi Tercih Listesi
    </title>
</head>
<body>
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
                        <a href="tercih_listem.php" class="nav-link px-3">
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



<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require __DIR__.'/PHPMailer/src/Exception.php';
    require __DIR__.'/PHPMailer/src/PHPMailer.php';
    require __DIR__.'/PHPMailer/src/SMTP.php';
    //session_start();
    $html = "";
    $email = "";
    $name = "";

?>

        <div style='max-width: 1600px; margin: 0 auto; padding: 20px;'>
            <form action="tercih_listem.php" method='POST' id='form2'>
                <div class="container-fluid">
                    <div class="row">
                        <div style='width: 70%;' class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Puan Türü:</div>
                            <select class='form-select' name="point-type" id="pointType" required>
                                <option selected disabled>Puan Türü</option>
                                <option value='SAY'>SAY</option>
                                <option value='EA'>EA</option>
                                <option value='DİL'>DİL</option>
                                <option value='SÖZ'>SÖZ</option>
                                <option value='TYT'>TYT</option>
                            </select>
                        </div>
                        <div style='width: 70%;' class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Başarı Sıralaması:</div>
                            <input class='form-control' type="text" name="success-rate" id="successRate" placeholder='Başarı Sıralamanız' required>
                        </div>
                        <div style='width: 70%;' class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Puanınız:</div>
                            <input class='form-control' type="text" name="point" id="point" placeholder='Puanınız' required>
                        </div>
                    </div>
                    <div class="row">
                        <div style='width: 70%;' class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Adı Soyadı:</div>
                            <input class='form-control' type="text" name="name-surname" id="nameSurname" placeholder='Adınız Soyadınız' required>
                        </div>
                        <div style='width: 70%;' class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">E-Posta:</div>
                            <input class='form-control' type="text" name="email" id="email" placeholder='E-Postaniz' required>
                        </div>
                        <div style='width: 70%;' class="col-lg-4 col-sm-12 p-3">
                            <div class="text-dark">Cep Telefonu:</div>
                            <input class='form-control' type="tel" pattern='[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}' name="gsm-no" id="gsmNo" placeholder='Cep Telefonu' required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check mt-3 d-inline-flex p-2 justify-content-center">
                            <div style='font-size: 12px;' class="col-lg-3">
                                <input class="form-check-input" type="checkbox" id="contract" required>
                                <label class="form-check-label" for="contract">
                                    <a href="#ModalCenter" data-toggle='modal' >Sözleşmeyi</a> okudum, onaylıyorum.
                                </label>

                                <!-- Modal -->
                                <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLongTitle">KVKK Metni</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget erat sapien. Vestibulum dui nisl, tempor et consequat in,
                                            venenatis sed leo. Nullam et orci sed lorem egestas porta vel vitae purus.
                                            Vivamus non neque efficitur, pulvinar sapien sed, ultrices purus. Duis euismod accumsan orci. 
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" name='submitValuesToDb' id="mailList" form="form2" class="btn btn-dark btn-lg btn-block mt-5">Mailime Gönder!</button>
                    </div>
                </div>
            </form>
        </div>

        <?php

            if(isset($_POST['submitValuesToDb'])){
                if(!empty($_POST['point-type']) && !empty($_POST['success-rate']) && !empty($_POST['point']) && !empty($_POST['name-surname']) && !empty($_POST['email']) && !empty($_POST['gsm-no'])){
                    $pointType = $_POST['point-type'];
                    $successRate = $_POST['success-rate'];
                    $point = $_POST['point'];
                    $name = $_POST['name-surname'];
                    $email = $_POST['email'];
                    $gsm =  $_POST['gsm-no'];
                    
                    $sql = "INSERT INTO user (point_type, success_rating, points, names, email, gsm_number)
                    VALUES ('$pointType', '$successRate', '$point', '$name', '$email', '$gsm')";
                    
                    if (mysqli_query($conn, $sql)) {
                        //Response div
                    } else {
                        echo "<script> alert(Error: " . $sql . "<br>" . mysqli_error($conn) . "); </script>";
                    }
                    mysqli_close($conn);
                }
            }       
        ?>

        <div style="width: 3000px;" class='container mt-5 table-responsive'>
            <table style='font-family:"Courier New", Courier, monospace; font-size:70%;' id='myTableList' class='table content-table table-sortable table-bordered table-striped'><!--- data-pagination='true' data-mobile-responsive='true' data-page-size='20' data-click-to-select='' -->
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
                <tbody id='myTableBodyList'>
                    <!--- TODO MAKE THE LIST -->
                    <?php 
                            if (isset($_POST['id'])) {
                                $ids[] = $_POST['id'];
                                $arrLength = count($_POST['id']);

                                
                                #print_r($ids);
                            } else if(isset($_GET['id'])){
                                $get_ids = explode (",", $_GET['id']);
                                #print_r($get_ids);
                                $idsLength = count($get_ids);
                                print($idsLength);

                                for($i = 0; $i < $idsLength; $i++) {
                                    $id = $get_ids[$i];
                                    //$_SESSION["id"] .= $id;

                                    //setcookie('ids',$id,time()+60*60*24*365);
                                    // 'Force' the cookie to exists
                                    // $_COOKIE['ids'] = $id;
                                    //echo $id;
                                    $sql = "SELECT uni_name, department, program_code, point_type, coalesce(scholarship, 'Devlet') ,min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE program_code='$id'";
                                    //echo $sql;       
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
                                                "<td><button style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-minus-solid.svg'></button></td>"
                                                
                                                ."</tr>";
                
                                                $mail = new PHPMailer();
                                                $mail->IsSMTP();
                                                $mail->SMTPAuth = true;
                                                $mail->Host = 'smtp.gmail.com';
                                                $mail->Port = 587;
                                                $mail->SMTPSecure = 'tls';
                                                $mail->Username = 'totallytestmail@gmail.com';
                                                $mail->Password = 'test123test';
                                                $mail->SetFrom('totallytestmail@gmail.com');
                                                #$mail->AddReplyTo('you@somewhereelse.com');
                                                $mail->IsHTML(TRUE);


                                                // set the email address
                                                $mail->AddAddress($email, $name);

                                                $html = $html.<<<EOL
                                                <h1>Hoşgeldiniz işte listeniz..</h1>

                                                <table id='myTable' class='table content-table table-sortable table-bordered table-striped'>
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
                                                <tbody id='myTableBody'>
                                                    
                                                </tr>
                                                    <td>{$row['program_code']}.</td>
                                                    <td>{$row['uni_name']}.</td>
                                                    <td>{$row['department']}.</td>
                                                    <td>{$row['point_type']}.</td>
                                                    <td>{$row["coalesce(scholarship, 'Devlet')"]}.</td>
                                                    <td>{$row['min_point_2020']}.</td>
                                                    <td>{$row['min_point_2019']}.</td>
                                                    <td>{$row['success_order_2020']}.</td>
                                                    <td>{$row['success_order_2019']}.</td>
                                                </tr>
                                                EOL;
                                            }
                                            // add the content to the mail
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

                            if (!empty($ids) OR isset($_POST['action']))
                            {
                                for($i = 0; $i < $arrLength; $i++) {
                                    $id = $ids[0][$i];
                                    //$_SESSION["id"] .= $id;

                                    //setcookie('ids',$id,time()+60*60*24*365);
                                    // 'Force' the cookie to exists
                                    // $_COOKIE['ids'] = $id;
                                    //echo $id;
                                    $sql = "SELECT uni_name, department, program_code, point_type, coalesce(scholarship, 'Devlet') ,min_point_2020, min_point_2019, success_order_2020, success_order_2019 FROM sayfa2 WHERE program_code='$id'";
                                    //echo $sql;       
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
                                                "<td><button style='background-color: transparent; border: 0; width: 40px; height: 40px;' id=".$row['program_code']." onclick='changeImageAndAddList(this.id)'><img src='images/circle-minus-solid.svg'></button></td>"
                                                
                                                ."</tr>";
                
                                                $mail = new PHPMailer();
                                                $mail->IsSMTP();
                                                $mail->SMTPAuth = true;
                                                $mail->Host = 'smtp.gmail.com';
                                                $mail->Port = 587;
                                                $mail->SMTPSecure = 'tls';
                                                $mail->Username = 'totallytestmail@gmail.com';
                                                $mail->Password = 'test123test';
                                                $mail->SetFrom('totallytestmail@gmail.com');
                                                #$mail->AddReplyTo('you@somewhereelse.com');
                                                $mail->IsHTML(TRUE);


                                                // set the email address
                                                $mail->AddAddress($email, $name);

                                                $html = $html.<<<EOL
                                                <h1>Hoşgeldiniz işte listeniz..</h1>

                                                <table id='myTable' class='table content-table table-sortable table-bordered table-striped'>
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
                                                <tbody id='myTableBody'>
                                                    
                                                </tr>
                                                    <td>{$row['program_code']}.</td>
                                                    <td>{$row['uni_name']}.</td>
                                                    <td>{$row['department']}.</td>
                                                    <td>{$row['point_type']}.</td>
                                                    <td>{$row["coalesce(scholarship, 'Devlet')"]}.</td>
                                                    <td>{$row['min_point_2020']}.</td>
                                                    <td>{$row['min_point_2019']}.</td>
                                                    <td>{$row['success_order_2020']}.</td>
                                                    <td>{$row['success_order_2019']}.</td>
                                                </tr>
                                                EOL;
                                            }
                                            // add the content to the mail
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
                                if (isset($_POST['action'])) {
                                    // btnDelete 
                                    $mail->MsgHTML($html);
                                    // add alternate content 
                                    #$mail->AltBody($text);
                                    // send the mail
                                    if ($mail->Send()) {
                                        echo '<script>alert(Mail Başarıyla Gönderilmiştir, İyi günler dileriz.)</script>';
                                    } else {
                                        die("Uhoh, could not send to {$mail['email']}:" . $mail->ErrorInfo);
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
