<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Elearning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    h1 {
        margin-top: 2rem;
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <div class="content">
            <h1>Akun Elearning</h1>
            <a href="/Absen" class="btn btn-primary">Back</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
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
    xmlHttp.open("GET", "/Absen/akun");
    xmlHttp.send();

    function innerTable(res, nomor) {
        return `
        <tr> 
        <th scope = "row" > ${nomor} </th> 
        <td> ${res.email} </td> 
        <td> ${res.password} </td> 
        <td><a href="" class="btn btn-primary">action</a> </td> 
        </tr>`;
    }
</script>

</html>