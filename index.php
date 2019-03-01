<?php
    $webPre = "127.0.0.1/redirect.php?genID=";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/mdui.min.css">
        <link rel="stylesheet" href="./css/mecss.css">
        <script src="./js/marked.js"></script>
        <script src="./js/mdui.min.js"></script>
        <script src="./js/mejs.js"></script>
        <title>IP剽窃者</title>
    </head>
    <script>
        let link = "<?php echo $webPre;?>";
    </script>
    <body class="mdui-theme-accent-blue">
        <div class="mdui-container-fluid">
            <div class="mdui-row">
                <div class="mdui-col-offset-xs-1 mdui-col-xs-10">
                    <div id="mainBack">
                        <div class="mdui-appbar">
                            <div class="mdui-tab mdui-color-theme-accent" mdui-tab>
                                <a href="#Start" class="mdui-ripple mdui-ripple-white">开始</a>
                                <a href="#Get_ID" class="mdui-ripple mdui-ripple-white">获得一个ID</a>
                                <a href="#Query" class="mdui-ripple mdui-ripple-white">查询记录</a>
                            </div>
                        </div>
                        <div class="mdui-container-fluid" style="margin-top:10px;">
                            <div id="Start">
                                <div id="mdView"></div>
                            </div>
                            <div id="Get_ID">
                                <div id="postfix_" class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-12" style="cursor: text;">
                                    <label class="mdui-textfield-label"  style="cursor: text;">网页后缀</label>
                                    <input id="postfix" class="mdui-textfield-input" style="cursor: text;" onblur="VerifyGenID();"/>
                                    <div class="mdui-textfield-error" id="error1">后缀已存在</div>
                                    <div class="mdui-textfield-helper" id="tip1">访问链接将会是:<?php echo $webPre?></div>
                                </div>
                                <div id="jmpURL_" class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-12" style="cursor: text;margin-bottom:15px;">
                                    <label class="mdui-textfield-label"  style="cursor: text;">跳转链接(可空,默认为bilibili,注意http前缀)</label>
                                    <input id="jmpURL" class="mdui-textfield-input" style="cursor: text;"/>
                                </div>
                                <div id="querypassword_" class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-12" style="cursor: text;float: left;margin-bottom:15px;">
                                    <label class="mdui-textfield-label"  style="cursor: text;">查询密码(牢记)</label>
                                    <input id="querypassword" type="password" class="mdui-textfield-input" style="cursor: text;"/>
                                </div>
                                <div id="querypassword_2" class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-12" style="cursor: text;float: left;margin-bottom:15px;">
                                    <label class="mdui-textfield-label"  style="cursor: text;">重复查询密码</label>
                                    <input id="querypassword2" type="password" class="mdui-textfield-input" style="cursor: text;" onblur="VerifyPassword();"/>
                                    <div class="mdui-textfield-error" id="error2">两次密码不一致</div>
                                </div>
                                <div class="mdui-col-xs-12" style="margin-top: 30px;">
                                    <button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple" onclick="Submit();">提交</button>
                                </div>
                            </div>
                            <div id="Query">
                                <div id="query_id_" class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-5" style="cursor: text;margin-bottom:15px;">
                                    <label class="mdui-textfield-label"  style="cursor: text;">查询ID(注册时的后缀)</label>
                                    <input id="query_id" class="mdui-textfield-input" style="cursor: text;"/>
                                </div>
                                <div id="query_pwd_" class="mdui-textfield mdui-textfield-floating-label mdui-col-xs-5" style="cursor: text;margin-bottom:15px;">
                                    <label class="mdui-textfield-label"  style="cursor: text;">查询密码</label>
                                    <input id="query_pwd" type="password" class="mdui-textfield-input" style="cursor: text;"/>
                                </div>
                                <div class="mdui-col-xs-2" style="margin-top: 35px;">
                                    <button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple" onclick="Query();">查询</button>
                                </div>
                                <div class="mdui-table-fluid" style="max-height: 80%;">
                                    <table class="mdui-table mdui-table-hoverable">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>访问IP</th>
                                            <th>地区</th>
                                            <th>访问时间</th>
                                            <th>浏览器标识</th>
                                        </tr>
                                        </thead>
                                        <tbody id="qList">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>