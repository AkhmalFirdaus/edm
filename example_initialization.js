$('#dataTable').DataTable({
    "order": [[2, "desc"]],
    "paging": true,
    "searching": true,
    "info": true,
    "lengthChange": true,
    "pageLength": 10,
    "responsive": true,
    "dom": 'Bfrtip',
    "buttons": [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "stateSave": true,
    "language": {
        "search": "Filter records:",
        "emptyTable": "No data available in table"
    }
});
