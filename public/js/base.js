$(".btn-delete").on("click", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to DELETE it?")) {
        $("#form-delete").submit();
    }
});
$(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
        $(".navbar").addClass("fixed-top");
    } else {
        $(".navbar").removeClass("fixed-top");
    }
});
