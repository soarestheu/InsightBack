<!DOCTYPE html>
<html>
    <head>
        <title>Email</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div style="width: 100%; text-align:center; background-color:#fff; padding: 10px;">
            <div style="font-size: 20px;font-weight: bold;">
                {{$mailData['subject']}}
            </div>
            <hr>
            <div style="text-align:left;">
                <p>
                Envio automático pelo sistema de Tarefas.<br/><br/>

                Prezado<br/><br/>

                Seu usuário foi criado com sucesso!
                </p>

                <p>
                    Data de cadastro: {{date("d/m/Y H:i")}}
                </p>
            </div>
        </div>
    </body>
</html>
