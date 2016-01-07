

<div id="bigBox" style="z-index:-1;border:1px solid white; width:800px; overflow:auto; display:block; float:right; margin-right: 50px; margin-top:20px;background-color:black; opacity: 0.85"><?php echo
        "<input id='leaveDate' style='display:none' value='".$_POST['leaveDate']."'><input id='numberOfPpl' style='display:none' value='".$_POST['numberOfPpl']."'><input id='arriveDate' style='display:none' value='".$_POST['arriveDate']."'>";
                            ?>
</div>

<script>

    function verifyVaga(){
        var arriveDate = $('#arriveDate').val();
        var leaveDate = $('#leaveDate').val();
        var numberOfPpl = $('#numberOfPpl').val();

        re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;

        if(arriveDate != '') {
            if(regs = arriveDate.match(re)) {

                alert(regs[1]);
                // day value between 1 and 31
                if(regs[1] > regs2[1]) {
                    alert("Invalid value for day: " + regs[1]);
                    return false;
                }
            }
         }
        else
            alert("HI");

        $.post('/reserva/verifyReserva',{postarrive:arriveDate,postleave:leaveDate,postnumber:numberOfPpl},
            function(data){
                $('#bigBox').html(data);

            });
    }

    verifyVaga();
</script>