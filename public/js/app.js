$(document).ready(function () {
    $("#num_order").change(function () {
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = { id_product: id_product, qty: qty }
        $.ajax({
            url: '?mod=cart&controller=index&action=update_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', // Post hoặt Get, mặc định Get
            data: data, // Dữ liệu truyền lên sever
            dataType: 'json', //html,text,script hoặc json
            success: function (data) {
                $("#sub-total-"+id_product).text(data.sub_total);
                $("#total-price span" + id_product).text(data.total);
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
});
