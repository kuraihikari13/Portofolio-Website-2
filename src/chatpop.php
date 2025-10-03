
<div class="flex justify-end  ">
  <div class="fixed z-50 bottom-0 w-2/12  ">
    <div onclick="showchatbox()" class=" cursor-pointer flex shadow-2xl text-white bg-blue-600 h-8 ">
      <h1 class="py-2 pl-16">Hubungi Guru</h1>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
      </svg>
    </div>

    <script>

        $(document).on('click', '#newchat', function() {
          $.ajax({
            type:"POST",
            url:"controller/chat_input.php",
            datatype: "json",
            data: {
              user:"Cunuk",
              chat:$('#chat').val(),
            },
          })
        });

    </script>
    <div id="chatbox" class="">
      <div class=" cursor-pointer  shadow-2xl bg-gray-200 h-[500px] overflow-auto ">
        <?php 

          $chat = file_get_contents('controller/chatlog.json');

          $chatlog = json_decode($chat, true);

          foreach($chatlog as $key => $value){

            if($value["user"] == 'Cunuk')
            {

        ?>
        <div class=" flex justify-end">
          <span class="rounded-md shadow-md p-2 m-2 bg-white ">
            <?php 
              echo $value["chat"];
            ?>

          </span>
        </div>

      <?php } else if($value["user"] == 'ADMIN') { ?>
      <div class="flex">
          <span class="rounded-md shadow-md bg-blue-800 text-white p-2 m-2 "><?php echo $value['chat']; ?></span>
        </div>

      <?php } } ?>
      </div>
      <form method=POST action="" id="chatform">
      <div class="w-full flex bg-gray-200 ">
        <textarea class="w-10/12 shadow-2xl px-2" id="chat" name="chat" form="chatform"></textarea>
   
        <div class="bg-blue-800 w-2/12 h-[45px] py-[10px] px-[10px] shadow-lg rounded-full mx-2 ">
           <button type="submit" id="newchat" name="newchat">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rotate-90" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
          </svg>
    </button>
  </form>
        
       
        </div>
      </div>
    </div>



  </div>
</div>

<script>
  function showchatbox() {
    if (document.getElementById('chatbox').classList.contains('hidden')) {

      document.getElementById('chatbox').classList.remove('hidden')

    } else
      document.getElementById('chatbox').classList.add('hidden')


  }
</script>
