;(function($){

 $(document).ready(function(){
 
    $('.complete').on('click',function(){
            
        var id=$(this).data('taskid');
        $('#taskid').val(id);
        $('#completeForm').submit();
       
    });

    $('.incomplete').on('click',function(){
            
        var id=$(this).data('iid');
       $('#iid').val(id);
       $('#incompleteForm').submit();

    });

    $('.delete').on('click',function(){
            
        var id=$(this).data('taskid');
       $('#did').val(id);
       $('#deleteForm').submit();

    });

 });

})(jQuery);