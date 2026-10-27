<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="card text-center">
    <div class="card-header">
        Stage
    </div>
    <div class="card-body">
        <form action="handler.php" method="post" enctype="multipart/form-data">

            <div class="mb-3 row">
                <div class="col-4">
                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" name="nom" id="nom" >
                    </div>
                </div>

                <div class="col-4">
                    <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                    <div class="col-sm-10">
                        <input type="text" required  class="form-control" id="prenom" name="prenom" >
                    </div>
                </div>
                <div class="col-4">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" required  class="form-control" id="email" name="email" >
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-6">
                    <label for="cv" class="col-sm-2 col-form-label">CV</label>
                    <div class="col-sm-10">
                        <input type="file" required  accept=".pdf,application/pdf"  class="form-control" id="cv"  name="cv" >
                    </div>
                </div>

                <div class="col-6">
                    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" required accept="image/*"  class="form-control" id="photo" name="photo" >
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    </div>

</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>