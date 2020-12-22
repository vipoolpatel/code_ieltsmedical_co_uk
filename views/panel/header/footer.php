<script type="text/javascript" src="<?=base_url()?>js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/plugins/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>js/plugins.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/actions.js"></script>

   <script type="text/javascript" src="<?=base_url()?>js/plugins/bootstrap/bootstrap-select.js"></script>

 <script type="text/javascript" src="<?=base_url()?>front/tinymce/tinymce.min.js"></script>

<script type="text/javascript">



   $('.ChangePaymentStatus').change(function(){
            var payment = $(this).val();
            var id = $(this).attr('id');
            var table = $(this).attr('data-table');
            $.ajax({
                type:'POST',
                url:"<?=base_url()?>panel/book/ChangePaymentStatus",
                data: {payment:payment,id:id,table:table},
                dataType: 'JSON',
                success:function(data){
                    alert('Status successfully changed.');
                }
            });
    });


    $('#getCustomerDetail').change(function(){
            var value = $(this).val();
            $.ajax({
                type:'POST',
                url:"<?=base_url()?>panel/book/getCustomerDetail",
                data: {customer_id: value},
                dataType: 'JSON',
                success:function(data){
                    $('#getFirstName').val(data.username);
                    $('#getLastName').val(data.lastname);
                    $('#getEmail').val(data.email);
                    $('#getAddress').val(data.address);
                    $('#getPhone').val(data.phone);
                }
            });
    });
  tinymce.init({
        selector:'.editor',
        plugins:'link code image textcolor advlist',
        toolbar: [
        "fontselect | bullist numlist outdent indent | fontsizeselect | undo redo | styleselect | bold italic | link image",
        "alignleft aligncenter alignright Justify | forecolor backcolor",
        "fullscreen"
        ],
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
    });
</script>