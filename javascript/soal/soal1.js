var fruits = [{
        fruitId: 1,
        fruitName: 'Apel',
        fruitType: 'IMPORT',
        stock: 10
    },
    {
        fruitId: 2,
        fruitName: 'Kurma',
        fruitType: 'IMPORT',
        stock: 20
    },
    {
        fruitId: 3,
        fruitName: 'apel',
        fruitType: 'IMPORT',
        stock: 50
    },
    {
        fruitId: 4,
        fruitName: 'Manggis',
        fruitType: 'LOCAL',
        stock: 100
    },
    {
        fruitId: 5,
        fruitName: 'Jeruk Bali',
        fruitType: 'LOCAL',
        stock: 10
    },
    {
        fruitId: 5,
        fruitName: 'KURMA',
        fruitType: 'IMPORT',
        stock: 20
    },
    {
        fruitId: 5,
        fruitName: 'Salak',
        fruitType: 'LOCAL',
        stock: 150
    }
]

//soal nomor 1
// for (var i = 0; i < fruits.length; i++) {
//     console.log(fruits[i].fruitName)

// }

//soal nomor 2
// for (var i = 0; i < fruits.length; i++) {
//     if (fruits[i].fruitType == "LOCAL") {
//         console.log("dalam wadah Local " + fruits[i].fruitName)
//     } else if (fruits[i].fruitType == "IMPORT") {
//         console.log("dalam wadah Import " + fruits[i].fruitName)
//     }
// }
//soal nomor 3

var data = [];
for (var i = 0; i < fruits.length; i++) {
    if (fruits[i].fruitType == "LOCAL") {
        data = [fruits[i].stock]
    }
}

console.log(data)