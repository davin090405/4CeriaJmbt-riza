<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rumahDijual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
       
        .btn {
            border: none;
            align-self: flex-start;
            transition: ease-in-out 0.4s;
            color: #fd1d1d;

        }
        .btn:hover {
        font-size: 14px;
        letter-spacing: 0.4px;
        }
        .btn:active .btn{
            background-color: #fd1d1d;
        }
        .tab-menu {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        .tab-link {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            background-color: #f1f1f1;
            border: none;
            outline: none;
            transition: background-color 0.3s ease;
        }
        .tab-link:hover {
            background-color: #ddd;
        }
        .tab-link.active {
            background-color: white;
            border-bottom: 2px solid #fd1d1d;
        }
        .tab-content {
            display: none;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }
        .navbar {
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            top: 0;
            position: sticky;
            background-color: white;
            z-index: 1000;
        }
        .tab-content.active {
            display: block;
        }
        .profile-image {
    width: 150px; /* Sesuaikan dengan kebutuhan */
    height: 150px; /* Sesuaikan dengan kebutuhan */
    object-fit: cover; /* Mengatur agar gambar tidak terdistorsi */
    border-radius: 50%; /* Membuat gambar berbentuk lingkaran */
    border: 2px solid #ddd; /* Tambahkan border jika diinginkan */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan efek bayangan */
}

        

h5 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

ul {
    list-style-type: none;
    padding: 0;
}



.phone-input {
    padding: 5px;
    font-size: 1em;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 200px;
}

.btn-update, .btn-delete, .btn-add, .btn-submit {
    padding: 5px 10px;
    font-size: 0.9em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-update {
    background-color: #fd1d1d;
    color: white;
}

.btn-delete {
    background-color: white;
    color:rgb(38, 38, 38);
}

.btn-add {
    background-color: #fd1d1d;
    color: white;
    margin-top: 10px;
}

.btn-submit {
    background-color: #fd1d1d;
    color: white;
}

.ahhahaha {
    margin-left: 15px;
    margin-top: -90px;
}
            </style>
   

 <div class="tab-menu">
 <a href="{{route('profile.edit', 1)}}">Profile</a>
 <a href="{{route('profile.edit', 2)}}">Rumah dijual</a>
 <a href="{{route('profile.edit', 3)}}">About us</a>
       
</div>

    @if($tab != 1)    
    <div id="profile" class="tab-content">
    @else
    <div id="profile" class="tab-content active"></div>
    @endif
        <h3 class="sambutan">Welcome, {{ $user->username }}</h3>

        <div class="atasboss">
            <img src="{{asset('assets/davin.profile.jpg')}}" alt="" class="profile-image">   
            <div class="nameemail">
                <h3 class="namanyadisini">{{ $user->username }}</h3>
                <h3 class="emailinimah">{{ $user->email }}</h3>
                <button type="button" id="editButton" class="btn" onclick="enableEdit()">Edit Profile</button>
            </div>
            <div class="tomboltombol">
    
            </div>
        </div>

        <form action="{{ route('profile.update', Auth::id()) }}" method="POST">
            @method("PATCH")
            @csrf
            <div class="container">
                <div class="kelompok">
                    <div class="atas">
                        <div class="kiri">
                            <div class="dataPenting">
                                <ul>
                                    <li>
                                        <h5>Username</h5>
                                        <input type="text" id="username" name="username" value="{{ $user->username }}" disabled>
                                    </li>
                                    <li>
                                        <h5>Password</h5>
                                        <input type="password" id="password" name="update_password" placeholder="New password" disabled>
                                    </li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="kanan">
                            <div class="dataGPenting">
                                <ul>
                                    <li>
                                        <h5>Name</h5>
                                        <input type="text" name="name" value="{{ $user->name }}" disabled>
                                    </li>
                                    <li>
                                        <h5>Email</h5>
                                        <input type="email" id="email" name="email" value="{{ $user->email }}" disabled>
                                    </li>
                                    <li>
                                        <h5>Deskripsi</h5>
                                        <input type="text" id="deskripsi" name="update_deskripsi" value="{{ $user->Deskripsi }}" size="100" disabled>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
    
                    <div class="bawah">
                    @foreach ($errors->all() as $error)
                                        <h4>{{$error}}</h4>
                                    @endforeach
                        <input type="submit" value="Update Profile" class="btn" id="updateButton" style="display: none">
                    </div>
                </div>
            </div>
        </form>
        <style>
            .blacok {
                list-style: none;
            }
              .isiannotelpon {
                padding: 7px;
                border: none;
                border-radius: 8px;
                margin-bottom: 2%;
              }
                .btn1111 {
                    padding: 8px !important;
                    margin-bottom: 5%;
                }
                .btn11:nth-child(1) {
                    margin-bottom: 2px;
                }
                .phone-input {
                    margin-bottom: 3%;
                }
        </style>
        <div class="ahhahaha">
        <h5>Phone Number</h5>
<ul>
    @foreach ($user->phoneNumber as $item)
        <li>
            <form action="{{route('update.phoneNumber', $item->id)}}" method="POST" style="display: inline-block;">
                @csrf
                @method('PUT')
                <input class="phone-input" type="text" name="update_phoneNumber" value="{{ $item->contact }}" />
                <button type="submit" class="btn-update">Update</button>
            </form>
            <form action="{{route('phoneNumber.destroy', $item->id)}}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<!-- Add New Phone Number Section -->
<button id="addPhoneButton" class="btn-add">Add Phone Number</button>
<form action="{{route('profile.addPhoneNumber')}}" method="POST" id="addPhoneForm" style="display: none;">
    @csrf
    <input type="text" name="create_phoneNumber" placeholder="Enter new phone number" class="phone-input" />
    <button type="submit" class="btn-submit">Create</button>
</form>
</div>
    </div>
    
    @if($tab == 2)
    <div id="rumahDijual" class="tab-content active">
    @else
    <div id="rumahDijual" class="tab-content">
    @endif

    <div class="jr">
    <div class="jejeran">
        @if($houses->count() > 0)
            @foreach($houses as $house)
           <a href="{{route('house.detail',$house->id)}}">
                <div class="pilihan">
                @if($house->housePic->isNotEmpty())
                        <img class="h-full object-cover" src="{{ asset('storage/'.$house->housePic->first()->dir) }}" alt="">
                    @else
                        <img class="h-full object-cover" src="{{ asset('storage/default/house/unavailable.png') }}" alt="No Image">
                    @endif
                    <div class="isipilihan">
                        <h2>{{ $house->name }}</h2>
                        <ul>
                            <li><span>{{ 'Rp. ' . number_format($house->price, 0, ',', '.') }}</span></li>
                            <li>{{ $house->alamat }}</li>
                            <li>
                                
                                <ul class="logox">
                                    <li class="ruang"><img src="{{ asset('storage/Assets/iconKamarTidur.png') }}" alt="Kamar Tidur"><p>{{ $house->br }} Kamar Tidur</p></li>
                                    <li class="ruang"><img src="{{ asset('storage/Assets/iconKamarMandi.png') }}"><p>{{ $house->ba }} Kamar Mandi</p></li>
                                    <li class="ruang"><img src="{{ asset('storage/Assets/iconLuasTanah.png') }}"><p>{{ $house->width * $house->length }} m²</p></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
                </a>
            @endforeach
    
        @else
            <p>Data Masih Kosong</p>
        @endif
    </div>
    </div>


    @if($tab == 3)
    <div id="aboutus" class="tab-content active">
    @else
    <div id="aboutus" class="tab-content">
    @endif
        <div class="content">
        <div class="dalem">
            <div class="header">
                 <div class="isiHeader">
                   
          <br>
          <br  id="isi">
          <div class="isic">
            <div class="isi" >
                <div class="kiriinibos">
                <div class="forc">
              <h2 data-aos="fade-right" data-aos-delay="50">
                 Tentang 4C
              </h2>
              <img data-aos="fade-right" data-aos-delay="50" src="{{asset('storage/Assets/Logo4C.png')}}" alt="">
              </div>
              <p data-aos="fade-right" data-aos-delay="150">4C Adalah aplikasi dengan tema Konstruksi / Pembangunan dengan tujuan menjadi perantara pengguna umum untuk target penggunanya adalah pengguna Umum dan untuk fitur utamanya adalah  jual beli Rumah  </p>
              </div>
              <img class="fotot" src="{{asset('storage/Assets/4CTeam.jpg')}}" data-aos="fade-right" data-aos-delay="200">
             </div>

        
            <div class="kisah">
                <div class="kiriinibos1">
                <h2 data-aos="fade-right" data-aos-delay="50">Awal mula</h2>
                <p data-aos="fade-right" data-aos-delay="150">Kami hadir untuk mempermudah kepemilikan properti dan membantu pencari rumah menemukan pilihan terbaik. Dengan fitur analisis harga, perencana keuangan, dan pencarian berbasis peta, kami memastikan segalanya mudah dan tepat.</p>
                     </div>
                     <img class="fotot" src="{{asset('storage/Assets/4Cteam.jpg')}}" data-aos="fade-right" data-aos-delay="250">
            </div>
        
                <div class="kepemimpinan" >
                        <H1 data-aos="fade-up" data-aos-delay="50" class="Header"> Kepemimpinan </H1>
                        
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Davin Akmal Yasha</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100"> Grup CEO & Co-founder</H3><br>
                                <p data-aos="fade-right" data-aos-delay="150">Davin merupakan salah satu pendiri dari 4C sejak didirikan pada tahun 2024. Sebelum ia mendirikan 4C ia adalah seorang mahasiswa Telkom University, setelah lulus dari Telkom davin bermimpi untuk membangun sebuah perusahaan dengan bertujuan menciptakan Pembangunan indonesia yang Creative Compherensive dan Cool.</p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('storage/Assets/davin.profile.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Riza Rabbani</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100"> Grup CEO & Co-founder> Grup CEO & Co-founder</H3> <br>
                                <p data-aos="fade-right" data-aos-delay="150">Riza merupakan salah satu pendiri dari 4C juga. Sebelumnya dia juga seorang mahasiswa Telkom University. Setelah lulus dia bertemu dengan davin yang pada saat itu dapin mengajak riza untuk ikut berkontibusi untuk menciptakan 4C dan akhirnya riza pun ikut dalam pembuatan 4C </p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('storage/Assets/rija.profile.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Riza Rabbani>Muhammad Daffa</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100">OB</H3><br>
                                <p data-aos="fade-right" data-aos-delay="150">Dapa juga merupakan salah satu pendiri dari 4C. Dia sebelumnya adalah juragan toko besi / bangunan dengan menyediakan alat alat dan perlengkapan untuk segala macam yang dibutuhkan untuk pembangunan. Dapa bergabung dengan 4C karena Dapin mengajak bekerja sama dengannya untuk bisa menganalisis produksi, biaya dalam pembangunan </p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('storage/Assets/dapa.profile.jpg')}}" alt="">
                            </div>
                        </div>
                        
                        <div class="isikepemimpinan">  
                            <div class="teks">
                                <H1 data-aos="fade-right" data-aos-delay="50">Athallah Khansa Ziven</H1>
                                <H3 data-aos="fade-right" data-aos-delay="100"> Grup CEO & Co-founder</H3><br>
                                <p data-aos="fade-right" data-aos-delay="150">Athallah sama juga dengan pendiri lainnya dari 4C. Sebelum bergabung dengan 4C, Athallah menjabat sebagai Kepala Sumber Daya Manusia Global di sebuah perusahaan publik di mana dia mengarahkan manajemen perubahan dan membangun kembali tim dan proses operasional. Beliau diakui atas kepemimpinannya, profesionalismenya, dan integritasnya yang tinggi serta memperoleh penghargaan seperti HR Manager of the Year Asia pada tahun 2024. Ia dikenal karena menyeimbangkan antara kasih sayang dan keteguhan, serta mendorong perubahan positif.</p>
                            </div>
            
                            <div class="PP">
                                <img src="{{asset('storage/Assets/pen.profile.jpg')}}" alt="">
                            </div>
                        </div>
                       
                </div>
            </div>
    
            <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
            <script>
                AOS.init();
            </script>
     </div> 
        </div>
        </div>
        </div>
    </div>
        
    <script>
    document.getElementById('addPhoneButton').addEventListener('click', function() {
        document.getElementById('addPhoneForm').style.display = 'block';
        this.style.display = 'none'; // Sembunyikan tombol Add setelah diklik
    });
</script>

        <script>
    //         document.addEventListener('DOMContentLoaded', () => {
    //         const activeTab = sessionStorage.getItem('activeTab');
    //         if (activeTab) {
    //             document.querySelector(`button[onclick="openTab(event, '${activeTab}')"]`).click();
    //         } else {
    //             document.querySelector('.tab-link.active').click();
    //         }
    //     });

    //     function openTab(event, tabName) {
    //         // Hide all tab content
    //         const contents = document.querySelectorAll('.tab-content');
    //         contents.forEach(content => content.classList.remove('active'));

    //         // Remove active class from all tab links
    //         const links = document.querySelectorAll('.tab-link');
    //         links.forEach(link => link.classList.remove('active'));

    //         // Show the selected tab's content
    //         document.getElementById(tabName).classList.add('active');
    //         event.currentTarget.classList.add('active');

    //         // Save the active tab to sessionStorage
    //         sessionStorage.setItem('activeTab', tabName);
    //     }
    
    // document.addEventListener("DOMContentLoaded", () => {
    //     const urlParams = new URLSearchParams(window.location.search);
    //     const tab = urlParams.get('tab'); 
    //     if (tab) {
    //         document.querySelector(`button[onclick="openTab(event, '${tab}')"]`).click();
    //     } else {
    //         document.querySelector('button[onclick="openTab(event, \'profile\')"]').click();
    //     }
    // });

    document.addEventListener('scroll', () => {
            const fireLine = document.getElementById('fireLine');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = scrollTop / docHeight;
            fireLine.style.height = `${scrollPercentage * 100}%`;

            if (scrollPercentage > 0) {
                fireLine.classList.add('active');
            } else {
                fireLine.classList.remove('active');
            }
        });

            function enableEdit() {
                const editButton = document.getElementById('editButton');
                const updateButton = document.getElementById('updateButton');
                document.querySelectorAll('input[type="text"], input[type="password"], input[type="email"]').forEach(input => {
                    input.disabled = false;
                });
                document.querySelectorAll('input').forEach(input => {
                    input.style.border = "1px solid #ddd";
                });
                editButton.textContent = "Batalkan"
                updateButton.style.display = "inline-block";

                editButton.onclick = function() {
                    cancelEdit();
                };
            }

            function cancelEdit() {
                const editButton = document.getElementById('editButton');
                const updateButton = document.getElementById('updateButton');
                document.querySelectorAll('input[type="text"], input[type="password"], input[type="email"]').forEach(input => {
                    input.disabled = true;
                });

                document.querySelectorAll('input').forEach(input => {
                    input.style.border = "none";
                });
                editButton.textContent = "Edit Profile";
                updateButton.style.display = "none";
                editButton.onclick = function() {
                    enableEdit();
                };
            }                                                                   
      
    </script>
</x-app-layout>