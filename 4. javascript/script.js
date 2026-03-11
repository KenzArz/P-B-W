function cekNilai() {
	const nim = document.getElementById("nim").value;
	const nilaiInput = document.getElementById("nilai").value;
	const hasilDiv = document.getElementById("hasil");

	if (nim === "" || nilaiInput === "") {
		hasilDiv.innerHTML = "Error: NIM dan Nilai harus diisi!";
		hasilDiv.className = "result-box error";
		return;
	}

	const nilai = parseFloat(nilaiInput);
	let hurufMutu = "";

	if (nilai < 0 || nilai > 100) {
		hasilDiv.innerHTML = "Nilai tidak valid!";
		hasilDiv.className = "result-box error";
		return;
	} else if (nilai >= 80) {
		hurufMutu = "A";
	} else if (nilai >= 70) {
		hurufMutu = "B";
	} else if (nilai >= 60) {
		hurufMutu = "C";
	} else if (nilai >= 50) {
		hurufMutu = "D";
	} else {
		hurufMutu = "E";
	}

	hasilDiv.className = "result-box success";
	hasilDiv.innerHTML = `NIM: ${nim} <br> <strong>Huruf Mutu: ${hurufMutu}</strong>`;
}
