document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit');
    const form = document.getElementById('yourFormId');

    submitButton.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение кнопки submit

        var formData = new FormData(form); // Собираем данные формы
        
        fetch('script.php', { // Отправляем данные на сервер
            method: 'POST',
            body: formData
        })
       .then(response => response.json()) // Обрабатываем ответ сервера
       .then(data => console.log(data)) // Выводим результат в консоль
       .catch(error => console.error('Ошибка:', error)); // Логгирование ошибок
    });
});
