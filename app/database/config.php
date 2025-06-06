<?php
// Подключение к БД используя PDO
function getPDOConnection(): PDO
{
    $config = parse_ini_file('db.ini', true);

    if (!$config || !isset($config['database'])) {
        throw new Exception('Ошибка: Конфигурационный файл не найден или поврежден.');
    }

    $dbConfig = $config['database'];

    $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

    try {
        // Создаем PDO соединение
        return new PDO($dsn, $dbConfig['username'], $dbConfig['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    } catch (PDOException $e) {
        die("Ошибка подключения к базе данных: " . $e->getMessage());
    }
}
