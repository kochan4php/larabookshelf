<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Larabookshelf</title>
  <link href="https://fonts.googleapis.com/css?family=Lexend+Deca:100,200,300,regular,500,600,700,800,900"
    rel="stylesheet" />
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
    * {
      font-family: 'Lexend Deca', Arial, Helvetica, sans-serif;
    }
  </style>
</head>

<body>
  <x-navigation title="Larabookshelf" />

  <div class="container my-4">
    {{ $slot }}
  </div>
</body>

</html>
