$(document).ready(function () {
    const container = $('.schedule-widget'); // онтейнер для строк
    const addButton = $('<button>')
        .addClass('btn btn-primary add-row-btn')
        .text('Добавить строку')
        .on('click', function (e) {
            e.preventDefault();
            addRow();
        });

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
});