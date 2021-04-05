<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
       <h1>Artistes et styles</h1>
      <br><br><br>
   <?php   
   
      if(isset($_SESSION['add']))
{
      echo $_SESSION['add']; //display the message
      unset($_SESSION['add']); //remove the message
}
?>
<br><br>
       <br> <br><br><br>
        <table class= "tbl-full">

    <tr>
    <th> Nom </th>
    <th> Style </th>
    </tr>
    <a href="add-artiste-style.php" class="btn-secondary"> Lier un style à un artiste </a>
<br><br>
    <?php
            $sql = "SELECT `assoc_art_styl`.*, `artists`.*, `styles`.*
            FROM `assoc_art_styl` 
                  JOIN `artists` ON `assoc_art_styl`.`asso_art_id` = `artists`.`artist_id` 
                  JOIN `styles` ON `assoc_art_styl`.`asso_styl_id` = `styles`.`style_id`;";


            $res = mysqli_query($conn,$sql);


      if($res==TRUE){
//count rows to check wether we have data or not
      $count = mysqli_num_rows($res);//function to get all the rows in database
      
      $sn=1; //create a variable and assign the value



     
      //check the num of rows
      if($count>0)
      {



            //we have data in database
            while ($rows= mysqli_fetch_assoc($res)){

                  //using while loop to get all the data from database
               //and while loop will run as long as we have data in database

               //get individual dat
                        $id=$rows['artist_id'];
                        $artist_name=$rows['artist_name'];
                        $style_name=$rows['style_name'];
                        $asso_art_id=$rows['asso_art_id'];
                        $asso_styl_id=$rows['asso_styl_id'];
                      

               //Display the values in our table
               ?>



<tr>


    
    <td> <?php echo $artist_name ?> </td>
    <td> <?php echo $style_name ?> </td>

    <td> 
    <td>  
    </td>
    </tr>
               <?php

            }
      }
      
}  
    ?>

    
        </table>
      </form>     
    </div>
</div>
    <!-- main section ends !-->
    

    

    <?php include('partials-front/footer.php'); ?>
