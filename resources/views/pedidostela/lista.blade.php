@extends('layout/principal')

@section('conteudo')

<div style="float: left;">
<br><h2> Pedidos pendentes</h2>

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
</style>


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
    <button class="button">Finalizar</button>
    <button class="button">Iniciar</button>
    <button class="button">Cancelar</button>
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

<div style="float: left; margin-top: 250px">
<h1>CRONOMETRO</h1>
</div>

@stop
