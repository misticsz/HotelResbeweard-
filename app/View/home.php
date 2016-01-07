<script>

    function loadGrid(){

        $.ajax({
            type: "POST",
            url: "/home/loadGrid",
            success: function(system){
                $("#inicio").empty();
                $("#inicio").html(system);
            }
        });
    }
</script>

<div style="position:absolute;margin-left:30%; margin-top:150px;"><label style="font-family:'Century Gothic'; color:black; font-size:30px;"><img onClick="quickReserva()" style="position:absolute;margin-left:500px;" src="/app/images/logo.jpg"></img>Venha se hospedar conosco.<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspConheça nosso hotel. </label><br><br><label style="margin-left:49%;  color:black; font-size:22px;font-family:'Century Gothic'">Faça sua reserva!</label></div>

