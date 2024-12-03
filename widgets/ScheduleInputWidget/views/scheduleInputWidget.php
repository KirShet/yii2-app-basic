<?php
/**
 * @var string $name
 * @var bool $enableTimeZone
 * @var bool $enableProductionCalendar
 */
?>
<div class="container">
    <div class="frame schedule-widget">
    <label>
        <input type="checkbox" name="<?= htmlspecialchars($name) ?>[enable_time_zone]" value="1" <?= $enableTimeZone ? 'checked' : '' ?>>
        Учитывать часовой пояс
    </label>
    <label>
        <input type="checkbox" name="<?= htmlspecialchars($name) ?>[enable_production_calendar]" value="1" <?= $enableProductionCalendar ? 'checked' : '' ?>>
        Использовать производственный календарь
    </label>

    <div class="button-group mt-3">
        <button type="button" class="btn btn-primary add-work-time">Добавить рабочие часы</button>
        <button type="button" class="btn btn-secondary add-special-time">Добавить особенные дни</button>
    </div>

    <!-- Контейнеры для добавляемых рабочих часов и особенных дней -->
    <div id="work-time-container" class="mt-3"></div>
    <div id="special-time-container" class="mt-3"></div>

    <!-- Скрытые поля для передачи данных -->
    <input type="hidden" name="<?= htmlspecialchars($name) ?>[work_times]" id="work-times-data">
    <input type="hidden" name="<?= htmlspecialchars($name) ?>[special_times]" id="special-times-data">
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const workTimeContainer = document.getElementById('work-time-container');
        const specialTimeContainer = document.getElementById('special-time-container');
        const workTimesData = document.getElementById('work-times-data');
        const specialTimesData = document.getElementById('special-times-data');

        document.querySelector('.add-work-time').addEventListener('click', function () {
            const newWorkTime = document.createElement('div');
            newWorkTime.innerHTML = `
                <input type="time" name="work_times[]" class="form-control mb-2">
            `;
            workTimeContainer.appendChild(newWorkTime);
            updateWorkTimes();
        });

        document.querySelector('.add-special-time').addEventListener('click', function () {
            const newSpecialTime = document.createElement('div');
            newSpecialTime.innerHTML = `
                <input type="date" name="special_times[]" class="form-control mb-2">
            `;
            specialTimeContainer.appendChild(newSpecialTime);
            updateSpecialTimes();
        });

        function updateWorkTimes() {
            const workTimes = Array.from(workTimeContainer.querySelectorAll('input')).map(input => input.value);
            workTimesData.value = JSON.stringify(workTimes);
        }

        function updateSpecialTimes() {
            const specialTimes = Array.from(specialTimeContainer.querySelectorAll('input')).map(input => input.value);
            specialTimesData.value = JSON.stringify(specialTimes);
        }
    });
</script>