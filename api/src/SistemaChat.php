<?php

namespace Api\Websocket;

use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class SistemaChat implements MessageComponentInterface
{
    protected $cliente;
    //
    public function __construct(){

        $this->cliente = new \SplObjectStorage;
    }
    // Abre conexão para um novo cliente
    public function onOpen(ConnectionInterface $conn)
    {   // Adiciona cliente na lista
        $this->cliente->attach($conn);
        echo "Nova conexão: {$conn->resourceId}\n\n";
    }
    public function onMessage(ConnectionInterface $from, $msg)
    {
        // Percorre a lista de usuários conectados
        
    }

}