

<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <link rel="stylesheet" type="text/css" href="/css/app.css"> -->   
	<link rel="stylesheet" type="text/css" href="/css/menu.css">
      <script src="/js/jquery.js" type="text/javascript" charset="utf-8" async defer></script>

    <script src="/js/funcoes.js" type="text/javascript" charset="utf-8" async defer></script>
   
	<title>DoltFood</title>
	
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
     <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

</head>
<body>
	<div class="wrapper">
	 <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>DoltFood</h3>
            </div>
            <?php 
            if(\Auth::check()){?>
            <ul class="list-unstyled components">
               
                <li class="active">
                    <a class="tag_a" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cardapio</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
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
                  <li >
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
          
                <li>
                    <a class="tag_a" href="/pedido/lista/">Novo Pedido</a>
                </li>
                
                <li>
                    <a class="tag_a" href="/grafico/lista/">Relatórios</a>
                </li>
                
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a class="tag_a" href="" class="download">Sair</a>
                </li>
                <li>
                    <a class="tag_a" href="" class="download">Fale Conosco</a>
                </li>
            </ul>
        <?php }else{
            ?>
            <table class="table">
            <?php
     

            if(isset($pedido_cardapio)){              

           
            foreach($pedido_cardapio as $p):?>
<?php
 $cardapio_descr=$p->cardapio_descr;

 if($cardapio_descr!=$cardapio_antigo){?>
        <td colspan="4"><b><?= $p->cardapio_descr ?></b></td>

 <?php }else{?>


<?php } ?>
<tr>
<td><?= $p->ingrediente_descr ?></td> 
<td><?= $p->ingrediente_valor ?></td>


</td></tr>

<?php $cardapio_antigo=$cardapio_descr; ?>
<?php endforeach ?>
        <?php   }else{?>
 <button type="button" id="monta_pedido" class="btn btn-info" onclick="window.location.href='/'">
                      Montar Pedido
                        
                    </button> 
       <?php  }}?>
        </nav>
<h1></h1>
</table>
</div>


   <div id="content">
   	 <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button> 

                    
                     <?php 
            if(\Auth::check()){?>
                      <button onclick="window.location.href='/logout'" type="button" id="sidebarCollapse" class="btn btn-info">
                       
                        <span>Sair</span>
                    </button>   
                   <?php } else {?>
    <button onclick="window.location.href='/login'"type="button" id="sidebarCollapse" class="btn btn-info">
                       
                        <span>Entrar</span>
                    </button> 

                   <?php } ?>


<h1></h1>



   
@yield('conteudo')
        
    </div>
  <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"  crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

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

</body>
</html>