<?php
  $pages = json_decode( explode( 'pages=', urldecode( current_url() ) )[1] );
?>

<div class="modal-title">
  <h3>Selectionnez votre page Facebook</h3>
</div>

<div class="modal-content">
  <div class="select-page">
    <div class="page-items">
      <?php foreach ($pages as $page) { ?>
        <?php if ( in_array( 'ADMINISTER', $page->perms ) ) : ?>
          <div class="page-item">
            <div
              class="page-icon img-background"
              id="<?php echo $page->id ?>"
              data-token="<?php echo $page->access_token ?>"
              style="background-image: url(<?php echo "http://graph.facebook.com/v2.6/{$page->id}/picture" ?>)">
            </div>
            <span><?php echo $page->name ?></span>
          </div>
        <?php endif; ?>
      <?php } ?>
    </div>
  </div>

  <a href="#">
    <span class="btn">Connecter la page</span>
  </a>
</div>
