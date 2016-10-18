

$(document).ready(function () {
    $('#datatables1').dataTable({
        "bLengthChange": false,
        "bPaginate": false,
        "bSortable": false,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "N&atilde;o foram encontrados resultados",
            "sInfo": "Mostrando um máximo de 20 registros",
            "sInfoEmpty": "Mostrando de 0 at&eacute; 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros no total)",
            "sInfoPostFix": "",
            "sSearch": "Pesquisar:",
            "sUrl": "",
           "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "&Uacute;ltimo"
                         }
        }

    });
    

});

jQuery(document).ready(function() {
            jQuery('datatables1').dataTable({"iDisplayLength": 60, "aLengthMenu": [[60, 120, 240, -1], [20, 40, 80, "All"]], "bLengthChange":true, "bPaginate":true, "bJQueryUI":true}).rowGrouping({bExpandableGrouping:true, bExpandSingleGroup:false, iExpandGroupOffset:-1, asExpandedGroups:[""]});
            GridRowCount();
            ResetSearchField();
        }); 





