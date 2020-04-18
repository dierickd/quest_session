<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>

<?php

if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
   header('Location: login.php');
   exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['cookie']))) {
   setcookie('theCookieFactory_' . $_SESSION['auth'] . '_' . $_POST['cookie'], '', time());
   header('Location: cart.php?delete=l\'article à bien été supprimé');
}

?>

<section class="cookies container">
    <?php if (isset($_GET['delete']) && !empty(trim($_GET['delete']))): ?>
        <div class="alert alert-success">
            <p><?= htmlentities($_GET['delete']) ?></p>
        </div>
    <?php endif; ?>
    <table class="table table-stripped">
        <thead>
        <tr>
            <th>Article</th>
            <th>Name</th>
            <th>info</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($_COOKIE as $cookieCart => $idCart): ?>
           <?php if ($cookieCart === 'theCookieFactory_' . $_SESSION['auth'] . '_' . $idCart): ?>
                <tr>
                    <td>
                        <img style="height: 100px;" src="assets/img/product-<?= $idCart ?>.jpg" alt="<?= $catalog[$idCart]['name'] ?>"
                             class="img-responsive">
                    </td>
                    <td><?= $catalog[$idCart]['name'] ?></td>
                    <td><?= $catalog[$idCart]['description'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="cookie" value="<?= $idCart ?>">
                            <button class="btn btn-primary">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
           <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php require 'inc/foot.php'; ?>
