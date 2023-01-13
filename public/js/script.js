//      // LOGIN

$(".login").on("click", function (e) {
    e.preventDefault();
    var formData = {
        login: $("#login").val(),
        password: $("#password").val(),
    };
    $.ajax({
        type: "POST",
        url: "/login",
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (!data.success) {
            if (data.errors.login) {
                $("#login").addClass("is-invalid");
                $("#login_error").text(data.errors.login);
            } else {
                $("#login").attr("class", "form-control is-valid");
                $("#login_error").text("");
            }
            if (data.errors.password) {
                $("#password").addClass("is-invalid");
                $("#password_error").text(data.errors.password);
            } else {
                $("#password").attr("class", "form-control is-valid");
                $("#password_error").text("");
            }
        } else {
            $("#success").html(
                '<div class="alert alert-success"><h4>' + data.message + "</h4></div>"
            );
            setTimeout(function () {
                location.reload();
                window.location.href = "/welcome";
            }, 3000);
        }
    });
});

//     // REGISTER

$(".register").on("click", function (e) {
    e.preventDefault();
    var formData = {
        name: $("#name").val(),
        lastname: $("#lastname").val(),
        email: $("#email").val(),
        login: $("#login").val(),
        password: $("#password").val(),
        confirm_password: $("#confirm_password").val(),
    };

    $.ajax({
        type: "POST",
        url: "/register",
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        console.log(data.errors);

        if (!data.success) {
            if (data.errors.name) {
                $("#name").addClass(" is-invalid");
                $("#name_error").text(data.errors.name);
            } else {
                $("#name").attr("class", "form-control is-valid");
                $("#name_error").text("");
            }
            if (data.errors.lastname) {
                $("#lastname").addClass(" is-invalid");
                $("#lastname_error").text(data.errors.lastname);
            } else {
                $("#lastname").attr("class", "form-control is-valid");
                $("#lastname_error").text("");
            }
            if (data.errors.email) {
                $("#email").addClass("is-invalid");
                $("#email_error").text(data.errors.email);
            } else {
                $("#email").attr("class", "form-control is-valid");
                $("#email_error").text("");
            }

            if (data.errors.login) {
                $("#login").addClass("is-invalid");
                $("#login_error").text(data.errors.login);
            } else {
                $("#login").attr("class", "form-control is-valid");
                $("#login_error").text("");
            }
            if (data.errors.password) {
                $("#password").addClass("is-invalid");
                $("#password_error").text(data.errors.password);
            } else {
                $("#password").attr("class", "form-control is-valid");
                $("#password_error").text("");
            }
            if (data.errors.confirm_password) {
                $("#confirm_password").addClass("is-invalid");
                $("#confirm_password_error").text(data.errors.confirm_password);
            } else {
                $("#confirm_password").attr("class", "form-control is-valid");
                $("#confirm_password_error").text("");
            }
        } else {
            $("#success").html(
                '<div class="alert alert-success"><h4>' + data.message + "</h4></div>"
            );
            setTimeout(function () {
                location.reload();
                window.location.href = "/welcome";
            }, 3000);
        }
    });





















});

