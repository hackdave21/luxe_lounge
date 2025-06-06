<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion | LUX LOUNGE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    /* Global */
    html, body {
      position: relative;
      min-height: 100vh;
      background-color: #E1E8EE;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Fira Sans", Helvetica, Arial, sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    /* Conteneur principal */
    .form-structor {
      background-color: #222;
      border-radius: 15px;
      height: 550px;
      width: 350px;
      position: relative;
      overflow: hidden;
      background-image: url('/galerie/back.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    /* Overlay sombre sur l'image de fond */
    .form-structor::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);  /* Ajuste l'opacité si besoin */
      z-index: 1;
    }

    /* Section Signup (statique) */
    .form-structor .signup {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 65%;
      z-index: 5;
      transition: all .3s ease;
      text-align: center;
    }
    .form-structor .signup.slide-up {
      top: 5%;
      transform: translate(-50%, 0);
      transition: all .3s ease;
    }
    /* Le texte reste affiché */
    .form-structor .signup .form-title span {
      color: rgba(255,255,255,0.8);
      opacity: 1;
      visibility: visible;
      transition: all .3s ease;
    }
    .form-structor .signup .form-title {
      color: #fff;
      font-size: 1.7em;
      margin-bottom: 0.5em;
    }

    /* Section Login (formulaire de connexion) */
    .form-structor .login {
      position: absolute;
      top: 20%;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #fff;
      z-index: 5;
      transition: all .3s ease;
    }
    .form-structor .login::before {
      content: '';
      position: absolute;
      left: 50%;
      top: -20px;
      transform: translate(-50%, 0);
      background-color: #fff;
      width: 200%;
      height: 250px;
      border-radius: 50%;
      z-index: 4;
      transition: all .3s ease;
    }
    .form-structor .login .center {
      position: absolute;
      top: calc(50% - 10%);
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80%; /* Légère modification pour centrer les champs */
      z-index: 5;
      transition: all .3s ease;
    }
    .form-structor .login .center .form-title {
      color: #000;
      font-size: 1.7em;
      text-align: center;
      margin-bottom: 0.5em;
    }
    .form-structor .login .center .form-title span {
      color: rgba(0,0,0,0.4);
      opacity: 0;
      visibility: hidden;
      transition: all .3s ease;
    }

    /* Apparence de la zone de saisie (avec labels et bordures) */
    .form-structor .form-holder {
      border-radius: 15px;
      background-color: #fff;
      border: 1px solid #eee;
      overflow: hidden;
      margin-top: 30px;
      opacity: 1;
      visibility: visible;
      transition: all .3s ease;
      padding: 15px;
    }
    .form-structor .form-holder .input-group {
      margin-bottom: 15px;
    }
    .form-structor .form-holder label {
      font-size: 13px;
      color: #333;
      margin-bottom: 5px;
      display: block;
    }
    .form-structor .form-holder .input {
      position: relative;
    }
    .form-structor .form-holder .input i {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: rgba(0,0,0,0.4);
    }
    .form-structor .form-holder .input input {
      width: 100%;
      border: 1px solid #ccc;
      outline: none;
      border-radius: 5px;
      padding: 10px 10px 10px 35px;
      font-size: 14px;
      background-color: #fdfdfd;
      transition: border-color 0.3s;
    }
    .form-structor .form-holder .input input:focus {
      border-color: #6B92A4;
    }

    /* Bouton de visibilité du mot de passe */
    .password-toggle {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      color: rgba(0,0,0,0.4);
      z-index: 10;
    }
    .password-toggle:hover {
      color: rgba(0,0,0,0.7);
    }

    /* Bouton */
    .form-structor .submit-btn {
      background-color: rgba(0,0,0,0.4);
      color: rgba(256,256,256,0.7);
      border: 0;
      border-radius: 15px;
      display: block;
      margin: 15px auto;
      padding: 15px 45px;
      width: 100%;
      font-size: 13px;
      font-weight: bold;
      cursor: pointer;
      opacity: 1;
      visibility: visible;
      transition: all .3s ease;
    }
    .form-structor .submit-btn:hover {
      background-color: rgba(0,0,0,0.8);
      transition: all .3s ease;
    }

    /* Comportement slide-up pour la partie login */
    .form-structor .login.slide-up {
      top: 90%;
      transition: all .3s ease;
    }
    .form-structor .login.slide-up .center {
      top: 10%;
      transform: translate(-50%, 0);
      transition: all .3s ease;
    }
    .form-structor .login.slide-up .form-holder,
    .form-structor .login.slide-up .submit-btn {
      opacity: 0;
      visibility: hidden;
      transition: all .3s ease;
    }
    .form-structor .login.slide-up .form-title {
      font-size: 1em;
      margin: 0;
      padding: 0;
      cursor: pointer;
      transition: all .3s ease;
    }
    .form-structor .login.slide-up .form-title span {
      margin-right: 5px;
      opacity: 1;
      visibility: visible;
      transition: all .3s ease;
    }

    /* Messages d'erreur */
    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
    }
    .alert-danger {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
    }
    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb;
    }
    .invalid-feedback {
      color: #e3342f;
      display: block;
      margin-top: 5px;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <div class="form-structor">
    <!-- Section Signup (toujours affichée) -->
    <div class="signup">
      <h2 class="form-title" id="signup">
        <i class="fas fa-utensils" style="color:white; margin-bottom: 10px;"></i>
        <div>LUX LOUNGE</div><br>
        <span>Panneau d'administration</span>
      </h2>
    </div>
    <!-- Section Login (formulaire) -->
    <div class="login">
      <div class="center">
        <h2 class="form-title" id="login">
          <i class="fas fa-sign-in-alt"></i>
          <div>Connexion</div>
          <span>Accédez à votre espace admin</span>
        </h2>

        <!-- Affichage des messages d'erreur -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Message de succès (pour la déconnexion) -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire de connexion -->
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="form-holder">
                <div class="input-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <div class="input">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Votre email" required />
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <label for="password"><i class="fas fa-lock"></i> Mot de passe</label>
                    <div class="input">
                        <input id="password" type="password" name="password" placeholder="Votre mot de passe" required />
                        <span class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="submit-btn">
                <i class="fas fa-door-open"></i> Se connecter
            </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Script (modifié pour fonctionner avec le formulaire) -->
  <script>
    const loginBtn = document.getElementById('login');
    const signupBtn = document.getElementById('signup');
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    // Ajustement pour éviter que le clic sur le titre "Connexion" soumette le formulaire
    loginBtn.addEventListener('click', (e) => {
      // Ne pas lancer l'animation si on est déjà en mode login
      if (document.querySelector('.login').classList.contains('slide-up')) {
        e.preventDefault();
        document.querySelector('.login').classList.remove('slide-up');
        document.querySelector('.signup').classList.add('slide-up');
      }
    });

    signupBtn.addEventListener('click', (e) => {
      e.preventDefault();
      document.querySelector('.signup').classList.remove('slide-up');
      document.querySelector('.login').classList.add('slide-up');
    });

    // Affiche le formulaire de connexion par défaut
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelector('.signup').classList.add('slide-up');
    });

    // Fonctionnalité d'affichage/masquage du mot de passe
    togglePassword.addEventListener('click', function() {
      // Change le type de l'input
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      // Change l'icône
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
