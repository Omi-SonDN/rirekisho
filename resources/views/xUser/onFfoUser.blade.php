<script type="text/javascript">
            var isconfirm = confirm('Thay đổi mật khẩu thành công!\n Bạn có muốn đăng xuất không?');
            if (isconfirm){
                $.ajax({
                    type: "GET",
                    url: "/User/logout",
                    data: '',
                    cache: false,
                    success: function (data) {
//                        returnHome();
                        callLogin();
                    }
                });
            }
</script>