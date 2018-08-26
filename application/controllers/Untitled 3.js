$(document).ready(function(){
    
   
   $("crudForm").change(function(){
    
   
   
   $("#viewdemo").show();
   
   
   
   $.post('/Querybuild/ajax',{'33':333}).done(function(data){
    
    $("#viewdemo").html(data);
    
   });
    
   });
   
    
});