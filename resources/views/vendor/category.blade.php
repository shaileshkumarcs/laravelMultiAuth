@extends('layouts.vendor')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Default box -->
      <div class="row">
        <div class="col-md-12" style="text-align: right;margin-bottom: 10px;">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>
                  Create New
                </button>
        </div>
      </div>
      <!-- Create Category modal -->
      <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="javascript:void(0)" id="create-category">
              @csrf
            <div class="modal-body">
              <div id="errorMsg" class="error"></div>
              <div class="form-group">
                <label for="categoryName">Name</label>
                <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter category name">
                <span id="category_name_error" class="error"></span>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                <span id="description_error" class="error"></span>
              </div>
              <div class="form-group">
                <label for="picture">Image</label>
                <div style="display: flex;">
                  <div class="">
                    <input type="text" name="picture_url" class="form-control" id="picture_url" placeholder="Picture url" readonly>
                  </div>
                  <div class="input-group" style="width: auto !important;">
                    <div class="custom-file">
                      <input type="file" name="picture" class="custom-file-input" id="picture">
                      <label class="custom-file-label" for="picture">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="uploadPicture">Upload</span>
                    </div>
                  </div>
                </div>
                <span id="picture_url_error" class="error"></span>
              </div>
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active">
                <label class="form-check-label" for="active">Active</label>
              </div> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" id="btn-submit" value="Create" class="btn btn-outline-primary">
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--End create category modal -->

      <!--Edit category modal -->

      <!-- Create Category modal -->
      <div class="modal fade" id="edit-category-modal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="javascript:void(0)" id="update-category">
              @csrf
            <div class="modal-body">
              <div id="updateErrorMsg" class="error"></div>
              <input type="hidden" id="category_id" name="category_id">
              <div class="form-group">
                <label for="categoryName">Name</label>
                <input type="text" name="update_category_name" class="form-control" id="update_category_name" placeholder="Enter category name">
                <span id="update_category_name_error" class="error"></span>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="update_description" id="update_description" class="form-control" rows="3" placeholder="Enter description"></textarea>
                <span id="update_description_error" class="error"></span>
              </div>
              <div class="form-group">
                <label for="picture">Image</label>
                <div style="display: flex;">
                  <div class="">
                    <input type="text" name="update_picture_url" class="form-control" id="update_picture_url" placeholder="Picture url" readonly>
                  </div>
                  <div class="input-group" style="width: auto !important;">
                    <div class="custom-file">
                      <input type="file" name="updatePictureFile" class="custom-file-input" id="updatePictureFile">
                      <label class="custom-file-label" for="picture">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="updatePicture">Upload</span>
                    </div>
                  </div>
                </div>
                <span id="update_picture_url_error" class="error"></span>
                <div class="" style="padding: 10px;" id="show-update-image">
                  <!-- <img src="{{URL::asset('category_images/20210319122216.png')}}" style="width: 100px; height: 100px;" alt="category image" /> -->
                </div>
              </div>
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active">
                <label class="form-check-label" for="active">Active</label>
              </div> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" id="btn-submit" value="Update" class="btn btn-outline-primary">
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--End create category modal -->

      <!--End category modal -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Category</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          Sl.No.
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                      <th style="width: 30%">
                          Description
                      </th>
                      <th>
                          Image
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($response['data'] as $index => $data)
                  <tr>
                      <td>
                         {{++$index}} 
                      </td>
                      <td>
                         {{ $data['category_name'] }}
                      </td>
                      <td>
                          {{ $data['description'] }}
                      </td>
                      <td class="project_progress">
                          <img alt="Avatar" class="table-avatar" src="{{URL::asset($data['picture_url'])}}">
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Active</span>
                      </td>
                      <td class="project-actions text-right">
                          <!-- <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> -->
                          <a class="btn btn-info btn-sm" href="javascript:void(0);" data-toggle="modal" data-target="#edit-category-modal" onclick="EditCategory('{{ $data }}')">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="javascript:void(0);" data-id="{{ $data['id'] }}">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
                  <!-- <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              AdminLTE v3
                          </a>
                          <br/>
                          <small>
                              Created 01.01.2019
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                              </li>
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="47" aria-volumemin="0" aria-volumemax="100" style="width: 47%">
                              </div>
                          </div>
                          <small>
                              47% Complete
                          </small>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Success</span>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr> -->
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>
</div>
<!-- For Ajax call need to make csrf token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- End  -->
</section>
<script type="text/javascript">


// function CreateSubmit(){
//   console.log("Create Submit");
//   var category_name = document.getElementById("category_name").value;
//   var description = document.getElementById("description").value;
//   var picture_url = document.getElementById("picture_url").value;
//   let formData = new FormData();
//   formData.append("category_name", category_name);
//   formData.append("description", description);
//   formData.append("picture_url", picture_url);

