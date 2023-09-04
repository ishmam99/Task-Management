$(document).ready(function () {
    "use strict";
    $("#basic-datatable").DataTable({
         ordering: false,
        keys: !0,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });
    $("#basic-datatable1").DataTable({
         ordering: false,
        keys: !0,
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });
    var a = $("#datatable-buttons").DataTable({
        lengthChange: !1,
        buttons: ["copy", "print"],
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    });
    $("#selection-datatable").DataTable({
        select: { style: "multi" },
        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
            },
        },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            );
        },
    }),
        a
            .buttons()
            .container()
            .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
        $("#alternative-page-datatable").DataTable({
            pagingType: "full_numbers",
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        }),
        $("#scroll-vertical-datatable").DataTable({
            scrollY: "350px",
            scrollCollapse: !0,
            paging: !1,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        }),
        $("#scroll-horizontal-datatable").DataTable({
            scrollX: !0,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        }),
        $("#complex-header-datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
            columnDefs: [{ visible: !1, targets: -1 }],
        }),
        $("#row-callback-datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
            createdRow: function (a, e, t) {
                15e4 < +e[5].replace(/[\$,]/g, "") &&
                    $("td", a).eq(5).addClass("text-danger");
            },
        }),
        $("#state-saving-datatable").DataTable({
            stateSave: !0,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        }),
        $("#fixed-columns-datatable").DataTable({
            scrollY: 300,
            scrollX: !0,
            scrollCollapse: !0,
            paging: !1,
            fixedColumns: !0,
        }),
        $(".dataTables_length select").addClass("form-select form-select-sm"),
        $(".dataTables_length label").addClass("form-label");
}),
    $(document).ready(function () {
        var a = $("#fixed-header-datatable").DataTable({
            responsive: !0,
            ordering: false,
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                },
            },
            drawCallback: function () {
                $(".dataTables_paginate > .pagination").addClass(
                    "pagination-rounded"
                );
            },
        });
        new $.fn.dataTable.FixedHeader(a);
    });
// $(document).ready(function () {
//     // Setup - add a text input to each footer cell
//     $("#basic-datatable thead tr")
//         .clone(true)
//         .addClass("filters")
//         .appendTo("#basic-datatable thead");

//     var table = $("#basic-datatable").DataTable({
//         orderCellsTop: true,
//         fixedHeader: true,
//         initComplete: function () {
//             var api = this.api();

//             // For each column
//             api.columns()
//                 .eq(0)
//                 .each(function (colIdx) {
//                     // Set the header cell to contain the input element
//                     var cell = $(".filters th").eq(
//                         $(api.column(colIdx).header()).index()
//                     );
//                     var title = $(cell).text();
//                     $(cell).html(
//                         '<input type="text" placeholder="' + title + '" />'
//                     );

//                     // On every keypress in this input
//                     $(
//                         "input",
//                         $(".filters th").eq(
//                             $(api.column(colIdx).header()).index()
//                         )
//                     )
//                         .off("keyup change")
//                         .on("change", function (e) {
//                             // Get the search value
//                             $(this).attr("title", $(this).val());
//                             var regexr = "({search})"; //$(this).parents('th').find('select').val();

//                             var cursorPosition = this.selectionStart;
//                             // Search the column for that value
//                             api.column(colIdx)
//                                 .search(
//                                     this.value != ""
//                                         ? regexr.replace(
//                                               "{search}",
//                                               "(((" + this.value + ")))"
//                                           )
//                                         : "",
//                                     this.value != "",
//                                     this.value == ""
//                                 )
//                                 .draw();
//                         })
//                         .on("keyup", function (e) {
//                             e.stopPropagation();

//                             $(this).trigger("change");
//                             $(this)
//                                 .focus()[0]
//                                 .setSelectionRange(
//                                     cursorPosition,
//                                     cursorPosition
//                                 );
//                         });
//                 });
//         },
//     });
// });
