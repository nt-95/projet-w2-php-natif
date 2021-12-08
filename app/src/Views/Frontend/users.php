<h1>Liste des utilisateurs</h1>
<?php
foreach ($vars as $users) :
    ?>
    <div>
        <h2><?= $users getFirstname();?></h2>
        <p><?= $users getLastName();?><p>
        <p><?= $users getEmail();?><p>
        <p><?= $users getRole();?><p>
    </div>
<?php endforeach; ?>