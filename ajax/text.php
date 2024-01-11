




$order .= '<td><a href="#myModal" class="btn btn-default btn-small" id="custId" data-toggle="modal" data-id="'.$row['ID'].'">Edit</a></td>';



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div> //Here Will show the Data
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        /*$('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'post',
                url : 'fetch_record.php', //Here you will fetch records 
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                    $('.fetched-data').html(data);//Show fetched data from database
                }
            });
        });*/
        
        $(".edit_data").click(function(){
            var id = $(this).attr(id);
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data){
                 $("#name").val(data.name);
                 $("#name").val(data.name);
                 $("#myModal").modal('show');
                }
            });
            
        });
        
    });
    
    
    

</script>


























