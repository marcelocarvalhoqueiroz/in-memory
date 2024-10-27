<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <div class="container">
        <form id="cadastrar-membro" class="mt-5">
            @csrf
            <div class="mb-3">
                <label for="nick" class="form-label">Nick:</label>
                <input type="text" class="form-control" id="nick" name="nick" required>
            </div>
            {{-- <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>
                <select class="form-select" id="cargo" name="cargo" required>
                    <option value="">Selecione o cargo</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                    @endforeach
                </select>
            </div> --}}
            {{-- <div class="mb-3">
                <label for="data_entrada" class="form-label">Data de Entrada:</label>
                <input type="date" class="form-control" id="data_entrada" name="data_entrada" required>
            </div> --}}
            <div class="mb-3">
                <label for="rank_entrada" class="form-label">Rank de Entrada:</label>
                <select class="form-select" id="rank_entrada" name="rank_entrada" required>
                    <option value="">Selecione o rank</option>
                    @foreach ($ranks as $rank)
                        <option value="{{ $rank->id }}">{{ $rank->rank }}</option>
                    @endforeach
                    </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#cadastrar-membro").submit(function(event) {
            event.preventDefault(); 
            var formData = $(this).serialize();

            $.ajax({
                url: "/cadastramembros", 
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    // Exibe mensagem de sucesso
                    alert(response.message); 
                    // Limpa o formulário (opcional)
                    $("#cadastrar-membro")[0].reset(); 
                },
                error: function(xhr) {
                    // Exibe mensagem de erro
                    alert("Erro ao cadastrar membro: " + xhr.responseJSON.message); 
                }
            });
        });
    });
</script>
</html>