document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#reportsTable tbody tr');

    rows.forEach(row => {
        const idCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
        const nameCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

        if (idCell.includes(searchValue) || nameCell.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});