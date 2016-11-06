<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <title><?= $title;?></title>
<!-- <script src="publish/js/login.js"></script> -->
<style type="text/css">
    .modal {
        margin-top:10%;
    }
    .modal-body {
        margin-top:3%;
        margin-bottom:3%;
    }
    .fontset{
            color: rgb(0, 92, 173);
            font-family: "SimHei";
    }
</style>
    <title><?echo $title;?></title>
</head>
<body>
    <div style="margin:100px">
        <div align="center">
        <form action="<?=base_url("pages/login");?>" id="form1"  method="post">
            <div class="modal-header fontset">
                <h1>M.A.S.E. Lab 分享系統 - 登入</h1>
            </div>
            <div class="modal-body">
                    <div>
                        <label id="heig"><input class="form-control input-lg" type="email" id="account" name="email"  placeholder="Email" ></label>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="輸入學校信箱登入註冊，範例 : 40341234@gm.nfu.edu.tw">?</button>
                    </div>
                    <div>
                        <label id="heig"><input class="form-control input-lg" type="password"  id="password" name="password" placeholder="Password"></label>
                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="輸入密碼登入註冊，長度必須大於 7 ">?</button>
                    </div>
            </div>
            <div class="modal-footer">
                <div align="center">
                    <button type="submit" class="btn btn-success btn-lg">登入</button>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login_madal">沒帳號嗎? 來註冊吧!!</button>
                </div>
            </div>
        </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="login_madal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?=base_url("index.php/pages/creat");?>" id="form2" method="post" >
                    <div align="center" class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h1 class="modal-title" id="myModalLabel">M.A.S.E. Lab 帳號註冊</h1>
                    </div>
                    <div align="center" class="modal-body">
                        <div>
                            <label id="heig"><input class="form-control input-lg" type="email" id="Newaccount" name="Newemail" placeholder="Email" ></label>
                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="輸入學校信箱登入註冊，範例 : 40341234@gm.nfu.edu.tw">?</button>
                        </div>
                        <div>
                            <label id="heig"><input class="form-control input-lg" type="password"  id="Newpassword" name="Newpassword" placeholder="Password" ></label>
                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="輸入密碼登入註冊，長度必須大於 7 ">?</button>
                        </div>
                        <div id ="alert"></div>
                    </div>
                    <div class="modal-footer">
                        <div align="center">
                            <button class="btn btn-success" type="submit">註冊</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>