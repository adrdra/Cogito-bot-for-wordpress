<?php
  $pages = json_decode( explode( 'pages=', urldecode( current_url() ) )[1] );
?>

<div class="modal-title">
  <h3>Selectionnez votre page Facebook</h3>
</div>

<div class="modal-content">
  <div class="select-page" data-id= "<?php echo $_GET["cogito_id"] ?>">
    <div class="page-items row">
      <?php foreach ($pages as $page) { ?>
        <?php if ( in_array( 'ADMINISTER', $page->perms ) ) : ?>
          <div class="page-item col-md-3">
            <span class="border">
              <div
                class="page-icon img-background"
                id="<?php echo $page->id ?>"
                data-token="<?php echo $page->access_token ?>"
                style="background-image: url(<?php echo "http://graph.facebook.com/v2.6/{$page->id}/picture" ?>)">
              </div>
              <h4><?php echo $page->name ?></h4>
            </div>
          </span>
        <?php endif; ?>
      <?php } ?>
    </div>
  </div>

  <a href="#" class="request-page-subscription">
    <span class="btn-select-page btn btn-unactive">Connecter la page</span>
  </a>
</div>
