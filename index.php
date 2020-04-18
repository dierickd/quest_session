<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['cookie']))) {
   setcookie('theCookieFactory_' . $_SESSION['auth'] . '_' . $_POST['cookie'], $_POST['cookie'], time() + 30 * 24 * 3600, null, null, false, true);
   header('Location: login.php');
}
?>

<section class="cookies container-fluid">
    <div class="row">
       <?php foreach ($catalog as $id => $cookie) { ?>
           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
               <figure class="thumbnail text-center">
                   <img src="assets/img/product-<?= $id ?>.jpg" alt="<?= $cookie['name'] ?>" class="img-responsive">
                   <figcaption class="caption">
                       <h3><?= $cookie['name'] ?></h3>
                       <p><?= $cookie['description'] ?></p>
                       <form action="" method="post">
                           <input type="hidden" name="cookie" value="<?= $id ?>">
                           <button class="btn btn-primary">
                               <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                           </button>
                       </form>
                   </figcaption>
               </figure>
           </div>
       <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
