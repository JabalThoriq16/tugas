//perulangan increment
// for ($i = 1; $i <= 10; $i++) {
//     document.write("karyawan masuk " + $i + "<br>");
// }

//perulangan decrement
// for ($i = 10; $i >0; $i--) {
//     document.write("karyawan masuk " + $i + "<br>");
// }

//perulangan while 
// $a = 1;
// while ($a <= 15) {
//     $a++
//     document.write($a + " belajar javascript<br>");
// }

//perulangan do while
// $z = 1;
// do {
//     document.write($z + " belajar javascript<br>");
//     $z++
// } while ($z <= 5);

//for dalam for
//for ($i = 1; $i < 4; $i++) {
//    for ($j = 1; $j <= 2; $j++) {
//        console.log("data i bernilai : " + $i + ",dataj bernilai" + $j)
//      }
//}

//perulangan break
for (var i = 1; i <= 10; i++) {
    if (i === 5) {
        break;
    }
    console.log("nilai nya adalah" + i);
}

//perulangan continue
for (var i = 1; i <= 10; i++) {
    if (i === 5) {
        continue;
    }
    console.log("nilai nya adalah" + i);
}

//perulangan array
var nama = ["jabal", "thoriq", "bayu", "bagas"]
for (var i = 0; i < nama.length; i++) {
    console.log(nama[i]);
}