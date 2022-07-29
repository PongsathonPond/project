@extends('layouts.admin')

@section('content')
@if (session('success'))
<script>
 Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'โหลดข้อมูลเรียบร้อย',
  showConfirmButton: false,
  timer: 1500
 })
</script>
@endif

<button type="button" class="btn bg-gradient-success fa-solid fas fa-user-plus" data-bs-toggle="modal"
data-bs-target="#ADMIN">

</button>



    <!-- Modal -->
    <div class="modal fade" id="ADMIN" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ดูแลระบบ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="handleAjax" action="{{ url('admin-do-register') }}" name="postform">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" />

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


                            <div class="col-6">
                              <div class="form-group">
                                  <label>ชื่อ</label>
                                  <input type="text" name="first_name"  class="form-control" />

                              </div>
                          </div>

                          <div class="col-6">
                            <div class="form-group">
                                <label>นามสกุล</label>
                                <input type="text" name="last_name"  class="form-control" />

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
     <h6>ข้อมูลผู้ดูแลระบบ</h6>
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

         {{-- <th class="text-uppercase font-weight-bolder text-center text-xs">จัดการ
         </th> --}}
        </tr>
       </thead>
       <tbody>

        @foreach ($admin as $row)
         <tr>
          <td>
           <div class="d-flex px-2 py-1">
            <div class="d-flex flex-column justify-content-center">
             <h6 class="mb-0 text-sm">
              {{ $row->title_name }} {{ $row->first_name }}
              {{ $row->last_name }}</h6>
             <p class="text-secondary mb-0 text-xs">{{ $row->email }}</p>
            </div>
           </div>
          </td>

          
           <td class="text-center align-middle">
            <span class="badge badge-sm bg-gradient-success">ผู้ดูแลระบบ</span>
           </td>
        


          <td class="text-center align-middle">
           <span class="text-secondary font-weight-bold text-xs">{{ $row->created_at }}</span>
          </td>

          <td class="text-center align-middle">


           <!-- Button trigger modal -->
         

           {{-- <a href="{{ url('/usermanage/delete/' . $row->id) }}" class="fas fa-trash-alt fa-lg btn btn-danger"
            onclick="return confirm('ลบหรือไม่ ?')"> </a> --}}

           <!-- Modal -->
          

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

        @foreach ($users as $row)
         <tr>
          <td>
           <div class="d-flex px-2 py-1">
            <div class="d-flex flex-column justify-content-center">
             <h6 class="mb-0 text-sm">
              {{ $row->title_name }} {{ $row->first_name }}
              {{ $row->last_name }}</h6>
             <p class="text-secondary mb-0 text-xs">{{ $row->email }}</p>
            </div>
           </div>
          </td>

          @if ($row->role == 1)
           <td class="text-center align-middle">
            <span class="badge badge-sm bg-gradient-success">ผู้ดูแลระบบ</span>
           </td>
          @else
           <td class="text-center align-middle">
            <span class="badge badge-sm bg-primary">ผู้ใช้ทั่วไป</span>
           </td>
          @endif


          <td class="text-center align-middle">
           <span class="text-secondary font-weight-bold text-xs">{{ $row->created_at }}</span>
          </td>

          <td class="text-center align-middle">


           <!-- Button trigger modal -->
           <button type="button" class="fas fa-edit fa-lg btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModalSignUp{{ $row->id }}">

           </button>


           <a href="{{ url('/usermanage/delete/' . $row->id) }}" class="fas fa-trash-alt fa-lg btn btn-danger"
            onclick="return confirm('ลบหรือไม่ ?')"> </a>

           <!-- Modal -->
           <div class="modal fade" id="exampleModalSignUp{{ $row->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalSignTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
             <div class="modal-content">
              <div class="modal-body p-0">
               <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                 <h3 class="font-weight-bolder text-primary text-gradient">
                  แก้ไขข้อมูล</h3>

                </div>
                <div class="card-body pb-3">
                 <form role="form text-left" action="{{ url('/usermanage/update/' . $row->id) }}" method="post">
                  @csrf

                  <div class="row">
                   <div class="col-lg-4">
                    <div class="form-group">
                     <label class="form-control-label" for="title_name">คำนำหน้า</label>
                     <select type="text " class="form-control" name="title_name">

                      <option value="{{ $row->title_name }}">
                       {{ $row->title_name }}
                      </option>
                      @if ($row->title_name == 'นางสาว')
                       <option value="นาย">นาย
                       </option>
                      @else
                       <option value="นางสาว">
                        นางสาว
                       </option>
                      @endif
                     </select>
                    </div>
                   </div>

                   <div class="col-lg-4">
                    <div class="form-group">
                     <label class="form-control-label" for="first_name">ชื่อ </label>
                     <input type="text" class="form-control" name="first_name" value="{{ $row->first_name }}">
                    </div>
                   </div>

                   <div class="col-lg-4">
                    <div class="form-group">
                     <label class="form-control-label" for="last_name">นามสกุล</label>
                     <input type="text" class="form-control" name="last_name" value="{{ $row->last_name }}">
                    </div>
                   </div>

                   <div class="col-lg-6">
                    <div class="form-group">
                     <label class="form-control-label" for="email">อีเมล์</label>
                     <input type="text" class="form-control" name="email" value="{{ $row->email }}">
                    </div>
                   </div>

                   <div class="col-lg-6">
                    <div class="form-group">
                     <label class="form-control-label" for="phone_number">เบอร์โทร</label>
                     <input type="text" class="form-control" name="phone_number" value="{{ $row->phone_number }}">
                    </div>
                   </div>
                  </div>

                  <br>
                  {{-- <div class="col-lg-12">
                   <div class="form-group">
                    @if ($row->role == 1)
                     @php($i = 'ผู้ดูแลระบบ')
                    @else
                     <h2>
                      @php($i = 'ผู้ใช้ทั่วไป')
                     </h2>
                    @endif
                    <label class="form-control-label" for="role">สถานปัจจุบัน: <span style="height: 20px"
                      class="badge badge-pill badge-md bg-gradient-primary">{{ $i }}</span></label>
                    <br>
                    <select type="text" class="form-control w-100 mt-4 mb-0" name="role">

                     <option value="{{ $row->role }}">
                      เลือกสถานะ</option>
                     <option value="0">ผู้ใช้ทั่วไป
                     </option>
                     <option value="1">ผู้ดูแลระบบ
                     </option>
                    </select>
                   </div>

                  </div> --}}
                </div>

               </div>
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
@endsection
