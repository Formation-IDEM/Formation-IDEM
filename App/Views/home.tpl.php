<h1>Page d'accueil</h1>

<ul>
    <?php foreach($items as $item): ?>
    <li><a href="<?= url('companies/' . $item->id); ?>"><?= $item->name; ?></a></li>
    <?php endforeach; ?>
</ul>