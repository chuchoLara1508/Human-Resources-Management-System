<div class="paginador">
        <?php 
        if($total>=1){
            if($maximoPag>1){
                if(!($pagina)==0){
            ?>
        <a href="<?php
        if($_GET["pag"]==5){
        echo "?pag=5";
        }
        if($_GET["pag"]==6){
            echo "?pag=6";
        }
        ?>&pg=<?php
    
        if(($pagina-1)<0){
            echo 0;
        }
        else{
            echo $pagina-1; 
        }
         
         ?>&nomb=<?php echo $pal; ?>&pgo=<?php echo $pago; ?>&ord=<?php echo $ordena; ?>&cant=<?php echo $max; ?>">&larr;</a>
    
        <?php 
                }
            }
    
            $i=0;
            if($maximoPag>1){
            while($i<$maximoPag){
                ?>
            <a href="<?php
        if($_GET["pag"]==5){
        echo "?pag=5";
        }
        if($_GET["pag"]==6){
            echo "?pag=6";
        }
        ?>&pg=<?php echo $i; ?>&nomb=<?php echo $pal; ?>&pgo=<?php echo $pago; ?>&ord=<?php echo $ordena; ?>&cant=<?php echo $max; ?>"><?php echo $i+1; ?></a>
        <?php
        $i++;
                }
            }
            if($maximoPag>1){
                if(!($pagina+1==$maximoPag)){
        ?>
    
        
        <a href="<?php
        if($_GET["pag"]==5){
        echo "?pag=5";
        }
        if($_GET["pag"]==6){
            echo "?pag=6";
        }
        ?>&pg=<?php
        if(($pagina+1)>=$maximoPag){
            echo $maximoPag-1;
        }
        else{
            echo $pagina+1; 
        }
         ?>&nomb=<?php echo $pal; ?>&pgo=<?php echo $pago; ?>&ord=<?php echo $ordena; ?>&cant=<?php echo $max; ?>">&rarr;</a>
         <?php
                }
            }
        }
        ?>
</div>
