<?php
// Шапка сайта
require_once PARTIALS . "/header.php";

// Вывод уникальных значений
$carCarcas = array_unique(array_column($cars, 'Тип_кузова'));
?>

<div class="container mt-5">
    <h1>Сортировка по кузову</h1>

    <select id="carSort" class="form-select mb-3">
        <option value="">Все типы кузова</option>
        <?php foreach ($carCarcas as $carcas) { ?>
            <option value="<?= htmlspecialchars($carcas); ?>"><?= htmlspecialchars($carcas); ?></option>
        <?php } ?>
    </select>

    <table class="table">
        <thead>
            <tr>
                <th>Марка</th>
                <th>Модель</th>
                <th>Тип кузова</th>
            </tr>
        </thead>
        <tbody class="car-items">
            <?php foreach ($cars as $car) { ?>
                <tr class="car-item" data-body-type="<?= htmlspecialchars($car['Тип_кузова']); ?>">
                    <td><?= htmlspecialchars($car['Марка']); ?></td>
                    <td><?= htmlspecialchars($car['Модель']); ?></td>
                    <td><?= htmlspecialchars($car['Тип_кузова']); ?></td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>

<script src="<?= JS ?>/sortCarsCarcase.js"></script>

<?php
// Подвал сайта
require_once PARTIALS . "/footer.php";
?>