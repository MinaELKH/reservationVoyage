<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Concevoir une application web de gestion d agence de voyage">
    <meta name="keywords" content="voyage, travel, actvite, destination, reservation ,nature">
    <meta name="author" content="Mina">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>FUT</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"> <!-- icon reseau sociaux-->
    <link rel="stylesheet" href="./styles/index.css" />
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="css/style.css" />


</head>

<body class=" flex flex-col relative bg-[url('img/map3.png')] bg-[#FAF5F1] no-repeat bg-cover    kanit-medium">
    <div class=" flex ">
        <aside class="   bg-white bg-opacity-80   border-2 border-orange-100 rounded-xl w-1/4 p-2 pt-10">
            <div>
                <img class="mx-auto" src="img/logo.png" width="100" alt="logo">
            </div>
            <div class="  p-4 bg-white bg-opacity-40 flex justify-between items-center">
                <span class="text-[#264180] text-xl font-semibold"> Gestion d'agence </span>
            </div>

            <nav id="menu"
                class="hidden lg:flex flex-col gap-5 justify-center mx-auto items-center align-center">
                <a href="index.php"
                    class="text-orange-400 flex items-center gap-5 m-2 w-1/2 border-2  cursor-pointer border-orange-400  rounded-lg   hover:scale-[1.1]  hover:text-gray-800">
                    <span class="material-symbols-outlined cursor-pointer  lg:text-4xl ">
                        Home </span> Accueil
                </a>
                <a href="activite.php"
                    class="text-orange-400 flex items-center gap-5 m-2 w-1/2 border-2  cursor-pointer border-orange-400  rounded-lg   hover:scale-[1.1]  hover:text-gray-800">
                    <span class="material-symbols-outlined cursor-pointer  lg:text-4xl ">
                        kayaking </span> Activite
                </a>
                <a href="reservation.php"
                    class="text-orange-400 flex items-center gap-5 m-2 w-1/2 border-2  cursor-pointer border-orange-400  rounded-lg   hover:scale-[1.1]  hover:text-gray-800">
                    <span class="material-symbols-outlined cursor-pointer  lg:text-4xl ">

airplane_ticket
</span> reservation
                </a>
                <a href="client.php"
                    class="text-orange-400 flex items-center gap-5 m-2 w-1/2 border-2  cursor-pointer border-orange-400  rounded-lg   hover:scale-[1.1]  hover:text-gray-800">
                    <span class="material-symbols-outlined cursor-pointer  lg:text-4xl ">
                        person_add </span> Client
                </a>

               
            </nav>


        </aside>
        <div>
            <header class=" text-black p-4 lg:my-4 ">
                <div class="container mx-auto flex justify-between items-center">


                    <div class="lg:hidden ml-auto order-3">
                        <button id="menu-button" class="text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>



                    <div class="flex space-x-6 lg:ml-auto lg:flex-row flex-1  items-center  lg:justify-end">
                        <div class="relative flex">
                            <input type="text" id="champRecherche" placeholder="Rechercher"
                                class=" m-2.5 p-1 border border-gray-300 w-32 rounded-full text-black"
                                oninput="rechercher()">
                            <img src="./img/Search.png" alt="search logo" class=" absolute right-5 top-2.5">
                        </div>
                        <a href="#" class="text-white">
                            <img src="./img/User.png" alt="user logo">
                        </a>


                    </div>
                </div>
<!-- Menu burger-->
                <div id="collapsed-menu" class="lg:hidden bg-black text-white p-4 absolute w-1/3 top-10 right-0 hidden">
                    <nav class="flex flex-col items-center">
                        <a href="index.php" class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">Accueil</a>
                        <a href="activite.php"
                            class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">Reservation</a>
                        <a href="reservation.php" class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">Contact
                            Us</a>
                        <a href="client.php" class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">About Us</a>
                    </nav>
                </div>
            </header>
             <hr>

             
            <section  class="p-2.5 m-2.5  border-2 border-orange-100  ">
                 <div class="flex align-center items-center">
                    <div  id="ShowForm" class=" text-orange-400 cursor-pointer  border-orange-400  rounded-lg   hover:scale-[1.1]  hover:text-gray-800 lg:text-xl">
                        
                    <span class="material-symbols-outlined cursor-pointer   ">
                        add_task </span>  Ajouter </div>

                 </div>

            </section>


            <main class="flex-grow min-h-screen">

                <div class=" h-full flex flex-col lg:flex-row lg:px-[20px] gap-20 relative justify-cente">
                    <div class=" w-full ">
                        <?php
                        // Contenu de la page spécifique
                        echo isset($content) ? $content : '<p>Bienvenue sur le site de réservation de voyages.</p>';
                        ?>
                    </div>

                </div>

        </div>
        </main>
    </div>
    </div>
    <footer class="">
        <!-- top footer -->
        <section class=" flex flex-col md:flex-row items-center justify-between px-8 md:px-40 mb-5 ">
            <img src="img/logo.png" width="100" alt="logo">
            <div class="text-orange-500">
                <h3 class="text-lg font-semibold">Follow us</h3>
                <div class="flex space-x-4">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>
        </section>

        <hr class=" mx-10 border-t border-orange-400 opacity-80">

        <section class=" flex flex-col md:flex-row justify-between gap-10 sm:gap-20 px-14 py-10">
            <div class="flex flex-col justify-evenly sm:flex-row gap-10 md:gap-20 w-full text-orange-400">
                <div>
                    <h3 class="text-sm font-semibold mb-1">DERNIERS EFFECTIFS</h3>
                    <hr class="my-2.5 border-t border-orange-400 opacity-80">
                    <div class="text-gray-800">
                        <a href="#">Créateur d'effectifs</a>
                        <div><a href="#">SBC</a></div>
                        <div><a href="#">Joueurs EA FC 25</a></div>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-bold mb-1">LIENS UTILES</h3>
                    <hr class="my-2.5 border-t border-orange-400 opacity-80">
                    <div class="text-gray-800">
                        <a href="#">FAQ</a>
                        <div><a href="#">Aide en ligne</a></div>
                        <div><a href="#">Conditions d'utilisation</a></div>
                    </div>
                </div>
                <div>
                    <h3 class="text-sm font-bold mb-1">SUPPORT</h3>
                    <hr class="my-2.5 border-t border-orange-400 opacity-80">
                    <div class="text-gray-800">
                        <a href="#">Contactez-nous</a>
                        <div><a href="#">Centre d'assistance</a></div>
                    </div>
                </div>

                <img src="img/person.png" class="w-32 h-32">
            </div>


        </section>
        <div class="px-10">
            <hr class="border-t border-orange-400 opacity-50">
        </div>

        <!-- footer-bottom -->
        <div class="text-center pt-4 ">
            <p class="text-orange-300  p-4">© 2025-2030 Copyright VoYa
            </p>
        </div>

    </footer>

</body>

</html>