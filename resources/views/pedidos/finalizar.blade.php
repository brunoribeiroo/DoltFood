@extends('layout/principal')

@section('conteudo')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
	
	window.onload = GerarQR('<?php echo $pedido;?>');



</script>
	

	<center><div id='conteudo'>
		

	</div></center><br>
	<center><button type="button" id="sidebarCollapse" class="btn btn-danger" onclick="window.location.href='/' ">
                        <span>Selecionar mais</span>
                    </button>   </center>


<?php
	
?>


@stop
