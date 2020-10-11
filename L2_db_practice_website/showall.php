
    <?php include("topbit.php");



        $find_sql = "SELECT * FROM `L2_prac_game_detail` JOIN `L2_prac_genre` ON (`L2_prac_game_detail`.`GenreID`=`L2_prac_genre`.`GenreID`) JOIN `L2_db_prac_developer` ON (`L2_prac_game_detail`.`DeveloperID`=`L2_db_prac_developer`.`DevID`)";

        $find_query = mysqli_query($dbconnect, $find_sql);
        $find_rs = mysqli_fetch_assoc($find_query);
        $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>All Results</h2>
            
            <?php
            
            if($count < 1) {
                
                ?>
            <div class="error"></div>
            
                Sorry! There are no results that match your search.
                Please use the search box in the side bar to try again.
            
            <div/> <!-- end error -->
            
            <?php
            } // end no results if 
            
            else {
                do {
                    
                    ?>
            
            <!-- Results go here -->
            <div class="results">
                
                <!-- Heading and subtitle -->
                
                <div class="flex-container">
                    <div>
                        <span class="sub_heading">
                            <a href="<?php echo $find_rs['URL']; ?> ">
                                <?php echo $find_rs['Name']; ?>
                            </a>
                        </span>
                    </div> <!-- / Title -->
                    
                    <?php 
                        if($find_rs['Subtitle'] != "") 
                        
                        {
                            
                        ?>
                    <div>
                        
                        &nbsp; &nbsp; | &nbsp; &nbsp;
                        
                        <?php echo $find_rs[''] ?>
                        
                    </div> <!-- / subtitle -->
                    
                    <?php
                            
                        }
                    ?>
                    
                    
                </div>
                <!-- / Heading and subtitle -->
                
                <!-- Price -->
                
            <?php 
                
               if(find_rs['Price'] == 0) {    
                    ?>
               <p>
                   
                   Free
                   <?php 
                        if($find_rs['In App'] == 1) 
                        {
                            ?>
                                (In App Purchase)
                            <?php
                            
                        } // end In App if
                   ?>
                   (In app Purchase)
                   
                </p>
                
               <?php
               } // end price if
                    
               else {
                   
                   ?>
               <b>Price:</b> $<?php echo $find_rs['Price'] ?>
                   
               <?php
                   
               }
            
            ?>

            </div> <!-- / results -->
            
            <br />

            <?php
                    
                }  // end results 'do'
                
                while 
                    ($find_rs=mysqli_fetch_assoc($find_query));
                
            } // end else
            
            ?>
            
            

        </div> <!-- / main -->

    <?php include("bottombit.php") ?>
