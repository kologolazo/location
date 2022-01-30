<?php
include_once('./classes/Model.php');
if (!$_SESSION) {
    header('location:accueil.php');
} else {
?>

    <?php
    include_once("entete.php");
    ?>
    <div class="contenu">

        <div class="ligne" style="margin-top: 80px;">
            <div class="ligne">
                <div class="pos-3">

                </div>
                <div class="pos-6">
                    <h4>Enregistrement véhicule</h4>
                </div>
            </div>
            <div class="ligne">
                <div class="pos-3"></div>

                <div class="pos-6" style="background-color: #e6e9ed; padding-bottom: 25px;padding-top: 25px;">

                    <form action="./controller/traitement_vehicule.php" method="post" id="">
                        <div class="ligne">
                            <label for="immatriculation" class="pos-3 control-label">Immatriculation :</label>
                            <input id="immatriculation" name="immatriculation" type="text" class="pos-8 inputbox" required />
                        </div>

                        <div class="ligne">
                            <label for="marque" class="pos-3 control-label">Marque :</label>
                            <input id="marque" name="marque" type="text" class="pos-8 inputbox" required />
                        </div>

                        <div class="ligne">
                            <label for="couleur" class="pos-3 control-label">Couleur :</label>
                            <input id="couleur" name="couleur" type="text" class="pos-8 inputbox" required />
                        </div>

                        <div class="ligne" style="margin-left: 200px;">
                            <input type="submit" name="submit" class="pos-6 button" value="Enregistrer" />

                        </div>

                    </form>
                </div>
                <div class="pos-3"></div>
            </div>
        </div>
    </div>
    </div>
    <div id="piedpage">
    </div>
    </body>

    </html>

<?php
}
?>