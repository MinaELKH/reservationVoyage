<?php
include 'db.php';
ob_start();
$title = "Gestion des reservation";
?>
 <?php
                    $query = "select titre from activite" ;
                    $result = mysqli_query($conn,$query); 
                    while($row = mysqli_fetch_assoc($resultat)){
                             echo $row ; 
                    }
                    echo'<label for="id_activite" class="block font-medium mb-1">Activité ID</label>
                    <input id="id_activite" name="id_activite" type="number" placeholder="activité"
                        class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>' ; 
                      ?>




<div id="modal" class=" hidden fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
        <span id="closeForm"
            class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">cancel</span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500"> Réservation</h2>
        <p id="pargErreur"
            class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        </p>
        <form id="formulaire" class="flex flex-col gap-4" action="" method="post">
            <input id="id_input" type="hidden" value="-1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="id_client" class="block font-medium mb-1">Client ID</label>
                    <input id="id_client" name="id_client" type="number" placeholder="ID du client"
                        class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>
                <div>
                    <?php
                    $query = "select titre from activite" ;
                    $result = mysqli_query($conn,$query); 
                    while($row = mysqli_fetch_assoc($resultat)){
                             echo $row ; 
                    }
                    echo'<label for="id_activite" class="block font-medium mb-1">Activité ID</label>
                    <input id="id_activite" name="id_activite" type="number" placeholder="activité"
                        class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>' ; 
                      ?>
                <div>
                    <label for="statut" class="block font-medium mb-1">Statut</label>
                    <select id="statut" name="statut"
                        class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="En attente">En attente</option>
                        <option value="Confirmée">Confirmée</option>
                        <option value="Annulée">Annulée</option>
                    </select>
                </div>
                <div>
                    <label for="montant" class="block font-medium mb-1">Montant</label>
                    <input id="montant" name="montant" type="text" placeholder="Montant"
                        class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="ajouter" id="submitreservation"
                    class="w-full bg-[#7F020F] hover:bg-red-700 text-white font-bold py-2 rounded-lg">Valider</button>
            </div>
        </form>
    </div>
</div>


<!---->

<?php

if (isset($_POST['ajouter'])) {

    $id_client = mysqli_real_escape_string($conn, $_POST['id_client']);
    $id_activite = mysqli_real_escape_string($conn, $_POST['id_activite']);
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $date_reservation = date("Y-m-d H:i:s");  // Date et heure actuelle pour la réservation
    $montant = mysqli_real_escape_string($conn, $_POST['montant']);

    $sql = "INSERT INTO reservation (id_client, id_activite, statut, date_reservation, montant) 
        VALUES ('$id_client', '$id_activite', '$statut', '$date_reservation', '$montant')";
    if (mysqli_query($conn, $sql)) {
        echo "Réservation ajoutée avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}

$query_select = "select r.id_reservation ,a.titre ,  c.nom  , c.prenom , r.statut ,r.date_reservation   from reservation as r  
inner join activite as a  on a.id_activite = r.id_activite 
inner join  client as c  on c.id_client = r.id_client";
$resultat = mysqli_query($conn, $query_select);
if ($resultat) {
    echo "<div><table><thead><tr><th>id reservation</th><th>client</th><th>activite</th><th>statut</th><th>date reservation</th><th>Action</th></tr></thead><tbody>";
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo "<tr>
        <td>{$row["id_reservation"]}</td>
        <td>{$row["nom"]} {$row["prenom"]}</td>
        <td>{$row["titre"]}</td>
        <td>{$row["statut"]}</td>
        <td>{$row["date_reservation"]}</td>
        <td><
        </tr>";
    }
    echo "</tbody></table></div>";
}


// Fermeture de la connexion
mysqli_close($conn);
?>
<?php
$content = ob_get_clean();
include 'layout.php';
?>