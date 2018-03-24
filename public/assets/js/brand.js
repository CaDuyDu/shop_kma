$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(document).on('click','#edit',function(){
    var id = $(this).data('id');
    var btn = $(this);
    $.ajax({
      type:'get',
      url:'brand/'+id,
      success:function(response){
        var res = response.data;
        $('#ename').val(res.name);        
        $('#eid').val(res.id);
        $('#ecode').val(res.code);

      }
    })
  })
    $(document).on('submit','#edit-brand',function(e){
          e.preventDefault();
          var id = $('#eid').val();
          $.ajax({
            type:'put',
            data: {
              name:$('#ename').val(),           
              code:$('#ecode').val(),            },
            url:'brand/'+id,
            success:function(response){
              var res = response.data;
              toastr.success(res.name+ ' vừa được cập nhật');
              $('#modal-edit').modal('hide');
              var html='<td>'+res.id+'</td>'+
                      '<td>'+res.name+'</td>'+
                      '<td>'+res.code+'</td>'+
                      '<td>'+
                      '<button type="button" id="edit" class="btn btn-primary" '+
                      'data-toggle="modal" data-target="#modal-edit" data-id="'+res.id+'"><i class="fa fa-edit"></i></button>'+
                      '<button class="btn btn-danger" id="delete" data-id="'+res.id+'" type="submit">'+
                      '<i class="fa fa-trash"></i></button>'+                    
                      '</td>';
              $('#brand_'+res.id).html(html);
            },error:function(xhr,ajaxOptions,thrownError) {
              alert('error');
              // toastr.error(xhr.status + ':' + thrownError);
              // console.log(xhr);
              // toastr.error(xhr.responseJSON.message);
            }
          })
  })


  $(document).on('click','#delete',function(){
    var id = $(this).data('id');
    var btn = $(this);
    swal({
      title: "Bạn có chắc chắn muốn xóa?",
      text: "Sau khi xóa không thể lấy lại dữ liệu!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type:'delete',
          url:'brand/'+id,
          success: function(response){
            btn.parent().parent().slideUp();
            toastr.success(response.message);
          }
        })
      } else {
        swal("Nhãn hàng chưa bị xóa!");
      }
    });
    
  })
    $('#add-brand').on('submit',function(e){
      e.preventDefault();
      $.ajax({
        type:'post',
        data: {
          name:$('#aname').val(),
          code:$('#acode').val(),
        },
        url:'brand/store',
        success:function(response){
          var res = response.data;
          toastr.success(res.name+ ' thêm thành công');
            // setTimeout(function(){
            //   window.location.href="{{route('products.index')}}";
            // },800);
          $('#modal-add').modal('hide');
          var flag = $('#flag');
          var html = '<tr>'+
                      '<td>'+res.id+'</td>'+
                      '<td>'+res.name+'</td>'+
                      '<td>'+res.code+'</td>'+
                      '<td>'+
                      '<button type="button" id="edit" class="btn btn-primary" '+
                      'data-toggle="modal" data-target="#modal-edit" data-id="'+res.id+'"><i class="fa fa-edit"></i></button>'+
                      '<button class="btn btn-danger" id="delete" data-id="'+res.id+'" type="submit">'+
                      '<i class="fa fa-trash"></i></button>'+                  
                    '</td>';+
                    '</tr>';
          $(html).insertAfter(flag);
        },error:function(xhr,ajaxOptions,thrownError) {
          // toastr.error(xhr.status + ':' + thrownError);
          // console.log(xhr);
          toastr.error(xhr.responseJSON.message);
        }

      })
    })