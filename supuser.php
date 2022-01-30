<?php
include_once("./classes/Model.php");
include_once("entete.php");
$idUser = $_GET["clef"];
?>

<div class="contenu">
  <form method="POST" action="./controller/traitement_user.php">
    <div class="ligne">
      <div class="pos-3"></div>
      <div class="pos-6">
        <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
        <div class="ligne">
          <p>Voulez-vous supprimer</p>
        </div>
      </div>
      <div class="pos-3"></div>
    </div>
    <div class="ligne" style="margin-left: 350px;">
      <input type="submit" name="supprimer" class="button" value="Supprimer"  style="color: #f00;" />
    </div>
  </form>

</div>
