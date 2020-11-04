
    <?php include("topbit.php");

    $app_name = $_POST['app_name'];
    $dev_name = $_POST['dev_name'];
    $genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);



        $find_sql = "SELECT * FROM `L2_prac_game_detail` JOIN `L2_prac_genre` ON (`L2_prac_game_detail`.`GenreID`=`L2_prac_genre`.`GenreID`) JOIN `L2_db_prac_developer` ON (`L2_prac_game_detail`.`DeveloperID`=`L2_db_prac_developer`.`DevID`) WHERE `Name` LIKE '%$app_name%' 
        AND `Developer Name` LIKE '%$dev_name%'
        AND `Genre` LIKE '%$genre%'
        AND `Price` <= '$cost'
        ";

        $find_query = mysqli_query($dbconnect, $find_sql);
        $find_rs = mysqli_fetch_assoc($find_query);
        $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>All Results</h2>
            
            <?php 
            include ("results.php");
            ?>
            
        </div> <!-- / main -->

    <?php include("bottombit.php") ?>
