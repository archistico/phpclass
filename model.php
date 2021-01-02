<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS MODEL CRUD</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <h1>CLASS MODEL CRUD IN PHP</h1>
        <form action="elaboramodel.php">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name_space">Namespace</label>
                        <input type="text" class="form-control" id="name_space" name="name_space" placeholder="esempio App\Model" value="App\Model" required autofocus>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nome_classe">Nome classe</label>
                        <input type="text" class="form-control" id="nome_classe" name="nome_classe" placeholder="esempio Rendiconto" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="campi">Lista dei campi (il primo id+nomeclasse)</label>
                        <textarea class="form-control" id="campi" name="campi" rows="12"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Crea</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
