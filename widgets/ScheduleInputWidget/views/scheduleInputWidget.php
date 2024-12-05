<?php
/**
 * @var string $name
 * @var bool $enableTimeZone
 * @var bool $enableProductionCalendar
 */
?>
<div class="container">
    <div class="frame schedule-widget">
        <div class="header">Рабочие часы</div>
        <div class="sub-header">Установить рабочие часы</div>
        <div class="divider"></div>

        <div class="action-row">
            <div class="schedule-label">
    <label class="schedule-label">
        <input type="checkbox" name="<?= htmlspecialchars($name) ?>[enable_time_zone]" value="1" <?= $enableTimeZone ? 'checked' : '' ?>>
        Учитывать часовой пояс
    </label>
                <div class="icon-margin day disabled"></div>
            </div>
            <div class="switch active">
                <div class="switch-thumb"></div>
            </div>
        </div>

        <div class="action-row">
            <div class="schedule-label-with-icon">
    <label class="schedule-label">
        <input type="checkbox" name="<?= htmlspecialchars($name) ?>[enable_production_calendar]" value="1" <?= $enableProductionCalendar ? 'checked' : '' ?>>
        Использовать производственный календарь
    </label>
                <div class="icon-margin day disabled"></div>
            </div>
            <div class="switch">
                <div class="switch-thumb"></div>
            </div>
        </div>
        <div class="days-wrapper">
            <div class="weekday-group">
                <div class="day"><div class="day-circle"><span class="day-name">Пн</span></div></div>
                <div class="day"><div class="day-circle"><span class="day-name">Вт</span></div></div>
                <div class="day"><div class="day-circle"><span class="day-name">Ср</span></div></div>
                <div class="day"><div class="day-circle"><span class="day-name">Чт</span></div></div>
                <div class="day"><div class="day-circle"><span class="day-name">Пт</span></div></div>
                <div class="day disabled"><div class="day-circle"><span class="day-name">Сб</span></div></div>
                <div class="day disabled"><div class="day-circle"><span class="day-name">Вс</span></div></div>
            </div>
            <div class="time-selection">
                <div class="time-box">12:00</div>
                <div class="time-divider"></div>
                <div class="time-box">19:00</div>
            </div>
            <div class="special-days-group">
                <div class="day"><div class="abc1"></div></div>
                <div class="day"><div class="abc2"></div></div>
            </div>
        </div>

    <div class="button-group schedule-row">
        <button type="button" class="btn btn-primary add-work-time button add-time-button">Добавить рабочие часы</button>
        <button type="button" class="btn btn-secondary add-special-time button add-special-day-button">Добавить особенные дни</button>
    </div>

    <!-- Контейнеры для добавляемых рабочих часов и особенных дней -->
    <div id="work-time-container"></div>
    <div id="special-time-container"></div>

    <!-- Скрытые поля для передачи данных -->
    <input type="hidden" name="<?= htmlspecialchars($name) ?>[work_times]" id="work-times-data">
    <input type="hidden" name="<?= htmlspecialchars($name) ?>[special_times]" id="special-times-data">

    </div>
</div>

<div class="modal-overlay" id="modal-overlay" aria-labelledby="modal-title" aria-describedby="modal-description" role="dialog">
        <div class="modal-wrapper">
            <h2 id="modal-title">Добавление особенного дня</h2>
            <p id="modal-description">Выберите день или период, когда режим работы не совпадает с рабочим днем или дополнительным интервалом.</p>
            <section class="calendar">
                <article class="month">
                    <h3>Ноябрь 2024</h3>
                    <div class="weekdays"><div>Пн</div><div>Вт</div><div>Ср</div><div>Чт</div><div>Пт</div><div>Сб</div><div>Вс</div></div>
                    <div class="days">
                        <div></div><div></div><div></div><div></div><div>1</div><div>2</div><div>3</div>
                        <div>4</div><div>5</div><div>6</div><div>7</div>
                        <div>8</div><div>9</div><div>10</div>
                        <div>11</div><div>12</div><div>13</div><div>14</div>
                        <div>15</div><div>16</div><div>17</div>
                        <div>18</div><div>19</div><div>20</div><div>21</div>
                        <div>22</div><div>23</div><div>24</div>
                        <div>25</div><div>26</div><div>27</div><div>28</div>
                        <div>29</div><div>30</div>
                    </div>
                </article>
                <article class="month">
                    <h3>Декабрь 2024</h3>
                    <div class="weekdays"><div>Пн</div><div>Вт</div><div>Ср</div><div>Чт</div><div>Пт</div><div>Сб</div><div>Вс</div></div>
                    <div class="days">
                        <div></div><div></div><div></div><div></div><div></div><div></div><div>1</div><div>2</div><div>3</div><div>4</div>
                        <div>5</div><div>6</div><div>7</div><div>8</div>
                        <div>9</div><div>10</div><div>11</div><div>12</div>
                        <div>13</div><div>14</div><div>15</div><div>16</div>
                        <div>17</div><div>18</div><div>19</div><div>20</div>
                        <div>21</div><div>22</div><div>23</div><div>24</div>
                        <div>25</div><div>26</div><div>27</div><div>28</div>
                        <div>29</div><div>30</div><div>31</div>
                    </div>
                </article>
            </section>
            <section class="time-selection-wrapper">
                <span id="selected-date">10 декабря</span> с
                <input type="time" value="12:00">
                <span>до</span>
                <input type="time" value="19:00">
            </section>
            <div class="buttons">
                <button class="add-btn">Добавить</button>
                <button class="cancel-btn">Отменить</button>
            </div>
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