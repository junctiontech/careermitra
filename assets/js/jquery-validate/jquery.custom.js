$('#i_submit').click( function() {
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#i_file')[0].files[0].size;
        
        if(fsize>10000) //do something if file size more than 10 kb (10000)
        {
            alert(fsize +" bites\nToo big Image, Please upload image below 10Kb!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
});


$('#i_submit1').click( function() {
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#i_file')[0].files[0].size;
        
        if(fsize>50000) //do something if file size more than 50 kb (50000)
        {
            alert(fsize +" bites\nToo big Image, Please upload image below 50Kb!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
});


$('#i_submit2').click( function() {
    //check whether browser fully supports all File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        //get the file size and file type from file input field
        var fsize = $('#i_file')[0].files[0].size;
        
        if(fsize>25000) //do something if file size more than 15 kb (25000)
        {
            alert(fsize +" bites\nToo big Image, Please upload image below 25Kb!");
        }else{
            alert(fsize +" bites\nYou are good to go!");
        }
    }else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
});
