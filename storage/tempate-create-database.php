user::create([
    'nama' => 'admin',
    'username' => 'admin',
    'password' => Hash::make('12345678'),
    'alamat' => 'admin',
    'role' => 'admin',
'email' => 'admin@gmail.com',
])

user::create([
    'nama' => 'kelompok4',
    'username' => 'kelompok4',
    'password' => Hash::make('12345678'),
    'alamat' => 'kelompok4',
    'role' => 'user',
'email' => 'kelompok4@gmail.com',
])

user::create([
    'nama' => 'pengelola',
    'username' => 'pengelola',
    'password' => Hash::make('12345678'),
    'alamat' => 'pengelola',
    'role' => 'pengelola',
'email' => 'pengelola@gmail.com',
])


$table->foreignId('pembayaran_id')->nullable();


pembayaran::create([
    'nominal' => '100000',
    'status' => 'lunas'
]);

