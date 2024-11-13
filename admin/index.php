<?php
include("koneksi.php");


?>


<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="../src/css/output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 flex">

    <aside class="relative bg-[#3d68ff] h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300"> Minji
            </a>

        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="index.php" class="flex items-center bg-[#1947ee] text-white py-4 pl-6 hover:bg-[#1947ee]" ">
                <i class=" fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="create.php"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a>
            <a href="calendar.php"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]"">
                <i class=" fas fa-calendar mr-3"></i>
                Calendar
            </a>
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="../src/img/admin.webp">
                </button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="logout.php" class="block px-4 py-2      hover:text-[#3d68ff]">Logout</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden bg-[#3d68ff]">
            <div class="flex items-center justify-between">
                <a href="index.html"
                    class="text-white text-3xl font-semibold uppercase hover:text-gray-300"><?= $namadia ?></a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.php" class="flex items-center bg-[#1947ee] text-white py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="create.php"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="calendar.php"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-calendar mr-3"></i>
                    Calendar
                </a>

                <a href="logout.php"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-2">Tables</h1>



                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Form list
                    </p>
                    <div class="bg-white overflow-x-auto">
                        <table class="text-left min-w-full overflow-x-auto border-collapse ">
                            <thead>
                                <tr>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        NIM</th>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        Nama</th>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        tanggal_lahir</th>
                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                        Jurusan</th>

                                    <th
                                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM mahasiswa";
                                $result = mysqli_query($db, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {


                                    ?>
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-4 px-6 border-b border-grey-light"><?= $row['nim'] ?></td>>
                                        <td class="py-4 px-6 border-b border-grey-light"><?= $row['nama'] ?>
                                        </td>
                                        <td class="py-4 px-6 border-b border-grey-light"><?= $row['tanggal_lahir'] ?></td>
                                        <td class="py-4 px-6 border-b border-grey-light"><?= $row['jurusan'] ?></td>
                                        <td class="py-4 px-6 border-b border-grey-ligh w-36  "><a
                                                href="edit.php?id=<?= $row['id'] ?>"><i
                                                    class="fa-solid fa-pen-to-square"></i></a> <a
                                                href="delete.php?id=<?= $row['id'] ?>" class="delete-button"><i
                                                    class="fa-solid fa-trash"></i></a>

                                        </td>

                                    </tr>

                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </main>
        </div>

    </div>




</body>


</html>