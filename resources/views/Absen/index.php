<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Absen Elearning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/rekam.css">
</head>

<body>
    <div class="kiri">
    </div>
    <div class="container">
        <div class="content">
            <h1>rekam absen sukses dari bot</h1>
            <a href="/Absen" class="btn btn-primary">Back</a>
            <div class="bot">
                <div class="rekam-absen">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="<?= ($show != 'hidden') ? 'show' : 'hidden'; ?>" onclick="showDataAll(); updateShowData()" role="switch" id="flexSwitchCheckChecked" <?= ($show != 'hidden') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Tampilkan Hidden</label>
                    </div>
                    <div class="overflow">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="aktivitas-bot">
                    <h4>aktivitas Bot</h4>
                    <div class="aktivitas">
                        <ul>
                            <?php foreach ($aktivitas as $a) { ?>
                                <li>
                                    <h6><?= $a->status; ?></h6>
                                    <p><?= $a->waktu; ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="kanan">
        <div class="aktivitas-bot">
            <h4 style="padding-bottom: .5rem;">Aktivitas</h4>
            <form action="/Rekam/reset" method="post" id="reset-aktivitas">
                <button type="submit" name="delete">delete all<i class="fa-solid fa-trash" style="color: red;"></i></button>
            </form>
            <div class="aktivitas">
                <ul>
                    <?php foreach ($aktivitas as $a) { ?>
                        <li>
                            <h6><?= $a->status; ?></h6>
                            <p><?= $a->waktu; ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/da363920bf.js" crossorigin="anonymous"></script>
<script src="/js/absen.js"></script>
<script>
    const userId = <?= $id; ?>
</script>


</html>