@extends('layouts.staff')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<style type="text/css">
    a[disabled="disabled"] {
        pointer-events: none;
        text-decoration: line-through;
    }
</style>
@inject('thaiDateHelper', 'App\Services\ThaiDateHelperService')

@section('contentstaff')

    <div class="row">
        <div class="col-xl-12 order-xl-1">


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



            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>จัดการข้อมูลการจอง</h4>
                </div>
                <br>
                <div class="card-body px-0 pt-0 pb-2">

                    <div class="table-responsive p-0">

                        <table class="align-items-center mb-0 table" id="myTable">
                            <thead>
                                <tr>
                                    <th class="font-weight-bolder text-center text-xs" data-sort="name">
                                        ลำดับ</th>
                                     <th class="text-left text-xs font-weight-bolder" data-sort="name">
                                            รูป</th>
                                    <th class="font-weight-bolder text-center text-xs" data-sort="name">
                                        ห้อง</th>
                                    <th class="font-weight-bolder text-center text-xs" data-sort="name">
                                        ความจุ</th>
                                
                                    <th class="font-weight-bolder text-center text-xs" data-sort="name">
                                        สถานะ</th>

                                    <th class="text-aa font-weight-bolder text-center text-xs" data-sort="name">
                                        จัดการ</th>
                                        
                                    
                                                    </th>
                                                </tr>
                                            </thead>
                                            @push('js')
                                          <tbody>
                                          @foreach ($locationstaff as $item)
                                                       
                                     
                                    <tr>

                                        <td class="text-center align-middle">
                                          
                                            {{ $locationstaff->firstItem() + $loop->index }} 
                                        </td>
                                          
                                        <td class="align-middle text-center">

                                            <img src="{{ asset($item->location_image) }}"
                                                alt="" width="60vh" height="60vh">


                                      
                                        </td>
                                        <td class="text-center align-middle">

                                            {{$item->location_name}}
                                        </td>
                                    

                                        <td class="text-center align-middle">
                                            {{$item->accommodate_people}}
                                             
                                          
                                        </td>

                                        

                                        <td class="text-center align-middle">
                                                test
                                            
                                        </td>

                                   
                                         
                                     



                                        <td >
                                            <div class="dropdown text-center">
                                                <button class="btn bg-gradient-primary dropdown-toggle fas fa-edit"
                                                    type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                    aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="จัดการข้อมูล" data-container="body" data-animation="true">

                                                </button>

                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                 

                                                    <li><a class="dropdown-item text-center" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal" href="#"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="จัดการคำขอ">จัดการคำขอ
                                                        </a>
                                                    </li>


                                            
                                               
                                            </div>




                                            <!-- ModalEditUser -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                สถานะการอนุมัติ
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <form
                                                                {{-- action="{{ url('/request/vice_admin/update/' . $item->id) }}"
                                                                --}}
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="pl-lg-4">
                                                                    <div class="row" style="text-align: left">



<div class="col-6">

    <div class="form-group">
        <label>ราคา</label>
        <input type="text" name="project_cost" value="" class="form-control" />

    </div>
</div>




                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>ราคา</label>
                                                                                <select type="text " class="form-control"
                                                                                    name="status_cost">

                                                                                    <option value="0">
                                                                                        เลือกสถานะ</option>
                                                                                    <option value="1">อนุมัติ
                                                                                    </option>
                                                                                    <option value="2">
                                                                                        ไม่อนุมัติ
                                                                                    </option>


                                                                                </select>

                                                                              
                                                                            </div>
                                                                        </div>


<br><br>
                                                                     
                                                                      
                                                      
                                                                        

                                                                    </div>




                                                                    @error('name')
                                                                        <div class="my-2">
                                                                            <span class="text-danger my-2">
                                                                                {{ $message }}
                                                                            </span>
                                                                        </div>
                                                                    @enderror

                                                                    @error('email')
                                                                        <div class="my-2">
                                                                            <span class="text-danger my-2">
                                                                                {{ $message }}
                                                                            </span>
                                                                        </div>
                                                                    @enderror

                                                                    <br>
                                                                    <div class="ss">
                                                                        <button type="submit"
                                                                            class="btn bg-gradient-primary">บันทึก</button>
                                                                        <button type="button"
                                                                            class="btn bg-gradient-secondary"
                                                                            data-bs-dismiss="modal">ปิด</button>

                                                                    </div>
                                                                </div>
                                                            </form>






                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- EndModal -->

                                        </td>
                                      
                                      

                                    </tr>
                                    @endforeach  
                                    </tbody>
                            </table>


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
    @endpush

@endsection
