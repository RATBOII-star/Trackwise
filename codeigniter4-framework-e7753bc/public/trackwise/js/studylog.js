document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('sessionImageInput');
    const preview = document.getElementById('imagePreview');

    if (!input || !preview) return;

    input.addEventListener('change', function () {
        preview.innerHTML = '';

        const file = input.files && input.files[0];
        if (!file) return;

        if (!file.type.startsWith('image/')) {
            preview.textContent = 'Please choose an image file.';
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.alt = 'Preview';
            img.className = 'tw-session-image';
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    });
});
