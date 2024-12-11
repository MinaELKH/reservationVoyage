<?php
include 'db.php';
ob_start(); 
$title = "Gestion des activites";
?>
<h2>Liste des activites</h2>





   <!-- #form -->

   <div id="modal" class="fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
        <span id="closeForm" class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">cancel</span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Ajouter Activité</h2>
        <p id="pargErreur" class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        </p>
        <form id="formulaire" class="flex flex-col gap-4" action="activites.php" method="post">
            <input id="id_input" type="hidden" value="-1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label for="titre" class="block font-medium mb-1">Titre</label>
                    <input id="titre" name="titre" type="text" placeholder="Titre de l'activité" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>

                <div>
                    <label for="description" class="block font-medium mb-1">Description</label>
                    <textarea id="description" name="description" placeholder="Description de l'activité" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm"></textarea>
                </div>

                <div>
                    <label for="destination" class="block font-medium mb-1">Destination</label>
                    <input id="destination" name="destination" type="text" placeholder="Destination" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>

                <div>
                    <label for="prix" class="block font-medium mb-1">Prix</label>
                    <input id="prix" name="prix" type="number" placeholder="Prix" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>

                <div>
                    <label for="date_debut" class="block font-medium mb-1">Date Début</label>
                    <input id="date_debut" name="date_debut" type="date" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>

                <div>
                    <label for="date_fin" class="block font-medium mb-1">Date Fin</label>
                    <input id="date_fin" name="date_fin" type="date" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>

                <div>
                    <label for="place_disponible" class="block font-medium mb-1">Places Disponibles</label>
                    <input id="place_disponible" name="place_disponible" type="number" placeholder="Nombre de places disponibles" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>

            </div>

            <div class="flex justify-center">
                <button type="submit" id="submitactivite" class="w-full bg-[#7F020F] hover:bg-red-700 text-white font-bold py-2 rounded-lg">Valider</button>
            </div>
        </form>
    </div>
</div>

<!---->

<?php
// Ajouter un client
if (isset($_POST['ajouter'])) {
    $titre = mysqli_real_escape_string($conn, $_POST['titre']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $prix = mysqli_real_escape_string($conn, $_POST['prix']);
    $date_debut = mysqli_real_escape_string($conn, $_POST['date_debut']);
    $date_fin = mysqli_real_escape_string($conn, $_POST['date_fin']);
    $place_disponible = mysqli_real_escape_string($conn, $_POST['place_disponible']);

    // Requête SQL
    $sql = "INSERT INTO activite (titre, description, destination, prix, date_debut, date_fin, place_disponible) 
            VALUES ('$titre', '$description', '$destination', '$prix', '$date_debut', '$date_fin', '$place_disponible')";


    
    if (mysqli_affected_rows($con)) {// https://www.w3schools.com/php/func_mysqli_affected_rows.asp   
        //recupere le nb de ligne ajouter ou modifier ou supprmer - 
        //en general il retunrn nbr de ligne affecte lors de dernier query execute dans cet exemple   
        // mysqli_query($conn , $sql);    nbr ligne ajoute au table client
        echo "<p>Client ajouté avec succès !</p>";
    } else {
        echo "<p>Erreur : " . mysqli_error($conn) . "</p>";
    }
}

// Afficher les clients
$sql = "SELECT * FROM activite";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div id='listactivite' ><table border='1'>";
    echo "<tr><th>ID</th><th>titre</th><th>description</th><th>prix</th><th>date_debut</th><th>date_fin</th><th>places disponibles</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['id_activite']}</td>
            <td>{$row['titre']}</td>
            <td>{$row['description']}</td>
              <td>{$row['prix']}</td>
            <td>{$row['date_debut']}</td>
            <td>{$row['date_fin']}</td>
            <td>{$row['place_disponible']}</td>
            <td>
                <a href='edit_client.php?id={$row['id_activite']}'>Modifier</a> | 
                <a href='delete_client.php?id={$row['id_activite']}'>Supprimer</a>
            </td>
        </tr>";
    }
    echo "</table></div>";
} else {
    echo "<p>Aucun activite trouvée.</p>";
}
mysqli_close($conn);
?>
<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>