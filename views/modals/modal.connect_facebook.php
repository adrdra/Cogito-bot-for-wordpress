<div class="modal-title bg-blue">
  <h3>Connecter Cogito à Facebook</h3>
</div>

<div class="modal-content row">
  <div class="facebook-connect-instruction col-md-6">
    <ul>
      <li><span>1.</span>
        <a href="admin.php?page=wc-settings&tab=api" target="_blank">Cliquez ici</a> pour vous rendre dans les configurations de votre plugin WooCommerce, <strong>vérifier que l'API Rest est bien activée</strong>.
      </li>
      <li><span>2.</span>
        <a href="admin.php?page=wc-settings&tab=api&section=keys" target="_blank">Cliquez ici</a> pour vous rendre dans la rubrique "Clés/App" pour créer votre clé d'API.
      </li>
      <li><span>3.</span> Ajouter une nouvelle clé d'API.</li>
      <li><span>4.</span> Renseignez une description (exemple : <strong>Api Cogito</strong>) et sélectionnez les permissions <strong>"Lecture/Écriture"</strong>. Puis générer une nouvelle clé d'API.</li>
      <li><span>5.</span> <strong>Copier/Coller</strong> votre <strong>clé Client</strong> et votre <strong>clé Secret</strong> dans les champs à droite.</li>
    </ul>
    <a href="#" class="btn-tuto btn-transition"><span class="btn-white">Consulter notre vidéo tutoriel</span></a>
  </div>
  <div class="facebook-connect-form col-md-6">
    <div class="bg-grey center">
      <h3 class="color-blue">Clé client API WooCommerce</h3>
      <form class="form-facebook" action="<?php echo get_site_url() . COGITOBOT_SUBSCRIBE_APP_ROUTE ?>" method="get">
        <input type="text" name="consumerKey" value="" placeholder="Clé Client - WooCommerce">
        <input type="text" name="consumerSecret" value="" placeholder="Clé Secret - WooCommerce">
        <input class="btn-input btn-transition" type="submit" name="coonect-facebook" value="Se Connecter avec Facebook">
      </form>
    </div>
  </div>
</div>
