    <?php

    require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;
use app\controllers\AuthController;


    $app = new Application();

    $app->router->get('/',         [SiteController::class, 'index']);
    $app->router->get('/login',    [SiteController::class, 'login']);
    $app->router->get('/register', [SiteController::class, 'register']);

    $app->router->post('/login', [AuthController::class, 'login']);
    $app->router->post('/register', [AuthController::class, 'register']);
   

   
    $app->run();
















































// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
//     <script src="script.js"></script>
//     <title>Document</title>
// </head>
// <body>
    
// <form action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
//       <h2>Register form</h2>
//       <h4>Both fields are <span>required</span></h4>
 
//       <label>Username</label>
//       <input type="text" name="username" id="name">
 
//       <label>Password</label>
//       <input type="text" name="password" id="password">
 
//       <button type="submit" name="submit">Register</button>
 

    // </form>

// </body>
// </html>


// <script>
  
//    </script> --> 


 // <!DOCTYPE html>
// <html>
//   <head>
//     <title>jQuery Form Example</title>
//     <link
//       rel="stylesheet"
//       href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"
//     />
//     <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
// </head>
//   <body>
//     <div class="col-sm-6 col-sm-offset-3">
//       <h1>Processing an AJAX Form</h1>

//       <form action="process.php" method="POST">
//         <div id="name-group" class="form-group">
//           <label for="name">Name</label>
//           <input
//             type="text"
//             class="form-control"
//             id="name"
//             name="name"
//             placeholder="Full Name"
//           />
//         </div>

//         <div id="email-group" class="form-group">
//           <label for="email">Email</label>
//           <input
//             type="text"
//             class="form-control"
//             id="email"
//             name="email"
//             placeholder="email@example.com"
//           />
//         </div>

//         <div id="superhero-group" class="form-group">
//           <label for="superheroAlias">Superhero Alias</label>
//           <input
//             type="text"
//             class="form-control"
//             id="superheroAlias"
//             name="superheroAlias"
//             placeholder="Ant Man, Wonder Woman, Black Panther, Superman, Black Widow"
//           />
//         </div>

//         <button type="submit" class="btn btn-success">
//           Submit
//         </button>
//       </form>
//     </div>
//   </body>
// </html> -->

// <!-- <script>

// $(document).ready(function () {
//   $("form").submit(function (event) {
//     var formData = {
//       name: $("#name").val(),
//       email: $("#email").val(),
//       superheroAlias: $("#superheroAlias").val(),
//     };

//     $.ajax({
//       type: "POST",
//       url: "process.php",
//       data: formData,
//       dataType: "json",
//       encode: true,
//     }).done(function (data) {
//       console.log(data);
//     });

//     event.preventDefault();
//   }); 
















  
 // ...

// $.ajax({
//       type: "POST",
//       url: "process.php",
//       data: formData,
//       dataType: "json",
//       encode: true,
//     }).done(function (data) {
//       console.log(data);

//       if (!data.success) {
//         if (data.errors.name) {
//           $("#name-group").addClass("has-error");
//           $("#name-group").append(
//             '<div class="help-block">' + data.errors.name + "</div>"
//           );
//         }

//         if (data.errors.email) {
//           $("#email-group").addClass("has-error");
//           $("#email-group").append(
//             '<div class="help-block">' + data.errors.email + "</div>"
//           );
//         }

//         if (data.errors.superheroAlias) {
//           $("#superhero-group").addClass("has-error");
//           $("#superhero-group").append(
//             '<div class="help-block">' + data.errors.superheroAlias + "</div>"
//           );
//         }
//       } else {
//         $("form").html(
//           '<div class="alert alert-success">' + data.message + "</div>"
//         );
//       }

//     });

//     event.preventDefault();
//   });
// ...                           -->


















