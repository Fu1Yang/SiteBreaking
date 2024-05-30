





<form action="modif_client.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Modifier la page accueil</b></legend>
            <table>
                <tr>
                    <td>
                    evenementRealiser:
                    </td>
                    <td>
                        <input type="text" name="evenementRealiser" id="evenementRealiser" value="<?= $data["prenom"] ?>" placeholder="Le nombre d'événements réalisesr">
                    </td>
                </tr>
                <tr>
                    <td>
                        image:
                    </td>
                    <td>
                    <input type="hidden" name="MAX_FILE_SIZE" size="60" value="<?= $data["nom"] ?>">
                    <input type="file" name="image" id="image">
                    </td>
                </tr>
                <tr>
                    <td>
                    titre:
                    </td>
                    <td>
                    <input type="text" name="titre" id="titre" value="<?= $data["age"] ?>" placeholder="Donner un titre">
                    </td>
                </tr>
                <tr>
                    <td>
                    nom:
                    </td>
                    <td>
                        <input type="text" name="adresse" size="60" value="<?= $data["adresse"] ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                    text:
                    </td>
                    <td>
                    <textarea type="text" name="text" id="text" rows="4" cols="50" value="<?= $data["ville"] ?>" placeholder="Ecrire le text ici"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><input type="reset" name="effacer" value="Effacer"></td>
                    <td><input type="submit" name="modif" value="Enregistrer"></td>
                </tr>

            </table>
        </fieldset>
        <input type="hidden" name="id" value="<?= $id_client ?>">
    </form>