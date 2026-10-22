
<?php 

// Helps the IDE recognize the variable type. No effect at runtime.
/** @var string $title */
?>

<h1><?= $title ?></h1>

<p>Your first view is now dynamic.</p>
<?php require __DIR__ . '/../partials/welcome.php'; ?>

