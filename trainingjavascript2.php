<!DOCTYPE html>
<html>
    <head>
        
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            hr {
            border: none;
            height: 2px;
            background-color: black;
            }
         </style>

    </head>
    <body>
        <div class="container"> 
                  <h2>Form Rekrutasi</h2>
                  <hr>
                         <form id ="recruitment">
                            
                            <div class="form">
                            <label>Fullname</label><a style="color: crimson;">*</a><br>
                            <input type="text" placeholder="Masukkan Nama" style="width:330px" id="fullname"><br>
                            </div>

                            <div class="form">
                            <label>Email</label><a style="color: crimson;">*</a><br>
                            <input type="text" placeholder="Masukkan Email" style="width:330px" id="email" ><br>
                            </div>

                            <div>
                            <label>Phone Number</label><a style="color: crimson;">*</a><br>
                            <input type="text" placeholder="Masukkan Phone Number" style="width:330px" id="phone" ><br>
                            </div>

                            <div>
                            <label>Vacancy</label><a style="color: crimson;">*</a><br>
                            <select id="lowonganSelect">
                            <option value="">-Pilih Lowongan-</option>
                            </select>
                            </div>

                            <div>
                            <label>Position</label><a style="color: crimson;">*</a><br>
                            <select id="positionSelect">
                            <option value="">-Pilih Posisi-</option>
                            </select>
                            </div>

                            <br>
                            <button type="submit" style="background-color:#00a2ff;width:340px;height:40px;"><p style="color: white;">Kirim</p></button><br>
                            <br>
                            </div>
                        </form>
                        <hr>
                      
                <div id="result"></div>

                <script>
                    
                    var lowongan = ["System Administrator", "Programmer", "Technical Writter"];

                    // Mengambil elemen select
                    var selectElement = document.getElementById("lowonganSelect");
                    // Membuat opsi-opsi untuk setiap lowongan dalam array
                    for (var j = 0; j < lowongan.length; j++) {
                    var option = document.createElement("option");
                    option.text = lowongan[j];
                    option.value = lowongan[j];
                    selectElement.appendChild(option);
                    }

                    var position = ["Bandung", "Jakarta", "Bogor"];

                    // Mengambil elemen select
                    var selectElement = document.getElementById("positionSelect");
                    // Membuat opsi-opsi untuk setiap buah dalam array
                    for (var i = 0; i < position.length; i++) {
                    var option = document.createElement("option");
                    option.text = position[i];
                    option.value = position[i];
                    selectElement.appendChild(option);
                    }


                    document.getElementById("recruitment").addEventListener("submit", function(event) {
                    event.preventDefault(); // Menghentikan pengiriman form secara default
                    
                    // Mengambil nilai input dari form
                    var fullname = document.getElementById("fullname").value;
                    var email = document.getElementById("email").value;
                    var phone = document.getElementById("phone").value;
                    var lowonganSelect = document.getElementById("lowonganSelect").value;
                    var positionSelect = document.getElementById("positionSelect").value;
                    


                    // Melakukan validasi sederhana
                    //if (fullname === "" || email === "" || phone === "" || lowonganSelect === "" || positionSelect === "") {
                    if  (fullname === ""){
                        alert("Harap nama tidak boleh kosong!");

                        return;
                    }
                    if  (email === ""){
                        alert("Harap email tidak boleh kosong!");

                        return;
                    }
                    if  (phone === ""){
                        alert("Harap nomor telepon tidak boleh kosong!");

                        return;
                    }
                   
                    
                     // Memeriksa apakah data sudah ada di local storage
                    var storedData = localStorage.getItem(email);
                    if (storedData) {
                        alert("Data dengan email ini sudah ada di local storage");
                        return false;
                    }

                    // Simpan data ke local storage
                    var data = {
                        fullname: fullname,
                        email: email,
                        phone: phone,
                        lowonganSelect: lowonganSelect,
                        positionSelect: positionSelect
                    };
                    localStorage.setItem(email, JSON.stringify(data));


                   

                    // Menampilkan hasil input di elemen #result

                    var result = document.getElementById("result");
                    result.innerHTML = 
                                        "<h3 id=text>Terima kasih telah melakukan pengisian sebagai," + lowonganSelect +" permintaan anda akan kami proses </h3>"+ 
                                        "<p><strong>Fullname :</strong> " +"<br>"+ fullname + "</p>" +
                                        "<p><strong>Email :</strong> " +"<br>"+ email + "</p>" +
                                        "<p><strong>Phone Number :</strong> " + "<br>"+ phone + "</p>" +
                                        "<p><strong>Vacancy :</strong> " + "<br>"+ lowonganSelect + "</p>"+
                                        "<p><strong>Position :</strong> " + "<br>"+ positionSelect + "</p>";
                    

                    // Mengambil elemen dengan id "text"
                    var textElement = document.getElementById("text");
                    // Mengubah warna font menjadi merah
                    textElement.style.color = "green";
                    // Mengosongkan form setelah pengiriman
                    document.getElementById("recruitment").reset();

                   

                    let submits = [];
                    // Submit pertama
                    submits.push(1);
                    // Submit kedua
                    submits.push(2);
                     // Submit kedua
                    submits.push(3);
                    let totalSubmit = submits.reduce((total, submit) => total + submit);

                    console.log("Total submit:", totalSubmit);
                    alert("jumlah pendaftar "+totalSubmit);
                    return;
                    });

                    
                </script>
    </body>
</html>