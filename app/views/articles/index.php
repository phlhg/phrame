<?php $_VIEW->add("phrame/section/header"); ?>
    <h1>Articles</h1>
    <?php foreach($_VAR->get("articles") as $article){ ?>
        <a href="/article/<?=$article->id?>/name/"><?=$article->title?></a><br/><br/>
    <?php } ?>
<?php $_VIEW->add("phrame/section/footer"); ?>