$("#menu").hide();
$("#menusp").click(function() {
    $(this).next().slideDown(300);
});
$("#menu").mouseleave(function() {
    $(this).slideUp("fast");
});