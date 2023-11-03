var makanan = document.getElementById("pilihMakanan");
var jumlah = document.getElementById("IDJumlah");
var voucher = document.getElementById("IDVoucher");
var namaPesanan = document.querySelector(".namaPesanan");
var jumlahMakanan = document.querySelector(".jumlahPesanan");
var totalDiskon = document.querySelector(".totalDiskon");
var totalHarga = document.querySelector(".totalHarga");

var tempPrice = makanan[0].value;
var tempMakanan = makanan[0].textContent;
var trueVoucher = "ASPRAKLEONGANTENG";
function eventClick() {
  console.log(jumlah.value);
  namaPesanan.innerHTML = tempMakanan;
  jumlahMakanan.innerHTML = jumlah.value;
  var diskon = 0;
  var tempTotal = tempPrice * parseFloat(jumlah.value);
  if (jumlah.value != "" || jumlah.value != 0) {
    console.log("wkwk");
    if (voucher.value === trueVoucher) {
      diskon += tempTotal * 0.2;
      console.log(diskon);
      totalDiskon.innerHTML = diskon;
      totalHarga.innerHTML = tempTotal - diskon;
    } else {
      console.log("huhu");
      totalDiskon.innerHTML = diskon;
      totalHarga.innerHTML = tempTotal - diskon;
    }
  } else {
    jumlahMakanan.innerHTML = 0;
    totalDiskon.innerHTML = 0;
    totalHarga.innerHTML = "0";
    var table = document.querySelector(".tab");
    var trBaru = document.createElement("tr");
    var tdBaru = document.createElement("td");
    var tdBaruTemp = document.createElement("td");
    var tdBaruTemp2 = document.createElement("td");
    var text = document.createTextNode("Maaf masukkan jumlah terlebih dahulu!");
    var text2 = document.createTextNode("");
    var text3 = document.createTextNode("");
    tdBaru.appendChild(text);
    tdBaruTemp.appendChild(text2);
    tdBaruTemp2.appendChild(text3);
    trBaru.appendChild(tdBaruTemp);
    trBaru.appendChild(tdBaruTemp2);
    trBaru.appendChild(tdBaru);
    table.appendChild(trBaru);
  }
}

makanan.addEventListener("change", function () {
  tempPrice = makanan.value;
  tempMakanan = makanan.options[makanan.selectedIndex].textContent;
});
var submit = document.getElementById("submit");
console.log(submit);
submit.onclick = eventClick;
