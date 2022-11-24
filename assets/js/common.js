$.validator.addMethod("fileType", function(value, element) {
  
    var extension = value.split('.').pop();
   
   if(extension == "jpg" || extension == "jpeg" || extension == "png"){
    return true;
   }else{
    return false;
   }
  }, "Only jpg,jpeg,png files allowed");
