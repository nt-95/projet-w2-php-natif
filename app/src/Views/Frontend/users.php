<h1>Liste des utilisateurs</h1>
<div class="container">
  <div class="row">
    <div class="col-12">
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
                <button type="button" class="btn btn-primary">Mettre admin<i class="far fa-eye"></i></button>
                <button type="button" class="btn btn-danger">Supprimer<i class="far fa-trash-alt"></i></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>