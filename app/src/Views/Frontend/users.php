<head>
    <link rel="stylesheet" href="projet-w2-php-natif\app\src\Views\Frontend\users.php"/>
</head>

<body>
    <h1>Liste des utilisateurs</h1>
    <div class="container">
    <div class="row">
        <div class="col-8">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Admin</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                    foreach ($users as $user) :
                        ?>
                        <td><?= $user->getUserName(); ?></td>
                        <td><?= $user->getAdmin(); ?><td>
                    <?php endforeach; ?>
                <td>
                    <form name="x" action="remove?param=<?= $user->getIdUser(); ?>" method="post">
                        <input class="btn btn-danger" type="submit" value="delate"><i class="far fa-trash-alt"></i>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</body>