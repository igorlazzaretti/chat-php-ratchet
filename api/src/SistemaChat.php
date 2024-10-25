<?php

namespace Api\Websocket;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class SistemaChat implements MessageComponentInterface
{
    protected $cliente;
    // Método Mágico
    public function __construct()
    {
        $this->cliente = new \SplObjectStorage;
    }
    // onOpen
    // Abre conexão para um novo cliente
    public function onOpen(ConnectionInterface $conn)
    {   // Adiciona cliente na lista
        $this->cliente->attach($conn);
        echo "Nova conexão: {$conn->resourceId}\n\n";
    }
    // onMessage
    //
    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Percorre a lista de usuários conectados
        foreach($this->cliente as $cliente){

            if($from !== $cliente){
            // Envia mensagens para Usuários
                $cliente->send($msg);
            }
        }
        echo "Usuário {$from->resourceId} enviou uma mensagem \n\n";
    }
    //onClose
    // Fecha conexão com o cliente
    public function onClose(ConnectionInterface $conn)
    {
        $this->cliente->detach($conn);
        echo "Usuário {$conn->resourceId} desconectou. \n\n";
    }
    //onError
    // Em caso de erro do Websocket
    public function onError(ConnectionInterface $conn, Exception $e)
    {
        // Fecha conexão com o cliente
        $conn->close();
        echo "Ocorreu um erro: {$e->getMessage()} \n\n";
    }

}