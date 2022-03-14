<div class="row">        
        <h3><?= $view_bag['title']; ?></h3>
<?php
    $data = str_replace( '&', '&amp;', $view_bag['body'] );
?>
<div><?= $data; ?></div>
</div>

