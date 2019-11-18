

<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <link rel="stylesheet" type="text/css" href="/css/app.css"> -->   
	<link rel="stylesheet" type="text/css" href="/css/menu.css">


   
	<title>DoltFood</title>
	
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="/css/bootstrap.css" >
    <!-- Our Custom CSS -->

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
     <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
     <!-- jQuery CDN - Slim version (=without AJAX) -->

    
    <!-- Bootstrap JS -->
   
    <!-- jQuery Custom Scroller CDN -->
   


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
     <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="/js/funcoes.js" type="text/javascript" charset="utf-8" async defer></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
             $('#sidebar-rightCollapse').on('click', function () {
                $('#sidebar-right,#content').toggleClass('active-right');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

        });
    </script>
</head>
<body>
	<div class="wrapper">
	 <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>DoltFood</h3>
            </div>
            <?php 

         /*   echo "<pre>";
            print_r($_SERVER);
            echo "</pre>";*/

            

            if(\Auth::check()){?>
            <ul class="list-unstyled components">
               
                <li      >
                    <a class="tag_a" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cardapio</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li   >
                            <a class="tag_a" href="/cardapio/" >Lista</a>
                        </li>
                        <li>
                            <a class="tag_a" href="/cardapio/novo">Novo</a>
                        </li>
                        <li>
                            <a class="tag_a" href="/tipo_cardapio/">Tipos de Cardápio</a>
                        </li>
                        <li>
                            <a class="tag_a" href="/tipo_cardapio/novo">Adicionar tipos de Cardápio</a>
                        </li>
                    </ul>
                </li>
                  <li     >
                    <a class="tag_a" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ingredientes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a class="tag_a" href="/ingrediente/" >Lista</a>
                        </li>
                        <li>
                            <a class="tag_a" href="/ingrediente/novo">Novo</a>
                        </li>
                        <li>
                            <a class="tag_a" href="/tipo_ingrediente/">Tipos de Ingrediente</a>
                        </li>
                        <li>
                            <a class="tag_a" href="/tipo_ingrediente/novo">Adicionar tipos de Ingrediente</a>
                        </li>
                    </ul>
                </li>
          
                <li    >
                    <a class="tag_a" href="/">Novo Pedido</a>
                </li>
                
                <li    >
                    <a class="tag_a" href="/grafico/lista/">Relatórios</a>
                </li>

                <li    >
                    <a class="tag_a" href="/pedidostela/lista/">Pedidos Pendentes</a>
                </li>
                
            </ul>

            <ul class="list-unstyled CTAs">

        <?php }else{
            ?>
            <table class="table">
            <?php  
            $cardapio_antigo="";
            if(session()->get('carrinho')){              
                $array_carrinho=session()->get('carrinho');
            
            for ($i=0; $i < count($array_carrinho); $i++) { 
                if(isset($array_carrinho[$i])){
                    
               
                $cardapio_descr=$array_carrinho[$i]['cardapio_descr'];
           


 if($cardapio_descr!=$cardapio_antigo){?>
      <tr> <td colspan="4"><b><?= $array_carrinho[$i]['cardapio_descr'] ?></b></td></tr>

 <?php }else{?>


<?php } 
$cardapio_antigo=$cardapio_descr;

}  }?>



        <?php   }else{?>
 <button type="button" id="monta_pedido" class="btn btn-danger" onclick="window.location.href='/'">
                      Montar Pedido
                        
                    </button> 
       <?php  }}?>
        </nav>
<h1></h1>
</table>
</div>


   <div id="content">
   	 <button type="button" id="sidebarCollapse" class="btn btn-danger">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button> 

                    
                     <?php 
            if(\Auth::check()){?>
                      <button onclick="window.location.href='/logout'" type="button" id="sidebarCollapse" class="btn btn-danger">
                       
                        <span>Sair</span>
                    </button>   
                   <?php } else {?>
    <button onclick="window.location.href='/login'"type="button" id="sidebarCollapse" class="btn btn-danger">
                       
                        <span>Entrar</span>
                    </button> 

                   <?php } ?>


<h1></h1>



   
@yield('conteudo')
        
    </div>
 

</body>
</html>