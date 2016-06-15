<?php setlocale(LC_TIME, "fr_FR"); ?>

<div class="cogito-layout">
  <div
    class="cogito-banner img-background"
    style="background-image: url(<?php echo COGITO_BOT__PLUGIN_URL . 'assets/img/bandeau.png' ?>)">

    <div
      class="cogito-logo img-background"
      style="background-image: url(<?php echo COGITO_BOT__PLUGIN_URL . 'assets/img/logo.png' ?>)">

    </div>
    <h1 class="center">Améliorer l'expérience de recherche et le taux de succès de votre site e-commerce</h1>
  </div>

  <div class="cogito-panel">
    <h2 class="title-panel">Statistiques Cogito</h2>
    <span class="date-panel"><?php echo strftime("%A %d %B %Y"); ?></span>

    <div class="stats-panel">

    </div>

    <div class="cards-panel">
      <div class="">

      </div>

      <div class="">

      </div>

      <div class="">

      </div>
    </div>
  </div>
</div>

<?php if ( $_GET['action'] == 'select_page' || $_GET['action'] == 'subscribe_to_cogito' ) : ?>
  <div class="modal-mask">

  </div>

  <div class="modal center">
    <?php
      switch ( $_GET['action'] ) {
        case 'select_page':
          include_once( 'modals/modal.select_facebook_page.php' );
          break;
        default:
          include_once( 'modals/modal.connect_facebook.php' );
          break;
      }
     ?>
  </div>
<?php endif; ?>
