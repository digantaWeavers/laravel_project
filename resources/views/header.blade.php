<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: url("https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTkGLodTVQ2X9wTGCjMff2chrUJmN9CEXUPx0koWM4r6gQ8-rHR");
        height: 100vh;
        width: 100vw;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .nav__container {
        height: 10vh;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .nav__container .logo {
        color: #ddd;
        font-size: 1.5rem;
        font-weight: 500;
        user-select: none;
        font-variant: small-caps;
    }

    .nav__container .menu {
        display: flex;
        justify-content: space-between;
    }

    .nav__container .menu a {
        padding-left: 5rem;
        color: #ddd;
        font-size: 1.3rem;
        text-decoration: none;
    }

    .nav__container .search input[type=search] {
        height: 5vh;
        width: 17vw;
        background-color: transparent;
        border: none;
        outline: none;
        border-radius: 15px;
        box-shadow: 0px 0px 2px 2px #985BC4;
        color: #ddd;
        font-size: 1.1rem;
        padding-left: 0.5rem;
    }

    .nav__container .search input[type=search]::placeholder {
        color: #ddd;
        font-size: 1.1rem;
        padding-left: 1.1rem;
    }

    .nav__container .search input[type=search]:hover {
        box-shadow: 0px 0px 2px 2px #ACF1FC;
    }

    .container {
        height: 90vh;
        padding: 10rem;
    }

    .container h1 {
        color: #1C4E93;
        font-size: 6rem;
        user-select: none;
        text-shadow: 1px 1px 2rem #A565D0;
    }

    .container p {
        width: 35vw;
        color: #ddd;
        line-height: 1.8rem;
        padding-top: 2rem;
    }

    .container button {
        margin-top: 2rem;
        height: 5vh;
        width: 12vw;
        display: block;
        background-color: transparent;
        border: none;
        outline: none;
        border-radius: 15px;
        box-shadow: 0px 0px 2px 2px #985BC4;
        color: #ddd;
        font-size: 1.1rem;
        font-weight: 900;
        text-shadow: 1px 1px 1px #000;
    }

    .container button:hover {
        box-shadow: 0px 0px 2px 2px #ACF1FC;
    }

    .container .icons {
        margin-top: 4rem;
        width: auto;
        height: auto;
    }

    .container .icons i {
        width: auto;
        height: 4vh;
        font-size: 1.4rem;
        border-radius: 8px;
        padding: 8px;
        margin: 0.5rem;
        box-shadow: 0px 0px 2px 2px #985BC4;
        color: #AEF3FF;
    }

    .container .icons i:hover {
        box-shadow: 0px 0px 2px 2px #ACF1FC;
    }

    @media screen and (max-width: 450px) {
        body .nav__container {
            display: flex;
            justify-content: space-evenly;
        }

        body .nav__container .menu {
            display: none;
        }

        body .nav__container .search {
            width: 80%;
            height: auto;
        }

        body .nav__container .search input[type=search] {
            height: 5vh;
            width: auto;
        }

        body .container {
            height: 90vh;
            padding: 1.5rem;
            margin-top: 8rem;
        }

        body .container h1 {
            color: #1C4E93;
            font-size: 3.5rem;
            user-select: none;
            text-shadow: 1px 1px 2rem #A565D0;
        }

        body .container p {
            width: 90%;
            color: #ddd;
            line-height: 1.8rem;
            padding-top: 2rem;
            text-shadow: 1px 1px 1px #3c0364;
        }

        body .container button {
            margin-top: 2rem;
            height: 5vh;
            width: 40vw;
            font-size: 1.1rem;
            font-weight: 900;
            text-shadow: 1px 1px 1px #000;
        }

        body .container .icons {
            margin-top: 8rem;
            width: auto;
            height: auto;
            display: flex;
            justify-content: space-evenly;
        }

        body .container .icons i {
            height: auto;
            width: auto;
            font-size: 1.4rem;
            border-radius: none;
            padding: none;
            margin: none;
            box-shadow: 0px 0px 2px 2px #985BC4;
            color: #AEF3FF;
        }
    }

    /*# sourceMappingURL=style.css.map */
</style>

<body>
    <div class="nav__container">
        <div class="logo">Monktail Solution</div>
        <div class="menu">
            <a href="/">Home</a>
            <a href="{{ route('superamdin.login') }}">Super Admin</a>
            <a href="#">Others</a>
            {{-- <a href="#">Services</a> --}}
        </div>
        <div class="search">
            <input type="search" name="" id="" placeholder="Search..." autocomplete="false">
        </div>
    </div>
