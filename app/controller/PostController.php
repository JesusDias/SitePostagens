<?php

class PostController
{
    public function index($params)
    {
     
        try {
            $Postagem = Postagem::selecionarPorId($params);
         
            //essa primeira linha carrega a pasta que tem as views
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');
            $parametros = array();
            $parametros['id'] = $Postagem->id;
            $parametros['titulo'] = $Postagem->titulo;
            $parametros['conteudo'] = $Postagem->conteudo;
            $parametros['comentarios'] = $Postagem->comentarios;
            $conteudo = $template->render($parametros);
            
            echo $conteudo;
            
  
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function addComent()
		{
			try {
				Comentario::inserir($_POST);

				header('Location: http://localhost/siteDidatico/?pagina=post&id='.$_POST['id']);
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="http://localhost/siteDidatico/?pagina=post&id='.$_POST['id'].'"</script>';
			}
			
		}

    }