//   const url = '/category';
//   async await fetch(url, { 
//     method: 'POST',
//     headers: {
//               "X-CSRF-TOKEN": token
//               },
//     body: formData
//   }).then(() => console.log('success'));

// }


</script>
@endsection
@section('page-js-script')
<script type="text/javascript">
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
document.getElementById('uploadPicture').onclick = async function(){
    console.log("Upload Side Gear clicked");
    let url = '/image-upload';
    let formData = new FormData();
    formData.append("file", picture.files[0]);
    let response = await fetch(url, {
                headers: {
                    "X-CSRF-TOKEN": token
                    },
                method: 'POST',
                body: formData
            })
    let result = await response.json();
    console.log("Result ",result);
    document.getElementById("picture_url").value = result.url;
    alert(result.message,'',result.url);
}

$("#create-category").on('submit',(function(e){
  e.preventDefault();
  console.log(new FormData());
  var formData = new FormData();
  console.log("Update");

  $.ajax({
    url : '/category/create',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    headers: {
            "X-CSRF-TOKEN": token
            },
    success: function(response){
      if(response.status){
        $("#errorMsg").text(response.msg);
        $("#errorMsg").css({'color': 'green', 'text-align':'center'});
        setTimeout(function(){
          $('#modal-default').modal('hide');
          location.reload();
        }, 2000);
      }
      else{
        if(typeof(response.msg) === "object"){
          console.log('Object', response.msg);
          $.each(response.msg, function (key, val) {
              $("#" + key + "_error").text(val[0]);
          });
          $(".error").css({'color': 'red'});
          
        }
        else{
          $('#errorMsg').text(response.msg);
          $(".error").css({'color': 'red'});
        }
      }
      setTimeout(function(){
        $('.error').text("");
      }, 2000);
    }
  })
}));

// Edit category

function EditCategory(data){
  var data = JSON.parse(data);
  console.log("Data", data['category_name']);
  var base_url =  "{!! URL('/') !!}/";
  document.getElementById('category_id').value = data['id'];
  document.getElementById('update_category_name').value = data['category_name'];
  document.getElementById('update_description').value = data['description'];
  document.getElementById('update_picture_url').value = data['picture_url'];
  document.getElementById('show-update-image').innerHTML = '<img src="'+base_url+''+data['picture_url']+'" style="width: 100px; height:100px" alt=""/>';

}

// Update image 

document.getElementById('updatePicture').onclick = async function(){
    console.log("Upload Side Gear clicked");
    let url = '/image-update';
    var oldpicture = document.getElementById('update_picture_url').value;
    var category_id = document.getElementById('category_id').value;
    let formData = new FormData();
    formData.append("file", updatePictureFile.files[0]);
    formData.append("oldpicture", oldpicture);
    formData.append("category_id", category_id);
    let response = await fetch(url, {
                headers: {
                    "X-CSRF-TOKEN": token
                    },
                method: 'POST',
                body: formData
            })
    let result = await response.json();
    console.log("Result ",result);
    document.getElementById("update_picture_url").value = result.url;
    alert(result.message);
}


$("#update-category").on('submit',(function(e){
  e.preventDefault();
  var formData = new FormData(this);

  $.ajax({
    url : '/category/update',
    type: 'POST',
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    headers: {
            "X-CSRF-TOKEN": token
            },
    success: function(response){
      console.log("Response", response);
      if(response.status){
        $("#updateErrorMsg").text(response.msg);
        $("#updateErrorMsg").css({'color': 'green', 'text-align':'center'});
        setTimeout(function(){
          $('#update-category-modal').modal('hide');
          location.reload();
        }, 2000);
      }
      else{
        if(typeof(response.msg) === "object"){
          console.log('Object', response.msg);
          $.each(response.msg, function (key, val) {
            console.log("key", key+'_error');
              $("#" + key + "_error").text(val[0]);
          });
          $(".error").css({'color': 'red'});
          
        }
        else{
          $('#updateErrorMsg').text(response.msg);
          $(".error").css({'color': 'red'});
        }
      }
      setTimeout(function(){
        $('.error').text("");
      }, 2000);
    }
  })
}));

// Delete record
$(document).on("click", ".delete" , function() {
  var delete_id = $(this).data('id');
  var el = this;
  $.ajax({
    url: '/category/delete/'+delete_id,
    type: 'get',
    success: function(response){
      console.log("Delete Response", response.msg);
      // $(el).closest( "tr" ).remove();
      // alert(response);
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Delete',
        // subtitle: 'Subtitle',
        body: response.msg,
      });
    }
  });
});



</script>
@stop
