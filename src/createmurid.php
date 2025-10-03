<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <link href="/dist/output.css" rel="stylesheet">
</head>

<script>
    function burger() {

        if (document.getElementById('burgermenu').classList.contains('h-52')) {
            document.getElementById("burgermenu").classList.remove('h-52');
            document.getElementById("burgermenu").classList.add('h-0');
            document.getElementById("burgermenu").classList.add('hidden');



        } else {
            document.getElementById("burgermenu").classList.remove('h-0');
            document.getElementById("burgermenu").classList.add('h-52');
            document.getElementById("burgermenu").classList.remove('hidden');
        }




    }



    // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
    window.addEventListener("scroll", function() { // or window.addEventListener("scroll"....
        var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"

        if (st => 0) {
            document.getElementById("nav").classList.remove('bg-black');
            document.getElementById("nav").classList.remove('bg-opacity-50');
            document.getElementById("nav").classList.add('bg-white');
            document.getElementById("nav").classList.add('shadow-lg');


        } else {
            document.getElementById("nav").classList.add('bg-black');
            document.getElementById("nav").classList.add('bg-opacity-50');

            document.getElementById("nav").classList.remove('text-white');
            document.getElementById("nav").classList.remove('bg-white');
            document.getElementById("nav").classList.remove('shadow-lg');
        }
        lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
    }, false);
</script>

<body class="w-full h-screen bg-gray-200">


    <div id="nav" class="w-full bg-white bg-opacity-50 h-[80px] text-black flex justify-center fixed z-50 ">
        <div class="flex justify-between w-10/12 ">
            <div class="flex"><img class="flex mt-[15px] h-[50px] w-[50px]" src="asset/logo.jpg" />
                <h1 class="text-xl text-green-600 px-4 py-[20px] font-bold">SD SWASTA AMALIYAH</h1>
            </div>

            <div onclick="burger()" class="flex lg:hidden py-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>

            </div>

            <ul class="lg:flex hidden space-x-8 hover:text py-[24px] z-50 ">
                <li>
                    <a href="home.php">Beranda</a>
                </li>
                <li>
                    <a href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="visimisi.php">Visi Misi</a>
                </li>
                <li>
                    <a class="text-blue-800" href="datamurid.php"> Data Murid</a>

                </li>
                <li>
                    <a href="login.php"> Login</a>
                </li>
            </ul>


        </div>

    </div>
    <div class="lg:hidden w-full bg-white fixed mt-[80px] z-50">
        <div class="flex justify-center">
            <ul id="burgermenu" class=" bg-white text-black w-10/12 h-0 hidden pb-4 space-y-4 ">
                <li>
                    <a href="home.php">Beranda</a>
                </li>
                <li>
                    <a href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="visimisi.php">Visi Misi</a>
                </li>
                <li>
                    <a class="text-blue-800" href="datamurid.php"> Data Murid</a>

                </li>
                <li>
                    <a href="login.php"> Login</a>

                </li>
            </ul>
        </div>

    </div>

    <div class="w-full h-[80px]"></div>
    <form>
        <div class="lg:mt-24 lg:mx-20 p-4 pb-12 bg-white">
            <div>
                <div>
                    <div class="shadow-md space-y-2 p-4 mb-12 bg-white ">

                        <div class="lg:flex justify-between">
                            <div class="space-y-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Nama
                                </label>
                                <input class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Nama">

                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    NISN
                                </label>
                                <input class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="NISN">
                            </div>
                            <div class="space-y-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Jenis Kelamin
                                </label>
                                <div class="inline-block relative w-64">
                                    <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">

                                        <option>Laki - Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Kelas
                                </label>
                                <input class="shadow appearance-none border rounded w-80 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Kelas">

                            </div>
                            <div>
                                <div class="flex justify-center ">
                                    <div class="max-w-2xl rounded-lg ">
                                        <div class="m-4">
                                            <label class="inline-block mb-2 text-gray-500">Photo</label>
                                            <div class="flex items-center justify-center w-full">
                                                <label class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                                    <div class="flex flex-col items-center justify-center pt-7">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                        </svg>
                                                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                                            Attach a file</p>
                                                    </div>
                                                    <input type="file" class="opacity-0" />
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>



                </div>


                <div class="space-y-12">
                    <h1 class=" text-blue-800 text-4xl font-bold">Daftar Nilai</h1>

                    <table id="table_id" class="display bg-white ">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AGAMA</td>
                                <td> <input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                            </tr>
                            <tr>
                                <td>PPKN</td>
                                <td id="mp2"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>Matematika</td>
                                <td id="mp3"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>B.Inggris</td>
                                <td id="mp4"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>B.Indonsesia</td>
                                <td id="mp5"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>QIROAT</td>
                                <td id="mp6"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>SPDB</td>
                                <td id="mp7"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>PJOK</td>
                                <td id="mp8"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                        </tbody>
                    </table>




                </div>

                <div class="space-y-12 mt-24">
                    <h1 class=" text-blue-800 text-4xl font-bold">Kepribadian</h1>

                    <table id="table_id2" class="display bg-white ">
                        <thead>
                            <tr>
                                <th>Sikap</th>
                                <th>nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Karakter</td>
                                <td id="kp1"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>sosiabilitas</td>
                                <td id="kp2"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>stabilitas</td>
                                <td id="kp3"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>
                            <tr>
                                <td>Emosi</td>
                                <td id="kp4"><input placeholder="Isi Nilai" class="lg:w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>

                            </tr>

                        </tbody>
                    </table>
                    <div class="w-full flex justify-end mt-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit
                        </button>
                    </div>



                </div>
            </div>
        </div>

    </form>
    </div>




</body>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    $(document).ready(function() {
        $('#table_id2').DataTable();
    });
</script>

<footer class="mt-24 ">
    <div>
        <div class='w-full lg:h-[400px] bg-blue-800 lg:mt-12 px-8 lg:flex'>
            <div class='container mx-auto lg:w-10/12 lg:space-x-32 lg:flex text-white'>
                <div class='py-16 space-y-4 '>
                    <img class='h-[120px] w-[120px]' src='asset/logo.jpg' />
                    <h1 class='font-bold'>SD Swasta Amaliyah </h1>
                    <div class='space-y-1'>

                        <span class='py-2 text-md text-white'>Jalan Tani Asli Gang Asal, Tanjung Gusta, Kec. Sunggal, Kab. Deli Serdang Prov. Sumatera Utara</span>
                        <div class='flex'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" color='white' viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <p class='px-2 text-white  text-md'>(061) 8213207 </p>
                        </div>
                        <div class='flex'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" color='white' viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />

                            </svg>

                            <span class='px-2 text-white  text-md'>sdamaliyahmedan@gmail.com</span>
                        </div>
                    </div>

                </div>




            </div>
            <div class="py-12">
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe w-full h-[300px] lg:w-[600px] " frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Jalan Tani Asli Gang Asal, Tan'jung Gusta, Kec. Sunggal, Kab. Deli Serdang&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;

                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;

                        }
                    </style>
                </div>

            </div>
        </div>
        <div class='w-full h-[50px] bg-blue-900 '>
            <div class='container mx-auto w-10/12  flex py-[5px] lg:py-[15px] justify-center'>
                <h1 class='text-white text-sm '>© 2022 Yayasan Amaliyah Medan</h1>
            </div>

        </div>

    </div>

</footer>

</html>