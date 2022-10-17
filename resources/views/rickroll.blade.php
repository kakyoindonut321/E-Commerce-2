<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background: linear-gradient(to right, red, green, blue, red, green  );
    color: transparent;
    animation: body 3s ease-in-out infinite;
    background-size: 400% 100%;
        }

.rainbow {
    text-align: center;
    text-decoration: underline;
    font-size: 32px;
    font-family: monospace;
    letter-spacing: 5px;
}
.rainbow_text_animated {
    background: linear-gradient(to right, #6666ff, #0099ff , #00ff00, #ff3399, #6666ff);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    animation: rainbow_animation 1s ease-in-out infinite;
    background-size: 400% 100%;
    font-size: 50px;
}

@keyframes rainbow_animation {
    0%,100% {
        background-position: 0 0;
    }

    50% {
        background-position: 100% 0;
    }
}
@keyframes body {
    0%,100% {
        background-position: 0 0;
    }

    50% {
        background-position: 100% 0;
    }
}
    </style>
</head>
<body>
        <h1 class="rainbow rainbow_text_animated">NEVER GONNA GIVE YOU UP</h1>
</body>
</html>