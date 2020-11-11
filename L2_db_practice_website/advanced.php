
    <?php include("topbit.php");

    $app_name = $_POST['app_name'];
    $dev_name = $_POST['dev_name'];
    $genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);

    // Cost code (to handle when cost is not specified...)
    if ($cost=="") {
        $cost_op = ">=";
        $cost = 0;
    }
    else {
        $cost_op = "<=";
    }

    // In App Purchases...
    if (isset($_POST['in_app'])) {
        $in_app = 0;
        
    }

    else {
        $in_app = 1;
        
    }

    // Ratings
    $rating_more_less = mysqli_real_escape_string($dbconnect, $_POST['rate_more_less']);
    $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);

    if ($rating_more_less == "at least") {
        $rate_op = ">=";
    }

    elseif($rating_more_less == "at most") {
        $rate_op = "<=";
    }

    elseif ($rating_more_less == "") {
        $rate_op = ">=";
        $rating = 0;
        
    } // end rating if /elseif / else

        // Ages...
    $age_more_less = mysqli_real_escape_string($dbconnect, $_POST['age_more_less']);
    $age = mysqli_real_escape_string($dbconnect, $_POST['age']);


    if ($age_more_less == "at least") {
        $age_op = ">=";
    }

    elseif($age_more_less == "at most") {
        $age_op = "<=";
    }



    $find_sql = "SELECT * FROM `L2_prac_game_detail` JOIN `L2_prac_genre` ON (`L2_prac_game_detail`.`GenreID`=`L2_prac_genre`.`GenreID`) JOIN `L2_db_prac_developer` ON (`L2_prac_game_detail`.`DeveloperID`=`L2_db_prac_developer`.`DevID`) WHERE `Name` LIKE '%$app_name%' 
    AND `Developer Name` LIKE '%$dev_name%'
    AND `Genre` LIKE '%$genre%'
    AND `Price` $cost_op '$cost'
    AND (`Purchases?` = $in_app OR `Purchases?` = 0)
    AND `Average User Rating` $rate_op $rating
    AND `Age Rating` $age_op $age
    
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
