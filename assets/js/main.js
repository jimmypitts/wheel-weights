$(document).ready(function() {

    $('.pagination-link').click(function() {
        $("#page").val($(this).data().page);
        $("#skip").val($(this).data().skip);
        return true;
    });

});
