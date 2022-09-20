<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SNS</title>
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>



<body style="height:100%; background-color: #E6ECF0;">

    @include('layouts.app')
    @yield('content')


    <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
        <div class="top" stylee="height=5%;">
            <p style="padding: 5% 0 0 10%;">ホーム</p>
            <hr>
        </div>
        <form action="/sns" method="post">
            @csrf
            <div style="background-color: white; text-align: center;">
                <input type="text" name="body" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="今どうしてる？">
                <button type="submit" class="font-bold link-hover cursor-pointer">つぶやく</button>
            </div>
            @if($errors->first('body'))
            <!-- 追加 -->
            <p style="font-size: 0.7rem; color: red; padding: 0 2rem;">※{{$errors->first('body')}}</p>
            @endif
        </form>

        <div class="sns-wrapper">
            <!-- この辺追加 -->
            @foreach($posts as $post)

            <div style=" border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0;">
                <div class="text-right">{{ $post->created_at }}</div>
                <div style="padding: 0 1rem; font-weight: bold;">{{ $post->user->name }}</div>
                <div style="padding:0 1rem;">{{ $post->body }}</div>


                @auth
                <!-- この辺追加 -->
                @if( ( $post->user_id ) === ( Auth::user()->id ) )
                <form class="deleat" action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    <div class="text-right">
                        <input type="submit" value="削除" class="font-bold link-hover cursor-pointer">
                    </div>
                </form>
                @endif
                @endauth

                @endforeach
            </div>

        </div>


    </div>
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

</body>

</html>