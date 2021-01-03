<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML VIEW</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>HTML VIEW</h1>
        <form action="elaboraview.php">
            <?php
            for ($c = 0; $c <= 20; $c++) {
            ?>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Input <?= $c; ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipo<?= $c; ?>">Tipo</label>
                                    <select class="form-control" id="tipo<?= $c; ?>" name="tipo<?= $c; ?>">
                                        <option>Text</option>
                                        <option>Number</option>
                                        <option>Select</option>
                                        <option>Date</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name<?= $c; ?>">Name</label>
                                    <input type="text" class="form-control" id="name<?= $c; ?>" name="name<?= $c; ?>" placeholder="esempio 'tipologia'">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="testo_placeholder<?= $c; ?>">Placeholder</label>
                                    <input type="text" class="form-control" id="testo_placeholder<?= $c; ?>" name="testo_placeholder<?= $c; ?>" placeholder="descrizione">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="minimo<?= $c; ?>">Min</label>
                                    <input type="number" class="form-control" id="minimo<?= $c; ?>" name="minimo<?= $c; ?>" step=0.0001 value=0>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="massimo<?= $c; ?>">Max</label>
                                    <input type="number" class="form-control" id="massimo<?= $c; ?>" name="massimo<?= $c; ?>" step=0.0001 value=0>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="step<?= $c; ?>">Step</label>
                                    <input type="number" class="form-control" id="step<?= $c; ?>" name="step<?= $c; ?>" step=0.0001 value=0>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="valore<?= $c; ?>">Value</label>
                                    <input type="number" class="form-control" id="valore<?= $c; ?>" name="valore<?= $c; ?>" step=0.0001 value=0>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gruppo<?= $c; ?>">Gruppo select</label>
                                    <input type="text" class="form-control" id="gruppo<?= $c; ?>" name="gruppo<?= $c; ?>" placeholder="Andrà in {{ @xxx }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="option_text<?= $c; ?>">Option text</label>
                                    <input type="text" class="form-control" id="option_text<?= $c; ?>" name="option_text<?= $c; ?>" placeholder="{{ @elemento.yyy }}">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="option_value<?= $c; ?>">Option value</label>
                                    <input type="text" class="form-control" id="option_value<?= $c; ?>" name="option_value<?= $c; ?>" placeholder="{{ @elemento.zzz }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg mb-3">Crea</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>