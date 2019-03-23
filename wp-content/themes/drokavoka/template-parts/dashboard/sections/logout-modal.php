<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <?=__("Prêt à partir?")?>
            </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <?=__("Sélectionnez 'Déconnexion' ci-dessous si vous êtes prêt à mettre fin à votre session en cours.")?>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
                <?=__("Annuler")?>
            </button>
            <button class="btn btn-primary" id="dashboard-logout">
                <?=__("Déconnexion")?>
            </button>
        </div>
    </div>
    </div>
</div>