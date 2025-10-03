<?php if(empty($_SESSION['name']))
{
header('Location: index.php');
?>

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



<body class="w-full h-screen bg-gray-200">


    <div id="nav" class="w-full bg-white  h-[80px] shadow-md text-black flex justify-center fixed z-50 ">
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
                    <a  href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="visimisi.php">Visi Misi</a>
                </li>
                <li>
                    <a href="datamurid.php"> Data Murid</a>

                </li>
                 
                <?php
                    if(!isset($_SESSION["name"])) {
                ?>
                <li>
                    <a href="login.php"> Login</a>
                </li>
            <?php } else if(isset($_SESSION["name"])) { ?>
                <li>
                    <a class="text-blue-800" href="chatbox.php"> Pesan</a>

                </li>
                <li>
                    <a href="controller/logout.php"> Logout</a>
                </li>
            <?php } ?>
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
                    <a class="text-blue-800" href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="visimisi.php">Visi Misi</a>
                </li>
                <li>
                    <a href="datamurid.php"> Data Murid</a>

                </li>
                <li>
                    <a href="login.php"> Login</a>

                </li>
            </ul>
        </div>

    </div>








    <div class="flex  mx-12 divide-x-2 shadow-md bg-white ">
<?php 

          $chat = file_get_contents('controller/chatlog.json');

          $chatlog = json_decode($chat, true);
          ?>
        <div class="w-4/12 h-screen  ">
            <div class="w-full  h-[80px]"></div>
            <div class="h-16 w-full bg-blue-800 text-white border-b-2 border-blue-800 p-4">
                <h1>Pesan Masuk</h1>
            </div>
            <?php 
$user = '';

            foreach($chatlog as $key => $value){

            if($value["user"] == 'Cunuk')
            {
                $user = $value["user"];

            } }
                ?>
            <div class="h-16 w-full border-b-2 cursor-pointer border-blue-800 p-4">
                <h1><?php echo $user; ?></h1>
            </div>

        </div>
        <div class="w-8/12 h-screen bg-gray-200">
            <div class="w-full h-[80px]"></div>

            <div class="h-12 w-full border-b-2  bg-blue-800  text-white shadow-md p-4 py-8">
                <h1>NAMA YANG NGECHAT</h1>
            </div>
            <script>

        $(document).on('click', '#newchat', function() {
          $.ajax({
            type:"POST",
            url:"controller/chat_input.php",
            datatype: "json",
            data: {
              user:"ADMIN",
              chat:$('#chat').val(),
            },
          })
        });

    </script>
            <div class="w-full h-4/6 overflow-auto b">
                
<?php
                    

          foreach($chatlog as $key => $value){

            if($value["user"] == 'Cunuk')
            {

        ?>

                <div class="m-4 text-white  ">
                    <span class="bg-blue-700 p-2  rounded-md shadow-md">
                        <?php 
              echo $value["chat"];
            ?>
                    </span>
                </div>
                <?php } else if($value["user"] == 'ADMIN') { ?>
                <div class="m-4 text-black flex justify-end  ">
                    <span class="bg-gray-300 p-2 rounded-md shadow-md">
                        <?php 
              echo $value["chat"];
            ?>

                    </span>
                </div>
                <?php } } ?>
            </div>
            <form method=POST action="" id="chatform">
            <div class="flex w-full  bottom-0 container mx-auto p-4">
                <textarea class="h-18 w-10/12 rounded-md p-2" id="chat" name="chat" form="chatform">

            </textarea>

                <div class="bg-blue-800 w-1/12 h-[45px] py-[10px] px-[25px] shadow-lg rounded-full m-2 "><button type="submit" id="newchat" name="newchat">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
                  
                </div>
            </div>
            </form>
        </div>
    </div>




</body>
<footer class="mt-24 ">

</footer>

</html>