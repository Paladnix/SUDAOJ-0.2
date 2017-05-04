

function checkForm(){

    if( $('#password').val() != $('#passwordrepeat').val() ){
        alert("您两次输入的密码不一致，请确认密码");
        $('passwordrepeat').focus();
        return false;
    }
    return true;
}

function text_html(){

    var reg = new RegExp("\r\n", "g");
    $(this).find("textarea").each(function(){
        this.value = this.value.replace(reg,"<br>");
    });

}
