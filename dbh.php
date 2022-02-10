
    <?php
        define('DB_HOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '112358');
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