<h1>Pilóták listája</h1>
    <a href="rest_kliens/edit">Új pilóta hozzáadása</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Név</th>
                <th>Nem</th>
                <th>Születési dátum</th>
                <th>Nemzet</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewData["pilotak"] as $pilota): ?>
                <tr>
                    <td><?= htmlspecialchars($pilota['az']) ?></td>
                    <td><?= htmlspecialchars($pilota['nev']) ?></td>
                    <td><?= htmlspecialchars($pilota['nem']) ?></td>
                    <td><?= htmlspecialchars($pilota['szuldat']) ?></td>
                    <td><?= htmlspecialchars($pilota['nemzet']) ?></td>
                    <td>
                        <a href="rest_kliens/edit/<?= $pilota['az'] ?>">Szerkesztés</a>
                        <a href="#" onclick="if (confirm('Biztosan törlöd?')) { fetch ('<?= SITE_ROOT ?>rest_server/<?= $pilota['az'] ?>', { method: 'DELETE' }).then(() => { window.location.reload(); }); } return false;">Törlés</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>