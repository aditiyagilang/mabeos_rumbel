<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Login & Signup Form</title>
   <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}" />

  </head>
  <body>
    <!-- <h2 class="welcome-message">Selamat datang di Bimbel Hokya</h2> -->
    <section class="wrapper">
      <div class="form signup">
        <header>Signup</header>
        <div class="container" style="height:30px"></div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required />
            <input type="text" name="name" placeholder="Fullname" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="date" name="birthdate" placeholder="Tanggal Lahir" required />
            <input type="text" name="telp" placeholder="No Hp" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
            <input type="submit" value="Signup" />
        </form>

      </div>

      <div class="form login">
        <header>Login</header>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
        signupHeader = document.querySelector(".signup header"),
        loginHeader = document.querySelector(".login header"),
        signupButton = document.querySelector(".signup input[type='submit']"),
        loginButton = document.querySelector(".login input[type='submit']");

        loginHeader.addEventListener("click", () => {
        wrapper.classList.add("active");
        });

        signupHeader.addEventListener("click", () => {
        wrapper.classList.remove("active");
        });

        // Menambahkan event listener untuk tombol
        signupButton.addEventListener("mousedown", () => {
        signupButton.classList.add("active-button");
        });

        signupButton.addEventListener("mouseup", () => {
        signupButton.classList.remove("active-button");
        });

        loginButton.addEventListener("mousedown", () => {
        loginButton.classList.add("active-button");
        });

        loginButton.addEventListener("mouseup", () => {
        loginButton.classList.remove("active-button");
        });

      </script>
    </section>
  </body>
</html>
