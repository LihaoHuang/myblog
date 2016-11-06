var filename　= "";
function getfilename(){
    var str=document.getElementById("fileupload").value;
    var temp = new Array;
    temp = str.split("");
    for(var i=12;i < temp.length;i++){
        filename += temp[i];
        console.log(filename);
    }
}

function uploadmassage(){

        var URL = "pages/uploadRecord";
         
        var upload =
        {
            "crew" :document.getElementById("member").value,
            "filename": filename

        };
        console.log(upload);
         
        $.ajax(            
        {
            url:URL,
            cache: false,
            data:upload,
            dataType:'text',
            type:"POST",            
             
                      
            success: function(response)       
            {

            },
             
            error:  function(xhr, ajaxOptions, thrownError)
            { 
            // alert("error");
            // alert(xhr.status); 
            // alert(thrownError);  
            }
         
        });

}
