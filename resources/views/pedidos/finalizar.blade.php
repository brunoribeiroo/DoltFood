@extends('layout/principal')

@section('conteudo')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
	
	window.onload = GerarQR('<?php echo $pedido;?>');



</script>
	
	<center><h3>Seu pedido foi criado ! #<?php echo $pedido;?></h3></center>
	<center><h4>Aprensente esse QR Code para o Vendedor</h4></center>
	<center><div id='conteudo'>
		

	</div></center><br>
	<center><button type="button" id="sidebarCollapse" class="btn btn-danger" onclick="window.location.href='/' ">
                        <span>Selecionar mais</span>
                    </button>   </center>
                    <?php 

                    if(\Auth::check()){?>
<center><button type="button" id="sidebarCollapse" class="btn btn-danger" onclick="window.location.href='/pedido/lista_vendedor/<?php echo $pedido;?>' ">
                        <span>SFinalizar Manualmente</span>
                    </button>   </center>
                   <?php }?>
                    


<?php

?>


@stop
