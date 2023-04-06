<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <link rel="stylesheet" href="/css/style.css" type="text/css">

    <title>Unibra Desafio</title>
</head>

</html>

<body>
    <div>
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script type="text/javascript">
    if(!alertify.myAlert){
  //define a new dialog
  alertify.dialog('myAlert',function(){
    return{
      main:function(message){
        this.message = message;
      },
      setup:function(){
          return { 
            buttons:[{text: "cool!", key:27/*Esc*/}],
            focus: { element:0 }
          };
      },
      prepare:function(){
        this.setContent(this.message);
      }
  }});
}
//launch it.
    </script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

</body>
