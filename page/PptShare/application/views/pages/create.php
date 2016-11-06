<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($_SESSION['email'] != null)
{
}
else
{
        echo '<script type="text/javascript">';
            echo 'alert("請先登入系統'.$_SESSION['email'].'!!");';
            echo 'location.href="'.base_url('index.php/login').'"';
            echo '</script>';
}
?>
<style type="text/css">
    .bodyshort{
            margin-right:20%;
            margin-left:20%;
        }
    .fontset{
        color: rgb(0, 92, 173);
        font-family: "SimHei";   
    }

</style>
<body>
<!-- Page Header -->
<body>
    <div style="margin:100px">
        <div class="bodyshort">
            <div align="center"  class="modal-header">
                <h1 class="text-center fontset">M.A.S.E. Lab 分享系統 - 上傳</h1>
            </div>
            <div class="modal-body">
                <label for="member" class="fontset"><h2>報告組員 : </h2></label>
                <input align="center"  id="member" class="form-control" placeholder="黃立豪、陳威傑、楊全還、蒙偉倫" name="member" type="text" >
                <label for="upload" class="fontset"><h2>上傳檔案 : </h2></label>
                <!-- upload -->
                <form align="center" method="post" action="pages/file_upload" enctype="multipart/form-data">
                    <input  type="file" name="fileupload" id="fileupload" onchange="getfilename()"/>
                    <br><br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <input class="btn btn-success btn-lg" type="submit" value="上傳" onclick="uploadmassage()">
                            <button type="button"  onclick="location.href='./show'" class="btn btn-primary btn-lg"> PPT 列表</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="../publish/js/create.js"></script>


