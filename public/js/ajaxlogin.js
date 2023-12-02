
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
                var {status,user,message} = JSON.parse(response.trim().substring(1));
             
                if( status == "success"){
                  
                   console.log(user[0].fullname)

                }else{
                    console.log("ko")
                }
          
             
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi ở đây
                console.error(xhr.responseText);
            }
        });
       
    });
});
   

