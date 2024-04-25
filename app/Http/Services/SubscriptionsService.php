<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class SubscriptionsService
{
    public static function registrarInscricao(Request $request, $token)
    {
        $url = 'http://eventsfull.com.br/api/subscriptions';

        // Cabeçalhos personalizados que deseja enviar
        $headers = array(
            'Content-Type: application/json', // Exemplo de cabeçalho Content-Type
            'Authorization: Bearer ' . $token
        );

        $data = array(
            "users_id" => $request->users_id,
            "eventos_id" => $request->eventos_id
        );

        $jsonData = json_encode($data);
        $ch = curl_init();

        // Configura as opções da requisição cURL
        curl_setopt($ch, CURLOPT_URL, $url); // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Se true, retorna o resultado da transferência como string ao invés de imprimi-lo diretamente
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Se true, segue redirecionamentos
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true); // Define o método HTTP como POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData); // Define os dados a serem enviados no corpo da requisição

        // Executa a requisição cURL e obtém a resposta
        $response = curl_exec($ch);

        // Verifica se ocorreu algum erro durante a requisição
        if(curl_errno($ch)){
            return curl_error($ch);
        }

        // Fecha a sessão cURL
        curl_close($ch);

        return $response;
    }

    public static function buscarInscricao($args, $token)
    {
        $url = 'http://eventsfull.com.br/api/subscriptions/' . $args;
        //die(var_export($url));

        // Cabeçalhos personalizados que deseja enviar
        $headers = array(
            'Content-Type: application/json', // Exemplo de cabeçalho Content-Type
            'Authorization: Bearer ' . $token
        );

        $ch = curl_init();

        // Configura as opções da requisição cURL
        curl_setopt($ch, CURLOPT_URL, $url); // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Se true, retorna o resultado da transferência como string ao invés de imprimi-lo diretamente
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Se true, segue redirecionamentos
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Executa a requisição cURL e obtém a resposta
        $response = curl_exec($ch);

        // Verifica se ocorreu algum erro durante a requisição
        if(curl_errno($ch)){
            echo 'Erro cURL: ' . curl_error($ch);
        }

        // Fecha a sessão cURL
        curl_close($ch);

        return $response;
    }

    public static function cancelSubscription($args, $token)
    {
        $url = 'http://eventsfull.com.br/api/subscriptions/cancel/' . $args;

        // Cabeçalhos personalizados que deseja enviar
        $headers = array(
            'Content-Type: application/json', // Exemplo de cabeçalho Content-Type
            'Authorization: Bearer ' . $token
        );

        $ch = curl_init();

        // Configura as opções da requisição cURL
        curl_setopt($ch, CURLOPT_URL, $url); // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Se true, retorna o resultado da transferência como string ao invés de imprimi-lo diretamente
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Se true, segue redirecionamentos
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true); // Define o método HTTP como POST

        // Executa a requisição cURL e obtém a resposta
        $response = curl_exec($ch);

        // Verifica se ocorreu algum erro durante a requisição
        if(curl_errno($ch)){
            echo 'Erro cURL: ' . curl_error($ch);
        }

        // Fecha a sessão cURL
        curl_close($ch);

        return $response;
    }

    public static function checkin($args, $token)
    {
        $url = 'http://eventsfull.com.br/api/checkin/' . $args;

        // Cabeçalhos personalizados que deseja enviar
        $headers = array(
            'Content-Type: application/json', // Exemplo de cabeçalho Content-Type
            'Authorization: Bearer ' . $token
        );

        $ch = curl_init();

        // Configura as opções da requisição cURL
        curl_setopt($ch, CURLOPT_URL, $url); // Define a URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Se true, retorna o resultado da transferência como string ao invés de imprimi-lo diretamente
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Se true, segue redirecionamentos
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true); // Define o método HTTP como POST

        // Executa a requisição cURL e obtém a resposta
        $response = curl_exec($ch);

        // Verifica se ocorreu algum erro durante a requisição
        if(curl_errno($ch)){
            echo 'Erro cURL: ' . curl_error($ch);
        }

        // Fecha a sessão cURL
        curl_close($ch);

        return $response;
    }
}