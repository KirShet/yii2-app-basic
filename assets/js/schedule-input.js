$(document).ready(function () {
    const modalOverlay = $('#modal-overlay');
    const selectedDateSpan = $('#selected-date');
    const workTimeContainer = $('#work-time-container');

    // Открытие модального окна
    $('.add-special-day-button').on('click', function () {
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
        
        if (!startTime || !endTime) {
            alert('Пожалуйста, заполните все временные поля.');
            return;
        }
        
        const newEntry = `
            <div class="days-wrapper">
                <div class="work-time-info">
                    <span class="work-date">${selectedDate}</span>
                </div>
                <div class="time-selection">
                    <div class="time-box">${startTime}</div>
                    <div class="time-divider"></div>
                    <div class="time-box">${endTime}</div>
                </div>
                <div class="action-buttons">
                    <button type="button" class="edit-work-time" title="Редактировать"></button>
                    <button type="button" class="remove-work-time" title="Удалить"></button>
                </div>
            </div>
                `;
        workTimeContainer.append(newEntry);
        
        modalOverlay.removeClass('show');
    });
        
    // Удаление рабочей записи
    $(document).on('click', '.remove-work-time', function () {
        $(this).closest('.days-wrapper').remove();
    });

    $('form').on('submit', function(event) {
            event.preventDefault();
    });
});