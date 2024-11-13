<?php
include("koneksi.php");





if (isset($_POST["kirim"])) {
    $nim = htmlspecialchars($_POST["nim"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $tanggal_lahir = htmlspecialchars($_POST["tanggal_lahir"]);
    $jurusan = htmlspecialchars($_POST["jurusan"]);


    $sql = "INSERT INTO `mahasiswa`(`nim`, `nama`, `tanggal_lahir`, `jurusan`) 
    VALUES ('$nim','$nama','$tanggal_lahir','$jurusan')";

    $result = mysqli_query($db, $sql);

    if ($result) {
        header("location:index.php?berhasil");
    } else {
        header("location:index.php?gagal");
    }
}

?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="../src/css/output.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--  jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
</head>

<body class="bg-gray-100 flex">

    <aside class="relative bg-[#3d68ff] h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.php" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Minji
            </a>

        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="index.php" class="flex items-center opacity-75  text-white py-4 pl-6 hover:bg-[#1947ee]" ">
                <i class=" fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="create.php"
                class="flex items-center text-white bg-[#1947ee] hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a>
            <a href="calendar.php"
                class="flex items-center opacity-75  text-white  hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]"">
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
                    <a href="index.php" class="block px-4 py-2      hover:text-[#3d68ff]">Logout</a>
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
                <a href="index.php" class="flex items-center opacity-75   text-white py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="create.php"
                    class="flex items-center text-white  bg-[#1947ee] hover:opacity-100 py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="calendar.php"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-calendar mr-3"></i>
                    Calendar
                </a>

                <a href="../index.html"
                    class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 hover:bg-[#1947ee]"">
                    <i class=" fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </nav>
        </header>

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="w-full text-3xl text-black pb-6">Forms</h1>

                <div class="flex flex-wrap">
                    <div class="w-full  my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Create
                        </p>
                        <div class="leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl space-y-5" id="myForm" method="POST">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium">NIM</label>
                                    <input type="text" id="nim" name="nim"
                                        class="shadow-sm border text-[#274C5B] text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="nim" required />
                                </div>
                                <div>
                                    <label for="nama" class="block mb-2 text-sm font-medium">Nama</label>
                                    <input type="text" id="nama" name="nama"
                                        class="shadow-sm border text-[#274C5B] text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Nama Anda" required />
                                </div>
                                <div>
                                    <label for="kunjungan" class="block mb-2 text-sm font-medium">tanggal lahir</label>
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                        class="shadow-sm border text-[#274C5B] text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        required ">
                                </div>
                                <div>
                                    <label for=" nama" class="block mb-2 text-sm font-medium">Jurusan</label>
                                    <input type="text" id="jurusan" name="jurusan"
                                        class="shadow-sm border text-[#274C5B] text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Jurusan" required />
                                </div>
                                <button type="submit" name="kirim"
                                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 bg-gray-500">
                                    Kirim
                                </button>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>


        </div>
    </div>
    </main>
    </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $("#myForm").validate({
                errorClass: "text-red-500",
                rules: {
                    nim: {
                        required: true,
                        minlength: 5,
                    },
                    nama: {
                        required: true,
                        minlength: 5,
                    },
                    tanggal_lahir: {
                        date: true,
                        required: true,
                    },
                    jurusan: {
                        required: true,
                        minlength: 5,
                    },

                },
                messages: {
                    nim: {
                        required: "Silakan masukkan nim Anda",
                        minlength: "Silakan masukkan nim yang valid",
                    },
                    nama: {
                        required: "Silakan masukkan nama Anda",
                        minlength: "Nama harus terdiri dari minimal 5 karakter",
                    },
                    tanggal_lahir: {
                        required: "Isi tanggal",
                        date: "Isi tanggal yang benar",
                    },
                    kelas: {
                        required: "Silakan pilih kelas Anda",
                    },
                    jurusan: {
                        required: "Silakan pilih jurusan Anda",
                        minlength: "Silakan pilih jurusan Anda",
                    },
                },
            });
        });
    </script>
</body>

</html>