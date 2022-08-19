const xmlHttp = new XMLHttpRequest();
const tbody = document.getElementById("tbody");
xmlHttp.onload = function () {
    const response = JSON.parse(this.responseText);
    for (let i = 0; i < response.length; i++) {
        const res = response[i];
        const nomor = i+1;
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
        <td><a href="" class="btn btn-primary">action</a> </td> 
        </tr>`;
}