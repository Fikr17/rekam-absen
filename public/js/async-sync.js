class asyn{

    constructor(){
        this.numbers = [
            {name:"button1", elemen: "ke 1"},
            {name:"button2", elemen: "ke 2"},
            {name:"button3", elemen: "ke 3"},
            {name:"button4", elemen: "ke 4"},
        ]
    }

    func = function(){
        return this.nomor().nomor().nomor().nomor()
    }

    nomor = function(){
        this.numbers.push({name:"button5", elemen: "ke 5"});
        return this;
    }

    all = () => {
        return this.numbers
    }
}

const obj = new asyn()
// obj.func();
// console.log( obj.numbers);

let arr = []
function async(){
    return new Promise((resolve)=>{
        setTimeout(() => {
            arr.push("sdasdaasffad")
            resolve(arr)
        }, 3000);
    })
}

function callback(){
    return "sdhaodjwks";
}

function panggil(){
    async().then((e)=>{
        console.log(callback())
        console.log(e);
    })
}

function add(){
    console.log(arr);
}

add()