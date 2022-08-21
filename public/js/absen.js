class rekam {
    constructor() {
        this.buttons = document.getElementsByTagName("button");
        this.nomor = 1;
        this.numbers = document.querySelectorAll("th[scope='row']");
        this.disable = document.querySelectorAll("[disabled]");
        this.showData = document.getElementById("flexSwitchCheckChecked");
    }

    colNomor = function () {
        this.numbers.forEach((no) => {
            no.innerText = this.nomor++;
        });
        return this;
    };

    disableToEnable = function () {
        for (let dis = 0; dis < this.disable.length; dis++) {
            this.disable[dis].disabled = false;
        }
        return this;
    };

    btnDisable = function () {
        for (let btn = 0; btn < this.buttons.length; btn++) {
            this.buttons[btn].disabled = true;
        }
        return this;
    };
}
const xmlHttp = new XMLHttpRequest();
const tbody = document.getElementById("tbody");

const showDataAll = () => {
    const ajax = new XMLHttpRequest();
    const objRekam = new rekam();
    const btnShow = objRekam.showData.checked; // true or false
    ajax.onloadstart = function () {
        tbody.innerHTML = "";
    };
    ajax.onload = function () {
        const response = JSON.parse(this.responseText);
        for (let i = 0; i < response.length; i++) {
            if (btnShow == true) {
                // jika true, maka show
                tbody.innerHTML += innerTable(response[i]);
            }
            if (btnShow == false) {
                // jika hidden data
                if (response[i].status == "show") {
                    tbody.innerHTML += innerTable(response[i]);
                }
            }
        }
    };
    ajax.onloadend = function () {
        const objRekam = new rekam();
        objRekam.colNomor();
    };
    ajax.open("GET", "/Absen/rekam");
    ajax.send();
};

const updateShowData = () => {
    // hrus gabung
    const ajax = new XMLHttpRequest();
    const objRekam = new rekam();
    const btnShow = objRekam.showData.value;
    let updateDB = "";
    if (btnShow == "show") {
        updateDB = "hidden";
        objRekam.showData.value = "hidden";
    }
    if (btnShow == "hidden") {
        updateDB = "show";
        objRekam.showData.value = "show";
    }
    ajax.open("POST", "/Akun/update");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("id="+userId+"&status=" + updateDB);
};

showDataAll();

function innerTable(res) {
    const hiddenData = res.status;
    let iconCheck = ""
    if (hiddenData == "hidden"){
        iconCheck = '<i class="fa-solid fa-check-to-slot"></i>'
    }
    return `
        <tr data-id="${res.id}">
            <th scope="row"></th>
            <td>
            ${iconCheck}
            ${res.nama}
            </td>
            <td class="text-primary">${res.tanggal}</td>
            <td>
                <form action="/Rekam/update" method="POST" style="display: inline;">
                    <input type="hidden" name="id" value="${res.id}">
                    <button type="submit" class="btn btn-primary">Hidden</button>
                </form>
                <form onsubmit="event.preventDefault(); deleteData(${res.id})" method="delete" style="display: inline;">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>`;
}

const deleteData = (id) => {
    const objRekam = new rekam();
    xmlHttp.onload = function () {
        let trSelected = document.querySelectorAll("tr[data-id='" + id + "']");
        trSelected[0].innerHTML = "";
    };
    xmlHttp.onloadend = function () {
        const onloadEndObj = new rekam();
        onloadEndObj.disableToEnable();
        onloadEndObj.colNomor();
    };
    objRekam.btnDisable();
    xmlHttp.open("DELETE", "/Rekam/delete/" + id);
    xmlHttp.send();
};
