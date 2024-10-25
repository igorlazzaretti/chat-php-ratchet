Meu Passo-a-Passo:

Instalei o Ratchet na pasta /API
# composer require cboden/ratchet

Crio a pasta api/scr e nela crio o SistemaChat.php
No composer.json acrescento:

    "autoload": {
        "psr-4": {
            "Api\\Websocket\\": "src/"
        }
    },

E realizo o comando
# composer dumpautoload

Cria o Servidor em /api
-> servidor_chat.php

Roda o servidor:
# php servidor_chat.php

Não deve haver erros

