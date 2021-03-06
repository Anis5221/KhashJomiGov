@extends('layouts.admin-app')
@section('title', 'খাস জমি')
@section('contents')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">খাস জমি</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">হোম</a></li>
                <li class="breadcrumb-item active">খাস জমি</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    @include('layouts.partial.flash-alert')
    <div class="container">
        <div class="card">
            <div class="card-header">

                <ul class="nav nav-tabs pt-1 pl-2 bg-green">
                    @foreach ($unions as $item)
                        <li class="nav-item">
                        <a class="nav-link {{ $tab == $item->id? 'active text-green' :'text-white'}}"  href="{{ route('khashJomi.index', ['tab' => $item->id]) }}"> {{ $item->name }}</a>
                      </li>
                    @endforeach
                  </ul>

            </div>
            <div class="card-body">
                <div class="row">
                    @if ($page === 'table')
                        <div class="col-md-12 ">
                            <a href="{{route('khashJomi.index',['tab'=> $tab, 'page'=> 'page'])}}" class="btn btn-success float-right">খাস জমি তৈরী করুন</a>
                        </div>
                    @endif

                </div>


                @if ($page === 'table')
                    @include('admin.contents.acland.khash_jomi.table')
                @elseif ($page === 'edit')
                    @include('admin.contents.acland.khash_jomi.edit')
                @else
                    @include('admin.contents.acland.khash_jomi.create')
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

$(document).ready(function () {
    var tableBody = $('#tableBody')
                    var i = 1;
                    $('#add').on('click', function (e) {
                    tableBody.append('<tr><td class="text-center" >'+ ++i+'</td><td ><input placeholder="দাগ নাম্বার" name="dag_nos[]" class="form-control" type="number"></td><td ><input placeholder="জায়গার পরিমান" class="form-control" name="quantitys[]" min="1" type="taxt" ></td><td class="text-center"><a id="delete" class="btn btn-danger rounded" >-</a></td></tr>')
                    })

                    $(document).on('click', '#delete', function () {
                        $(this).parents('tr').remove();
                    })
})
function deleteCategory(id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    }
</script>
<script>

    $(document).on('click', '#showModal', function (e) {
                e.preventDefault();
                $('#create-modal').modal();
        })

</script>

@endpush
