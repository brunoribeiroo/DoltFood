@extends('layout/principal')

@section('conteudo')
<div class="container">


  <div class="row">

    
 

    
    <?php for($i=1;$i<=count($retorno_principal);$i++){  ?>
     <div class="col-sm">
    <img  src="/imagem/cardapio.png">
    <label><?php  echo $retorno_principal[$i]['nome'] ?></label><br>
    <label><b>Valor:</b> R$5,00</label><br>
    <label><?php  echo $retorno_principal[$i]['ingrediente']; ?></label><br>
    <label><?php  echo $retorno_principal[$i]['tipo_cardapio']; ?></label><br>
    <a href="/pedido/lista_ingredientes/<?php echo  $retorno_principal[$i]['cardapio_id'].'&'.$retorno_principal[$i]['pedido_id']; ?> ">Adicionar</a>
    </div>
 
    
    
<?php  }?>
    
  </div>


</div>
@stop
