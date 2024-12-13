$(document).ready(function () {
    const container = $('.schedule-widget'); // онтейнер для строк
    const addButton = $('<button>')
        .addClass('btn btn-primary add-row-btn')
        .text('Добавить строку1')
        .on('click', function (e) {
            e.preventDefault();
            addRow();
        });



    //  кнопка добавления
    // container.after(addButton);


        // Добавление рабочих часов

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



        const modalOverlay = $('#modal-overlay');
    const selectedDateSpan = $('#selected-date');
    const workTimeContainer = $('#work-time-container');

    // Открытие модального окна
    $('.add-time-button').on('click', function () {
        modalOverlay.addClass('show');
    });

    // Закрытие модального окна
    $('.cancel-btn').on('click', function () {
        modalOverlay.removeClass('show');
    });

    // Выбор дня в календаре
    $('.days div').on('click', function () {
        $('.days .green-selected').removeClass('green-selected');
        $(this).addClass('green-selected');

        const month = $(this).closest('.month').find('h3').text();
        const dayNumber = $(this).text();

        selectedDateSpan.text(`${dayNumber} ${month}`);
    });

    // Добавление рабочей записи по нажатию на "Добавить"
    $('.add-btn').on('click', function () {
        const selectedDate = selectedDateSpan.text();
        const startTime = modalOverlay.find('input[type="time"]').eq(0).val();
        const endTime = modalOverlay.find('input[type="time"]').eq(1).val();

        // Проверка заполненности времени
        if (!startTime || !endTime) {
            alert('Пожалуйста, заполните все временные поля.');
            return;
        }

        // Добавление записи в контейнер
        workTimeContainer.append(`
            <div class="work-time-entry">
                <span>${selectedDate} с ${startTime} до ${endTime}</span>
                <button type="button" class="remove-work-time">Удалить</button>
            </div>
        `);

        // Закрытие модального окна
        modalOverlay.removeClass('show');
    });

    // Удаление рабочей записи
    $(document).on('click', '.remove-work-time', function () {
        $(this).closest('.work-time-entry').remove();
    });
});