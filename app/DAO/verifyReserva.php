
<?php
/**
 * Created by PhpStorm.
 * User: GabrielAguiar
 * Date: 24/05/14
 * Time: 14:51
 */
    $arriveDate = $_POST['postarrive'];
    $avaliable = false;
    $leaveDate = $_POST['postleave'];
    $number = $_POST['postnumber'];
    $data = DBConnection::select("SELECT * FROM reserva WHERE ResArr between '".$arriveDate."' and '".$leaveDate."'");
    $i = 0;
    $newRes = new ReservaData();

    $newRes->maxSingle-=$number;
    $newRes->maxCouple-=$number/2;
    $newRes->maxLux-=$number;

    foreach($data as $row)
    {
        if($row['ResTip']==1)
            $newRes->maxSingle--;
        if($row['ResTip']==2)
            $newRes->maxCouple--;
        if($row['ResTip']==3)
            $newRes->maxLux--;


    }
    echo "<div style='color:white; width:91%; margin-top:10px; float:left;'class='gallery items-3'>";
    if($newRes->maxSingle>0)
    {
        $avaliable = true;
        echo "<div id='item-1' class='control-operator'></div>";
    }
    if($newRes->maxCouple>0)
    {
        $avaliable = true;
        echo "<div id='item-2' class='control-operator'></div>";
    }
    if($newRes->maxLux>0)
    {
        $avaliable = true;
        echo "<div id='item-3' class='control-operator'></div>";
    }

    if(!$avaliable)
    {
        echo "<script>document.getElementById('bigBox').style.display='none'; alert('Nao vai ter vaga');window.location.href='/'</script>";
    }
    else{

    echo "  <figure class='item'>
    <h1><label style='margin-top:20px; margin-right:200px;'class='carouselFont'>Single Room !<img style='margin-right:0px; float:right;  margin-top:0px;border:1px solid white; width: 420px; height: 313px;'src='app/images/singleRoom.jpg'></img></h1>
  </figure>";
echo "  <figure class='item'>
    <h1><label style='margin-top:20px; margin-right:200px;'class='carouselFont'>Couples Room !<img style='margin-right:0px; float:right;  margin-top:0px;border:1px solid white; width: 469; height: 313px;'src='app/images/coupleRoom.jpg'></img></h1>
  </figure>";
echo "  <figure class='item'>
    <h1><label style='margin-top:20px; margin-right:200px;'class='carouselFont'>Lux Room !<img style='margin-right:0px; float:right;  margin-top:0px;border:1px solid white; width: 469px; height: 313px;'src='app/images/luxRoom.jpg'></img></h1>
  </figure>";

    echo "  <div style='margin-left:40px;' class='controls'>
    <a href='#item-1' class='control-button'>•</a>
<a href='#item-2' class='control-button'>•</a>
    <a href='#item-3' class='control-button'>•</a>
  </div>";}