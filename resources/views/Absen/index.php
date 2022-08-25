<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Absen Elearning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    h1,
    h2,
    h3,
    h4 {
        margin-top: 1rem;
        text-align: center;
    }

    h5 {
        margin-bottom: unset;
    }

    .container {
        margin-right: unset;
        padding-right: unset;
        display: flex;
    }

    .content {
        width: 100%;
    }

    .bot {
        width: 100%;
        display: flex;
    }

    .rekam-absen {
        width: 100%;
        border: 1px solid;
    }

    .aktivitas-bot {
        width: 20vw;
        display: none;
    }

    .kanan {
        width: 25vw;
        margin-top: 6.75rem;
    }

    .kanan p,
    .aktivitas-bot .aktivitas p {
        margin-bottom: unset;
        color: #77746f;
    }

    @media (max-width: 992px) {
        .aktivitas-bot {
            display: unset;
        }

        .kanan {
            display: none;
        }

        .container {
            margin-right: auto;
            padding-right: .75rem;
            display: flex;
        }
    }

    @media (max-width: 770px) {
        .bot {
            display: block;
        }
    }
</style>

<body>
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
                <div class="aktivitas-bot">
                    <h3>aktivitas Bot</h3>
                    <div class="aktivitas">
                        <?php foreach ($aktivitas as $a) { ?>
                            <h5><?= $a->status; ?></h5>
                            <p><?= $a->waktu; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="kanan">
            <h4 style="padding-bottom: 1.5rem;">Aktivitas</h4>
            <?php foreach ($aktivitas as $a) { ?>
                <h5><?= $a->status; ?></h5>
                <p><?= $a->waktu; ?></p>
            <?php } ?>
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