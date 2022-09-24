<main id="main" class="main">

    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Admin</a></li>
                <li class="breadcrumb-item <?=$breadcrumb_active[0]?>"><a href="#"><?=$breadcrumb[0]?></a></li>
                <?php if ($breadcrumb[1]!=null) { ?>
                <li class="breadcrumb-item <?=$breadcrumb_active[1]?>"><?=$breadcrumb[1]?></li>
                <?php } ?>
            </ol>
        </nav>
    </div>

    <?= view($view['pages'].$page)?>

</main>