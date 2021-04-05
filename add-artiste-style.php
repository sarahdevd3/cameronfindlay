<?php include('partials-front/menu.php'); ?>

      <!-- main section starts !-->
      <div class="main-content">
      <div class="wrapper">
       <h1>Associer artistes et styles</h1>
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

<form method="post" >

     

        <td> <select name="asso_art_id">
        <?php
        $sql = "SELECT * FROM artists";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
            $artist_id= $row['artist_id'];
            $artist_name= $row['artist_name'];
            ?>
            <option value="<?php echo $artist_id; ?>" ><?php echo $artist_name ?> </option>
<?php


        
    }
}
    
        else
        {
            ?>
            <option value="0"> Not found </option>
            <?php
        }

        ?>

    
             
         
                <td> <select name="asso_styl_id">
                <?php
                $sql = "SELECT * FROM styles";
        
                $res = mysqli_query($conn, $sql);
        
                $count = mysqli_num_rows($res);
        
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                    $style_id= $row['style_id'];
                    $style_name= $row['style_name'];
                    ?>
                    <option value="<?php echo $style_id; ?>" ><?php echo $style_name ?> </option>
        <?php
        
        
                
            }
        }
            
                else
                {
                    ?>
                    <option value="0"> Not found </option>   
                    <?php
                }

                ?>
                  
</select>

    <button type="submit" name= "submit" value= "submit">ASSOCIER</button>

</form>

<?php

                if(isset($_POST['submit']))
                {
                    //echo "clicked";
                    $asso_art_id= $_POST['asso_art_id'];
                    $asso_styl_id= $_POST['asso_styl_id'];
                 
                   
               

                $sql3 = "INSERT IGNORE INTO assoc_art_styl SET
                asso_art_id ='$asso_art_id',
                asso_styl_id ='$asso_styl_id'
              
                ";
                //execute
    $res3 = mysqli_query($conn, $sql3);
    

    if($res3==true)
    {
        //category updated

        $_SESSION['add'] = "<div class='success'>  modifié <div>";
        //redirect
       
      
    }
    else
    {
        //failed
        $_SESSION['add'] = "<div class='error'> non modifié<div>";
        //redirect
       
      
    }

                
                }
        ?>
           
    </div>
</div>
    <!-- main section ends !-->
    

<?php include('partials-front/footer.php'); ?>
