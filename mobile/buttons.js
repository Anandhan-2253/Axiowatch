function openPinPopup(type, lat, lon, comment) {
    const pin = prompt("Please enter your 4-digit PIN:");

    if (pin) {
        fetch('send_location.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `type=${type}&lat=${lat}&lon=${lon}&comment=${encodeURIComponent(comment)}&pin=${pin}`
        })
        .then(response => response.text())
        .then(data => alert(data));
    } else {
        alert('PIN is required to submit the report.');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.report-btn').forEach(button => {
        button.addEventListener('click', function() {
            const comment = document.getElementById('comment').value.trim();
            if (!comment) {
                alert('Please enter a comment before submitting.');
                return;
            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    const type = this.getAttribute('data-type');
                    openPinPopup(type, lat, lon, comment);
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        });
    });
});