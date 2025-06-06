<?php
// Шапка сайта
require_once PARTIALS . "/header.php";
?>

<div class="container mt-5">
    <h1>Сняты и выше 1000 рублей</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Марка</th>
                <th>Модель</th>
                <th>Наименование работ</th>
                <th>Стоимость работ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) { ?>
                <tr>
                    <td><?= htmlspecialchars($car['Марка']); ?></td>
                    <td><?= htmlspecialchars($car['Модель']); ?></td>
                    <td><?= htmlspecialchars($car['Наименование_работ']); ?></td>
                    <td><?= htmlspecialchars($car['Стоимость_работ']); ?></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>

<?php
// Подвал сайта
require_once PARTIALS . "/footer.php";
?>