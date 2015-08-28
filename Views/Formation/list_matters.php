<nav>   
    <ul>
        
        <li><a href="index.php?c=Formation">Formation</a></li>
        <li><a href="index.php?c=FormationSession">Sessions de Formation</a></li>           
        <li><a href="index.php?c=Matter&a=edit">Ajouter des matières</a></li>  
                
    </ul>
</nav>
<div class="col-md-12">
        <?php                   
            //faire une boucle qui va, pour chaque itération, afficher le contenu du n-ième objet
            for ($i=0; $i < count($coll_matters); $i++):              
        ?>                      
                <div class="col-md-2">
                    <?php  echo $coll_matters[$i]->getData('title'); ?>
                </div>
                <div class="col-md-2">
                    <a href="index.php?c=Formation&a=edit&id=<?= $coll_matters[$i]->getData('id'); ?>">Modifer</a>
                </div>
                <div class="col-md-2">                  
                    <a href="index.php?c=Formation&a=delete&id=<?= $coll_matters[$i]->getData('id'); ?>">Supprimer</a>
                </div>              
        <?php   
            endfor;
        ?>

</div>