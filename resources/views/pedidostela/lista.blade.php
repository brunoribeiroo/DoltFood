@extends('layout/principal')

@section('conteudo')


<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  position: left;
  margin-left: 20px;
  
}

th{
    background-color: #0073ff;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #83bafc;
  text-align: center;
}

.button {
  background-color: #0073ff;
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


<div style="float: left; margin-left: 100px">
<br><h2> Pedidos pendentes</h2>


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


<div style="float: right; margin-right: 220px;  margin-top: 25px">
    <h2>X-Egg</h2>
    
</div>

<div style="float: right; margin-right: 120px; margin-top: 25px">
    <img src="https://image.flaticon.com/icons/png/512/26/26393.png" width=100 height=100>
</div>

<div style="float: right; margin-right: 130px;">
    <button class="button" onclick="reset()">Finalizar &#9745;</button>
    <button class="button" onclick="start()">Iniciar &#9658;</button>
    <button class="button" onclick="stop()">Suspender &#8718;</button>
</div>

<div style="float: right; margin-right: -320px;  margin-top: 190px">
    <h2>Ingredientes</h2>
</div>

<div style="float: right; margin-right: -350px;  margin-top: 250px">
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
    <td>salada</td>
  </tr>
</table>
</div>

<div style="float: left; margin-top: 150px">
<div class="chronometer">
        <div id="screen" style="margin-left: 100px;">00 : 00 : 00 : 00</div>
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
