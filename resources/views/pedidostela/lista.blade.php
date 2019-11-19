@extends('layout/principal')

@section('conteudo')

<?php
$cardapio_pendentes=$dados['cardapio_pendentes'];
$pedido_atual=$dados['pedido_atual'];


$pedido_id=0;
$cardapio_id=0;
$cardapio_descr="";

foreach ($pedido_atual as $t) {
  $pedido_id=$t->pedido_id;
  $cardapio_id=$t->cardapio_id;
  $cardapio_descr=$t->cardapio_descr;
}

?>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>



</style>

<h2> Pedido em Produção</h2><br>
<div class="container">
<div class="row"  >
<div class="col">

<script type="text/javascript">

</script>

<table  class="table table-striped table-bordered table-hover" >

  <tr>
    <th> Pendentes </th>
    <th> Número do Pedido</th>
  </tr>
  <?php 
  foreach ($cardapio_pendentes as $p) {

  ?>
  <tr>
    <td><?php echo $p->cardapio_descr; ?></td>
    <td><?php echo $p->pedido_id; ?></td>
  </tr>
  

  <?php } ?>
</table>



</div>
<div class="col">

<div class="chronometer">
        <div id="screen" style="font-size:40px;margin-left: 100px;">00 : 00 : 00 : 00</div>
    </div>
</div>

</div>
<div class="w-100">
    
<div  class="col" >
    <img src=<?php echo asset('storage/cardapio/cardapio_'.$cardapio_id.'.PNG')?>  width=300 height=300><h2><?php echo  $cardapio_descr; ?></h2>
    
    <div class='container'>
      <div class="row">
          <div class="col" id="bt_finalizar" style="display: none"> <button class="btn btn-danger" onclick="finalizar_pedido()">Finalizar &#9745;</button></div>

        <div class="col">  <button class="btn btn-danger" onclick="start()">Iniciar &#9658;</button></div>
        <div class="col">    <button class="btn btn-danger" onclick="stop()">Suspender &#8718;</button></div>
      </div>
    </div>
    
  


  </div>
<div class="col" >
    


   
</div>
<div class="col">
  <table   class="table table-striped table-bordered table-hover" >
  <tr>
    <th>Ingredientes do Cardápio </th>
  </tr>
  <?php 
    foreach ($pedido_atual as $x) {
    


  ?>
  <tr>
    <td><?php echo $x->ingrediente_descr ?></td>
  </tr>


  <?php
}
  ?>

</table>
</div>
</div>

  


</div>


<script type="text/javascript">
    window.onload = function() {
   pantalla = document.getElementById("screen");
}
var isMarch = false; 
var acumularTime = 0; 
function start () {
         if (isMarch == false) { 
            timeInicial = new Date();
            control = setInterval(cronometro,10);
            isMarch = true;
            }
            document.getElementById('bt_finalizar').style.display='';
         }
function cronometro () { 
         timeActual = new Date();
         acumularTime = timeActual - timeInicial;
         acumularTime2 = new Date();
         acumularTime2.setTime(acumularTime); 
         cc = Math.round(acumularTime2.getMilliseconds()/10);
         ss = acumularTime2.getSeconds();
         mm = acumularTime2.getMinutes();
         hh = acumularTime2.getHours()-21;
         if (cc < 10) {cc = "0"+cc;}
         if (ss < 10) {ss = "0"+ss;} 
         if (mm < 10) {mm = "0"+mm;}
         if (hh < 10) {hh = "0"+hh;}
         pantalla.innerHTML = hh+" : "+mm+" : "+ss+" : "+cc;
         }

function stop () { 
         if (isMarch == true) {
            clearInterval(control);
            isMarch = false;
            }     
         }      

function resume () {
         if (isMarch == false) {
            timeActu2 = new Date();
            timeActu2 = timeActu2.getTime();
            acumularResume = timeActu2-acumularTime;
            
            timeInicial.setTime(acumularResume);

            control = setInterval(cronometro,10);
            
            isMarch = true;
            }     
         }

function reset () {
         if (isMarch == true) {
            clearInterval(control);
            isMarch = false;
            }
         acumularTime = 0;
         pantalla.innerHTML = "00 : 00 : 00 : 00";
         }
  
  function finalizar_pedido(){

    cc = Math.round(acumularTime2.getMilliseconds()/10);
         ss = acumularTime2.getSeconds();
         mm = acumularTime2.getMinutes();
         hh = acumularTime2.getHours()-21;
         if (cc < 10) {cc = "0"+cc;}
         if (ss < 10) {ss = "0"+ss;} 
         if (mm < 10) {mm = "0"+mm;}
         if (hh < 10) {hh = "0"+hh;}
         tempo_atual  = hh+":"+mm+":"+ss+"."+cc;
         pedido_id='<?php echo $pedido_id;?>';
         cardapio_id='<?php echo $cardapio_id;?>';


     $.ajax({
        'processing': true, 
        'serverSide': true,
          type: "POST",
          data: {pedido_id: pedido_id,cardapio_id:cardapio_id,tempo_final:tempo_atual,_token:$('meta[name="csrf-token"]').attr('content')},
          url: "/pedidostela/finalizar_cardapio",
          success: function(s) {
           window.location.reload();
          }
      }); 
  }
</script>

@stop
