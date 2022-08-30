<div class="paginador">
    <?php 
        if($total>=1){
            if($maximoPag>1){
                if(!($pagina)==0){
            ?>
        <a href="<?php
        if($_GET["pag"]==14){
        echo "?pag=14";
        }
        if($_GET["pag"]==15){
            echo "?pag=15";
        }
        ?>&pg=<?php
    
        if(($pagina-1)<0){
            echo 0;
        }
        else{
            echo $pagina-1; 
        }
         
         ?>&roli=<?php echo urlencode($nomrol);?>&modul=<?php echo urlencode($nomodu); ?>">&larr;</a>
        <?php 
                }
            }
    
            $i=0;
            if($maximoPag>1){
            while($i<$maximoPag){
                ?>
            <a href="<?php
        if($_GET["pag"]==14){
        echo "?pag=14";
        }
        if($_GET["pag"]==15){
            echo "?pag=15";
        }
        ?>&pg=<?php echo $i; ?>&roli=<?php echo urlencode($nomrol);?>&modul=<?php echo urlencode($nomodu); ?>"><?php echo $i+1; ?></a>
        <?php
        $i++;
                }
            }
            if($maximoPag>1){
                if(!($pagina+1==$maximoPag)){
        ?>
    
        
        <a href="<?php
        if($_GET["pag"]==14){
        echo "?pag=14";
        }
        if($_GET["pag"]==15){
            echo "?pag=15";
        }
        ?>&pg=<?php
        if(($pagina+1)>=$maximoPag){
            echo $maximoPag-1;
        }
        else{
            echo $pagina+1; 
        }
         ?>&roli=<?php echo urlencode($nomrol);?>&modul=<?php echo urlencode($nomodu); ?>">&rarr;</a>
         <?php
                }
            }
        }
        ?>
</div>
