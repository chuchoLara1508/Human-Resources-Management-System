<div class="paginador">
        <?php 
        if($total>=1){
            if($maximoPag>1){
                if(!($pagina)==0){
            ?>
        <a href="<?php
        if($_GET["pag"]==7){
        echo "?pag=7";
        }
        if($_GET["pag"]==8){
            echo "?pag=8";
        }
        ?>&pg=<?php
    
        if(($pagina-1)<0){
            echo 0;
        }
        else{
            echo $pagina-1; 
        }
         
         ?>&nomb=<?php echo $nom; ?>&puesto=<?php echo $nompues; ?>&grup=<?php echo $genero; ?>&pai=<?php echo $country; ?>&lvl=<?php echo $escolar; ?>&ord=<?php echo $op; ?>&cant=<?php echo $max; ?>">&larr;</a>
    
        <?php 
                }
            }
    
            $i=0;
            if($maximoPag>1){
            while($i<$maximoPag){
                ?>
            <a href="<?php
        if($_GET["pag"]==7){
        echo "?pag=7";
        }
        if($_GET["pag"]==8){
            echo "?pag=8";
        }
        ?>&pg=<?php echo $i; ?>&nomb=<?php echo $nom; ?>&puesto=<?php echo $nompues; ?>&grup=<?php echo $genero; ?>&pai=<?php echo $country; ?>&lvl=<?php echo $escolar; ?>&ord=<?php echo $op; ?>&cant=<?php echo $max; ?>"><?php echo $i+1; ?></a>
        <?php
        $i++;
                }
            }
            if($maximoPag>1){
                if(!($pagina+1==$maximoPag)){
        ?>
    
        
        <a href="<?php
        if($_GET["pag"]==7){
        echo "?pag=7";
        }
        if($_GET["pag"]==8){
            echo "?pag=8";
        }
        ?>&pg=<?php
        if(($pagina+1)>=$maximoPag){
            echo $maximoPag-1;
        }
        else{
            echo $pagina+1; 
        }
         ?>&nomb=<?php echo $nom; ?>&puesto=<?php echo $nompues; ?>&grup=<?php echo $genero; ?>&pai=<?php echo $country; ?>&lvl=<?php echo $escolar; ?>&ord=<?php echo $op; ?>&cant=<?php echo $max; ?>">&rarr;</a>
         <?php
                }
            }
        }
        ?>
</div>