<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.group',function(){

            //alert("Cambio");

            var group_id=$(this).val();

            if(group_id != "0") {
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findGroupUsers')!!}',
                    data:{'id':group_id},
                    success:function(data){

                        $(".formMontos").remove();

                        insideForm = "";
                        monto = Math.round($("#amounTicket").val()/data.length);

                        for(var i=0;i<data.length;i++){
                            insideForm+=
                                '<div class="col-sm-10 col-sm-offset-1">' +
                                    '<div class="form-group">' +
                                        '<label class="col-sm-2 control-label">' +
                                            '<div class="pull-left">' +
                                                '<img src="img/avatar/'+ data[i].avatar +'.jpg" class="img-circle imgMontos" data-toggle="tooltip" data-placement="top" title="'+data[i].name+' '+data[i].lastName+'" alt="'+data[i].name+' '+data[i].lastName+'"> ' +
                                            '</div>' +
                                        '</label>' +
                                        '<div class="col-sm-10">' +
                                            '<input type="text" class="form-control" name="amounts[]" value="'+monto+'" placeholder="Monto">' +
                                            '<input type="hidden"  name="users[]" value="'+ data[i].id+ '">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                        }

                        outsideForm = '<div class="row formMontos">' +
                            insideForm +
                            '</div>';
                        ;

                        $('hr').after(outsideForm);
                    },
                    error:function(){

                    }
                });
            }

        });

    });
</script>
