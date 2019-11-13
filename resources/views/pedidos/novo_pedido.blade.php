@extends('layout/principal')

@section('conteudo')




<div class="container">


  
  <div class="row">

    


    
    <?php 


    
    $imagem_padrao="/imagem/cardapio.png";
    for($i=1;$i<=count($retorno_principal);$i++){
    $id_imagem=$retorno_principal[$i]['cardapio_id'];
  

      ?>
     <div class="col-sm  cardapio_label">
<div class="container_cardapio">
  <div class="images">
    <img width="150px"  height="150px" src=<?php echo asset('storage/cardapio_imagem/cardapio_'.$id_imagem.'.PNG')?> >
    
  </div>
  
    <div class="product">
    <label><h1 class="titulo_cardapio"><?php  echo $retorno_principal[$i]['nome'] ?></h1></label><br>
    <label><h1 class="linha_cardapio"><b></b> R$5,00</h2></label><br>
    <label><p  class="desc paragrafo"><?php  echo $retorno_principal[$i]['ingrediente']; ?>-<?php  echo $retorno_principal[$i]['tipo_cardapio']; ?></p></label><br>
   
     <div class="buttons">
      <a  class="btn btn-danger" href="/pedido/addCardapio/<?php echo  $retorno_principal[$i]['cardapio_id'].'&'.$retorno_principal[$i]['pedido_id']; ?> ">Adicionar</a>
    </div>
    
    </div>
 
       
  </div>  
     
</div>
<?php  }?>


</div>
@stop
