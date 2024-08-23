// Sort Data Table scripts.js
document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('dataTable');
    const headers = table.querySelectorAll('th');

    let currentSortColumn = null;
    let currentSortDirection = 'asc';

    headers.forEach(header => {
        header.addEventListener('click', function() {
            const sortType = this.getAttribute('data-sort');
            
            if (currentSortColumn === sortType) {
                // Toggle sort direction
                currentSortDirection = currentSortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                // New sort column, default to ascending
                currentSortDirection = 'asc';
            }

            currentSortColumn = sortType;
            sortTable(sortType, currentSortDirection);
            updateSortIndicators();
        });
    });

    function sortTable(sortType, direction) {
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));

        rows.sort((a, b) => {
            const cellA = a.querySelector(`td:nth-child(${getColumnIndex(sortType)})`).textContent.trim();
            const cellB = b.querySelector(`td:nth-child(${getColumnIndex(sortType)})`).textContent.trim();

            if (sortType === 'date') {
                return direction === 'asc'
                    ? new Date(cellA) - new Date(cellB)
                    : new Date(cellB) - new Date(cellA);
            }

            return direction === 'asc'
                ? cellA.localeCompare(cellB)
                : cellB.localeCompare(cellA);
        });

        tbody.innerHTML = '';
        rows.forEach(row => tbody.appendChild(row));
    }

    function updateSortIndicators() {
        headers.forEach(header => {
            header.classList.remove('asc', 'desc');
        });

        const activeHeader = Array.from(headers).find(header => header.getAttribute('data-sort') === currentSortColumn);
        if (activeHeader) {
            activeHeader.classList.add(currentSortDirection);
        }
    }

    function getColumnIndex(sortType) {
        switch (sortType) {
            case 'name': return 1;
            case 'job': return 2;
            case 'date': return 3;
            default: return 1;
        }
    }
});
