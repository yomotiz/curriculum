let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
function isEven(num) {
    for (let i = 0; i < num.length; i++) {
        if (num[i] % 2 === 0) {
            console.log(num[i] + 'は偶数です');
        }
    }
}

isEven(numbers);


console.log("////////////////////////////////////////");


class Car{
    constructor(gass,num){
        this.gass = gass;
        this.num = num;
    }
    getNumGas(){
        console.log(`ガソリンは${this.gass}です。ナンバーは${this.num}です`);
    }
}

let car1 = new Car(200,123);
car1.getNumGas();
