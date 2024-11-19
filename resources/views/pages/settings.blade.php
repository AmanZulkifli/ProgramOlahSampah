@extends('layouts.app')

@section('content')
    <style>
        * {
            color: #ffffff;
        }
        h2 {
            font-family: poppins;
            color: #ffffff
        }

        .description-title {
            color: #e73c7e;
        }

        .title {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 70px;
            width: 60%;
            border-radius: 12px; 
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .containerq {
            height: 100vh;
            background-color:#23d5ab;
            opacity: 0.7;
        }
    </style>
    <div class="containerq d-flex justify-content-center" style="padding: 150px 0;">
        <div class="title d-flex align-items-center justify-content-center" style="">
            <h2>
                <span class="description-title">Welcome</span> {{ $user->name }}<span class="description-title">!</span>
            </h2>
        </div>



    </div>
@endsection
