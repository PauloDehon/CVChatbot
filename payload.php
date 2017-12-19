<?php

include "functions.php";
include "sends.php";

function eventos($evento, $senderId, $accessToken){

    switch($evento){
      case comecar:
        menuTipo($senderId, $accessToken);
        break;
      case tipo_presencial:
        menuCampus($senderId, $accessToken, "presencial");
        sleep(3);
        menuAcesseiCampus($senderId, $accessToken, "presencial");
        break;
      case tipo_ead:
        menuCampus($senderId, $accessToken, "ead");
        sleep(3);
        menuAcesseiCampus($senderId, $accessToken, "ead");
        break;
      case sim_campus_ead:
        menuCampusSim($senderId, $accessToken, "ead");
        sleep(3);
        menuPerfilSim($senderId, $accessToken);
        break;
      case sim_campus_presencial:
        menuCampusSim($senderId, $accessToken, "presencial");
        sleep(3);
        menuPerfilSim($senderId, $accessToken);
        break;
      case nao2_campus_ead:
        suporte1($senderId, $accessToken, "ead");
        break;
      case nao2_campus_presencial:
        suporte1($senderId, $accessToken, "presencial");
        break;
      //regularizada situação de login
      case regularizei1_ead:
        menuCampusSim($senderId, $accessToken, "ead");
        menuPerfilSim($senderId, $accessToken);
        break;
      case regularizei1_presencial:
        menuCampusSim($senderId, $accessToken, "presencial");
        menuPerfilSim($senderId, $accessToken);
        break;
      //Caso não consiga realizar o login
      case nao_campus_ead:
        menuCampusNao($senderId, $accessToken, "ead");
        break;
      case nao_campus_presencial:
        menuCampusNao($senderId, $accessToken, "presencial");
        break;
      //Após atualizar o perfil
      case atualizei:
        menuAtualizei($senderId, $accessToken);
        break;
      //Mensagem de confirmação
      case sim_confirma:
        //Dá boas-vindas ao usuário
        menuSimConfirma($senderId, $accessToken);
        break;
      case nao_verificado:
        //Pede para conferir os dados informados
        menuNaoConfirma($senderId, $accessToken);
        break;
      //caso não receba msgm de confirmação
      case verificado:
        menuVerifiquei($senderId, $accessToken);
        break;
      //envia para suporte se nao receber mensagem de confirmação
      case nao_verifiquei:
        suporte2($senderId, $accessToken);
        break;
        
      case regularizei2:
        menuAtualizei($senderId, $accessToken);
        break;
      case codUser:
        sendTextMessage($senderId, $senderId, $accessToken);
        break;
      case acessei_campus:
        menuAcesseiCampus($senderId, $accessToken);
        break;
      case acessei_perfil:
        menuAcesseiPerfil($senderId, $accessToken);
        break;
      case sim_perfil:
        menuPerfilSim($senderId, $accessToken);
        break;
      //botão do menus persistente "pular configuração"
      case pular:
        menuSimConfirma($senderId, $accessToken);
        break;
      default:
          sendTextMessage("comando invalido", $senderId, $accessToken);
          break;
    }
}

?>