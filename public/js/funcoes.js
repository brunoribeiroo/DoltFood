function GerarQR(pedido_id) {

	 $.ajax({
        'processing': true, 
        'serverSide': true,
          type: "POST",
          data: {pedido_id: pedido_id,_token:$('meta[name="csrf-token"]').attr('content')},
          url: "/pedidos/gerarQR",
          success: function(s) {
           document.getElementById('conteudo').innerHTML=s;
          }
      });	
}