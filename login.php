<style>
    #uni_modal .modal-content>.modal-footer,
    #uni_modal .modal-content>.modal-header {
        display: none;
    }

    * {
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        box-sizing: border-box;
    }

    .col-lg-12 h3 {
        font-size: 32px;
        text-align: center;
        font-weight: 700;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .col-lg-12 hr {
        margin: 1rem 0;
        margin-left: 150px;
        margin-right: 150px;
        background-color: green;
        border: 0;
        opacity: 0.20;
    }

    .modal-body {
        color: black;
        border: 3px solid;
        border-color: green;
        border-radius: 25px;
        background-size: cover;
        background-position: center;
    }

    .form-group input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: 2px;
        outline: 2px;
        font-size: 16px;
        color: white;
        font-weight: 500;
        padding-right: 28px;
    }

    .login-BTN {
        width: 100%;
        height: 35px;
        margin-top: 15px;
        font-weight: 700;
        background-color: wheat;
        border: 2px solid green;
        cursor: pointer;
        font-size: 14px;
        border-radius: 15px;
        color: black;
        box-shadow: 0 0 10px rgba(241, 238, 238, 0.5);
        transition: .5s ease;
    }

    .login-register {
        font-size: 14.5px;
        font-weight: 500;
        text-align: center;
        margin-top: 25px;
    }

    .login-register p a {
        color: black;
        font-weight: 600;
        text-decoration: none;
    }

    .login-register p a:hover {
        text-decoration: underline;
    }

    .form-group input {
        width: 100%;
        height: 100%;
        background: wheat;
        border-radius: 15px;
        border: none;
        outline: none;
        font-size: 16px;
        color: black;
        padding-left: 10px;
        font-weight: 500;
        padding-right: 28px;
    }

    .form-group label {
        position: absolute;
        top: auto;
        left: 35px;
        transform: translateY(-100%);
        font-size: 16px;
        font-weight: 500;
        pointer-events: none;

    }

    form .form-group {
        width: 100%;
        height: 40px;
        border-bottom: 3px solid green;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        margin: 35px 0;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <h3 class="float-right">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </h3>
        <div class="col-lg-12">
            <h3 class="text-center">Login</h3>
            <hr>
        </div>
    </div>
    <form action="" id="login-form">
        <div class="form-group">
            <span class="icon"><i class="bx bxs-envelope"></i></span>
            <input type="email" required />
            <label>Email</label>
        </div>
        <div class="form-group">
            <span class="icon"><i class="bx bxs-lock"></i></span>
            <input type="password" required />
            <label>Password</label>
        </div>
        <button class="login-BTN">Login</button>
        <div class="login-register">
            <p>
                Don't have an account?
                <a href="javascript:void()" id="create_account">Sign Up Here</a>
            </p>
        </div>
    </form>
</div>
</div>
</div>
<script>
    $(function() {
        $('#create_account').click(function() {
            uni_modal("", "registration.php", "mid-large")
        })
        $('#login-form').submit(function(e) {
            e.preventDefault();
            start_loader()
            if ($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url: _base_url_ + "classes/Login.php?f=login_user",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: err => {
                    console.log(err)
                    alert_toast("an error occured", 'error')
                    end_loader()
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        alert_toast("Login Successfully", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 2000)
                    } else if (resp.status == 'incorrect') {
                        var _err_el = $('<div>')
                        _err_el.addClass("alert alert-danger err-msg").text("Incorrect Credentials.")
                        $('#login-form').prepend(_err_el)
                        end_loader()

                    } else {
                        console.log(resp)
                        alert_toast("an error occured", 'error')
                        end_loader()
                    }
                }
            })
        })
    })
</script>