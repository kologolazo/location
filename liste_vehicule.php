<?php
include_once("./classes/Model.php");
include_once("entete.php");
?>

<div class="contenu">
    <?php
    if ($_SESSION['idProfil'] == 1 || $_SESSION['idProfil'] == 2) {
    ?>
        <div class="ligne" style="margin-left: 30%;">
            <div class="pos-1">
                <button type="button" class="button">
                    <a href="enregistrerVehicule.php">nouveau</a>
                </button>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="ligne" style="margin-left: 25%;">

        <table>
            <thead>
                <tr>
                    <th>Immatricule</th>
                    <th>Marque</th>
                    <th>Couleur</th>
                    <?php
                    if ($_SESSION['idProfil'] == 1 || $_SESSION['idProfil'] == 2) {
                    ?>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    <?php
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $vehicules = Vehicule::Afficher();
                foreach ($vehicules as $vehicule) {
                ?>
                    <tr>
                        <td><?php echo $vehicule["immatriculation"]; ?></td>
                        <td><?php echo $vehicule["marque"]; ?></td>
                        <td><?php echo $vehicule["couleur"]; ?></td>
                        <?php
                        if ($_SESSION['idProfil'] == 1 || $_SESSION['idProfil'] == 2) {
                        ?>
                            <td> <a href="modifierVehicule.php?clef=<?php echo $vehicule["idVehicule"]; ?>">Modifier</a></td>
                            <td><a href="supvehicule.php?clef=<?php echo $vehicule["idVehicule"]; ?>">Supprimer</a></td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            </tr>
        </table>
    </div>
</div>