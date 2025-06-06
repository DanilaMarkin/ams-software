<?php
// Шапка сайта
require_once PARTIALS . "/header.php";
?>

<div class="container mt-5">
    <h1>Автомобили до сентября 2018 года</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Марка</th>
                <th>Модель</th>
                <th>Дата снятия с производства</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car) { ?>
                <tr>
                    <td><?= htmlspecialchars($car['Марка']); ?></td>
                    <td><?= htmlspecialchars($car['Модель']); ?></td>
                    <td><?= htmlspecialchars($car['Дата_снятия_с_производства']); ?></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>

<?php
// Подвал сайта
require_once PARTIALS . "/footer.php";
?>