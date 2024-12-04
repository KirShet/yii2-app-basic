$(document).ready(function () {
    const container = $('.schedule-widget'); // онтейнер для строк
    // const addButton = $('<button>')
    //     .addClass('btn btn-primary add-row-btn')
    //     .text('Добавить строку1')
    //     .on('click', function (e) {
    //         e.preventDefault();
    //         addRow();
    //     });

    // для добавления строки
    function addRow() {
        const row = $('<div>')
            .addClass('schedule-row')
            .append(
                $('<input>')
                    .attr('type', 'text')
                    .attr('placeholder', 'Введите данные')
                    .addClass('form-control')
            )
            .append(
                $('<button>')
                    .addClass('btn btn-danger remove-row-btn')
                    .text('Удалить')
                    .on('click', function (e) {
                        e.preventDefault();
                        $(this).parent().remove();
                    })
            );

        container.append(row);
    }

    //  кнопка добавления
    container.after(addButton);


        // Добавление рабочих часов
    $('.add-work-time').on('click', function() {
        $('#work-time-container').append(`
            <div class="work-time-entry">
                <select name="schedule[work_time][][day]" required>
                    <option value="1">Понедельник</option>
                    <option value="2">Вторник</option>
                    <option value="3">Среда</option>
                    <option value="4">Четверг</option>
                    <option value="5">Пятница</option>
                    <option value="6">Суббота</option>
                    <option value="7">Воскресенье</option>
                </select>
                <input type="time" name="schedule[work_time][][start_time]" required>
                <input type="time" name="schedule[work_time][][end_time]" required>
                <button type="button" class="remove-work-time">Удалить</button>
            </div>
        `);
    });

    // Добавление особенных дней
    $('.add-special-days').on('click', function() {
        $('#special-days-container').append(`
            <div class="special-day-entry">
                <input type="date" name="schedule[special_days][][date]" required>
                <input type="time" name="schedule[special_days][][start_time]" required>
                <input type="time" name="schedule[special_days][][end_time]" required>
                <button type="button" class="remove-special-day">Удалить</button>
            </div>
        `);
    });

    // Удаление рабочей записи или особенного дня
    $(document).on('click', '.remove-work-time, .remove-special-day', function() {
        $(this).parent().remove();
    });




    $('form').on('submit', function(event) {
        let isValid = true;

        // Проверка всех временных полей
        $('input[type="time"]').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        // Если есть незаполненные поля, блокируем отправку формы
        if (!isValid) {
            event.preventDefault();
            alert('Пожалуйста, заполните все поля времени.');
        }
    });

    // Удаление класса ошибки при изменении поля
    $(document).on('input', 'input[type="time"]', function() {
        if ($(this).val()) {
            $(this).removeClass('error');
        }
    });
});