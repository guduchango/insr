$(function () {

    $('.gdelete').on('click',function() {
        var id= $(this).data('id');
        var txt;
        var r = confirm("¿Esta seguro que desea borrar el registro?");
        if (r == true) {
            $('#form-delete-'+id).submit();
        }
    });

    $('#search-dash').on('click',function() {
        search_input = $('#search-input').val();
        baseUrl = $('#baseUrl').val();

        window.location.href = baseUrl+'/admin/dash?search='+search_input;
    });

    $('#search-company').on('click',function() {
        search_input = $('#search-input').val();
        baseUrl = $('#baseUrl').val();

        window.location.href = baseUrl+'/admin/companies?search='+search_input;
    });
});