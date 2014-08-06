var oTable;
$(document).ready(function() {
    oTable = $('#dealsTable').dataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": admin_path ()+'dashboard/deal_list/',
            "type": "POST"
        },
        aoColumnDefs: [
          {
             bSortable: false,
             aTargets: [ -1 ]
          }
        ]
    } );
} );
