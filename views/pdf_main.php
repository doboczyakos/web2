<h1>PDF készítése</h1>
<form action="<?= SITE_ROOT ?>pdf" method="POST">
    <label for="table1">Első tábla neve:</label>
    <input type="text" id="table1" name="table1" placeholder="tabla1" required><br><br>

    <label for="table2">Második tábla neve:</label>
    <input type="text" id="table2" name="table2" placeholder="tabla2" required><br><br>

    <label for="table3">Harmadik tábla neve:</label>
    <input type="text" id="table3" name="table3" placeholder="tabla3" required><br><br>

    <button type="submit">PDF Generálás</button>
</form>