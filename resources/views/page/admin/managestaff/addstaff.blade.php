@extends('layouts.admin')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<style type="text/css">
    a[disabled="disabled"] {
        pointer-events: none;
        text-decoration: line-through;
    }
</style>
@inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'บันทึกข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if (session('delete'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'ลบข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if (session('update'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'อัพเดทข้อมูลเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <!-- Button trigger modal -->
    <button type="button" class="btn bg-gradient-success fa-solid fas fa-user-plus" data-bs-toggle="modal"
        data-bs-target="#STAFF">

    </button>

    <!-- Modal -->
    <div class="modal fade" id="STAFF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ดูแลสถานที่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="handleAjax" action="{{ url('do-register') }}" name="postform">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" />

                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                    @error('password')
                                        <div class="my-2">
                                            <span class="text-danger my-2"> {{ $message }} </span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">REGISTER</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">





            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>จัดการข้อมูลผู้ใช้</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="align-items-center mb-0 table">
                            <thead>
                                <tr>
                                    <th class="text-uppercase font-weight-bolder text-xs">
                                        ผู้ใช้
                                    </th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        สถานะ</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        วันที่เพิ่ม</th>

                                    <th class="text-uppercase font-weight-bolder text-center text-xs">จัดการ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($staff as $row)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                    </h6>
                                                    <p class="text-secondary mb-0 text-xs">{{ $row->email }}</p>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="text-center align-middle">
                                            <span class="badge badge-sm bg-success">ปกติ</span>
                                        </td>

                                        <td class="text-center align-middle">
                                            {{ $thaiDateHelper->simpleDateFormat($row->creatd_at) }}
                                        </td>





                                        <td class="text-center align-middle">


                                            <!-- Button trigger modal -->
                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">

                                            </button>


                                            <a href="{{ url('/manage/delete/' . $row->id) }}"
                                                class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')"> </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalSignTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body p-0">
                                                            <div class="card card-plain">
                                                                <div class="card-header pb-0 text-left">
                                                                    <h3
                                                                        class="font-weight-bolder text-primary text-gradient">
                                                                        แก้ไขข้อมูล</h3>

                                                                </div>
                                                                <div class="card-body pb-3">
                                                                    <form role="form text-left" action=""
                                                                        method="post">
                                                                        @csrf





                                                                        <div class="text-center">
                                                                            <button type="submit"
                                                                                class="btn bg-gradient-primary btn-lg btn-rounded mt-4 mb-0 w-80">บันทึก</button>



                                                                        </div>
                                                                        <br>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                    </div>



                    </td>

                    </tr>
                    @endforeach


                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                paging: false,
                ordering: false,
                info: false,
                "language": {
                    "search": "ค้นหา:",
                    "lengthMenu": "",
                    "zeroRecords": "ไม่พบข้อมูล - ขออภัย",
                    "info": '',
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "",
                    "paginate": ""
                }
            });
        });
    </script>


    <script src="/../assets/js/core/popper.min.js"></script>
    <script src="/../assets/js/core/bootstrap.min.js"></script>

    </div>
@endsection
