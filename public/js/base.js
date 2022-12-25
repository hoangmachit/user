$(".btn-delete").on("click", function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to DELETE it?")) {
        $("#form-delete").submit();
    }
});
