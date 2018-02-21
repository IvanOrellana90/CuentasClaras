$("#linkLogin").on("click", function(e) {
    $("#formLogin").fadeOut("fast");
    $("#formRegister").delay(200).fadeIn("slow");
    e.preventDefault();
});

$("#linkRegister").on("click", function(e) {
    $("#formRegister").fadeOut("fast");
    $("#formLogin").delay(200).fadeIn("slow");
    e.preventDefault();
});