<!DOCTYPE html>

<html>
    <head>
        <title>Reviseur Home</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    </head>
    <body class="text-center border border-light p-5">
    <h1>Reviseur Home</h1>
        <table class="table">
            <tr>
                <th scope="col">Titre</th><th scope="col">Thème</th><th scope="col">Track</th><th scope="col">Fichier PDF</th><th scope="col">Note</th>
            </tr>


            @foreach($Conference as $conference)
                <tr>
                    <td>{{$conference->titre}}</td><td>{{$conference->theme}}</td><td>{{$conference->track}}</td><td><a href="storage/upload/{{$conference->file_name}}" download="{{$conference->file_name}}"> {{$conference->file_name}} </a> </td>
                    <td>@if($conference->note)
                            {{$conference->note}}
                        @else
                            <a href="{{ route('reviseurForm') }}">Donner un avis</a>
                        @endif
                    </td>
                </tr>

            @endforeach
        </table>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>


</html>