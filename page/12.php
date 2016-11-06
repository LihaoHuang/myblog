<?php
    $phpArray = array("HappyMan","is","excellent","!!");
    $phpNumber = count($phpArray);
?>
<script>
    var jsArray = ["<?php echo join("\", \"", $phpArray); ?>"];
    var jsNumber = '<?php print($phpNumber); ?>';
    for(var i=0;i<jsNumber;i++)
        alert(jsArray[i]);
</script>