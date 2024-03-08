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

    .modal-body {
        color: black;
        border: 3px solid;
        border-color: #005b80;
        border-radius: 25px;
        background-size: cover;
        background-position: center;
        background: whitesmoke;
        background-size: 300% 300%;
        animation: color 12s ease-in-out infinite;
    }

    form .form-group {
        width: 100%;
        height: 40px;
        border-bottom: 3px solid #005b80;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        margin: 35px 0;
    }

    .row h3 {
        font-size: 32px;
        text-align: center;
        font-weight: 700;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .form-group label {
        position: absolute;
        top: auto;
        left: 15px;
        transform: translateY(-100%);
        font-size: 16px;
        font-weight: 500;
        pointer-events: none;

    }

    .form-group input {
        width: 100%;
        height: 100%;
        background: #ccc1a5;
        border-radius: 15px;
        border: none;
        outline: none;
        font-size: 16px;
        color: black;
        padding-left: 10px;
        font-weight: 500;
        padding-right: 28px;
    }

    .form-group textarea {
        width: 100%;
        height: 100%;
        background: #ccc1a5;
        border-radius: 15px;
        border: none;
        outline: none;
        font-size: 16px;
        color: black;
        padding-left: 10px;
        font-weight: 500;
        padding-right: 28px;
    }

    .form-group select {
        width: 100%;
        height: 100%;
        background: #ccc1a5;
        border-radius: 15px;
        border: none;
        outline: none;
        font-size: 16px;
        color: black;
        padding-left: 10px;
        font-weight: 500;
        padding-right: 28px;
    }

    .login-BTN {
        width: 100%;
        height: 35px;
        font-weight: 700;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        border: 2px solid #005b80;
        cursor: pointer;
        font-size: 14px;
        border-radius: 15px;
        color: black;
        box-shadow: 0 0 10px rgba(241, 238, 238, 0.5);
        transition: .5s ease;
    }

    .login-BTN:hover {
        width: 100%;
        height: 35px;
        font-weight: 700;
        background-color: #005fcc;
        border: 2px solid yellow;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
        color: #005b80;
        font-weight: 600;
        text-decoration: none;
    }

    .login-register p a:hover {
        text-decoration: underline;
        color: blue
    }
</style>
<div class="container-fluid">
    <form action="" id="registration">
        <div class="row">

            <h3 class="text-center">Register Account
                <span class="float-right">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </span>
            </h3>
            <hr>
        </div>
        <div class="row  align-items-center h-100">

            <div class="col-lg-5 border-right">

                <div class="form-group">
                    <label for="" class="control-label">Firstname</label>
                    <input type="text" class="form-control form-control-sm form" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Lastname</label>
                    <input type="text" class="form-control form-control-sm form" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Contact</label>
                    <input type="text" class="form-control form-control-sm form" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Gender</label>
                    <select name="gender" id="" class="form-control form-control-sm form" required>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group">
                    <label for="" class="control-label">Default Delivery Address</label>
                    <textarea class="form-control form" rows='1' name="default_delivery_address"></textarea>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Email</label>
                    <input type="text" class="form-control form-control-sm form" name="email" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Password</label>
                    <input type="password" class="form-control form-control-sm form" name="password" required>
                </div>
                <button class="login-BTN">Login</button>
                <div class="login-register">
                    <p>
                        Already have an account?
                        <a href="javascript:void()" id="login-show">Log In here</a>
                    </p>
                </div>
            </div>
        </div>
    </form>

</div>
<script>
    $(function() {
        $('#login-show').click(function() {
            uni_modal("", "login.php")
        })
        $('#registration').submit(function(e) {
            e.preventDefault();
            start_loader()
            if ($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=register",
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
                        alert_toast("Account succesfully registered", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 2000)
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        var _err_el = $('<div>')
                        _err_el.addClass("alert alert-danger err-msg").text(resp.msg)
                        $('[name="password"]').after(_err_el)
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