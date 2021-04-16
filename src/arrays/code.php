<!DOCTYPE html>
<html lang="en">

<head>
    <title> Computación en el Servidor Web (ISW)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>

    <header>
        <div class="bg-dark collapse" id="navbarHeader" style="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-info shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="https://www.unir.net/wp-content/uploads/2019/11/logo_unir.svg" class="no-lazy img-responsive img-responsive " alt="" loading="lazy">
                    <strong></strong>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section class="py-5 text-center container">
            <?php
            $full_name = $_POST["full_name"];
            $gender = $_POST["gender"];
            $age = $_POST["age"];
            $result = "";


            try {
                if (isset($_POST['submit'])) {

                    if (!$gender) {
                        throw new Exception("Seleccione un sexo");
                    }

                    if (!$full_name) {
                        throw new Exception("Ingrese su nombre");
                    }

                    if (!$age) {
                        throw new Exception("Ingrese su edad");
                    }

                    $result = messageAccordingGender($gender);
                    $result = $result . " " . messageAccordingAge($age, $full_name);
                }
            } catch (Exception $e) {
                $result = $e->getMessage();
            }

            function messageAccordingGender($gender)
            {
                $msg = "";

                switch ($gender) {
                    case "Femenino":
                        $msg = "Señorita ";
                        break;
                    case "Masculino":
                        $msg = "Señor ";
                        break;
                }
                return $msg;
            }

            function messageAccordingAge($age, $full_name)
            {
                if ($age >= 1 && $age <= 17) {
                    return " " . strtoupper($full_name) . " tienes un largo camino por recorrer.";
                } elseif ($age >= 18 && $age <= 40) {
                    return " " . strtoupper($full_name) . " estás en la edad de construir y asegurar tu vida.";
                } elseif ($age >= 41 && $age <= 99) {
                    return " " . strtoupper($full_name) . " es tiempo de descansar y recoger lo que sembraste.";
                }
            }
            ?>
            <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="col-md-6">
                    <label for="full_name" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="full_name" name="full_name">
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">Sexo</label>
                    <select id="inputState" class="form-select" name="gender" id="gender">
                        <option value="">Seleccione un sexo</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="age" class="form-label">¿Que edad tienes?</label>
                    <input type="number" min="1" max="99" class="form-control" id="age" name="age">
                </div>
                <div class="col-12">
                    <input type="submit" value="Sign in" name="submit" class="btn btn-primary" />
                </div>

                <p style="text-align: center;font-weight:bold;">
                    <?php echo $result; ?>
                </p>
            </form>
        </section>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="/">Back to Home</a>
            </p>
            <p class="mb-1">Murphy Horta Camargo</p>
            <p class="mb-0"><a href="https://www.unir.net/">https://www.unir.net/</a> </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

</body>

</html>