<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Absen Elearning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    h1 {
        margin-top: 1rem;
        text-align: center;
    }

    @media (min-width: 992px) {
        #add-absen {
            max-width: 50vw;
        }
    }

    [disabled] {
        cursor: not-allowed
    }
</style>

<body>
    <div class="container">
        <div class="content">
            <?php if($errors->any()){ ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors->all() as $error) {?>
                    <li><?= $error ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <form id="add-absen" action="/Absen/add" method="POST" style="margin: 2rem auto 1rem;">
                <div class="mb-3">
                    <label for="" class="form-label">Mata Kuliah</label>
                    <input type="text" name="nama" class="form-control" disabled>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ID Absen</label>
                    <input type="text" name="id_absen" class="form-control" disabled>
                </div>
                <button type="submit" class="btn btn-primary" disabled>Add</button>
            </form>
        </div>
        <div class="content">
            <h1>List absen untuk bot</h1>
            <a href="<?php echo url("/"); ?>/Absen" class="btn btn-primary">Back</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Course_ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/da363920bf.js" crossorigin="anonymous"></script>

<script src="/js/course.js"></script>

</html>