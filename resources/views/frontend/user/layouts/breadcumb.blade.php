<h6 class="h4 text-white d-inline-block mb-0"><?= (isset($title))? $title : '' ?></h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
        <?php if(isset($links)){ ?>

        <?php foreach ($links as $key => $link){ ?>
        <li class="breadcrumb-item"><a href="<?= $key ?>"><?= $title ?></a></li>
        <?php }  ?>
        <?php } ?>
    </ol>
</nav>
