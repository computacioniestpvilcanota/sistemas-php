(function ($) {
	$('#example').DataTable( {
		"responsive": true,	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
		"ajax": {
			"url": "/transporte/cliente/todo.php",
        	"type": "GET"
		},					
		"columns": [
			{ "data": "nombres" },
			{ "data": "apellidos" },
			{ "data": "dni" },
			{ "data": "direccion" },
			{ "data": "ciudad" },
			{ "data": "sexo" },
			{ "data": "telefono" },
			{ "data": "celular" },
			{ "data": "acciones" },
		],
		"oLanguage": {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": 'Mostrar <select class="custom-select custom-select-sm form-control form-control-sm">'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">All</option>'+
		        '</select> registros',    
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Filtrar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por favor espere - cargando...",
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
	});
})(jQuery)






// (function ($) {
//     //    "use strict";


//     /*  Data Table
//     -------------*/

//     $('#bootstrap-data-table').DataTable({
//         lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
//     });

//     $('#bootstrap-data-table-export').DataTable({
//         lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
//         buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
//     });

// 	$('#row-select').DataTable( {
//         initComplete: function () {
// 				this.api().columns().every( function () {
// 					var column = this;
// 					var select = $('<select class="form-control"><option value=""></option></select>')
// 						.appendTo( $(column.footer()).empty() )
// 						.on( 'change', function () {
// 							var val = $.fn.dataTable.util.escapeRegex(
// 								$(this).val()
// 							);

// 							column
// 								.search( val ? '^'+val+'$' : '', true, false )
// 								.draw();
// 						} );

// 					column.data().unique().sort().each( function ( d, j ) {
// 						select.append( '<option value="'+d+'">'+d+'</option>' )
// 					} );
// 				} );
// 			}
// 		} );

// })(jQuery);
