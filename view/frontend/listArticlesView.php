<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>

<h1>Jean Forteroche</h1>
<p>Derniers chapitres:</p>


<?php
while ($data = $articles->fetch())
{
?>
    <h3>
        <a href="index.php?action=article&id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a>
    </h3>
<?php
}
$articles->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>