<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  
    <link href="../css/csslogin.css" rel="stylesheet" />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
      
            <form method="POST" class="sign-in-form" action="{{ route('login') }}" >
              @csrf
              
            <h2 class="title">Login</h2>
            @if ($errors->has('email'))
        
            <strong style="color: red">อีเมล์หรือรหัสผ่านไม่ถูกต้อง</strong>
       
         @endif
           
            <div class="input-field">
              
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email"  type="email" name="email"  :value="old('email')" required autofocus/>

        
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" required autocomplete="current-password" placeholder="Password" />
             
         
            </div>
             <button type="submit" type="submit"  class="btn solid" >Login</button>

            <p class="social-text">ลงชื่อเข้าใช้ด้วยบัญชีมหาลัย</p>
          </form>

        
            
            <div class="social-media">
              <a href="#" class="social-icon" data-toggle="tooltip" title="สำหรับนักศึกษาและบุคลากร">
                <i class="fas fa-sign-in-alt"></i>
              </a>
              <a href="#" class="social-icon" data-toggle="tooltip" title="สำหรับผู้ดูแลสถานที่">
                <i class="fas fa-user-cog"></i>
              </a>
            </div>
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">สมัครสมาชิก</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            
            <div class="social-media">
             
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>สมัครสมาชิกใหม่</h3>
            <p>
              สำหรับบุคคุลภายนอกที่ต้องการขอใช้สถานที่ภายใน มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register
            </button>
          </div>
        
          <img src="{{ asset('imglogin/location2.svg') }}" class="image" alt="tag">
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>ลงชื่อเข้าใช้</h3>
            <p>
              สำหรับหน่วยงานภายนอกที่สมัครสมาชิกแล้ว
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Register
            </button>
          </div>
         
          <img src="{{ asset('imglogin/user.svg') }}" class="image" alt="tag">
        </div>
      </div>
    </div>


    <script src="../js/jslogin.js"></script>

  </body>
</html>
