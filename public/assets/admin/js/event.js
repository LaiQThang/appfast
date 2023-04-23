$("#change-password").change(function (){
    let status = !$(this).is(":checked");
    $("#password").attr("readonly", status);
    $("#password-confirm").attr("readonly", status);

    $("#password").val("");
    $("#password-confirm").val("");
});

$("#btn-reset-edit-user").click(function () {
    $("#inputEmail4").val("");
    $("#inputAddress").val("");
    $("#password").val("");
    $("#password-confirm").val("");
});

$(".btn-del-confirm").click(function() {
    let url = $(this).data('url');
    if(!confirm("Bạn có chắc muốn xóa dữ liệu này?") ){
        return ;
    }
    // console.log(url);
    window.location.href = url;
});