<?php
/**
 * @var string $name
 * @var bool $enableTimeZone
 * @var bool $enableSpecialTime
 * @var bool $enableProductionCalendar
 * @var bool $allowMultipleItems
 */

?>

<div class="schedule-input-widget">
    <label for="<?= htmlspecialchars($name) ?>"><?= htmlspecialchars($name) ?></label>
    <input type="text" id="<?= htmlspecialchars($name) ?>" name="<?= htmlspecialchars($name) ?>" class="schedule-input">

    <div class="options">
        <p>TimeZone Enabled: <?= $enableTimeZone ? 'Yes' : 'No' ?></p>
        <p>Special Time Enabled: <?= $enableSpecialTime ? 'Yes' : 'No' ?></p>
        <p>Production Calendar Enabled: <?= $enableProductionCalendar ? 'Yes' : 'No' ?></p>
        <p>Allow Multiple Items: <?= $allowMultipleItems ? 'Yes' : 'No' ?></p>
    </div>
</div>