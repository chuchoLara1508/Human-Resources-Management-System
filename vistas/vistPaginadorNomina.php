<div class="paginador">
        <?php 
        if($total>=1){
            if($maximoPag>1){
                if(!($pagina)==0){
            ?>
        <a href="<?php
        if($_GET["pag"]==11){
        echo "?pag=11";
        }
        if($_GET["pag"]==12){
            echo "?pag=12";
        }
        if($_GET["pag"]==13){
            echo "?pag=13";
        }
        ?>&pg=<?php
    
        if(($pagina-1)<0){
            echo 0;
        }
        else{
            echo $pagina-1; 
        }
         
         ?>&nom=<?php echo $nombre; ?>&pues=<?php echo $nompuesto; ?>&di=<?php echo $dia; ?>&ord=<?php echo $op; ?>&cant=<?php echo $max; ?>">&larr;</a>
    
        <?php 
                }
            }
    
            $i=0;
            if($maximoPag>1){
            while($i<$maximoPag){
                ?>
            <a href="<?php
        if($_GET["pag"]==11){
            echo "?pag=11";
            }
            if($_GET["pag"]==12){
                echo "?pag=12";
            }
            if($_GET["pag"]==13){
                echo "?pag=13";
            }
        ?>&pg=<?php echo $i; ?>&nom=<?php echo $nombre; ?>&pues=<?php echo $nompuesto; ?>&di=<?php echo $dia; ?>&ord=<?php echo $op; ?>&cant=<?php echo $max; ?>"><?php echo $i+1; ?></a>
        <?php
        $i++;
                }
            }
            if($maximoPag>1){
                if(!($pagina+1==$maximoPag)){
        ?>
    
        
        <a href="<?php
        if($_GET["pag"]==11){
            echo "?pag=11";
            }
            if($_GET["pag"]==12){
                echo "?pag=12";
            }
            if($_GET["pag"]==13){
                echo "?pag=13";
            }
        ?>&pg=<?php
        if(($pagina+1)>=$maximoPag){
            echo $maximoPag-1;
        }
        else{
            echo $pagina+1; 
        }
         ?>&nom=<?php echo $nombre; ?>&pues=<?php echo $nompuesto; ?>&di=<?php echo $dia; ?>&ord=<?php echo $op; ?>&cant=<?php echo $max; ?>">&rarr;</a>
         <?php
                }
            }
        }
        ?>
</div>
