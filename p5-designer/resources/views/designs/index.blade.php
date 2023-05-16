<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Hola soy el index de design</h1>

    {{ $designs }}

    <br>

    <form action="{{ route('design.store') }}" method="POST">
        @csrf

        <input type="text" name="user_id" value="1" hidden>
        <input type="text" name="title" id="title" value="07:10PM" hidden>
        <input type="text" name="data" id="inputData" hidden>

        <button type="submit"> Enviar </button>
    </form>

    {{-- <button type="button" onclick="enviar()">
        Enviar
    </button> --}}

    <script>
        var prueba = @json($designs);
        /* console.log(prueba);
        console.log(prueba[0].data); */
        var figuras = [
            {
                "type": "text",
                "x": 10,
                "y": 20,
                "w": 25,
                "h": 20,
            },
            {
                "type": "rect",
                "x": 5,
                "y": 5,
                "w": 35,
                "h": 20,
            },
        ];

        console.log(document.getElementById("title").value);

        console.log(document.getElementById("inputData").value)

        document.getElementById("inputData").value = JSON.stringify(figuras);

        console.log(document.getElementById("inputData").value)

        /* function enviar() {
            document.getElementById("inputData").value = JSON.parse(figuras);
            console.log(document.getElementById("inputData").value)
        } */

        
        

    </script>

</body>
</html>