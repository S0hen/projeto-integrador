<?php

    $rota = Route::getRoute('/dashboard/superuser');

    if (!hasUser() || (!authorize($rota)) || ($_SERVER['REQUEST_METHOD'] === 'POST')) {
        header('Location: /');
    
    } else {
        // primeiro eu fiz um método all() em Mesas pra poder criar um array de objeto e poder usar aqui no foreach
        $listamesas = Mesas::all();

        // aqui eu fiz o foreach que tem todas as mesas, independente de mestre nem nada, pra poder mostrar na página
        // principal, e assim mandar o id da mesa por get pra página de edições
        $mesas = [];
        foreach ($listamesas as $linha) {
            $mesa = Mesas::findById($linha['mes_id']);
            if ($mesa) {
                $mesas[] = [
                    'mes_id' => $mesa['mes_id'],
                    'mes_titulo' => $mesa['mes_titulo'],
                    'mes_descricao' => $mesa['mes_descricao'],
                    'mes_usu_idmestre' => $mesa['mes_usu_idmestre']
                ];
            }
        }

        // daí, exatamente mesmo processo, mas pros usuários
        $listausuarios = (new Usuarios(connection()))->all();
        
        $usuarios = [];
        foreach ($listausuarios as $linha) {
            // como Usuarios não é estático, tive que criar uma variável pra poder usar os métodos
            $usermodel = new Usuarios(connection());

            // de resto, praticamente a mesma coisa, única diferença é que usa o email pra procurar, já que é o
            // método que a gente tinha já
            $usuario = $usermodel->find($linha['usu_email']);
            if ($usuario) {
                $usuarios[] = [
                    'usu_id' => $usuario['usu_id'],
                    'usu_nome' => $usuario['usu_nome'],
                    'usu_email' => $usuario['usu_email'],
                    'usu_senha' => $usuario['usu_senha'],
                    'usu_tipo' => $usuario['usu_tipo']
                ];
            }
        }

        include('pages/superuser/controle.php');
    }


        // aqui tipo, o que eu pensei, teria uma lista com todos os usuários e mesas, já que é isso que o superuser
        // mexe principalmente, na mesma vibe de botão dos convites, só que ai seria alterar e deletar, por exemplo
        // nisso, ele seria redirecionado pra página de alterar, se fosse o caso de alterar, ou só usava os deletes
        // de cada um dos modelos que já tem, mas não sei o quão viável/inviável é fazer isso
        // no caso um include pra uma page, com esses lances que falei
?>