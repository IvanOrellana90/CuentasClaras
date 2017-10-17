<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.group',function(){

            //alert("Cambio");

            var group_id=$(this).val();

            var op=" ";

            if(group_id != "0") {
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findGroupUsers')!!}',
                    data:{'id':group_id},
                    success:function(data){

                        //alert("Funciono");

                        gr+='<option value="0" selected disabled>chose product</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].productname+'</option>';
                        }

                        $('hr').after(gr)
                    },
                    error:function(){

                    }
                });
            }

        });

    });
</script>
