<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<style>

    html, body {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden; }

    h1 {
        font-size: 4rem;
        color: #fff;
        position: absolute;
        left: 50%;
        top: 25%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        white-space: nowrap;
        letter-spacing: 3px; }

    .btn {
        position: absolute;
        left: 50%;
        top: 40%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .split {
        position: absolute;
        width: 50%;
        height: 100%;
        overflow: hidden; }
    .split.left {
        left: 0;
        background: url("https://images.pexels.com/photos/1405773/pexels-photo-1405773.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940") center center no-repeat;
        -webkit-background-size: cover;
        background-size: cover; }
    .split.left:before {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        background: rgba(63, 81, 181, 0.7); }
    .split.right {
        right: 0;
        background: url("https://cdn.pixabay.com/photo/2019/06/14/09/25/cloud-4273197_960_720.png") center center no-repeat;
        -webkit-background-size: cover;
        background-size: cover; }
    .split.right:before {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        background: rgba(43, 43, 43, 0.8); }
    .split.left, .split.left:before, .split.right, .split.right:before {
        -webkit-transition: 1000ms all ease-in-out;
        -o-transition: 1000ms all ease-in-out;
        transition: 1000ms all ease-in-out; }

    .container-custom {
        position: relative;
        width: 100%;
        height: 100%;
        background: #333; }

    .hover-left .left {
        width: 75%; }

    .hover-left .right {
        width: 25%; }
    .hover-left .right:before {
        z-index: 2; }

    .hover-right .right {
        width: 75%; }

    .hover-right .left {
        width: 25%; }
    .hover-right .left:before {
        z-index: 2; }

    @media (max-width: 800px) {
        h1 {
            font-size: 2rem; }
        .btn {
            width: 12rem; } }

    @media (max-height: 780px) {
        .btn {
            top: 60%; } }
</style>
</head>
<body>
<!--<div align="center">
    <h1>The Conf</h1>

</div>-->


<div class="container-custom">
    <div class="split left">
        <h1 class="font-weight-bold">Author</h1>
        <a href="{{ url('author/login') }}" type="button" class="btn btn-outline-secondary btn-lg waves-effect">Login</a>
    </div>
    <div class="split right">
        <h1 class="font-weight-bold">Reviewer</h1>
        <a href="{{ url('reviewer/login') }}" type="button" class="btn btn-outline-secondary btn-lg waves-effect">Login</a>
    </div>
</div>




</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('js/split.js')}}"></script>


</body>
</html>
