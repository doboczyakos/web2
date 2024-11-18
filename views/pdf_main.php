<h1>PDF készítése</h1>
<form action="<?= SITE_ROOT ?>pdf" method="POST">
    <label for="table1">Első tábla neve:</label>
    <select id="table1" name="table1" required>
        <option></option>
        <option value="eredmeny">Eredmény</option>
        <option value="gp">GP</option>
        <option value="pilota">Pilóta</option>
    </select>

    <label for="table2">Második tábla neve:</label>
    <select id="table2" name="table2" required>
        <option></option>
        <option value="eredmeny">Eredmény</option>
        <option value="gp">GP</option>
        <option value="pilota">Pilóta</option>
    </select>

    <label for="table3">Harmadik tábla neve:</label>
    <select id="table3" name="table3" required>
        <option></option>
        <option value="eredmeny">Eredmény</option>
        <option value="gp">GP</option>
        <option value="pilota">Pilóta</option>
    </select>

    <button type="submit">PDF Generálás</button>
</form>