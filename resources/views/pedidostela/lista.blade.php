@extends('layout/principal')

@section('conteudo')


<style>
table {
  font-family: arial, sans-serif;
  
  position: left;
  margin-left: 20px;
  
}

th{
    background-color: #FF0000;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #ff5c5c;
  text-align: center;
}

.gridpedidos{
    padding: 0px;
    margin-left: 0px;
    display: grid;
    grid-template-columns: 600px 500px;
}

.button {
  background-color: #FF0000;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  margin-top: 50px;
}

#screen {
    font-family: Calibri,Arial;
    font-weight: 300;
    font-size: 45px;
    width: 330px;
    height: 50px;
    color: gray;
    letter-spacing: 3px;
}
</style>

<h2> Pedidos pendentes </h2><br>
<div class="gridpedidos">
<div  style="margin-left: 100px">


<table width="250px";>
  <tr>
    <th> Pendentes </th>
  </tr>
  <tr>
    <td>X-Egg</td>
  </tr>
  <tr>
    <td>X-Salada</td>
  </tr>
  <tr>
    <td>X-Burguer</td>
  </tr>
  <tr>
    <td>X-Egg</td>
  </tr>
</table>

</div>



    
<div>
    <img src="https://image.flaticon.com/icons/png/512/26/26393.png" width=100 height=100>
<div style="margin-left: 150px; margin-top: -50px">
    
<h2>X-Egg</h2>
</div>
<div>
    <button class="button" onclick="reset()">Finalizar &#9745;</button>
    <button class="button" onclick="start()">Iniciar &#9658;</button>
    <button class="button" onclick="stop()">Suspender &#8718;</button>

</div>
</div>

<div ><br><br><br><br><br>
<div class="chronometer">
        <div id="screen" style="margin-left: 100px;">00 : 00 : 00 : 00</div>
    </div>
</div>


<div style="margin-left: 80px">
<div style="margin-left: 50px"><br><br>
    <h2>Ingredientes</h2>
</div>
<div>
<table width="250px";>
  <tr>
    <th> Necessário </th>
  </tr>
  <tr>
    <td>Pão</td>
  </tr>
  <tr>
    <td>Hamburguer</td>
  </tr>
  <tr>
    <td>Ovo</td>
  </tr>
  <tr>
    <td>Salada</td>
  </tr>
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

</script>

@stop
