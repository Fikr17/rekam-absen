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
</style>

<body>
    <div class="container">
        <div class="content">
            <form id="add-absen" method="POST" style="margin: 2rem auto 1rem;">
                <div class="mb-3">
                    <label for="" class="form-label">Mata Kuliah</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">ID Absen</label>
                    <input type="text" name="id_absen" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="content">
            <h1>List absen untuk bot</h1>
            <a href="/Absen" class="btn btn-primary">Back</a>
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

<script>
    const xmlHttp = new XMLHttpRequest();
    const tbody = document.getElementById("tbody");
    xmlHttp.onload = function() {
        const response = JSON.parse(this.responseText);
        for (let i = 0; i < response.length; i++) {
            const res = response[i];
            const nomor = i + 1;
            tbody.innerHTML += innerTable(res, nomor);
        }
    };
    xmlHttp.open("GET", "/Absen/course");
    xmlHttp.send();

    function innerTable(res, nomor) {
        return `
        <tr> 
        <th scope = "row" > ${nomor} </th> 
        <td> ${res.nama} </td> 
        <td> ${res.id_absen} </td> 
        <td>
        <a href="" class="btn btn-primary">action</a> 
        <form method="POST" id="data-nomor-${res.id}">
        <button type="submit" class="btn btn-danger" name="delete-data-${res.id}">Delete</button>
        </form>
        </td> 
        </tr>`;
    }

    document.getElementById('add-absen').addEventListener('submit', function(e) {
        e.preventDefault();
        const inputs = document.getElementsByTagName("input");
        let nama = "";
        let course_id = "";
        for (let i = 0; i < inputs.length; i++) {
            const input = inputs[i];
            if (input.name == "nama") {
                nama = input.value;
                input.value = "";
            }
            if (input.name == "id_absen") {
                course_id = input.value;
                input.value = "";
            }
        }
        xmlHttp.onload = function() {
            console.log(this.responseText);
        }
        xmlHttp.open("POST", "/Absen/add")
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.send("nama=" + nama + "&course_id=" + course_id)
    })

    document.getElementsByName("delete-data-")
</script>

</html>