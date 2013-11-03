<div class="image_list">
    
    <?php
        if (!empty($data)) {
            foreach ($data as $image) {
                echo $image[0];
                echo '&nbsp;';
                echo $image[1];
                echo '&nbsp; ';
                echo $image[2]; 
                echo '<br />';
            }
        }
        
        ?>

</div> 