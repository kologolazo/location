<?php
include_once("./classes/Model.php");
include_once("entete.php");
?>

<div class="contenu">
  <div class="ligne" style="margin-left: 30%;">
    <div class="pos-1">
      <button type="button" class="button">
        <a href="register.php">nouveau</a>
      </button>
    </div>
  </div>
  <div class="ligne" style="margin-left: 25%;">
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Sexe</th>
          <th>Téléphone</th>
          <th>Profil</th>
          <th>Identifiant</th>
          <th>Modifier</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $users = Utilisateur::Afficher();
        foreach ($users as $user) {
        ?>
          <tr>
            <td><?php echo $user["nom"]; ?></td>
            <td><?php echo $user["prenom"]; ?></td>
            <td><?php echo $user["sexe"]; ?></td>
            <td><?php echo $user["telephone"]; ?></td>
            <td><?php echo $user["typeProfil"]; ?></td>
            <td><?php echo $user["identifiant"]; ?></td>
            <td> <a href="modifierUser.php?clef=<?php echo $user["idUser"]; ?>">Modifier</a></td>
            <td><a href="supuser.php?clef=<?php echo $user["idUser"]; ?>">Supprimer</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      </tr>
    </table>
  </div>
</div>