<h1>Liste des items</h1>

<?php var_dump($items); ?>

<ul>
    <?php foreach($items as $item): ?>

        <li><?= $item->name; ?></li>

    <?php endforeach; ?>
</ul>

