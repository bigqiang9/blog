function addSite() {
    $.post(check_login, function(data) {
        if(data==1){
            // 申请友链
            $('#b-modal-site').modal('show');
        }else{
            // 登录框
            // $('#b-modal-login').modal('show');
            $('#b-modal-site').modal('show');
        }
    });
}

$(".b-s-submit").click((function() {
    var e = $("#b-modal-site form").serialize();
    layer.load(1);

    $.ajax({
        type: "POST",
        url: ajaxSiteUrl,
        data: e,
        success: function(e, t) {
            layer.closeAll();
            layer.msg("申请成功，管理员审核通过后显示", {
                icon: 1,
                time: 2e3
            });
            $("#b-modal-site").modal("hide")
        },
        error: function(e) {
            layer.closeAll();
            layer.msg("申请失败，请重试", {
                icon: 1,
                time: 2e3
            });
            // $("#b-modal-site").modal("hide")
        }
    })
}));