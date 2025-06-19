<h2>Tagihan Baru</h2>
<p>Halo {{ $tagihan->user->name }},</p>
<p>Tagihan baru telah dibuat dengan rincian berikut:</p>

<ul>
    <li><strong>Nama Tagihan:</strong> {{ $tagihan->nama_tagihan }}</li>
    <li><strong>Jumlah:</strong> Rp{{ number_format($tagihan->harga) }}</li>
    <li><strong>Jatuh Tempo:</strong> {{ $tagihan->tanggal_jatuh_tempo }}</li>
</ul>

<p>Segera lunasi tagihan ini sebelum jatuh tempo.</p>
<p>Terima kasih telah menggunakan Taro Bill!</p>
