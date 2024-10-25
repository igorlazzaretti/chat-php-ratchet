<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat com Ratchet</title>
</head>
<body>
    <h2>Chat</h2>

    <!--  -->
    <label>Nova Mensagem</label>
    <input type="text" name="mensagem" id="mensagem" placeholder="Digite aqui">
    <br>
    <br>

    <input type="submit" onclick="enviar()" value="Enviar">
    <br>
    <br>


    <!-- Seletor para receber as mensagens enviadas pelo Chat -->
    <span id="mensagem-chat"></span>

    <script>

        const mensagemChat = document.getElementById("mensagem-chat");

        const ws = new Websocket('ws://localhost:8088');

        ws.onopen = (e) => {
            console.log('Conectado!');
        }

        ws.onmessage = (mensagemRecebida) => {
            let resultado = JSON.parse(mensagemRecebida.data)
        }

        mensagemChat.insertAdjacentElement('beforeend', '${resultado.mensagem}')

        const enviar = () => {
            let mensagem = document.getElementById("mensagem");

            let dados = {
                mensagem: mensagem.value
            }
        ws.send(JSON.stringify(dados));

        mensagem.value = '';
        }
    </script>
</body>
</html>