<!DOCTYPE html>

<html>
    <head>
        <title>Table des Sujets</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">


    </head>
    <body class="text-center border border-light p-5">
    <div class="animated bounce delay-20s">
        <h1>Bonjour  @if( Auth::check() )
                {{ Auth::user()->name }}
            @endif </h1>
    </div>
    </br>
    <div>
    <h2>Table des Sujets</h2>
    </div>

        <table class="table">
            <tr>
                <th scope="col">Titre</th><th scope="col">Thème</th><th scope="col">Track</th><th scope="col">Fichier PDF</th><th scope="col">Action</th>
            </tr>


            @foreach($Conference as $conference)
                <tr>
                    <td>{{$conference->titre}}</td>
                    <td>{{$conference->theme}}</td>
                    <td>{{$conference->track}}</td>
                    <td><a href="/public/storage/{{$conference->file_name}}" download="{{$conference->file_name}}"> {{$conference->file_name}} </a> </td>
                    <td><a href="{{route('remove',['id'=>$conference->id])}}" class="">Supprimer</a>-/-<a href="{{route('maj',['id'=>$conference->id])}}" class="">MAJ</a></td>
                </tr>

            @endforeach
        </table>

        <a href="{{ route('auteurUpload') }}">


        <button type="button" class="btn btn-info my-4 pull-right" >Ajouter une conférence</button>

        </a>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>


</html>