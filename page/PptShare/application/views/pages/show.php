<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($_SESSION['email'] != null)
{
    $right = $this->Account->getCompetence($_SESSION['email']);
}
else
{
    echo '<script type="text/javascript">';
    echo 'alert("請先登入系統'.$_SESSION['email'].'!!");';z
    echo 'location.href="'.base_url('../login').'"';
    echo '</script>';
}
?>
    <title><?php echo $title; ?></title>
    <style type = "text/css">
        .bodyshort{
            margin-right:20%;
            margin-left:20%;
        }
        .tablepadding{
            margin-top:5%;
        }
        .fontset{
            color: rgb(0, 92, 173);
            font-family: "SimHei";
        }
    </style>
</head>
<body>
    <div style="margin:100px">
        <div align="center" class="bodyshort">
            <div class="modal-body fontset">
                <h1>M.A.S.E. Lab 分享系統 - 列表</h1>

                <table class="table table-hover tablepadding">

                <table class="table table-hover tablepadding fontset">
                    <tr>
                        <td><item><h2>#</h2></item></td>
                        <td><item><h2>日期</h2></item></td>
                        <td><item><h2>報告投影片</h2></item></td>
                        <td><item><h2>組員</h2></item></td>
                        <td><item><h2>下載</h2></item></td>
                        <?php
                        if($right == 1) {
                            echo "<td><item><h2>刪除</h2></item></td>";
                        }
                        ?>
                    </tr>
                    <?php
                        // echo anchor('Welcome/filedownload/123','Download');//Test line
                        foreach($filenames as $key => $filename): #取檔名
                        echo '<tr>';
                        echo '<td width = "50vw"><h3>'.($key+1).'</h3></td>';
                        echo '<td width = "150vw"><h3>'.date("Y/m/d",filemtime("PPT/".$filename)).'</h3></td>';
                        // $file = mb_convert_encoding($file,"BIG5","UTF-8");
                        echo '<td width = "400vw"><h3>'. pathinfo($filename,PATHINFO_FILENAME).'</h3></td>';
                        echo '<td width = "300vw"><h3>'.$this->Rows->getMember($filename).'</h3></td>';
                        echo '<td width = "100vw"><h3>'.anchor('pages/filedownload/'.$filename,
                            '<button type="button" class="btn btn-info">Download</button>').'</h3></td>';
                        if($right == 1) {
                        echo '<td  width = "100vw"><h3><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#checkingPage" onclick=getElementById("tempStr").value="'.$filename.'">delete</h3></td>';
                        }
                        echo '</tr>';
                        endforeach;
                        clearstatcache();
                    ?>
                </table>
                <?=anchor('create','<button type="button" class="btn btn-primary btn-lg">點這裡上傳喔</button>');?>
                <?=anchor('pages/logout','<button type="button" class="btn btn-danger btn-lg">登出</button>');?>
            </div>
        </div>
    </div>

<!-- 確認單 -->

<div class="modal fade" id="checkingPage" tabindex="-1" role="dialog" aria-labelledby="checkingPage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div align="center" class="modal-header">
            <h2 style="color: red">確定刪除本檔案？</h2>
            </div>
            <div align="center" class="modal-body">
                <script> var str="<?= base_url('pages/deleteFile/')?>/";</script>
                <button class="btn btn-info btn-lg" onclick="location.href=str+getElementById('tempStr').value" data-dismiss="model">確定</button>
                <button class="btn btn-warning btn-lg" data-dismiss="modal">還是不要好了</button>
            </div>
        </div>
    </div>
    <input type="text" id="tempStr" value="" style="display: none"/>
</div>
