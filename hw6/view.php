<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container">
    <div class="form__container">
        <h1 class="form__container-title">Sign up</h1>
        <p class="form__container-description">If you already have an account register</p>
        <p class="form__container-description">You can <a class="form__container-link" href="#">Login here!</a></p>
        <form class="form" id="form" action="validation.php" method="POST">
            <div class="form__input-container">
                <div class="form__label-container">
                    <label class="form__label" for="email">Email</label>
                </div>
                <input class="form__input" id="email" type="text" name="userEmail" placeholder="Enter your email address"/>
            </div>
            <div class="form__input-container">
                <div class="form__label-container">
                    <label class="form__label" for="firstName">First name</label>
                </div>
                <input class="form__input" id="firstName" type="text" name="userName[name]" placeholder="Enter your First name"/>
            </div>
            <div class="form__input-container">
                <div class="form__label-container">
                    <label class="form__label" for="lastName">Last name</label>
                </div>
                <input class="form__input" id="lastName" type="text" name="userName[surname]" placeholder="Enter your Last name"/>
            </div>
            <div class="form__input-container">
                <div class="form__label-container">
                    <label class="form__label" for="password">Password</label>
                </div>
                <input class="form__input" id="password" type="password" name="userPassword" placeholder="Enter your Password"/>
            </div>
            <div class="form__input-container">
                <div class="form__label-container">
                    <label class="form__label" for="passwordConfirmation">Confrim Password</label>
                </div>
                <input class="form__input" id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confrim your Password"/>
            </div>
            <div class="form__button-container">
                <button class="form__button" id="btn" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>