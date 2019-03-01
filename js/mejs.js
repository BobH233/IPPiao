let $$ = mdui.JQ;
$$.ajax({
    method: 'GET',
    url: './start.md',
    success: function (data) {
        document.getElementById("mdView").innerHTML = marked(data);
    }
});
$$(document).ajaxError(function (event, xhr, options) {
    // xhr: XMLHttpRequest 对象
    // options: AJAX 请求的配置参数
    mdui.alert('一个ajax执行异常导致网页崩溃,请稍后再次尝试', '致命的js错误')
});
function VerifyGenID(){
    let val = $$('#postfix').val();
    val = val.replace(/\//g,"xg");
    console.log(val);
    if(val == null || val == "") return;
    $$.ajax({
        method: 'GET',
        url: './IsGenidOk.php',
        data: {
            genid: val
        },
        success: function(data){
            if(JSON.parse(data).msgStr == 'yes'){
                $$('#error1').text('后缀已经存在,尝试换一个');
                $$('#postfix_').addClass('mdui-textfield-invalid');
            }else{
                $$('#postfix_').removeClass('mdui-textfield-invalid');
                $$('#tip1').text('访问链接将会是:'+link+val);
            }
        },

    })
}
function VerifyPassword(){
    if($$('#querypassword').val() != $$('#querypassword2').val()) {
        $$('#querypassword_2').addClass('mdui-textfield-invalid');
    }else{
        $$('#querypassword_2').removeClass('mdui-textfield-invalid');
    }
}
function Submit(){
    if($$('#querypassword').val() != $$('#querypassword2').val()) {
        mdui.alert("两次输入的密码不一致!","错误");
        return;
    }
    let jmpurl = $$('#jmpURL').val();
    let pwd = $$('#querypassword').val();
    let Genid = $$('#postfix').val();
    $$.ajax({
        method: 'POST',
        url: "./Submit.php",
        data: {
            genid:Genid,
            viewPwd:pwd,
            jmpURL:jmpurl
        },
        success: function(data){
            if(JSON.parse(data).msgCode == -1){
                mdui.alert(JSON.parse(data).msgStr,"提交错误");
            }else{
                mdui.alert(JSON.parse(data).msgStr,"提交成功");
            }
        }
    })
}
function getIPInfo(ip){
    let tmp = $$.ajax({
        method: 'GET',
        url: "https://api.iouoi.org/iouoiapi/location/?ip="+ip,
        async:false
    }).response;
    tmp = JSON.parse(tmp);
    return tmp.province + "," + tmp.city + "," + tmp.area + "," + tmp.extend;
}
function parseDom(arg) {
    let objE = document.createElement("tbody");
    objE.innerHTML = arg;
    return objE.childNodes[0];
}
function addList(id,ip,time,flag){
    let expression = `<tr><td>${id}</td><td>${ip}</td><td>${getIPInfo(ip)}</td><td>${time}</td><td>${flag}</td></tr>`;
    $$('#qList').append(parseDom(expression));
    //console.log(expression);
}
function cleanList(){
    document.getElementById('qList').innerHTML = "";
}
function Query(){
    if($$('#query_id').val() == "" || $$('#query_pwd').val() == ""){
        mdui.alert("有未填写的参数!","错误");
        return;
    }
    let tmp = $$.ajax({
        method: 'POST',
        url: "./GetRecord.php",
        async:false,
        data: {
            genid: $$('#query_id').val(),
            pwd: $$('#query_pwd').val()
        },
    }).response;

    tmp = JSON.parse(tmp);
    //console.log(tmp);
    if(tmp.msgCode == -1){
        mdui.alert(tmp.msgStr,"错误");
        return;
    }
    tmp.msgStr = JSON.parse(tmp.msgStr);
    //console.log(tmp.msgStr.length);
    cleanList();
    for(let i=0;i<tmp.msgStr.length;i++){
        addList(tmp.msgStr[i].id,tmp.msgStr[i].IP,tmp.msgStr[i].time,tmp.msgStr[i].viewFlag);
    }
    mdui.alert("查询完毕,"+tmp.msgStr.length+"条记录!");
}