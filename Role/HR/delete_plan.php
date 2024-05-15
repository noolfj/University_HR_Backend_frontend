<?php
// delete_plan.php

// Проверяем, был ли передан идентификатор плана для удаления
if(isset($_POST['planId'])) {
    // Подключаемся к базе данных
    require_once "conn.php";

    // Получаем идентификатор плана из запроса
    $planId = $_POST['planId'];

    // Формируем SQL-запрос для удаления плана
    $sql = "DELETE FROM plans WHERE Plan_Id = $planId";

    // Выполняем запрос
    if ($conn->query($sql) === TRUE) {
        // Если удаление успешно, возвращаем "success"
        echo "success";
    } else {
        // Если произошла ошибка при удалении, возвращаем сообщение об ошибке
        echo "Ошибка при удалении плана: " . $conn->error;
    }

    // Закрываем соединение с базой данных
    $conn->close();
} else {
    // Если идентификатор плана не был передан, возвращаем сообщение об ошибке
    echo "Ошибка: Идентификатор плана не был передан.";
}
?>
