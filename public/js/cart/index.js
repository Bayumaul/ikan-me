$("#datatable").DataTable({
    paging: true,
    order: [],
    dom: '<"top"f>rt<"bottom"lip><"clear">',
    lengthMenu: [
        [10, 25, 50, 100, -1],
        ["10 rows", "25 rows", "50 rows", "100 rows", "Show all"],
    ],
});
