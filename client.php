<?php
include 'db.php';
ob_start(); 
$title = "Gestion des Clients";
?>
<h2>Liste des Clients</h2>





   <!-- #form -->

   <div id="modal" class="  hidden fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
        <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
            <span id="closeForm"
                class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">cancel</span>
            <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500"> Client</h2>
            <p id="pargErreur"
                class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
            </p>
            <form id="formulaire" class="flex flex-col gap-4" action="" method="post">
                <input id="id_input" type="hidden" value="-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label for="nom" class="block font-medium mb-1">Nom</label>
                        <input id="name_input"  name ="nom" type="text" placeholder="Nom du client"
                            class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>
                    <div>
                        <label for="prenom" class="block font-medium mb-1">Prenom</label>
                        <input id="prenom" name ="prenom" type="text" placeholder="URL de la photo"
                            class=" inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>

                    <div>
                        <label for="email" class="block font-medium mb-1">Email :<span class="text-gray-200">nom@email.ma</span></label>
                        <input name="email" type="text" placeholder="email"
                            class=" inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                        
                    </div>


                    <div>
                        <label for="telephone" class="block font-medium mb-1">Telephone</label>
                        <input name="telephone" type="text" placeholder="telephone"
                            class=" inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>



                    <div>
                        <label for="adresse" class="block font-medium mb-1">adresse</label>
                        <input name="adresse" type="text" placeholder="adresse"
                            class=" inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>


                    <div>
                        <label for="date naissance" class="block font-medium mb-1">Date naissance</label>
                        <input name="date_naissance" type="date" placeholder="date"
                            class=" inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                    </div>
              
                <div class="flex justify-center">
                    <button type="submit"  name="ajouter" id="submitplayer"
                        class="w-full bg-[#7F020F] hover:bg-red-700 text-white font-bold py-2 rounded-lg">Valider</button>
                </div>

                </div>
            </form>
        </div>
    </div>

<!---->

<?php
// Ajouter un client
if (isset($_POST['ajouter'])) {
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);  //https://www.w3schools.com/php/func_mysqli_real_escape_string.asp
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telephone= mysqli_real_escape_string($conn, $_POST['telephone']);
    $adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
    $date_naissance = mysqli_real_escape_string($conn, $_POST['date_naissance']);

    $sql = "INSERT INTO client (nom, prenom ,  email ,  telephone , adresse , date_naissance) 
    VALUES ('$nom', '$prenom' , '$email' ,   '$telephone' , '$adresse' , '$date_naissance')";

     mysqli_query($conn , $sql); 


    // echo (mysqli_affected_rows($conn))   ; 
    
    if (mysqli_affected_rows($conn)) {// https://www.w3schools.com/php/func_mysqli_affected_rows.asp   
        //recupere le nb de ligne ajouter ou modifier ou supprmer - 
        //en general il retunrn nbr de ligne affecte lors de dernier query execute dans cet exemple   
        // mysqli_query($conn , $sql);    nbr ligne ajoute au table client
        echo "<p>Client ajouté avec succès !</p>";
    } else {
        echo "<p>Erreur : " . mysqli_error($conn) . "</p>";
    }
}

// Afficher les clients
$sql = "SELECT * FROM client";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div id='listClient' ><table border='1'><thead>";
    echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Telephne</th><th>Adresse</th><th>Date_naissance/th><th>Action</th><th>Action</th></tr></thead><tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['id_client']}</td>
            <td>{$row['nom']} {$row['prenom']}</td>       
              <td>{$row['email']}</td>
               <td>{$row['telephone']}</td>
                <td>{$row['adresse']}</td>
            <td>{$row['date_naissance']}</td>
            <td class='flex align-center'>
                <a href='edit_client.php?id={$row['id_client']}'>Modifier</a> | 
                <a href='delete_client.php?id={$row['id_client']}'>Supprimer</a>
            </td>
        </tr>";
    }
    echo "</tbody></table></div>";
} else {
    echo "<p>Aucun client trouvé.</p>";
}
mysqli_close($conn);
?>
<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>
