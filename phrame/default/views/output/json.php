<?php $_VIEW->contentType(View::JSON); ?>
<?=json_encode($_VAR->getAll())?>