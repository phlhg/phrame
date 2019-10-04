<?php $_VIEW->add("phrame/section/header"); ?>
    <p><?=date("d.m.Y H:i",$_VAR->get("date"))?></p>
    <h1><?=$_VAR->get("title")?></h1>
    <p><?=$_VAR->get("content")?></p>
<?php $_VIEW->add("phrame/section/footer"); ?>