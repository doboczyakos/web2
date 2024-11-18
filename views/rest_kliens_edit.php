<?php
    $pilota = $viewData["pilota"];
?>
<h1><?= $pilota ? "Pilóta szerkesztése" : "Új pilóta hozzáadása" ?></h1>
<form action="<?= SITE_ROOT ?>rest_kliens/edit" method="post">
    <input type="hidden" name="az" value="<?= htmlspecialchars($pilota['az'] ?? '') ?>">
    <label for="nev">Név:</label>
    <input type="text" id="nev" name="nev" value="<?= htmlspecialchars($pilota['nev'] ?? '') ?>" required>
    <br>
    <label for="nem">Nem:</label>
    <select id="nem" name="nem" required>
        <option></option>
        <option value="N" <?php if ($pilota && $pilota["nem"] == "N") echo("selected='true'") ?>>Nő</option>
        <option value="F" <?php if ($pilota && $pilota["nem"] == "F") echo("selected='true'") ?>>Férfi</option>
    </select>
    <br>
    <label for="szuldat">Születési dátum:</label>
    <input type="date" id="szuldat" name="szuldat" value="<?= htmlspecialchars($pilota['szuldat'] ?? '') ?>" required>
    <br>
    <label for="nemzet">Nemzet:</label>
    <input type="text" id="nemzet" name="nemzet" value="<?= htmlspecialchars($pilota['nemzet'] ?? '') ?>" required>
    <br>
    <button type="submit">Mentés</button>
    <a href="<?= SITE_ROOT ?>rest_kliens">Mégse</a>
</form>
