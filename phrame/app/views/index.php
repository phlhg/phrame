<?php $_VIEW->add("phrame/section/header"); ?>
    <h1>Welcome to PHRAME<img src="/phramer/img/icons/frame.svg"/></h1>
    <p>PHRAME is a lighweight PHP-framework for creating websites</p>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" multiple name="test[]"/><br/><br/>
        <input type="submit" value="Hochladen"/>
    </form>
    <pre><?=$_VAR->get("output")?></pre>
<?php $_VIEW->add("phrame/section/footer"); ?>