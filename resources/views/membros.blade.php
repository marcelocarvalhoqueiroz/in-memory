<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-end mb-4">
            <button id="reseta-semana" class="btn btn-primary">Virar Semana</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nick</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Data Entrada</th>
                    <th scope="col">Cooldown</th>
                    <th scope="col">No whats</th>
                    <th scope="col">Rank Entrada</th>
                </tr>
            </th>
            <tbody>
            @foreach ($membros as $membro)
                <tr>
                    <th scope="row"> <a href="/membros/detalhe/{{$membro->id}}" target="_blank" style="text-decoration: none">{{$membro->nick}}</a> </th>
                    @if($membro->cargo == 3)
                        <td>Líder</td>
                    @elseif($membro->cargo == 2)
                        <td>Oficial</td>
                    @elseif($membro->cargo == 1)
                        <td>Membro</td>
                    @endif
                    <td>{{ $membro->data_entrada }} </td>
                    <td>@if($membro->cd) Sim @else Não @endif</td>
                    <td>@if($membro->participa_comunidade) Sim @else Não @endif</td>
                    <td>{{ $membro->rankEntrada->rank }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p>Total de membros: {{ $total }}</p>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#reseta-semana').click(function (){
            $.ajax({
                url: "/virasemana", 
                type: "GET",
                success: function(response) {
                    alert(response.message);
                    if(response.status == 'OK'){
                        location.reload();
                    }
                },
                error: function(xhr) {
                    alert("Erro ao virar semana: " + xhr.responseJSON.message); 
                }
            });
        })
    });
</script>
</html>