@extends('layout/principal')

@section('conteudo')

<br>
<?php 

$cardapio_descr_nome="";



$pedido_id=$pedido_id;


/*foreach($pedido_cardapio as $t){

    $cardapio_descr_nome=$t->cardapio_descr;
}*/
  //  echo $cardapio_descr_nome;

$cardapio_descr="";
$cardapio_antigo="";

?>
<meta name="csrf-token" content="{{ csrf_token() }}">
<table>
	<tbody>
		<tr>
			<td><button type="button" id="sidebarCollapse" class="btn btn-info" onclick="window.location.href='/'">                       
                        <span>Selecionar mais</span>
                    </button>   </td>
                    <td><button type="button" id="sidebarCollapse" class="btn btn-info" onclick="GerarQR(<?php echo $pedido_id;?>)">
                        <span>Gerar QR Code do Pedidos                      </span>
                    </button>   </td>

		</tr>
	</tbody>
</table>

<table class="table">

<?php  

			
			
			$array_carrinho=session()->get('carrinho');

			$valor=0;
			for ($i=0; $i <= 100; $i++) { 
				if(isset($array_carrinho[$i])){


				$cardapio_descr=$array_carrinho[$i]['cardapio_descr'];
			if($cardapio_descr!=$cardapio_antigo){?>
				<?php

				$valor=$valor+$array_carrinho[$i]['cardapio_valor'];

				 ?>
					<tr><td colspan="4"><b><?= $cardapio_descr ?></b></td></tr>
					<td><?= $array_carrinho[$i]['ingrediente_descr'] ?></td> 

<td><a href='/pedido/excluir/<?= $i; ?>&<?php echo  $pedido_id; ?>&<?php echo  $array_carrinho[$i]['cardapio_id']; ?>' > Excluir </a></td> 
			<?php }else{ ?>
					<tr>
<td><?= $array_carrinho[$i]['ingrediente_descr'] ?></td> 

<td><a href='/pedido/excluir/<?= $i; ?>&<?php echo  $pedido_id; ?>&<?php echo  $array_carrinho[$i]['cardapio_id']; ?>' > Excluir </a></td>  

</tr>


			<?php
			}

			 $cardapio_antigo=$cardapio_descr; 
			 }
			}
?>
<tr><TH>TOTAL :</TH><td> R$ <?php echo number_format($valor, 2);?></td></tr>

<br>


<div id="conteudo">
	
</div>



</table>
<span style="align:right">

</span><BR>

<button type="button" id="sidebarCollapse" class="btn btn-info" onclick="window.location.href='/pedidos/finalizar/'">
                        <span>Finalizar pedido</button>   </span>
                    </button>   



@stop