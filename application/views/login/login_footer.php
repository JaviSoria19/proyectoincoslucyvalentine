        </div>
    <script type="text/javascript">
    function mostrarPassword(){
        var cambio = document.getElementById("contrasenha");
        var recambio = document.getElementById("recontrasenha");
        if(cambio.type == "password"){
          cambio.type = "text";
          recambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          recambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
      } 
      
      $(document).ready(function () {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
  </body>
</html>