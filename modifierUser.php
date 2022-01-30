<?php
include_once("./classes/Model.php");
include_once("entete.php");
$idUser = $_GET["clef"];
$user = Utilisateur::AfficherUnique($idUser);
?>
<div class ="contenu">
    <div class="ligne" style="margin-top: 80px;">
      <div class="ligne">
        <div class="pos-3">

        </div>
        <div class="pos-6">
          <h4>Modification</h4>
        </div>
      </div>
      <div class="ligne">
      <div class="pos-3"></div>

      <div class="pos-6" style="background-color: #e6e9ed; padding-bottom: 25px;padding-top: 25px;">

        <form action="./controller/traitement_user.php" method="post"  id="">
          <input id="idUser" name="idUser" type="hidden" class="pos-8 inputbox" value="<?php echo $user->idUser ?>"/>
          <div class="ligne">
            <label for="nom" class="pos-3 control-label">Nom :</label>
            <input id="nom" name="nom" type="text" class="pos-8 inputbox" value="<?php echo $user->nom ?>" required/>
          </div>

          <div class="ligne">
            <label for="prenom" class="pos-3 control-label">Prénom :</label>
            <input id="prenom" name="prenom" type="text" class="pos-8 inputbox" value="<?php echo $user->prenom ?>" required/>
          </div>

          <div class="ligne">
            <label for="sexe" class="pos-3 control-label">Sexe :</label>
            <select id="sexe" class="pos-8" name="sexe" required>
              <option value="">&nbsp;</option>
              <option value="Masculin" <?php if ($user->sexe == "Masculin") {echo "selected";} ?> >Masculin</option>
              <option value="Feminin" <?php if ($user->sexe == "Feminin") {echo "selected";} ?> >Feminin</option>
            </select>
          </div>

          <div class="ligne">
            <label for="telephone" class="pos-3 control-label">Téléphone :</label>
            <input id="telephone" name="telephone" type="text" class="pos-8 inputbox" value="<?php echo $user->telephone ?>" required/>
          </div>

          <div class="ligne">
            <label for="identifiant" class="pos-3 control-label">Identifiant :</label>
            <input id="identifiant" name="identifiant" type="text" class="pos-8 inputbox" value="<?php echo $user->identifiant ?>"required/>
          </div>

          <div class="ligne">
            <label for="password" class="pos-3 control-label">Mot de passe :</label>
            <input id="password" name="password" type="password" class="pos-8 inputbox" required/>
          </div>

          <div class="ligne">
            <label for="idProfil" class="pos-3 control-label">Profil :</label>
            <select id="idProfil" class="pos-8" name="idProfil" required>
              <option value="">&nbsp;</option>
                <option value="2" <?php if ($user->idProfil == 2) {echo "selected";} ?>>Propriètaire</option>
                <option value="3" <?php if ($user->idProfil == 3) {echo "selected";} ?> >Client</option>
            </select>
         </div>
          <div class="ligne" style="margin-left: 200px;">
            <input type="submit" name="modifier" class="pos-6 button" value="Enregistrer" />
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
