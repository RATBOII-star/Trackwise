document.addEventListener('DOMContentLoaded', function () {
    const display = document.getElementById('timerDisplay');
    const startBtn = document.getElementById('timerStart');
    const resetBtn = document.getElementById('timerReset');
    const selectEl = document.getElementById('timerDuration');

    if (!display || !startBtn || !resetBtn) return;

    let totalSeconds = 20 * 60;
    let remaining = totalSeconds;
    let interval = null;
    let running = false;

    function formatTime(secs) {
        const m = Math.floor(secs / 60);
        const s = secs % 60;
        return String(m).padStart(2, '0') + ' : ' + String(s).padStart(2, '0');
    }

    function updateDisplay() {
        display.textContent = formatTime(remaining);
    }

    function setDuration() {
        if (selectEl) {
            const mins = parseInt(selectEl.value, 10) || 25;
            totalSeconds = mins * 60;
            remaining = totalSeconds;
            updateDisplay();
        }
    }

    if (selectEl) {
        selectEl.addEventListener('change', function () {
            if (!running) setDuration();
        });
    }

    startBtn.addEventListener('click', function () {
        if (running) {
            clearInterval(interval);
            running = false;
            startBtn.textContent = 'Start';
            return;
        }
        running = true;
        startBtn.textContent = 'Pause';
        interval = setInterval(function () {
            if (remaining <= 0) {
                clearInterval(interval);
                running = false;
                startBtn.textContent = 'Start';
                return;
            }
            remaining--;
            updateDisplay();
        }, 1000);
    });

    resetBtn.addEventListener('click', function () {
        clearInterval(interval);
        running = false;
        startBtn.textContent = 'Start';
        setDuration();
    });

    setDuration();
});

document.querySelectorAll('.tw-technique-header').forEach(function (header) {
    header.addEventListener('click', function () {
        const parent = header.closest('.tw-technique');
        const wasOpen = parent.classList.contains('open');
        document.querySelectorAll('.tw-technique').forEach(function (t) {
            t.classList.remove('open');
        });
        if (!wasOpen) parent.classList.add('open');
    });
});

document.querySelectorAll('.tw-date-header').forEach(function (header) {
    header.addEventListener('click', function () {
        const list = header.nextElementSibling;
        if (list) list.style.display = list.style.display === 'none' ? 'block' : 'none';
    });
});
