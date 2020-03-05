$(function () {
    // datepicker plugin
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    // chosen select
    $('.chosen-select').chosen({allow_single_deselect:true}); 
    //resize the chosen on window resize
    
    // mask money

    $(window)
    .off('resize.chosen')
    .on('resize.chosen', function() {
        $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
        })
    }).trigger('resize.chosen');
    //resize chosen on sidebar collapse/expand
    $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
        if(event_name != 'sidebar_collapsed') return;
        $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
        })
    });


    $('#chosen-multiple-style .btn').on('click', function(e){
        var target = $(this).find('input[type=radio]');
        var which = parseInt(target.val());
        if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
         else $('#form-field-select-4').removeClass('tag-input-style');
    });

    // DataTables

    $('#dataTables1').dataTable({
        "sLengthMenu":[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
        "iDisplayLength": -1,
        "bPaginate":false,

        "language": idioma_español
    });

    $('#dataTables2').dataTable({
        "sLengthMenu":[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
        "iDisplayLength": -1,
        "bPaginate":false,

        "language": idioma_español
    });

    $('#dataTables3').dataTable({
        "sLengthMenu":[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
        "iDisplayLength": -1,
        "bPaginate":false,

        "language": idioma_español
    });

});

var idioma_español= {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
    },
    "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}