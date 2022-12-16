<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Sorteio ISGH</title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/sorteio.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        var sorteados = [];

        $(document).ready(function() {
            $('#button').on('click', function(e) {
                e.preventDefault();
                $('#employees').attr('readonly', 'readonly');
                sortear();
            });
        });

        function sortear() {
            $.ajax({
                url: 'prize',
                type: 'POST',
                dataType: 'json',
                data: 'employees=' + $('#employees').val() + "&sorted=" + sorteados,
                beforeSend: function() {
                    $('#loading').modal();
                },
                success: function(data) {

                    $('#loading').modal('hide');

                    if (data == null) {
                        window.alert('Todos os nomes foram sorteados');
                        $('#button').attr('disabled', 'disabled');
                        return;
                    }

                    $('#employee').html(data.name);
                    $('#myModal').modal();

                    $('#sorted tbody').append('<tr><td>' + data.name + '</td></tr>');

                    sorteados.push(data.name);
                },
                error: function() {

                }
            });
        }
    </script>
</head>

<body>
    <div class="section">
        <div class="container div-esquerda">
            <h1>LISTA DE PARTICIPANTES</h1>
            <form action="prize" method="post" class="well">
                <label for="employees" style="color:aliceblue;">INFORME A LISTA DE PARTICIPANTES:</label>
                <textarea name="employees" id="employees" rows="32" cols="55" style="width: 100%;font-size:12px;"></textarea>
                <br />
                <input id="button" type="submit" value="SORTEAR" class="btn-primary btn-large" />
            </form>
        </div>
        <div class="container div-direita">
            <h1 style="text-align: center; color:aliceblue;">GANHADORES</h1>
            <table id="sorted" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">UNIDADE - MATRICULA - NOME - CARGO</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal hide" id="loading">
        <div class="modal-body">
            <p style="text-align: center;">
                Aguarde enquanto o sorteio é efetuado...
            </p>
            <p style="text-align: center;">
                <img src="img/loadingAnimation.gif" />
            </p>
        </div>
    </div>

    <div class="modal hide" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h2 style="text-align: center;">PARABÉNS!</h2>
            <img src="img/fireworks.gif" style="float: right;" />
        </div>
        <div class="modal-body">
            <h1 id="employee" style="text-align: center;"></h1>
        </div>
    </div>
</body>

</html>