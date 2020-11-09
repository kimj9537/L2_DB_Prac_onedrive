
    <?php include("topbit.php");

    $app_name = $_POST['app_name'];
    $dev_name = $_POST['dev_name'];
    $genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);

    // In App Purchases...
    if (isset($_POST['in_app'])) {
        $in_app = 0;
        
    }

    else {
        $in_app = 1;
        
    }

    // Ratings
    $rating_more_less = mysqli_real_escape_string($dbconnect, $_POST['rate_more_less']);
    $rating = mysqli_real_escape_string(dbconnect, $_POST['rating']);

    if () {}
    elseif() {}
    else {} // end rating if /elseif / else

    $find_sql = "SELECT * FROM `L2_prac_game_detail` JOIN `L2_prac_genre` ON (`L2_prac_game_detail`.`GenreID`=`L2_prac_genre`.`GenreID`) JOIN `L2_db_prac_developer` ON (`L2_prac_game_detail`.`DeveloperID`=`L2_db_prac_developer`.`DevID`) WHERE `Name` LIKE '%$app_name%' 
    AND `Developer Name` LIKE '%$dev_name%'
    AND `Genre` LIKE '%$genre%'
    AND `Price` <= '$cost'
    AND (`Purchases?` = $in_app OR `Purchases?` = 0)
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
