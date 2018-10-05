<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/pegarevento.php");
?>


<html>
<form class="w-80 mx-auto centered" action="../src/controllers/desativarevento.php" method="POST">
<div class="form-group">
                        <div class="form-check  form-check-inline">
                        <input class="form-check-input" type="hidden" name="situacao" value="0" /> <input class="form-check-input" type="checkbox" name="situacao" id="checkbox" value="1"
                                checked>
                            <label class="form-check-label" for="checkbox">
                                Este evento será desativado e não poderá mais ser visto.
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Desativar</button>
</form>
</html>

                