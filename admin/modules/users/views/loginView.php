<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>Document</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Full-width inputs */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5px auto;
            /* 15% from the top and centered */
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            /* Position it in the top right corner outside of the modal */
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        /* Close button on hover */
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <h2>LOGIN USER</h2>
    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <div>
            <h1>Welcome -
                <?php echo $_SESSION['username']; ?>
            </h1>
        </div>
        <a href="#" id="logout">Logout</a>
        <?php
    } else {
        ?>
        <!-- Button to open the modal login form -->
        <button onclick="document.getElementById('user_id').style.display='block'">Login</button>
    <?php } ?>
    <!-- The Modal -->
    <div id="user_id" class="modal">
        <span onclick="document.getElementById('user_id').style.display='none'" class="close"
            title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" method="post">

            <div class="imgcontainer">
                <img src="../public/images/users.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" id="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="password" required>

                <button type="submit" id="login_btn" name="btn_login">Login</button>
        </form>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('loginModal').style.display='none'"
            class="cancelbtn">Cancel</button>
        <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('user_id');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }

        }
        $(document).ready(function () {
            $("#login_btn").click(function (event) {
                event.preventDefault();
                var username = $("#username").val();
                var password = $("#password").val();
                $.ajax({
                    type: "POST",
                    url: "?mod=users&controller=index&action=users_ajax", // Đặt URL của file xử lý dữ liệu tại đây
                    data: {
                        username: username,
                        password: password
                    },
                    success: function (response) {

                        data = JSON.parse(response.substring(1))
                        console.log(data)
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi ở đây
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        // $('#logout').click(function () {
        //     var action = 'logout';
        //     $.ajax({
        //         url: "?mod=users&controller=index&action=users_ajax",
        //         method: "POST",
        //         data: { action: action },
        //         success: function (data) {
        //             location.reload();
        //         }
        //     })
        // })

    </script>
</body>

</html>