/*
 * 
 */

/*
 *  标签云 
 */
$(function(){
    var settings = {
        //height of sphere container
        height: 300,
        //width of sphere container
        width: 300,
        //radius of sphere
        radius: 100,
        //rotation speed
        speed: 0.2,
        //sphere rotations slower
        slower: 0.9,
        //delay between update position
        timer: 5.0,
        //dependence of a font size on axis Z
        fontMultiplier: 15,
        //tag css stylies on mouse over
        hoverStyle: {
            border: '1px',
            color: '#0b2e6f'
        },
        //tag css stylies on mouse out
        mouseOutStyle: {
            border: '',
            color: ''
        }
    };

    $('#tagcloud').tagoSphere(settings);
});

$(function(){
    [ '#search-query-nav',
      '#search-query-sidebar'
    ].forEach(function (selector) {
        if (!document.querySelector(selector)) return
        // search index defaults to v2
        var match = window.location.pathname.match(/^\/(v\d+)/)
        var version = match ? match[1] : 'v2'
        docsearch({
            appId: 'BH4D9OD16A',
            apiKey: '5638280abff9d207417bb03be05f0b25',
            indexName: 'vuejs_cn2',
            inputSelector: selector,
            algoliaOptions: { facetFilters: ["version:" + version] }
        })
    })
});

/*
 *  检查用户注册表单是否合法 
 */

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

