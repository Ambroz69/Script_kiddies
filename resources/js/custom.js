$(document).ready(function () {
    $('#table').DataTable({
        "columnDefs": [
            {"orderable": false, "targets": [7, 8]}
        ],
        "language":
            {
                "sEmptyTable": "Nie sú k dispozícii žiadne dáta",
                "sInfo": "Záznamy _START_ až _END_ z celkom _TOTAL_",
                "sInfoEmpty": "Záznamy 0 až 0 z celkom 0 ",
                "sInfoFiltered": "(vyfiltrované spomedzi _MAX_ záznamov)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Zobraz _MENU_ záznamov",
                "sLoadingRecords": "Načítavam...",
                "sProcessing": "Spracúvam...",
                "sSearch": "Hľadať:",
                "sZeroRecords": "Nenašli sa žiadne vyhovujúce záznamy",
                "oPaginate": {
                    "sFirst": "Prvá",
                    "sLast": "Posledná",
                    "sNext": ">>",
                    "sPrevious": "<<"
                },
                "oAria": {
                    "sSortAscending": ": aktivujte na zoradenie stĺpca vzostupne",
                    "sSortDescending": ": aktivujte na zoradenie stĺpca zostupne"
                }
            }
    });
});