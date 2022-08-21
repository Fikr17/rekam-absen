const xmlHttp = new XMLHttpRequest();
const tbody = document.getElementById("tbody");

class course{
    constructor(){
        this.buttons = document.getElementsByTagName("button");
        this.numbers = document.querySelectorAll("th[scope='row']");
        this.forms = document.getElementsByTagName("form");
        this.lengthForms = this.forms.length
        this.nomor = 1;
        this.disable = document.querySelectorAll("[disabled]");
        this.tableRow = document.querySelectorAll("tr");
    }

    colNomor= function(){
        this.numbers.forEach((no) => {
            no.innerText = this.nomor++;
        });
        return this;
    }

    disableToEnable= function(){
        for (let dis = 0; dis < this.disable.length; dis++) {
            this.disable[dis].disabled = false;
        }
        return this;
    }

    btnDisable= function(){
        for (let btn = 0; btn < this.buttons.length; btn++) {
            this.buttons[btn].disabled = true;
        }
        return this;
    }

    innerTable= function(res) {
        return `
            <tr data-id="${res.id}"> 
            <th scope = "row" > </th> 
            <td> ${res.nama} </td> 
            <td> ${res.id_absen} </td> 
            <td>
            <a href="" class="btn btn-primary">action</a> 
            <form method="delete" onsubmit="event.preventDefault(); deleteData(${res.id})" style="display:inline">
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td> 
            </tr>`;
    }
}

const fetchAbsen = () => {
    return new Promise((resolve) => {
        xmlHttp.onload = function () {
            const response = JSON.parse(this.responseText);
            for (let i = 0; i < response.length; i++) {
                const res = response[i];
                resolve(tbody.innerHTML += new course().innerTable(res));
            }
        };
        xmlHttp.open("GET", "/Absen/course");
        xmlHttp.send();
    });
};

const deleteData = (id) => {
    const objCourse = new course();
    xmlHttp.onload = function () {
        // remove from table view
        console.log(this.responseText);
        let trSelected = document.querySelectorAll(
            "tr[data-id='" + id + "']"
        );
        trSelected[0].innerHTML = "";
    };
    xmlHttp.onloadend = function () {
        console.log(JSON.parse(this.responseText));
        const onloadEndObj = new course();
        onloadEndObj.colNomor();
        onloadEndObj.disableToEnable();
    };
    objCourse.btnDisable();
    xmlHttp.open("DELETE", "/Absen/delete/" + id);
    xmlHttp.send();
}

async function fetchAndGetElement() {
    await fetchAbsen().then((e) => {
        // disini bakal menunggu sampai fetch selesai
        const objCourse = new course();
        objCourse.colNomor();
        objCourse.disableToEnable();
    });
}

fetchAndGetElement();
